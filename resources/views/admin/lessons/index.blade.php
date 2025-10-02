@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Lessons</h2>

        {{-- Only show "Add Lesson" if role is admin or teacher --}}
        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'teacher')
            <a href="{{ route('admin.lessons.create') }}" class="btn btn-primary">Add Lesson</a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Language</th>
                <th>Tutor</th>
                <th>Status</th>

                {{-- Only show Actions column if role is admin or teacher --}}
                @if(auth()->user()->role === 'admin' || auth()->user()->role === 'teacher')
                    <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($lessons as $lesson)
                <tr>
                    <td><a href="{{ route('admin.lessons.show', $lesson->id) }}">{{ $lesson->title }}</a></td>
                    <td>{{ $lesson->category?->name }}</td>
                    <td>{{ $lesson->language }}</td>
                    <td>{{ $lesson->tutor?->name ?? 'N/A' }}</td>
                    <td>{{ $lesson->is_active ? 'Active' : 'Inactive' }}</td>

                    {{-- Only show Edit/Delete if role is admin or teacher --}}
                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'teacher')
                        <td>
                            <a href="{{ route('admin.lessons.edit', $lesson->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.lessons.destroy', $lesson->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this lesson?')">Delete</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $lessons->links() }}
</div>
@endsection

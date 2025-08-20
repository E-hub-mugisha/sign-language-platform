@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <h2 class="mb-4">Lesson Review Management</h2>

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="nk-block">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">All Reviews</h4>
                    </div>
                </div>
                <div class="nk-block-body">
                    <table class="table table-striped align-middle table-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Lesson</th>
                                <th>User</th>
                                <th>Rating</th>
                                <th>Comment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reviews as $review)
                                <tr>
                                    <td>{{ $review->id }}</td>
                                    <td>{{ $review->lesson->title }}</td>
                                    <td>{{ $review->user->name }}</td>
                                    <td>{{ $review->rating }}</td>
                                    <td>{{ $review->comment }}</td>
                                    <td>
                                        <a href="{{ route('admin.lessons.show', $review->lesson->id) }}" class="btn btn-warning btn-sm">view lesson</a>
                                        <form action="{{ route('admin.lessons.reviews.delete', $review->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
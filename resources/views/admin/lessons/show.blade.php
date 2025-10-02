@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Lesson Details</h2>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>{{ $lesson->title }}</span>
            <a href="{{ route('admin.lessons.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Description:</strong>
                <p>{{ $lesson->description ?? 'No description provided.' }}</p>
            </div>

            <div class="mb-3">
                <strong>Language:</strong>
                <span class="badge bg-info">{{ $lesson->language }}</span>
            </div>

            <div class="mb-3">
                <strong>Category:</strong>
                <span class="badge bg-primary">{{ $lesson->category?->name ?? 'N/A' }}</span>
            </div>

            <div class="mb-3">
                <strong>Tutor:</strong>
                <span>{{ $lesson->tutor?->name ?? 'N/A' }}</span>
            </div>

            <div class="mb-3">
                <strong>Status:</strong>
                @if($lesson->is_active)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-secondary">Inactive</span>
                @endif
            </div>

            <!-- Video -->
            <div class="mb-3">
                <strong>Video:</strong>
                @if($lesson->video_url)
                    <video class="w-100" controls>
                        <source src="{{ asset('storage/' . $lesson->video_url) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @else
                    <p>No video uploaded.</p>
                @endif
            </div>

            <!-- Thumbnail -->
            <div class="mb-3">
                <strong>Thumbnail:</strong>
                @if($lesson->thumbnail_url)
                    <img src="{{ asset('storage/' . $lesson->thumbnail_url) }}" alt="Thumbnail" class="img-fluid img-thumbnail" style="max-width: 300px;">
                @else
                    <p>No thumbnail uploaded.</p>
                @endif
            </div>

            <!-- PDF -->
            <div class="mb-3">
                <strong>PDF Resource:</strong>
                @if($lesson->pdf_url)
                    <a href="{{ asset('storage/' . $lesson->pdf_url) }}" class="btn btn-outline-primary" target="_blank">Download PDF</a>
                @else
                    <p>No PDF uploaded.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Reviews Table -->
    <div class="nk-block-body">
        <table class="table table-striped align-middle table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    
                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'teacher')
                        <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($lesson->reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->comment }}</td>

                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'teacher')
                        <td>
                            <form action="{{ route('admin.lessons.reviews.delete', $review->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'teacher')
        <div class="d-flex gap-2">
            <a href="{{ route('admin.lessons.edit', $lesson->id) }}" class="btn btn-warning">Edit Lesson</a>
            <form action="{{ route('admin.lessons.destroy', $lesson->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this lesson?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Lesson</button>
            </form>
        </div>
    @endif
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Lesson</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.lessons.update', $lesson->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $lesson->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $lesson->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="language" class="form-label">Language</label>
            <select class="form-select" id="language" name="language">
                <option value="English" {{ old('language', $lesson->language)=='English' ? 'selected' : '' }}>English</option>
                <option value="Kinyarwanda" {{ old('language', $lesson->language)=='Kinyarwanda' ? 'selected' : '' }}>Kinyarwanda</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $lesson->category_id)==$category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="video_url" class="form-label">Video URL</label>
            <input type="text" class="form-control" id="video_url" name="video_url" value="{{ old('video_url', $lesson->video_url) }}" required>
        </div>

        <div class="mb-3">
            <label for="pdf_url" class="form-label">PDF URL</label>
            <input type="text" class="form-control" id="pdf_url" name="pdf_url" value="{{ old('pdf_url', $lesson->pdf_url) }}">
        </div>

        <div class="mb-3">
            <label for="thumbnail_url" class="form-label">Thumbnail URL</label>
            <input type="text" class="form-control" id="thumbnail_url" name="thumbnail_url" value="{{ old('thumbnail_url', $lesson->thumbnail_url) }}">
        </div>

        <div class="mb-3">
            <label for="tutor_id" class="form-label">Tutor</label>
            <select class="form-select" id="tutor_id" name="tutor_id">
                <option value="">Select Tutor</option>
                @foreach($tutors as $tutor)
                    <option value="{{ $tutor->id }}" {{ old('tutor_id', $lesson->tutor_id)==$tutor->id ? 'selected' : '' }}>
                        {{ $tutor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" {{ old('is_active', $lesson->is_active) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Update Lesson</button>
    </form>
</div>
@endsection

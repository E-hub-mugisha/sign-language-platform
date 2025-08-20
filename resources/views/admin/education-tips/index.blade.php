@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <h1>Education Tips</h1>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTipModal">
                Add Tip
            </button>

            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Views</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tips as $tip)
                        <tr>
                            <td>{{ $tip->title }}</td>
                            <td>{{ $tip->category?->name ?? 'N/A' }}</td>
                            <td>
                                @if ($tip->image)
                                <img src="{{ asset('storage/' . $tip->image) }}" width="60" class="rounded">
                                @else
                                <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $tip->is_active ? 'Active' : 'Inactive' }}</td>
                            <td>{{ $tip->views }}</td>
                            <td>
                                <!-- View Tip Button -->
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewTipModal-{{ $tip->id }}">
                                    View
                                </button>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editTipModal-{{ $tip->id }}">Edit</button>
                                <form action="{{ route('admin.education-tips.destroy', $tip->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this tip?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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

<!-- Add Tip Modal -->
<div class="modal fade" id="addTipModal" tabindex="-1" aria-labelledby="addTipModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('admin.education-tips.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Education Tip</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-select">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tag</label>
                        <input type="text" name="tag" class="form-control" placeholder="Optional tag">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" onchange="previewImage(event, 'addPreview')">
                        <img id="addPreview" src="" class="mt-2 rounded" style="display:none; max-width: 150px;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="is_active" class="form-select" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Tip</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Tip Modals -->
@foreach ($tips as $tip)
<div class="modal fade" id="editTipModal-{{ $tip->id }}" tabindex="-1" aria-labelledby="editTipModalLabel-{{ $tip->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('admin.education-tips.update', $tip->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Education Tip</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $tip->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" required>{{ $tip->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-select">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $tip->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tag</label>
                        <input type="text" name="tag" class="form-control" value="{{ $tip->tag }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" onchange="previewImage(event, 'editPreview-{{ $tip->id }}')">
                        @if ($tip->image)
                        <img id="editPreview-{{ $tip->id }}" src="{{ asset('storage/' . $tip->image) }}" class="mt-2 rounded" style="max-width:150px;">
                        @else
                        <img id="editPreview-{{ $tip->id }}" src="" class="mt-2 rounded" style="display:none; max-width:150px;">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="is_active" class="form-select" required>
                            <option value="1" {{ $tip->is_active ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ !$tip->is_active ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

@foreach ($tips as $tip)
<div class="modal fade" id="viewTipModal-{{ $tip->id }}" tabindex="-1" aria-labelledby="viewTipModalLabel-{{ $tip->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $tip->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($tip->image)
                    <img src="{{ asset('storage/' . $tip->image) }}" class="img-fluid rounded mb-3" style="max-height: 300px;">
                @endif
                <p><strong>Description:</strong></p>
                <p>{{ $tip->description }}</p>
                <p><strong>Category:</strong> {{ $tip->category?->name ?? 'N/A' }}</p>
                <p><strong>Tag:</strong> {{ $tip->tag ?? 'N/A' }}</p>
                <p><strong>Status:</strong> {{ $tip->is_active ? 'Active' : 'Inactive' }}</p>
                <p><strong>Views:</strong> {{ $tip->views }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection

@section('scripts')
<script>
    function previewImage(event, previewId) {
        const output = document.getElementById(previewId);
        output.src = URL.createObjectURL(event.target.files[0]);
        output.style.display = 'block';
    }
</script>
@endsection
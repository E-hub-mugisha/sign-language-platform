@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <h1>Education Tips</h1>

            {{-- Only admin/teacher can add a tip --}}
            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'teacher')
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTipModal">
                Add Tip
            </button>
            @endif

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
                                <!-- View Tip Button (visible for everyone) -->
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewTipModal-{{ $tip->id }}">
                                    View
                                </button>

                                {{-- Only admin/teacher can edit/delete --}}
                                @if(auth()->user()->role === 'admin' || auth()->user()->role === 'teacher')
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editTipModal-{{ $tip->id }}">
                                    Edit
                                </button>
                                <form action="{{ route('admin.education-tips.destroy', $tip->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this tip?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                @endif
                            </td>
                        </tr>

                        @foreach ($tips as $tip) <div class="modal fade" id="viewTipModal-{{ $tip->id }}" tabindex="-1" aria-labelledby="viewTipModalLabel-{{ $tip->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ $tip->title }}</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body"> @if ($tip->image) <img src="{{ asset('storage/' . $tip->image) }}" class="img-fluid rounded mb-3" style="max-height: 300px;"> @endif <p><strong>Description:</strong></p>
                                        <p>{{ $tip->description }}</p>
                                        <p><strong>Category:</strong> {{ $tip->category?->name ?? 'N/A' }}</p>
                                        <p><strong>Tag:</strong> {{ $tip->tag ?? 'N/A' }}</p>
                                        <p><strong>Status:</strong> {{ $tip->is_active ? 'Active' : 'Inactive' }}</p>
                                        <p><strong>Views:</strong> {{ $tip->views }}</p>
                                    </div>
                                    <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> </div>
                                </div>
                            </div>
                        </div> @endforeach

                        {{-- Edit Tip Modal (admin/teacher only) --}}
                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'teacher')
                        <div class="modal fade" id="editTipModal-{{ $tip->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Tip</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="{{ route('admin.education-tips.update', $tip->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label>Title</label>
                                                <input type="text" name="title" value="{{ $tip->title }}" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Content</label>
                                                <textarea name="content" class="form-control" required>{{ $tip->content }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label>Image</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>Status</label>
                                                <select name="is_active" class="form-control">
                                                    <option value="1" {{ $tip->is_active ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ !$tip->is_active ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Add Tip Modal (admin/teacher only) --}}
@if(auth()->user()->role === 'admin' || auth()->user()->role === 'teacher')
<div class="modal fade" id="addTipModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Tip</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.education-tips.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Content</label>
                        <textarea name="content" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="is_active" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Tip</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

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
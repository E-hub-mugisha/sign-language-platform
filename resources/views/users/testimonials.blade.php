@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Student Testimonials</h2>

    <!-- Success message -->
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add Testimonial Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
        <i class="bi bi-plus-circle"></i> Add Testimonial
    </button>

    <!-- Table -->
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Role</th>
                <th>Message</th>
                <th>Rating</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($testimonials as $testimonial)
            <tr>
                <td>
                    @if($testimonial->photo)
                    <img src="{{ asset('storage/'.$testimonial->photo) }}" width="60" class="rounded">
                    @else
                    <span class="text-muted">No Photo</span>
                    @endif
                </td>
                <td>{{ $testimonial->name }}</td>
                <td>{{ $testimonial->role }}</td>
                <td>{{ Str::limit($testimonial->message, 50) }}</td>
                <td>
                    @for($i=1; $i<=5; $i++)
                        <i class="bi {{ $i <= $testimonial->rating ? 'bi-star-fill text-warning' : 'bi-star' }}"></i>
                        @endfor
                </td>
                <td>
                    <span class="badge bg-{{ $testimonial->active ? 'success' : 'secondary' }}">
                        {{ $testimonial->active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>
                    <!-- Edit -->
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $testimonial->id }}">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <!-- Toggle Status -->
                    <form action="{{ route('admin.testimonials.status', $testimonial->id) }}" method="POST" class="d-inline">
                        @csrf @method('PATCH')
                        <button type="submit" class="btn btn-sm btn-{{ $testimonial->active ? 'secondary' : 'success' }}">
                            <i class="bi bi-toggle-{{ $testimonial->active ? 'off' : 'on' }}"></i>
                        </button>
                    </form>
                    <!-- Delete -->
                    <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>


            @endforeach
        </tbody>
    </table>
</div>

<!-- Edit Modals -->
@foreach( $testimonials as $testimonial)
<!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $testimonial->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.testimonials.update', $testimonial->id) }}" enctype="multipart/form-data" class="modal-content">
            @csrf @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Testimonial</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" required>
                </div>
                <div class="mb-3">
                    <label>Role</label>
                    <input type="text" name="role" class="form-control" value="{{ $testimonial->role }}" required>
                </div>
                <div class="mb-3">
                    <label>Message</label>
                    <textarea name="message" class="form-control" required>{{ $testimonial->message }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Rating</label>
                    <select name="rating" class="form-control">
                        @for($i=1; $i<=5; $i++)
                            <option value="{{ $i }}" {{ $i == $testimonial->rating ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                <div class="mb-3">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select name="active" class="form-control">
                        <option value="1" {{ $testimonial->active ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$testimonial->active ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endforeach

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add Testimonial</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Role</label>
                    <input type="text" name="role" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Message</label>
                    <textarea name="message" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label>Rating</label>
                    <select name="rating" class="form-control">
                        @for($i=1; $i<=5; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                <div class="mb-3">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select name="active" class="form-control">
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
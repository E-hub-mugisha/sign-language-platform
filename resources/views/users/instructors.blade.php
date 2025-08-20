@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <h2 class="mb-4">Instructor Management</h2>

            <!-- Success/Error Messages -->
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Button to trigger Add User Modal -->
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="bi bi-person-plus"></i> Add New Instructor
            </button>

            <!-- User Table -->
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Email Verified</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($instructors as $i => $user)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>
                                <span class="badge {{ $user->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $user->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                @if($user->email_verified_at)
                                <span class="badge bg-success">Verified</span>
                                @else
                                <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                            <td>
                                <!-- Edit -->
                                <button class="btn btn-sm btn-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editUserModal{{ $user->id }}">
                                    Edit
                                </button>

                                <!-- Toggle Status -->
                                <button class="btn btn-sm btn-secondary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#toggleStatusModal{{ $user->id }}">
                                    {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                                </button>

                                <!-- Resend Verification -->
                                @if(!$user->email_verified_at)
                                <form action="{{ route('users.resendVerification', $user->id) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-info text-white">
                                        Resend Verification
                                    </button>
                                </form>
                                @endif

                                <!-- Delete -->
                                <button class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteUserModal{{ $user->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>

                        <!-- Edit User Modal -->
                        <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <form method="POST" action="{{ route('admin.instructors.update', $user->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Instructor</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label>Name</label>
                                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Role</label>
                                                <input type="text" name="role" class="form-control" value="{{ $user->role }}" readonly required>
                                            </div>
                                            <div class="mb-3">
                                                <label>New Password (optional)</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Delete User Modal -->
                        <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <form method="POST" action="{{ route('admin.instructors.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete Instructor</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete <strong>{{ $user->name }}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Toggle Status Modal -->
                        <div class="modal fade" id="toggleStatusModal{{ $user->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <form method="POST" action="{{ route('admin.instructors.status', $user->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $user->is_active ? 'Deactivate' : 'Activate' }} Instructor</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to {{ $user->is_active ? 'deactivate' : 'activate' }} <strong>{{ $user->name }}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary">Yes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add User Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('admin.instructors.store') }}">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Instructor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Role</label>
                                <input type="text" name="role" class="form-control" value="teacher" readonly required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add Instructor</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
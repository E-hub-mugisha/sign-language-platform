@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Partners</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPartnerModal">
            <i class="bi bi-plus-circle me-1"></i> Add Partner
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive ">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($partners as $partner)
                <tr>
                    <td>{{ $partner->name }}</td>
                    <td>
                        @if($partner->logo)
                            <img src="{{ asset('storage/' . $partner->logo) }}" width="60" class="rounded">
                        @else
                            <span class="text-muted">No Logo</span>
                        @endif
                    </td>
                    <td><a href="{{ $partner->website }}" target="_blank">{{ $partner->website }}</a></td>
                    <td>
                        @if($partner->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editPartnerModal-{{ $partner->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this partner?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No partners found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add Partner Modal -->
<div class="modal fade" id="addPartnerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Partner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Logo</label>
                        <input type="file" name="logo" class="form-control" onchange="previewAddLogo(event)">
                        <img id="previewAddLogo" class="img-fluid mt-2 rounded" style="max-height:80px; display:none;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Website</label>
                        <input type="url" name="website" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Partner</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Partner Modals -->
@foreach($partners as $partner)
<div class="modal fade" id="editPartnerModal-{{ $partner->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Partner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $partner->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Logo</label>
                        <input type="file" name="logo" class="form-control" onchange="previewEditLogo{{ $partner->id }}(event)">
                        @if($partner->logo)
                        <img id="previewEdit{{ $partner->id }}" src="{{ asset('storage/' . $partner->logo) }}" class="img-fluid mt-2 rounded" style="max-height:80px;">
                        @else
                        <img id="previewEdit{{ $partner->id }}" class="img-fluid mt-2 rounded" style="max-height:80px; display:none;">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Website</label>
                        <input type="url" name="website" class="form-control" value="{{ $partner->website }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="active" {{ $partner->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $partner->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function previewEditLogo{{ $partner->id }}(event) {
    const output = document.getElementById('previewEdit{{ $partner->id }}');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.style.display = 'block';
}
</script>
@endforeach

<script>
function previewAddLogo(event) {
    const output = document.getElementById('previewAddLogo');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.style.display = 'block';
}
</script>
@endsection

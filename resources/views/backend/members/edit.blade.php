<x-backend-layout>
@section('title', 'Edit Member')

<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <h1 class="page-title fw-semibold fs-18 mb-0">Edit Member</h1>
    <a href="{{ route('members.index') }}" class="btn btn-sm btn-secondary">Back to List</a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card custom-card">
            <div class="card-body">
                <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="full_name" value="{{ old('full_name', $member->full_name) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mobile</label>
                        <input type="text" name="mobile" value="{{ old('mobile', $member->mobile) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="0" {{ $member->status == 0 ? 'selected' : '' }}>Pending</option>
                            <option value="1" {{ $member->status == 1 ? 'selected' : '' }}>Approved</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary">Update Member</button>
                        <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-layout>

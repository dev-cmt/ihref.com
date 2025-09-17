<x-backend-layout>
@section('title', 'Member Management')

<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <h1 class="page-title fw-semibold fs-18 mb-0">Member Management</h1>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Member Code</th>
                                <th>Full Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($members as $key => $member)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $member->member_code }}</td>
                                    <td>{{ $member->full_name }}</td>
                                    <td>{{ $member->mobile }}</td>
                                    <td>
                                        @if($member->status)
                                            <span class="badge bg-success">Approved</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$member->status)
                                            <form action="{{ route('admin.members.approve', $member->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-success-light btn-icon" onclick="return confirm('Approve this member?')">
                                                    <i class="ri-check-line"></i> Approve
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No members found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</x-backend-layout>

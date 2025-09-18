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
                    <table class="table table-hover text-nowrap align-middle">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Member Code</th>
                                <th>Full Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Latest Payment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($members as $key => $member)
                                <tr>
                                    <td>{{ $members->firstItem() + $key }}</td>
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
                                        @if($member->latestPayment?->status)
                                            <span class="badge bg-success">Approved</span>
                                        @elseif($member->latestPayment)
                                            <span class="badge bg-warning">Pending</span>
                                        @else
                                            <span class="badge bg-secondary">No Payment</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('members.show', $member->id) }}" class="btn btn-sm btn-primary-light">View</a>
                                        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-info-light">Edit</a>

                                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger-light" onclick="return confirm('Delete this member?')">Delete</button>
                                        </form>

                                        @if($member->latestPayment?->slip)
                                            <a href="{{ asset('uploads/slip/'.$member->latestPayment->slip) }}" target="_blank" download class="btn btn-sm btn-info-light">
                                                Download Slip
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No members found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $members->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</x-backend-layout>

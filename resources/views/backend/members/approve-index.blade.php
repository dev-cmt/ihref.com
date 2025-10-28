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
                                <th>Member Status</th>
                                <th>Payment Status</th>   <!-- ✅ NEW -->
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

                                {{-- ✅ Member Status --}}
                                <td>
                                    @if($member->status == 1)
                                        <span class="badge bg-success">Approved</span>
                                    @elseif($member->status == 2)
                                        <span class="badge bg-danger">Canceled</span>
                                    @else
                                        <span class="badge bg-warning">Pending</span>
                                    @endif
                                </td>

                                {{-- ✅ Payment Status --}}
                                <td>
                                    @if($member->latestPayment?->status == 1)
                                        <span class="badge bg-success">Approved</span>
                                    @elseif($member->latestPayment?->status == 2)
                                        <span class="badge bg-danger">Canceled</span>
                                    @elseif($member->latestPayment?->status == 0)
                                        <span class="badge bg-warning">Pending</span>
                                    @else
                                        <span class="badge bg-secondary">No Payment</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- ✅ Approve button --}}
                                    @if(!$member->status)
                                        <form action="{{ route('members.approve', $member->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-success-light" onclick="return confirm('Approve this member?')">
                                                <i class="ri-check-line"></i> Approve
                                            </button>
                                        </form>

                                        {{-- ✅ Cancel button --}}
                                        <form action="{{ route('members.cancel', $member->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-danger-light" onclick="return confirm('Cancel this member?')">
                                                <i class="ri-close-line"></i> Cancel
                                            </button>
                                        </form>
                                    @elseif($member->user_id != null)
                                        <span class="badge bg-primary">{{ $member->approveBy->name ?? 'N/A'}}</span>
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
                </div>

            </div>
        </div>
    </div>
</div>
</x-backend-layout>

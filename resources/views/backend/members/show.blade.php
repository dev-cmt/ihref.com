<x-backend-layout>
@section('title', 'View Member')

<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <h1 class="page-title fw-semibold fs-18 mb-0">View Member</h1>
    <a href="{{ route('members.index') }}" class="btn btn-sm btn-secondary">Back to List</a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card custom-card">
            <div class="card-body">
                <h5 class="mb-3">Member Details</h5>
                <table class="table table-borderless">
                    <tr><th>Member Code:</th><td>{{ $member->member_code }}</td></tr>
                    <tr><th>Full Name:</th><td>{{ $member->full_name }}</td></tr>
                    <tr><th>Mobile:</th><td>{{ $member->mobile }}</td></tr>
                    <tr><th>Division:</th><td>{{ $member->division?->name }}</td></tr>
                    <tr><th>District:</th><td>{{ $member->district?->name }}</td></tr>
                    <tr><th>Upazila:</th><td>{{ $member->upazila?->name }}</td></tr>
                    <tr><th>Union:</th><td>{{ $member->union?->name }}</td></tr>
                    <tr><th>Status:</th>
                        <td>
                            @if($member->status)
                                <span class="badge bg-success">Approved</span>
                            @else
                                <span class="badge bg-warning">Pending</span>
                            @endif
                        </td>
                    </tr>
                </table>

                <hr>

                <h5 class="mb-3">Latest Payment</h5>
                @if($member->latestPayment)
                    <table class="table table-bordered">
                        <tr>
                            <th>Amount</th>
                            <td>{{ $member->latestPayment->amount_paid }}</td>
                        </tr>
                        <tr>
                            <th>Payment Type</th>
                            <td>{{ ucfirst($member->latestPayment->payment_type) }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($member->latestPayment->status)
                                    <span class="badge bg-success">Approved</span>
                                @else
                                    <span class="badge bg-warning">Pending</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Slip</th>
                            <td>
                                @if($member->latestPayment->slip)
                                    <a href="{{ asset('uploads/slip/'.$member->latestPayment->slip) }}" target="_blank" download class="btn btn-sm btn-info-light">
                                        Download Slip
                                    </a>
                                @else
                                    <span class="text-muted">No Slip</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Message</th>
                            <td>{{ $member->latestPayment->message ?? '-' }}</td>
                        </tr>
                    </table>
                @else
                    <p class="text-muted">No payment records found.</p>
                @endif
            </div>
        </div>
    </div>
</div>
</x-backend-layout>

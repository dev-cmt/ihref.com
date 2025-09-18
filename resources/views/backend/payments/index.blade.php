<x-backend-layout>
@section('title', 'Payment Management')

<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <h1 class="page-title fw-semibold fs-18 mb-0">Payment Management</h1>
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
                                <th>Member</th>
                                <th>Payment Type</th>
                                <th>Amount Paid</th>
                                <th>Status</th>
                                <th>Slip</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($payments as $key => $payment)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $payment->member->full_name ?? 'N/A' }}</td>
                                    <td>{{ ucfirst($payment->payment_type) }}</td>
                                    <td>{{ number_format($payment->amount_paid,2) }} BDT</td>

                                    <td>
                                        @if($payment->status == 1)
                                            <span class="badge bg-success">Approved</span>
                                        @elseif($payment->status == 2)
                                            <span class="badge bg-danger">Canceled</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($payment->slip)
                                            <a href="{{ asset($payment->slip) }}" target="_blank" class="btn btn-sm btn-info-light">
                                                <i class="ri-eye-line"></i> View
                                            </a>
                                            <a href="{{ route('payments.download-slip', $payment->id) }}" class="btn btn-sm btn-primary-light">
                                                <i class="ri-download-line"></i> Download
                                            </a>
                                        @else
                                            <span class="text-muted">No slip</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if(!$payment->status)
                                            <form action="{{ route('payments.approve', $payment->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-success-light" onclick="return confirm('Approve this payment?')">
                                                    <i class="ri-check-line"></i> Approve
                                                </button>
                                            </form>
                                            <form action="{{ route('payments.cancel', $payment->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-danger-light" onclick="return confirm('Cancel this payment?')">
                                                    <i class="ri-check-line"></i> Canceled
                                                </button>
                                            </form>
                                        @elseif($payment->user_id != null)
                                            <span class="badge bg-primary">{{$payment->approveBy->name ?? 'N/A'}}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No payments found.</td>
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

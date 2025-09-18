<x-backend-layout>
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Welcome Admin Dashboard</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <!-- Total Categories -->
        <div class="col-md-3">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-top justify-content-between">
                        <div class="flex-fill">
                            <p class="mb-0 text-muted">Total District</p>
                            <div class="d-flex align-items-center">
                                <span class="fs-5 fw-semibold">{{ \App\Models\District::count() }}</span>
                            </div>
                        </div>
                        <div>
                            <span class="avatar avatar-md avatar-rounded bg-primary-transparent text-primary fs-18">
                                <i class="bx bx-layer fs-16"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Users -->
        <div class="col-md-3">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-top justify-content-between">
                        <div class="flex-fill">
                            <p class="mb-0 text-muted">Total Users</p>
                            <div class="d-flex align-items-center">
                                <span class="fs-5 fw-semibold">{{ \App\Models\User::count() }}</span>
                                <span class="fs-12 text-success ms-2">
                                    <i class="ti ti-trending-up me-1 d-inline-block"></i>0.0%
                                </span>
                            </div>
                        </div>
                        <div>
                            <span class="avatar avatar-md avatar-rounded bg-secondary-transparent text-secondary fs-18">
                                <i class="bi bi-person-lines-fill fs-16"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Views -->
        <div class="col-md-3">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-top justify-content-between">
                        <div class="flex-fill">
                            <p class="mb-0 text-muted">Total Amount Paid</p>
                            <div class="d-flex align-items-center">
                                <span class="fs-5 fw-semibold">{{ \App\Models\PaymentDetail::sum('amount_paid') }}</span>
                                <span class="fs-12 text-success ms-2">
                                    <i class="ti ti-trending-up me-1 d-inline-block"></i>5.1%
                                </span>
                            </div>
                        </div>
                        <div>
                            <span class="avatar avatar-md avatar-rounded bg-success-transparent text-success fs-18">
                                <i class="bi bi-eye-fill fs-16"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Members -->
        <div class="col-md-3">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-top justify-content-between">
                        <div class="flex-fill">
                            <p class="mb-0 text-muted">Total Members</p>
                            <div class="d-flex align-items-center">
                                <span class="fs-5 fw-semibold">{{ \App\Models\Registration::count() }}</span>
                                <span class="fs-12 text-success ms-2">
                                    <i class="ti ti-trending-up me-1 d-inline-block"></i>2.3%
                                </span>
                            </div>
                        </div>
                        <div>
                            <span class="avatar avatar-md avatar-rounded bg-warning-transparent text-warning fs-18">
                                <i class="bi bi-people-fill fs-16"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-backend-layout>

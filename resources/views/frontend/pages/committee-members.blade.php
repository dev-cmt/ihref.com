<x-frontend-layout title="Activities Page">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-bg-pattern"></div>

        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center hero-content">
                    <div class="badge-premium">Activities</div>
                    <h1 class="hero-title">পরিচালক/কমিটি সদস্য তালিকা</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <!-- Search Form -->
            <form action="{{ route('page.committee-members') }}" method="GET" class="mb-5">
                <div class="row g-2 align-items-center">
                    <!-- Name / Member Code / Phone -->
                    <div class="col-md-8">
                        <input type="text" name="search" class="form-control"  
                            value="{{ request('search') }}" 
                            placeholder="Enter name, phone, member ID...">
                    </div>

                    <!-- District Dropdown -->
                    <div class="col-md-2">
                        <select name="district_id" class="form-select">
                            <option value="">Select City</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}" 
                                    {{ request('district_id') == $district->id ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Search Button -->
                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-search"></i> Search
                        </button>
                    </div>
                </div>
            </form>

            <!-- Member List -->
            <div class="row g-3">
                @forelse ($members as $item)
                    <div class="col-md-3">
                        <div class="card member-card shadow-sm border-0">
                            <div class="member-image-wrapper">
                                <img src="{{ asset($item->photo ?? 'images/no-image.jpg') }}" 
                                    alt="Member Photo" class="member-image">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="fw-bold mb-1">{{ $item->full_name }}</h5>
                                <p class="text-muted mb-2">{{ $item->occupation ?? 'Not specified' }}</p>
                                <p class="text-muted mb-0">{{ $item->member_code }}</p>
                                <p class="text-muted mb-0">{{ $item->phone }}</p>
                                <p class="text-muted">{{ optional($item->district)->name ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No members found.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $members->links() }}
            </div>

        </div>
    </section>
</x-frontend-layout>

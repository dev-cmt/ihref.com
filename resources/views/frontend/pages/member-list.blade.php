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
                    <!-- Premium Badge -->
                    <div class="badge-premium">
                        Activities
                    </div>
                    <!-- Main Title -->
                    <h1 class="hero-title">সদস্য তালিকা</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">Plugin Features</h2>
            <div class="border"></div>
            <p class="section-subtitle">আন্তর্জাতিক মানবাধিকার এডুকেশন ফাউন্ডেশনের প্রকল্পসমূহ এক নজরে আন্তর্জাতিক মানবাধিকার এডুকেশন ফাউন্ডেশনের প্রকল্পের স্থির চার্ট</p>

            <!--Member List-->
            <div class="row g-3">
                @foreach ($members as $item)
                    <div class="col-md-3">
                        <div class="card member-card shadow-sm border-0">
                            <div class="member-image-wrapper">
                                <img src="{{ asset($item->photo ?? 'images/no-image.jpg') }}" alt="Member Photo" class="member-image">
                            </div>
                            <div class="card-body text-center">
                                {{-- Basic Info --}}
                                <h5 class="fw-bold mb-1">{{ $item->full_name }}</h5>
                                <p class="text-muted mb-2">{{ $item->occupation ?? 'Not specified' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
</x-frontend-layout>
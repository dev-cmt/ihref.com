<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <!-- Logo Left -->
        {{-- <a class="navbar-brand me-auto" href="https://frodlybd.com">
            <img src="{{ asset('images/logo-light.svg') }}" alt="Frodly Logo" height="40" class="logo-light">
            <img src="{{ asset('images/logo-dark.svg') }}" alt="Frodly Logo Dark" height="40" class="logo-dark">
        </a> --}}
        <a class="navbar-brand me-auto" href="{{url('/')}}">
            <img src="{{ asset('images/logo.png') }}" alt="Frodly Logo">
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <div class="navbar-toggler-icon-custom">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>

        <!-- Menu & Buttons -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Menu Center -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{route('page.activities')}}">আমাদের কার্যক্রম</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('page.chairman-message')}}">চেয়ারম্যানের বাণী</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('page.committee-members')}}">পরিচালক ও সদস্য</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('page.member-list')}}">সদস্য তালিকা</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('page.photo-gallery')}}">ফটো গ্যালারি</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('page.news')}}">খবর</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('page.contact')}}">ঠিকানা</a></li>
            </ul>

            <!-- Buttons Right -->
            <div class="d-flex align-items-center navbar-buttons">
                <!-- Dark Mode Toggle -->
                <input type="checkbox" id="dark-mode-toggle-checkbox" class="d-none">
                <label for="dark-mode-toggle-checkbox" class="dark-mode-toggle-label me-3" aria-label="Toggle Dark Mode">
                    <i class="fas fa-moon"></i>
                    <i class="fas fa-sun"></i>
                </label>

                <a href="https://ihref.org/wp-content/uploads/2025/01/form.pdf" class="btn btn-default">ফরম</a>

                <!-- Login / Signup -->
                {{-- @guest
                    <a href="{{route('login')}}" class="btn btn-outline-success me-2">Login</a>
                    <a href="{{route('register')}}" class="btn btn-default">Signup</a>
                @else
                    <a href="{{route('dashboard')}}" class="btn btn-outline-warning me-2">{{ Auth::user()->name }}</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest --}}
            </div>
        </div>
    </div>
</nav>

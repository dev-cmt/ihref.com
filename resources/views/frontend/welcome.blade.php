<x-frontend-layout title="Home Page" :breadcrumbs="$breadcrumbs" :seotags="$seotags">
    <!-- Hero Section with Background Slider -->
    <section class="hero-section position-relative">

        <!-- Background Slider -->
        <div class="hero-bg-slider swiper myHeroSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url('{{ asset('images/slider/slide1.jpg') }}');"></div>
                <div class="swiper-slide" style="background-image: url('{{ asset('images/slider/slide1.jpg') }}');"></div>
                <div class="swiper-slide" style="background-image: url('{{ asset('images/slider/slide1.jpg') }}');"></div>
            </div>
        </div>

        <!-- Optional Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Hero Content -->
        <div class="hero-overlay">
            <div class="hero-bg-pattern"></div>
            <div class="floating-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center hero-content">
                        <!-- Your existing hero content -->
                        <div class="badge-premium">
                            <i class="fas fa-crown me-2"></i> রেজিঃ নং: এস ৭২৫৯ (৪৪৮)০৭ 🥇
                        </div>
                        <h1 class="hero-title">রেজিস্ট্রেশন-ফি - ৬০০ টাকা</h1>
                        <div class="border"></div>
                        <p class="hero-description">
                            নিবন্ধন অধিদপ্তর-গণপ্রজাতন্ত্রী বাংলাদেশ ... <br>
                            ইন্টারন্যাশনাল হিউম্যান রাইটস এডুকেশন ফাউন্ডেশন <br>
                            <span class="text-white">INTERNATIONAL HUMAN RIGHTS EDUCATION FOUNDATION</span>
                        </p>
                        <div class="features-highlight">
                            <div class="feature-tag"><i class="fas fa-shield-alt"></i> ফ্রড ডিটেকশন</div>
                            <div class="feature-tag"><i class="fas fa-phone-alt"></i> ফোন ভেরিফিকেশন</div>
                            <div class="feature-tag"><i class="fas fa-tasks"></i> ইনকমপ্লিট অর্ডার ট্র্যাকিং</div>
                            <div class="feature-tag"><i class="fas fa-redo"></i> রিপিট অর্ডার ফিল্টারিং</div>
                        </div>
                        <div class="cta-buttons">
                            <a href="{{route('registration.from')}}" class="btn btn-hero-primary">
                                <i class="fas fa-play-circle"></i> নিবন্ধন করুন
                            </a>
                            <a href="#services" class="btn btn-hero-secondary">
                                <i class="fas fa-info-circle"></i> আরও জানুন
                            </a>
                        </div>
                        <div class="stats-container">
                            <div class="stat-item">
                                <div class="stat-number">৬৪ টি</div>
                                <div class="stat-label">জেলা</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">১০০+</div>
                                <div class="stat-label">সদস্য</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">About Us</h2>
            <div class="border mb-3"></div>
            <p class="section-subtitle">আমাদের সম্পর্কে জানুন এবং কেন আমরা আপনার সেরা পছন্দ</p>

            <div class="row g-4 align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('images/logo.png') }}" alt="About Us Image" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-6">
                    <h3>Welcome to Sky Tech Solve</h3>
                    <p>Sky Tech Solve is a leading software solution provider, specializing in creating advanced web and mobile applications for businesses of all sizes. We focus on delivering high-quality, user-friendly, and innovative solutions that help our clients grow and succeed.</p>
                    <ul class="list-unstyled">
                        <li>✅ Experienced & Skilled Team</li>
                        <li>✅ Customer-Centric Approach</li>
                        <li>✅ Timely Delivery & Support</li>
                        <li>✅ Innovative & Scalable Solutions</li>
                    </ul>
                    <a href="#contact" class="btn btn-primary mt-3">Get in Touch</a>
                </div>
            </div>
        </div>
    </section>


    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Plugin Features</h2>
            <div class="border"></div>
            <p class="section-subtitle">আপনার অনলাইন স্টোরে Frodly ইন্সটল করলে যা সুবিধা পাবেন</p>

            <div class="row g-3">

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm feature-card">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-shield-alt text-default mb-2" style="font-size: 2rem;"></i>
                            <h6 class="card-title mb-2">OTP Verification</h6>
                            <p class="card-text text-muted small">OTP ছাড়া কাস্টমার অর্ডার প্লেস করতে না পারে (Standard
                                & Flexible Checkout সাপোর্টেড)।</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm feature-card">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-chart-bar text-default mb-2" style="font-size: 2rem;"></i>
                            <h6 class="card-title mb-2">Courier Report</h6>
                            <p class="card-text text-muted small">অর্ডার লিস্টেই কাস্টমারের কুরিয়ার ডেলিভারি হিস্টোরি ও
                                ফ্রড রিপোর্ট দেখা যাবে।</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm feature-card">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-filter text-default mb-2" style="font-size: 2rem;"></i>
                            <h6 class="card-title mb-2">Smart Order Filter</h6>
                            <p class="card-text text-muted small">কম ডেলিভারি রেশিও হলে অর্ডার ব্লক বা OTP ভেরিফিকেশন
                                বাধ্যতামূলক করা যায়।</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm feature-card">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-globe text-default mb-2" style="font-size: 2rem;"></i>
                            <h6 class="card-title mb-2">VPN Block</h6>
                            <p class="card-text text-muted small">VPN ইউজ করে কেউ যেন অর্ডার করতে না পারে — তা ব্লক করা
                                যাবে।</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm feature-card">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-exclamation-triangle text-default mb-2" style="font-size: 2rem;"></i>
                            <h6 class="card-title mb-2">Fraud Detection</h6>
                            <p class="card-text text-muted small">সন্দেহজনক ব্রাউজার বা IP থেকে অর্ডার হলে অটো ব্লক করা
                                যাবে।</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm feature-card">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-file-alt text-default mb-2" style="font-size: 2rem;"></i>
                            <h6 class="card-title mb-2">Incomplete Orders</h6>
                            <p class="card-text text-muted small">নাম্বার, ঠিকানা লিখেই অর্ডার না করলেও সেই লিড সংরক্ষণ
                                হবে।</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm feature-card">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-redo text-default mb-2" style="font-size: 2rem;"></i>
                            <h6 class="card-title mb-2">Repeat Order Blocker</h6>
                            <p class="card-text text-muted small">একই কাস্টমার যেন বারবার অর্ডার না করে — টাইম/লিমিট
                                অনুযায়ী ব্লক।</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm feature-card">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-history text-default mb-2" style="font-size: 2rem;"></i>
                            <h6 class="card-title mb-2">Phone History</h6>
                            <p class="card-text text-muted small">একই ফোন নাম্বার দিয়ে আগে অর্ডার করা হয়েছে কিনা — এক
                                ক্লিকে দেখা যাবে।</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm feature-card">
                        <div class="card-body text-center p-3">
                            <i class="fas fa-sms text-default mb-2" style="font-size: 2rem;"></i>
                            <h6 class="card-title mb-2">SMS Notification</h6>
                            <p class="card-text text-muted small">প্রতিটি অর্ডার স্ট্যাটাসে কাস্টমারকে SMS পাঠানো যাবে।
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Chairman's Message Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">Chairman’s Message</h2>
            <div class="border mb-3"></div>
            <p class="section-subtitle">এক নজরে চেয়ারম্যানের বার্তা</p>

            <div class="row g-4 align-items-center">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Chairman Image" class="img-fluid rounded-circle shadow">
                </div>
                <div class="col-md-8">
                    <h3>Mr. Motiur Rahman</h3>
                    <p><em>Chairman, Sky Tech Solve</em></p>
                    <p>
                        Welcome to Sky Tech Solve. Our mission is to provide innovative software solutions that empower businesses and individuals alike. We are committed to delivering high-quality products with integrity, dedication, and excellence.  
                        Our team works tirelessly to ensure every project meets the highest standards and exceeds client expectations. We believe in building long-term relationships with our clients, based on trust and mutual growth.
                    </p>
                    <p>
                        Thank you for trusting us, and we look forward to collaborating with you to achieve success together.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Service Section -->
    <section class="py-5" id="services">
        <div class="container">
            <h2 class="section-title">What Our Service Offers</h2>
            <div class="border mb-3"></div>
            <p class="section-subtitle">কিভাবে আমাদের সার্ভিস আপনাকে হেল্প করবে সেটা জানতে নিচের বিস্তারিত বিবরণ দেখুন।</p>

            <!-- Feature Buttons as Tabs -->
            <div class="d-flex justify-content-center flex-wrap mb-5" id="feature-buttons" role="tablist">
                <button class="btn btn-android m-2 active" data-bs-toggle="tab" data-bs-target="#wordpress-tab" type="button" role="tab">ওয়ার্ডপ্রেস প্লাগইন</button>
                <button class="btn btn-web m-2" data-bs-toggle="tab" data-bs-target="#web-tab" type="button" role="tab">ওয়েব অ্যাপ্লিকেশন</button>
                <button class="btn btn-api m-2" data-bs-toggle="tab" data-bs-target="#api-tab" type="button" role="tab">API এন্ট্রিগ্রেশন</button>
            </div>

            <!-- Tab Content -->
            <div class="tab-content" id="feature-content">
                <!-- WordPress Tab -->
                <div class="tab-pane fade show active" id="wordpress-tab" role="tabpanel">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-6">
                            <div class="ratio ratio-16x9 mb-4 mb-lg-0">
                                <iframe src="https://www.youtube.com/embed/DgZN3lTPBiI" title="ওয়েব অ্যাপ্লিকেশন" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="">
                                </iframe>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feature-details h-100 d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-3 feature-title-row">
                                    <h3 class="mb-0">ওয়েব অ্যাপ্লিকেশন</h3>

                                    <a href="https://download.hoorin.com/app/app-release.apk" class="btn btn-default btn-sm download-btn" target="_blank">
                                        <i class="bi bi-download me-1"></i> ডাউনলোড
                                    </a>
                                </div>
                                <p class="mb-4">মোবাইলে সহজে ব্যবহার করুন আমাদের অ্যান্ড্রয়েড অ্যাপ</p>
                                <ul class="list-unstyled feature-list mb-4">

                                    <li class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="feature-icon me-3">
                                                <i class="fa-solid fa-circle-check text-default"></i>
                                            </div>
                                            <div>যেকোনো লোকেশন থেকে অ্যাক্সেস করুন</div>
                                        </div>
                                    </li>

                                    <li class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="feature-icon me-3">
                                                <i class="fa-solid fa-circle-check text-default"></i>
                                            </div>
                                            <div>আপনার সাবস্ক্রিপশন স্ট্যাটাস দেখা</div>
                                        </div>
                                    </li>

                                    <li class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="feature-icon me-3">
                                                <i class="fa-solid fa-circle-check text-default"></i>
                                            </div>
                                            <div>সিকিউর এবং লাইটওয়েট অ্যাপ্লিকেশন</div>
                                        </div>
                                    </li>

                                    <li class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="feature-icon me-3">
                                                <i class="fa-solid fa-circle-check text-default"></i>
                                            </div>
                                            <div>ইন্টিগ্রেশন আপনার শপ ম্যানেজমেন্টের সাথে</div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Web App Tab -->
                <div class="tab-pane fade" id="web-tab" role="tabpanel">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-6">
                            <div class="ratio ratio-16x9 mb-4 mb-lg-0">
                                <iframe src="https://www.youtube.com/embed/DgZN3lTPBiI" title="ওয়েব অ্যাপ্লিকেশন" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="">
                                </iframe>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feature-details h-100 d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-3 feature-title-row">
                                    <h3 class="mb-0">ওয়েব অ্যাপ্লিকেশন</h3>
                                </div>
                                <p class="mb-4">মোবাইলে সহজে ব্যবহার করুন আমাদের অ্যান্ড্রয়েড অ্যাপ</p>
                                <ul class="list-unstyled feature-list mb-4">

                                        <li class="mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="feature-icon me-3">
                                                    <i class="fa-solid fa-circle-check text-default"></i>
                                                </div>
                                                <div>যেকোনো লোকেশন থেকে অ্যাক্সেস করুন</div>
                                            </div>
                                        </li>

                                        <li class="mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="feature-icon me-3">
                                                    <i class="fa-solid fa-circle-check text-default"></i>
                                                </div>
                                                <div>আপনার সাবস্ক্রিপশন স্ট্যাটাস দেখা</div>
                                            </div>
                                        </li>

                                        <li class="mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="feature-icon me-3">
                                                    <i class="fa-solid fa-circle-check text-default"></i>
                                                </div>
                                                <div>সিকিউর এবং লাইটওয়েট অ্যাপ্লিকেশন</div>
                                            </div>
                                        </li>

                                        <li class="mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="feature-icon me-3">
                                                    <i class="fa-solid fa-circle-check text-default"></i>
                                                </div>
                                                <div>ইন্টিগ্রেশন আপনার শপ ম্যানেজমেন্টের সাথে</div>
                                            </div>
                                        </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- API Tab -->
                <div class="tab-pane fade" id="api-tab" role="tabpanel">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-6">
                            <div class="ratio ratio-16x9 mb-4 mb-lg-0">
                                <iframe src="https://www.youtube.com/embed/DgZN3lTPBiI" title="Api Integreation" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="">
                                </iframe>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feature-details h-100 d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-3 feature-title-row">
                                    <h3 class="mb-0">Api Integreation</h3>

                                </div>
                                <p class="mb-4">মোবাইলে সহজে ব্যবহার করুন আমাদের অ্যান্ড্রয়েড অ্যাপ</p>
                                <ul class="list-unstyled feature-list mb-4">

                                        <li class="mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="feature-icon me-3">
                                                    <i class="fa-solid fa-circle-check text-default"></i>
                                                </div>
                                                <div>যেকোনো লোকেশন থেকে অ্যাক্সেস করুন</div>
                                            </div>
                                        </li>

                                        <li class="mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="feature-icon me-3">
                                                    <i class="fa-solid fa-circle-check text-default"></i>
                                                </div>
                                                <div>আপনার সাবস্ক্রিপশন স্ট্যাটাস দেখা</div>
                                            </div>
                                        </li>

                                        <li class="mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="feature-icon me-3">
                                                    <i class="fa-solid fa-circle-check text-default"></i>
                                                </div>
                                                <div>সিকিউর এবং লাইটওয়েট অ্যাপ্লিকেশন</div>
                                            </div>
                                        </li>

                                        <li class="mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="feature-icon me-3">
                                                    <i class="fa-solid fa-circle-check text-default"></i>
                                                </div>
                                                <div>ইন্টিগ্রেশন আপনার শপ ম্যানেজমেন্টের সাথে</div>
                                            </div>
                                        </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5" id="faq">
        <div class="container">
            <h2 class="section-title">Common Questions</h2>
            <div class="border"></div>
            <p class="section-subtitle">আমাদের সেবা সম্পর্কে আপনার সাধারণ প্রশ্নের উত্তর</p>

            <div class="row mt-5">
                <div class="col-md-6 accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                হুরিন অর্ডার গার্ড কীভাবে কাজ করে?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                হুরিন অর্ডার গার্ড গ্রাহকের ফোন নম্বর বিশ্লেষণ করে তাদের অর্ডারের ইতিহাস, কুরিয়ার
                                ব্যবহার এবং রিটার্নের তথ্য সরবরাহ করে। এই তথ্য ব্যবহার করে আপনি সম্ভাব্য প্রতারক
                                গ্রাহকদের চিহ্নিত করতে পারেন, যা রিটার্ন রেট কমাতে সাহায্য করে এবং আপনার ব্যবসার জন্য
                                সঠিক সিদ্ধান্ত নিতে সহায়তা করে।
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                আমি কি বিনামূল্যে ট্রায়াল করতে পারি?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                হ্যাঁ, আমরা সকল নতুন ব্যবহারকারীদের জন্য ৩ দিনের বিনামূল্যে ট্রায়াল অফার করি। এই সময়ে
                                আপনি আমাদের সিস্টেমের সকল ফিচার ব্যবহার করতে পারবেন এবং এটি আপনার ব্যবসার জন্য কতটা
                                উপযোগী তা যাচাই করতে পারবেন।
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                আমার ওয়েবসাইটের সাথে হুরিন কিভাবে ইন্টিগ্রেট করব?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                আমরা বিভিন্ন প্ল্যাটফর্মের জন্য একাধিক ইন্টিগ্রেশন অপশন প্রদান করি। ওয়ার্ডপ্রেস/উকমার্স
                                ব্যবহারকারীদের জন্য আমাদের প্লাগইন, গুগল শীট ইন্টিগ্রেশন, ক্রোম এক্সটেনশন, অ্যান্ড্রয়েড
                                এপ, ওয়েব অ্যাপ্লিকেশন এবং API ইন্টিগ্রেশন - এই সকল অপশন রয়েছে। আমাদের ডকুমেন্টেশন বা
                                সাপোর্ট টিমের সাহায্যে আপনি সহজেই সেটআপ করতে পারবেন।
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                আমার তথ্য কি নিরাপদ থাকবে?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="faqFour"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                হ্যাঁ, আমরা আপনার ডেটা সুরক্ষাকে সর্বোচ্চ অগ্রাধিকার দেই। আমরা উন্নত এনক্রিপশন, সুরক্ষিত
                                সার্ভার এবং অ্যাক্সেস কন্ট্রোল ব্যবস্থা ব্যবহার করি। আমরা কোনো ব্যক্তিগত ডেটা তৃতীয়
                                পক্ষের সাথে শেয়ার করি না এবং সব সময় প্রাইভেসি পলিসি অনুসরণ করি।
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('images/faq.jpg')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>


    <!-- About Us Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">About Us</h2>
            <div class="border mb-3"></div>
            <p class="section-subtitle">আমাদের সম্পর্কে জানুন এবং কেন আমরা আপনার সেরা পছন্দ</p>

            <div class="row g-4 align-items-center">
                <div class="col-md-6">
                    <h3>Welcome to Sky Tech Solve</h3>
                    <p>Sky Tech Solve is a leading software solution provider, specializing in creating advanced web and mobile applications for businesses of all sizes. We focus on delivering high-quality, user-friendly, and innovative solutions that help our clients grow and succeed.</p>
                    <ul class="list-unstyled">
                        <li>✅ Experienced & Skilled Team</li>
                        <li>✅ Customer-Centric Approach</li>
                        <li>✅ Timely Delivery & Support</li>
                        <li>✅ Innovative & Scalable Solutions</li>
                    </ul>
                    <a href="#contact" class="btn btn-primary mt-3">Get in Touch</a>
                </div>
                
                <div class="col-md-6">
                    <img src="{{ asset('images/logo.png') }}" alt="About Us Image" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>

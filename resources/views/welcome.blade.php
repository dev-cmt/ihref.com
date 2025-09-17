<x-frontend-layout>
    <style>
    .logo-header img{ height:80px; }
    .bengali-title{ color:#00923f; font-weight:600; font-size:1.4rem; }
    .ihref-letters{
        position:absolute; left:15px; top:140px;
        font-size:3rem; font-weight:700; color:#e67300; line-height:3.5rem;
    }
    .ihref-letters span{ display:block; }
    .dotted-line{ border-bottom:1px dotted #000; flex:1; }
    .footer{ font-size:0.9rem; }
</style>
    <div class="container-lg">
        <div class="form-wrapper">
            <!-- Header -->
            <div class="text-center logo-header mb-2">
                <img src="your-logo.png" alt="logo">
                <h4 class="mb-0 fw-bold">INTERNATIONAL HUMAN RIGHTS EDUCATION FOUNDATION</h4>
                <h5 class="bengali-title">আন্তর্জাতিক মানবাধিকার এডুকেশন ফাউন্ডেশন</h5>
                <p class="mb-1">Govt. Reg. No – S - 7259 (448) 07</p>
            </div>
            <hr>

            <!-- Top row -->
            <div class="d-flex justify-content-between mb-3">
                <div>Ref No : ..................</div>
                <button class="btn btn-success btn-sm">সদস্য নিবন্ধন ফরম</button>
                <div>Date : ..................</div>
            </div>

            <!-- I H R E F letters -->
            <div class="ihref-letters">
                <span>I</span><span>H</span><span>R</span><span>E</span><span>F</span>
            </div>

            <!-- Body content -->
            <div class="ms-5">
                <div class="mb-2">সদস্য আইডি নং : [   ] [   ] [   ] [   ]</div>
                <div class="text-end mb-3 border p-3" style="width:120px;height:140px;">ছবি</div>

                <p>চেয়ারম্যান/মহাসচিব<br>
                জনাব,<br>
                আমি আন্তর্জাতিক মানবাধিকার এডুকেশন ফাউন্ডেশনের ...</p>

                <!-- Example input fields with two columns -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">নাম</label>
                        <input type="text" class="form-control" id="name" placeholder="নাম লিখুন">
                    </div>
                    <div class="col-md-6">
                        <label for="father_name" class="form-label">পিতা/স্বামী নাম</label>
                        <input type="text" class="form-control" id="father_name" placeholder="পিতা/স্বামী নাম লিখুন">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="mother_name" class="form-label">মাতা নাম</label>
                        <input type="text" class="form-control" id="mother_name" placeholder="মাতা নাম লিখুন">
                    </div>
                    <div class="col-md-6">
                        <label for="birth_date" class="form-label">জন্ম তারিখ</label>
                        <input type="date" class="form-control" id="birth_date">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="education" class="form-label">শিক্ষাগত যোগ্যতা</label>
                        <input type="text" class="form-control" id="education" placeholder="শিক্ষাগত যোগ্যতা লিখুন">
                    </div>
                    <div class="col-md-6">
                        <label for="occupation" class="form-label">পেশা</label>
                        <input type="text" class="form-control" id="occupation" placeholder="পেশা লিখুন">
                    </div>
                </div>


                <p class="mt-3">
                    আমি আন্তর্জাতিক মানবাধিকার এডুকেশন ফাউন্ডেশনের ... এর যে কোন নিয়মকানুন মেনে চলব।
                </p>

                <div class="row mt-5">
                    <div class="col text-start">
                        <p>চেয়ারম্যানের স্বাক্ষর</p>
                    </div>
                    <div class="col text-end">
                        <p>আবেদনকারীর স্বাক্ষর</p>
                    </div>
                </div>
            </div>

            <hr>
            <!-- Footer -->
            <div class="footer text-center">
                Head Office : Baluahat, Sonatola, Bogura <br>
                phone : +8801826-111923, +8801751-491031,
                E-mail : shohagprodhancpf063@gmail.com
            </div>
        </div>
    </div>
</x-frontend-layout>

<x-frontend-layout>
@section('title', 'Member Registration')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush

<style>
    .logo-header img { height: 120px; }
    .bengali-title { color: #00923f; font-weight: 600; font-size: 1.4rem; }
    .ihref-letters {
        font-size: 3rem; font-weight: 700; color: #e67300; line-height: 3.5rem;
        display: flex; flex-direction: column; justify-content: space-between; height: 100%;
    }
    .ihref-letters span { display:block; }

    @media (max-width: 768px) {
        .ihref-letters { display: none }
    }
</style>

<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-body p-5">
            <!-- Header -->
            <div class="text-center logo-header mb-4">
                <img src="{{asset('images/logo.jpg')}}" alt="logo">
                <h4 class="fw-bold mt-3">INTERNATIONAL HUMAN RIGHTS EDUCATION FOUNDATION</h4>
                <h5 class="bengali-title">আন্তর্জাতিক মানবাধিকার এডুকেশন ফাউন্ডেশন</h5>
                <p class="mb-1">Govt. Reg. No – S - 7259 (448) 07</p>
            </div>
            <hr>

            <div class="row">
                <!-- I H R E F letters -->
                <div class="col-md-1 mb-4 mb-md-0 text-center">
                    <div class="ihref-letters">
                        <span>I</span><span>H</span><span>R</span><span>E</span><span>F</span>
                    </div>
                </div>

                <!-- Body -->
                <div class="col-md-11">
                    <p class="mb-4">
                        চেয়ারম্যান/মহাসচিব<br>
                        জনাব,<br>
                        আমি আন্তর্জাতিক মানবাধিকার এডুকেশন ফাউন্ডেশনের সদস্য হওয়ার অভিপ্রায়ে
                        নিচে আমার ব্যক্তিগত তথ্যাদি লিপিবদ্ধ করলাম
                    </p>

                    <!-- ✅ Registration Form -->
                    <form method="POST" action="{{ route('registation.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">

                            {{-- Auto-generated member code & slug after save --}}
                            @if(session('member_code'))
                                <div class="col-md-6">
                                    <label class="form-label">Member Code</label>
                                    <input type="text" class="form-control" value="{{ session('member_code') }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control" value="{{ session('slug') }}" readonly>
                                </div>
                            @endif

                            {{-- Name --}}
                            <div class="col-md-6">
                                <label class="form-label">নাম</label>
                                <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror"
                                       placeholder="নাম লিখুন" value="{{ old('full_name') }}" required>
                                @error('full_name')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Father/Husband --}}
                            <div class="col-md-6">
                                <label class="form-label">পিতা/স্বামী নাম</label>
                                <input type="text" name="father_or_husband" class="form-control @error('father_or_husband') is-invalid @enderror"
                                       placeholder="পিতা/স্বামী নাম লিখুন" value="{{ old('father_or_husband') }}" required>
                                @error('father_or_husband')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Mother --}}
                            <div class="col-md-6">
                                <label class="form-label">মাতা নাম</label>
                                <input type="text" name="mother" class="form-control @error('mother') is-invalid @enderror"
                                       placeholder="মাতা নাম লিখুন" value="{{ old('mother') }}" required>
                                @error('mother')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- NID --}}
                            <div class="col-md-6">
                                <label class="form-label">জাতীয় আইডি নং</label>
                                <input type="text" name="nid" class="form-control @error('nid') is-invalid @enderror"
                                       placeholder="জাতীয় আইডি নং লিখুন" value="{{ old('nid') }}">
                                @error('nid')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Education --}}
                            <div class="col-md-6">
                                <label class="form-label">শিক্ষাগত যোগ্যতা</label>
                                <input type="text" name="education" class="form-control @error('education') is-invalid @enderror"
                                       placeholder="শিক্ষাগত যোগ্যতা লিখুন" value="{{ old('education') }}">
                                @error('education')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- DOB --}}
                            <div class="col-md-6">
                                <label class="form-label">জন্ম তারিখ</label>
                                <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror"
                                       value="{{ old('dob') }}">
                                @error('dob')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Occupation --}}
                            <div class="col-md-6">
                                <label class="form-label">পেশা</label>
                                <input type="text" name="occupation" class="form-control @error('occupation') is-invalid @enderror"
                                       placeholder="পেশা লিখুন" value="{{ old('occupation') }}">
                                @error('occupation')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Religion --}}
                            <div class="col-md-6">
                                <label class="form-label">ধর্ম</label>
                                <input type="text" name="religion" class="form-control @error('religion') is-invalid @enderror"
                                       placeholder="ধর্ম লিখুন" value="{{ old('religion') }}">
                                @error('religion')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Permanent Address --}}
                            <div class="col-md-6">
                                <label class="form-label">স্থায়ী ঠিকানা</label>
                                <input type="text" name="permanent_address" class="form-control @error('permanent_address') is-invalid @enderror"
                                       placeholder="স্থায়ী ঠিকানা লিখুন" value="{{ old('permanent_address') }}">
                                @error('permanent_address')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Post Office --}}
                            <div class="col-md-6">
                                <label class="form-label">ডাকঘর</label>
                                <input type="text" name="post_office" class="form-control @error('post_office') is-invalid @enderror"
                                       placeholder="ডাকঘর নাম লিখুন" value="{{ old('post_office') }}">
                                @error('post_office')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Division --}}
                            <div class="col-md-4">
                                <label class="form-label">বিভাগ</label>
                                <select name="division_id" id="permanent-division" class="form-control select2 @error('division_id') is-invalid @enderror" required>
                                    <option selected disabled>Select Division</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->id }}" {{ old('division_id') == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- District --}}
                            <div class="col-md-4">
                                <label class="form-label">জেলা</label>
                                <select name="district_id" id="permanent-district" class="form-control select2 @error('district_id') is-invalid @enderror" required>
                                    <option selected disabled>Select District</option>
                                </select>
                                @error('district_id')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Upazila --}}
                            <div class="col-md-4">
                                <label class="form-label">থানা</label>
                                <select name="upazila_id" id="permanent-upazila" class="form-control select2 @error('upazila_id') is-invalid @enderror" required>
                                    <option selected disabled>Select Upazila</option>
                                </select>
                                @error('upazila_id')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Present Address --}}
                            <div class="col-12">
                                <label class="form-label">বর্তমান ঠিকানা</label>
                                <textarea name="present_address" class="form-control @error('present_address') is-invalid @enderror" rows="2" placeholder="বর্তমান ঠিকানা লিখুন">{{ old('present_address') }}</textarea>
                                @error('present_address')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Phone --}}
                            <div class="col-md-6">
                                <label class="form-label">ফোন</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="ফোন নং লিখুন" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Mobile --}}
                            <div class="col-md-6">
                                <label class="form-label">মোবাইল নং</label>
                                <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="মোবাইল নং লিখুন" value="{{ old('mobile') }}" required>
                                @error('mobile')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Photo --}}
                            <div class="col-md-6">
                                <label class="form-label">ছবি দিন</label>
                                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                                @error('photo')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 text-end">
                                <button class="btn btn-success mt-4" type="submit">সাবমিট করুন</button>
                            </div>

                        </div>
                    </form>

                    <p class="mt-4">
                        আমি আন্তর্জাতিক মানবাধিকার এডুকেশন ফাউন্ডেশনের ... এর যে কোন নিয়মকানুন মেনে চলব।
                    </p>
                </div>
            </div>

            <hr class="my-4">
            <!-- Footer -->
            <div class="text-center fw-bold">
                Head Office : Baluahat, Sonatola, Bogura <br>
                Phone : +8801826-111923, +8801751-491031 <br>
                E-mail : shohagprodhancpf063@gmail.com
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function(){
        $('#permanent-division,#permanent-district,#permanent-upazila').select2({width:'100%'});

        // Ajax for cascading dropdowns
        $('#permanent-division').change(function(){
            $.get('{{ url("/get-districts") }}',{division_id:$(this).val()},function(data){
                $('#permanent-district').empty().append('<option disabled selected>Select District</option>');
                $('#permanent-upazila').empty();
                $.each(data,function(_,v){$('#permanent-district').append('<option value="'+v.id+'">'+v.name+'</option>');});
            });
        });

        $('#permanent-district').change(function(){
            $.get('{{ url("/get-upazila") }}',{district_id:$(this).val()},function(data){
                $('#permanent-upazila').empty().append('<option disabled selected>Select Upazila</option>');
                $.each(data,function(_,v){$('#permanent-upazila').append('<option value="'+v.id+'">'+v.name+'</option>');});
            });
        });
    });
</script>
@endpush
</x-frontend-layout>

<x-frontend-layout>
@push('css')
<style>
    .custom-radio-card{cursor:pointer;transition:all .3s ease;border:2px solid transparent;border-radius:.5rem;}
    .custom-radio-card:hover{border-color:#0d6efd;}
    .custom-radio-card.active{border-color:#0d6efd;box-shadow:0 0 0 .25rem rgba(13,110,253,.25);}
    .custom-radio-card img{width:90px;height:90px;border-radius:.3rem;}
</style>
@endpush

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body p-5">

                    <div class="text-center mb-4">
                        <img class="img-fluid rounded-circle mb-3 border border-3" width="120" src="{{asset('images/logo.jpg')}}" alt="Profile">
                        <h4 class="mb-0">{{ auth()->guard('member')->user()->name }}</h4>
                        <p class="text-muted small">Member ID: {{ auth()->guard('member')->user()->member_code }}</p>
                    </div>
                    <hr class="my-4">

                    <h5 class="card-title text-center mb-4">
                        <span class="text-success">Complete Your Payment </span><br>
                        <span class="fs-16">Select Payment Method</span>
                    </h5>

                    @if(session('success'))
                        <div class="alert alert-success text-center">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('registation-payment.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <div class="row g-3 justify-content-center">
                                <div class="col-auto">
                                    <label class="custom-radio-card d-block p-3 text-center" for="Nagad">
                                        <input type="radio" name="payment_method_id" id="Nagad" class="d-none" value="1"/>
                                        <img src="{{ asset('images/payment/nagad.png') }}" alt="Nagad" class="img-fluid">
                                        <div class="mt-2">Nagad</div>
                                    </label>
                                </div>
                                <div class="col-auto">
                                    <label class="custom-radio-card d-block p-3 text-center" for="bank">
                                        <input type="radio" name="payment_method_id" id="bank" class="d-none" value="2"/>
                                        <img src="{{ asset('images/payment/bank-asia-ltd.png') }}" alt="Bank" class="img-fluid">
                                        <div class="mt-2">Bank</div>
                                    </label>
                                </div>
                            </div>
                            @error('payment_method_id')
                                <span class="invalid-feedback d-block text-center"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div id="paymentFields" style="display: none;">
                            <div class="row g-3">
                                <div class="col-12 text-center" id="nagadQR" style="display: none;">
                                    <img src="{{ asset('images/payment/nagad-qr.jpg') }}" class="img-fluid border rounded col-12 col-sm-10 col-md-7 col-lg-5 p-2">
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="payment_number" id="payment_number" class="form-control" readonly placeholder="Payment/Bank Number">
                                        <label for="payment_number" id="labelChange">Payment Number</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="paid_amount" class="form-control" placeholder="paid_amount">
                                        <label>Amount</label>
                                    </div>
                                    @error('paid_amount')
                                        <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="col-md-6" id="slipDiv" style="display: none;">
                                    <label class="form-label">Bank Slip</label>
                                    <input type="file" name="slip" class="form-control" accept=".pdf,.jpeg,.jpg,.png,.gif,.doc,.docx">
                                </div>

                                <div class="col-md-6" id="transactionDiv" style="display: none;">
                                    <div class="form-floating">
                                        <input type="text" name="transaction_number" class="form-control" placeholder="Transaction Number">
                                        <label>Transaction Number</label>
                                    </div>
                                </div>

                                <div class="col-md-6" id="transferDiv" style="display: none;">
                                    <div class="form-floating">
                                        <input type="text" name="transfer_number" class="form-control" placeholder="Transfer Number">
                                        <label>Transfer Number</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="message" rows="3" placeholder="Enter your message here..."></textarea>
                                        <label>Message (optional)</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Submit Payment</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
$(function(){
    $('input[name="payment_method_id"]').on('change', function() {
        var methodId = $(this).val();

        $('label[for="Nagad"], label[for="bank"]').removeClass('active');
        $(this).closest('label').addClass('active');

        $('#paymentFields').show();
        $('#nagadQR,#transactionDiv,#transferDiv,#slipDiv').hide();

        if(methodId === '2'){ // Bank
            $('#payment_number').val('1083410102157');
            $('#slipDiv').show();
            $('#labelChange').text('Bank Account Number');
        } else if(methodId === '1'){ // Nagad
            $('#nagadQR').show();
            $('#payment_number').val('01845972143');
            $('#transactionDiv').show();
            $('#transferDiv').show();
            $('#labelChange').text('Nagad Payment Number');
        }
    });
});
</script>
@endpush
</x-frontend-layout>

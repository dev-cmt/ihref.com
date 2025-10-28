<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\PaymentDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Helpers\ImageHelper;

class MemberController extends Controller
{
    public function index()
    {
        $members = Registration::with('latestPayment')->paginate(15);
        return view('backend.members.index', compact('members'));
    }

    public function show(Registration $member)
    {
        $member->load('division', 'district', 'upazila', 'union', 'latestPayment');
        return view('backend.members.show', compact('member'));
    }

    public function edit(Registration $member)
    {
        $member->load('division', 'district', 'upazila', 'union');
        return view('backend.members.edit', compact('member'));
    }

    public function update(Request $request, Registration $member)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile'    => 'required|string|max:20',
            'status'    => 'nullable|boolean',
        ]);

        $member->update($data);

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy(Registration $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }

    /**--------------------------------------------------------------
     * MEMBER APPROVE 
     * --------------------------------------------------------------
     */
    public function membersIndex()
    {
        $members = Registration::all();
        
        return view('backend.members.approve-index', compact('members'));
    }

    public function membersApprove(Registration $member)
    {
        $member->update([
            'status' => 1,
            'user_id' => Auth::id()
        ]);

        return redirect()->back()->with('success', 'Member and payment approved successfully.');
    }

    public function membersCancel(Registration $member)
    {
        $member->update([
            'status'         => 2,
            'user_id' => Auth::id()
        ]);

        return back()->with('success', 'Member registration/payment cancelled.');
    }

    /**--------------------------------------------------------------
     * PAYMENT 
     * --------------------------------------------------------------
     */
    public function paymentsIndex()
    {
        $payments = PaymentDetail::all();
        
        return view('backend.payments.index', compact('payments'));
    }

    public function paymentsApprove(PaymentDetail $payment)
    {
        $payment->update(['status' => 1, 'user_id' => Auth::id()]); // Mark payment approved
        return back()->with('success','Payment approved successfully.');
    }
    public function paymentsCancel(PaymentDetail $payment)
    {
        $payment->update(['status' => 2, 'user_id' => Auth::id()]); // Mark payment approved
        return back()->with('success','Payment approved successfully.');
    }

    public function downloadSlip(PaymentDetail $payment)
    {
        $filePath = public_path($payment->slip);

        if(file_exists($filePath)) {
            $downloadName = basename($payment->slip); // ✅ important
            return response()->download($filePath, $downloadName);
        }

        return back()->with('error', 'Slip file not found.');
    }



    /**------------------------------------------------------------------------------
     * MEMBER REGISTER && PAYMNET REGISTER (FRONTEND)
     * ------------------------------------------------------------------------------
     */
    public function memberRegistration()
    {
        $divisions = DB::table('divisions')->get();

        return view('frontend.pages.register-from', compact('divisions'));
    }

    public function registrationStore(Request $request)
    {
        $request->validate([
            'full_name'          => 'required|string|max:255',
            'father_or_husband'  => 'required|string|max:255',
            'mother'             => 'required|string|max:255',
            'nid'                => 'nullable|string|max:50',
            'dob'                => 'nullable|date',
            'division_id'        => 'required|exists:divisions,id',
            'district_id'        => 'required|exists:districts,id',
            'upazila_id'         => 'required|exists:upazilas,id',
            'phone'              => 'required|string|max:20',
            'photo'              => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $data['photo'] = ImageHelper::uploadImage($request->file('photo'), 'uploads/members');
        }

        // Generate slug and member code
        $data['slug'] = Str::slug($data['full_name'] . '-' . time());
        $data['member_code'] = 'IHRF-' . date('Y') . '-' . str_pad(Registration::count() + 1, 4, '0', STR_PAD_LEFT);

        // Set default hashed password
        $data['password'] = '12345678';

        // Set default status
        $data['status'] = false; // Pending approval by default

        // Create member
        $member = Registration::create($data);

        // Login member using custom guard
        // Auth::guard('member')->login($member);
        
        return redirect()->route('registration-payment', ['phone' => $member->phone])->with('success', 'Registration completed. Please proceed to payment.');
    }

    public function registrationPayment(Request $request)
    {
        $phone = $request->query('phone');
        $member = Registration::where('phone', $phone)->first();

        return view('frontend.pages.register-payment', compact('member'));
    }

    public function registrationPaymentStore(Request $request)
    {
        $request->validate([
            'payment_number'      => 'required|numeric|min:1',
            'transaction_number'  => 'nullable|string|max:100',
            'transfer_number'     => 'nullable|string|max:100',
            'message'             => 'nullable|string|max:500',
            'slip'                => 'nullable|file|mimes:pdf,jpeg,jpg,png,gif,doc,docx|max:2048',
        ]);

        $phone = $request->phone;
        $member = Registration::where('phone', $phone)->first();

        if (!$member) {
            return back()->with('error', 'No member found with this phone number.');
        }

        // Handle slip upload
        $slipPath = null;
        if ($request->hasFile('slip')) {
            $slipPath = ImageHelper::uploadImage($request->file('slip'), 'uploads/slip');
        }

        // ✅ Check if PaymentDetail already exists
        $existing = PaymentDetail::where('registration_id', $member->id)->first();

        if ($existing) {
            // ✅ Update existing payment record
            $existing->update([
                'payment_date'        => now(),
                'amount_paid'         => $request->amount_paid,
                'payment_number'      => $request->input('payment_number'),
                'transaction_number'  => $request->input('transaction_number'),
                'transfer_number'     => $request->input('transfer_number'),
                'payment_type'        => $request->input('payment_type'),
                'reason'              => 'Member Registration',
                'message'             => $request->input('message'),
                'slip'                => $slipPath ?? $existing->slip, // keep old slip if not updated
                'status'              => false,
            ]);
        } else {
            // ✅ Create new payment record
            PaymentDetail::create([
                'payment_date'        => now(),
                'amount_paid'         => $request->amount_paid,
                'payment_number'      => $request->input('payment_number'),
                'transaction_number'  => $request->input('transaction_number'),
                'transaction_id'      => null,
                'transfer_number'     => $request->input('transfer_number'),
                'payment_type'        => $request->input('payment_type'),
                'reason'              => 'Member Registration',
                'message'             => $request->input('message'),
                'slip'                => $slipPath,
                'status'              => false,
                'registration_id'     => $member->id,
                'user_id'             => Auth::id() ?? null,
            ]);
        }

        return redirect()->route('waiting-approval')->with('success', 'Payment stored successfully!');

    }

    public function waitingApproval(){
        return view('frontend.pages.waiting-approval');
    }


}

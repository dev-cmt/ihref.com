<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Helpers\ImageHelper;
use App\Models\Registration;
use App\Models\PaymentDetail;

class HomeController extends Controller
{
    public function welcome()
    {
        $divisions = DB::table('divisions')->get();

        return view('welcome', compact('divisions'));
    }

    public function registationStore(Request $request)
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
            'mobile'             => 'required|string|max:20',
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
        $data['password'] = Hash::make('12345678');

        // Set default status
        $data['status'] = false; // Pending approval by default

        // Create member
        $member = Registration::create($data);

        // Login member using custom guard
        Auth::guard('member')->login($member);
        
        return redirect()->route('registation-payment')->with('success', 'Registration completed. Please proceed to payment.');
    }

    public function registationPayment()
    {
        return view('frontend/register-payment');
    }
    public function registationPaymentStore(Request $request)
    {
        $request->validate([
            'payment_number'      => 'required|numeric|min:1',
            'transaction_number'  => 'nullable|string|max:100',
            'transfer_number'     => 'nullable|string|max:100',
            'message'             => 'nullable|string|max:500',
            'slip'                => 'nullable|file|mimes:pdf,jpeg,jpg,png,gif,doc,docx|max:2048',
        ]);

        $slipPath = null;
        if ($request->hasFile('slip')) {
            $slipPath = ImageHelper::uploadImage($request->file('slip'), 'uploads/slip');
        }

        PaymentDetail::create([
            'payment_date'        => now(),
            'amount_paid'         => $request->amount_paid,
            'payment_number'      => $request->input('payment_number'),
            'transaction_number'  => $request->input('transaction_number'),
            'transaction_id'      => null, // optional hidden if you want
            'transfer_number'     => $request->input('transfer_number'),
            'payment_type'        => $request->input('payment_type'),
            'message'             => $request->input('message'),
            'slip'                => $slipPath,
            'status'              => false,
            'registration_id'     => Auth::guard('member')->id(), // logged in member id
            'user_id'             => Auth::id(), // if admin/user also logged in, else null
        ]);

        return back()->with('success', 'Payment stored successfully!');

    }



    public function memberLogin(Request $request)
    {
        $request->validate([
            'mobile'   => 'required|string',
            'password' => 'required|string',
        ]);

        $member = Registration::where('mobile', $request->mobile)->first();

        if ($member && Hash::check($request->password, $member->password)) {
            // Login the member manually
            Auth::login($member); // logs in the member
            return redirect()->route('registation-payment');
        }

        return back()->withErrors(['mobile' => 'Invalid phone or password.']);
    }

}

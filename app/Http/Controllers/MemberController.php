<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\PaymentDetail;
use Illuminate\Support\Facades\Auth;

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


}

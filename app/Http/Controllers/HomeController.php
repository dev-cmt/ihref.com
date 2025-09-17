<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    public function registationStore(Request $request)
    {
        // Your registration logic here
    }
    public function registationPayment()
    {
        return view('frontend/register-payment');
    }
    public function registationPaymentStore(Request $request)
    {
        // Your registration payment logic here
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class MemberController extends Controller
{
    public function index()
    {
        $members = Registration::where('status', true)->get();
        
        return view('backend.members.index', compact('members'));
    }
}

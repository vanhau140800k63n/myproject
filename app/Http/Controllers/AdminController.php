<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function getDashboard()
    {
        $user = Auth::user();

        return view('admin.dashboard', compact('user'));
    }
}

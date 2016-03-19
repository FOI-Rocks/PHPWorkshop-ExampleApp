<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfile() {
        $user = Auth::user();
        return view('user.profile')
            ->with('user', $user);
    }
}

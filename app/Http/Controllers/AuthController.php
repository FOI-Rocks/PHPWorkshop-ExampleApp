<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegistration() {
        return view('auth.registration');
    }

    public function doRegistration(Request $request) {
        $userInput = $request->all();
        $validator = Validator::make($userInput, User::$validation);
        if($validator->fails()) {
            return view('auth.registration')
                ->withErrors($validator);
        }

        $user = new User();
        $user->username = $userInput['username'];
        $user->password = Hash::make($userInput['password']);
        $user->email = $userInput['email'];
        $user->save();
        return redirect()->route('login.form');
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function doLogin(Request $request) {
        $userInput = $request->all();
        if(Auth::attempt(['username' => $userInput['username'], 'password' => $userInput['password']])) {
            return redirect()->route('user.profile');
        }
        return redirect()->route('login.form');
    }

    public function logout() {
        Auth::logout();
        return reditect()->route('login.form');
    }

}

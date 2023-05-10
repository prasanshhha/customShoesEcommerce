<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function signUp(){
        return view('signup');
    }

    public function handleLogin(LoginRequest $request)
    {
        $data = $request->validated();
 
        if (Auth::attempt($data)) {

            $user = auth()->user();    
            //log the user in 
            auth()->login($user);

            $request->session()->regenerate();
            return redirect('/');
        }
 
        return back()->with('error', 'The provided credentials do not match our records.');
    }

    public function handleSignUp(UserRequest $request)
    {
        $input = $request->validated();
        $password = $request->get('password'); 
        $hashedPassword = Hash::make($password);
        $input['password'] = $hashedPassword;
        $user = User::create($input);
        return redirect("/")->with('message', 'You are logged in!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You are logged out!');
    }

}

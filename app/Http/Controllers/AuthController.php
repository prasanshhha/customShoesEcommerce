<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SignInRequest;
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
        if(! User::where('email', $request->email)->first()){
            return back()->with('error', 'This email is not registered.');
        }
        if (Auth::attempt($data)) {

            $user = auth()->user();    
            //log the user in 
            auth()->login($user);

            $request->session()->regenerate();

            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard')->with('error', "You are logged in!");
            }
            return redirect()->route('home')->with('success', 'You are logged in!');
        }
 
        return back()->with('error', 'The provided credentials do not match our records.');
    }

    public function handleSignUp(SignInRequest $request)
    {
        $input = $request->validated();
        $password = $request->get('password'); 
        $hashedPassword = Hash::make($password);
        $input['password'] = $hashedPassword;
        $user = User::create($input);
        auth()->login($user);
        return redirect('/')->with('success', 'You are now logged in!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'You are logged out!');
    }

}

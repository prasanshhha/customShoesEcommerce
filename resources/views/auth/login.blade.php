@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container-fluid auth-container">
        <div class="card shadow p-5 rounded border-0">
            <h3 class="card-title mb-5 fw-bold">Login</h3>
			@include('layouts.flash-message')
            <form class="auth-form mb-4" action="/login" method="POST">
				@csrf
				<div class="mb-3">
					<label class="form-label">Email</label>
					<input name="email" type="email" class="form-control" placeholder="Enter your email">
				</div>
				<div class="mb-3">
					<label class="form-label">Password</label>
					<input name="password" type="password" class="form-control">
				</div>
				<div class="mb-3 mt-4">
					<button type="submit" class="btn btn-primary">Log in</button>
				</div>
            </form>
			<div  class="forgot-text mb-1"><a href="{{ route('password.request') }}" class="forgot-pwd">Forgot Password?</a></div>
			<div class="sign-up-text">Don't have an account? <a href="/signUp">Sign Up</a></div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="container-fluid auth-container">
        <div class="card shadow p-5 rounded border-0">
            <h3 class="card-title mb-5 fw-bold">Forgot Password</h3>
			@include('layouts.flash-message')
            <form class="auth-form mb-4" action="{{ route('password.update') }}" method="POST">
				@csrf
                <div class="mb-3">
					<label class="form-label">Email</label>
					<input name="email" type="email" class="form-control" placeholder="Enter your email">
				</div>
				<div class="mb-3">
					<label class="form-label">Password</label>
					<input name="password" type="password" class="form-control" placeholder="Enter new password">
				</div>
                <div class="mb-3">
					<label class="form-label">Confirm Password</label>
					<input name="password_confirmation" type="password" class="form-control" placeholder="Confirm new password">
				</div>
                <input name="token" type="text" class="form-control" value="{{ $token }}" hidden>
                <div class="mt-5">
					<button type="submit" class="btn btn-primary">Reset Password</button>
				</div>
            </form>
        </div>
    </div>
@endsection
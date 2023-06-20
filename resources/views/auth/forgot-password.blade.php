@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="container-fluid auth-container">
        <div class="card shadow p-5 rounded border-0">
            <h3 class="card-title mb-5 fw-bold">Forgot Password</h3>
			@include('layouts.flash-message')
            <form class="auth-form" action="{{ route('password.email') }}" method="POST">
				@csrf
				<div class="mb-3">
					<label class="form-label">Email</label>
					<input name="email" type="email" class="form-control" placeholder="Enter your email">
				</div>
                <div class="mt-5">
					<button type="submit" class="btn btn-primary">Send Reset Link</button>
				</div>
            </form>
        </div>
    </div>
@endsection
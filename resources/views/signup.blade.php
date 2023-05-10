@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
    <div class="container-fluid auth-container">
        <div class="card shadow p-5 rounded border-0">
            <h3 class="card-title mb-4 fw-bold">Sign Up</h3>
            <form class="auth-form" action="/signUp" method="POST">
				@csrf
				<div class="mb-3">
					<label class="form-label">Full Name</label>
					<input name="name" type="text" class="form-control">
				</div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input name="phone_number" type="number" class="form-control">
                </div>
				<div class="mb-3">
					<label class="form-label">Password</label>
					<input name="password" type="password" class="form-control">
				</div>
				<div class=" mt-4">
					<button type="submit" class="btn btn-primary">Sign Up</button>
				</div>
            </form>
        </div>
    </div>
@endsection
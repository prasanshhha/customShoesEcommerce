@extends('layouts.app')

@section('title', 'Verify Notice')

@section('content')
    <div class="container-fluid auth-container">
        <div class="card shadow p-5 rounded border-0">
            <h3 class="card-title mb-5 fw-bold">Please verify your email!</h3>
			@include('layouts.flash-message')
            <form class="auth-form" action="/email/verification-notification" method="POST">
				@csrf
                Did not receive an email or lost it?
				<div class="mb-3 mt-4">
					<button type="submit" class="btn btn-primary">Resend Link</button>
				</div>
            </form>
        </div>
    </div>
@endsection
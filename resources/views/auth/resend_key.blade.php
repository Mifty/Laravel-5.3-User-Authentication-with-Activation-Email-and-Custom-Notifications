@extends('layouts.auth')

@section('title', 'Resend Activation Key')
@section('description', 'Resend the activation key')

@section('content')
	<div class="container">
		<div class="card-container text-center">
			<h1>Resend Activation Key</h1>
			<h2>Please provide your registration email address</h2>
			@include('notifications.status_message')
		    @include('notifications.errors_message')
		</div>
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="POST" action="{{ url('/activation/resend') }}">
                {{ csrf_field() }}
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif

                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Resend Activation Code</button>
            </form><!-- /form -->
            <a href="{{ url('/password/reset') }}" class="forgot-password">Forgot password?</a> or <a href="{{ url('/username/reminder') }}" class="forgot-password">Forgot username?</a>
        </div><!-- /card-container -->
		<div class="card-container text-center">
			<a href="{{ url('/register') }}" class="new-account">Create an account</a> or <a href="{{ url('/login') }}" class="new-account">Login</a>
		</div>
		
    </div><!-- /container -->
@endsection
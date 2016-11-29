@extends('layouts.auth')

@section('title', 'Login')
@section('description', 'Login to the admin area')

@section('content')
	<div class="container">
		<div class="card-container text-center">
			<h1>Login</h1>
			<h2>Please login to your account</h2>
			@include('notifications.status_message')
		    @include('notifications.errors_message')
		</div>
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required autofocus>
				@if ($errors->has('username'))
					<span class="help-block">
						<strong>{{ $errors->first('username') }}</strong>
					</span>
				@endif
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
				@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me" name="remember"> Remember Me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="{{ url('/password/reset') }}" class="forgot-password">Forgot password?</a> or <a href="{{ url('/username/reminder') }}" class="forgot-password">Forgot username?</a>
        </div><!-- /card-container -->
		<div class="card-container text-center">
			<a href="{{ url('/register') }}" class="new-account">Create an account</a> or <a href="{{ url('/activation/resend') }}" class="new-account">Resend activation code</a>
		</div>
		
    </div><!-- /container -->
@endsection

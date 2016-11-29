@extends('layouts.auth')

@section('title', 'Register')
@section('description', 'Register to the admin area')

@section('content')
	<div class="container">
		<div class="card-container text-center">
			<h1>Create Your Account</h1>
		</div>
	</div>
    <div class="container">
    
		<div class="row">
		  @include('notifications.status_message')
		  @include('notifications.errors_message')
		  <div class="col-md-6">
			<div class="card-container text-center">
				<img src="assets/img/register-splash.jpg" alt="Tutorial Splash image">
			</div>
		  </div>
		  <div class="col-md-6">
			<div class="card card-container">
				<form class="form-signin" method="POST" action="{{ url('/register') }}">
					{{ csrf_field() }}
					<input type="text" id="username" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required autofocus>
					@if ($errors->has('username'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
					<input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name" value="{{ old('first_name') }}"  required autofocus>
					@if ($errors->has('first_name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
					<input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name" value="{{ old('last_name') }}" required autofocus>
					@if ($errors->has('last_name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
					<input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required autofocus>
					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
					<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
					<input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
					
					<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign up</button>
				</form><!-- /form -->
				<a href="{{ url('/password/forget') }}" class="forgot-password">Forgot password?</a> or <a href="{{ url('/username/forget') }}" class="forgot-password">Forgot username?</a>
			</div><!-- /card-container -->
		  </div>
		</div>

        
		<div class="card-container text-center">
			<a href="{{ url('/') }}" class="new-account">Back to Home page</a> or <a href="{{ url('/login') }}" class="new-account">Login</a> 
		</div>
		
    </div><!-- /container -->
@endsection
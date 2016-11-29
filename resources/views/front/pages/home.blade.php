@extends('layouts.front')

@section('content')
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Larval Auth 5.3 Tutorial with Email Activation Demo</h1>
                <hr>
				@include('notifications.status_message')
				@include('notifications.errors_message')
                <p>This is a demo application that goes along with my tutorial on <a href="http://miftyisbored.com/a-complete-laravel-5-3-tutorial-for-user-authentication-with-activation-email">authentication in Laravel 5.3.</a> You can play around with the application, view the source code on GitHub or follow along the <a href="http://miftyisbored.com/a-complete-laravel-5-3-tutorial-for-user-authentication-with-activation-email">tutorial</a>.</p>
                <a href="{{ url('/login') }}" class="btn btn-primary btn-xl page-scroll">Login</a>  <a href="{{ url('/register') }}" class="btn btn-danger btn-xl page-scroll">Register</a>
            </div>
        </div>
    </header>

	<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">A Laravel 5.3 Boilerplate Auth Application</h2>
                    <hr class="primary">
                    <p>Ready to start learning how to do custom authorization with Laravel 5.3? Then start with this demo! You can either login to your account to view the administrator dashboard or you can register to get an activation link sent to your email address! And you can find the <a href="http://miftyisbored.com/a-complete-laravel-5-3-tutorial-for-user-authentication-with-activation-email">full tuorial here.</a></p>
                </div>
                <div class="col-lg-12 text-center">
                    <a href="{{ url('/login') }}" class="btn btn-primary btn-xl page-scroll"><i class="fa fa-user sr-contact"></i> Login</a>
					<a href="{{ url('/register') }}" class="btn btn-danger btn-xl page-scroll"><i class="fa fa-user-plus  sr-contact"></i> Register</a>
                </div>
            </div>
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Check out the tutorial that builds this App!</h2>
				<p>The code that builds this app is explained in <a href="http://miftyisbored.com/a-complete-laravel-5-3-tutorial-for-user-authentication-with-activation-email">this tutorial</a>. You can follow the tutorial or fork the code on <a href="https://github.com/Mifty/Laravel-5.3-User-Authentication-with-Activation-Email-and-Custom-Notifications/" target="_blank" >GitHub</a>.</p>
                <a href="http://miftyisbored.com/a-complete-laravel-5-3-tutorial-for-user-authentication-with-activation-email" class="btn btn-success btn-xl sr-button"><i class="fa fa-magic "></i> View the Tutorial!</a> 
				<a href="https://github.com/Mifty/Laravel-5.3-User-Authentication-with-Activation-Email-and-Custom-Notifications/" target="_blank" class="btn btn-primary btn-xl sr-button"><i class="fa fa-github "></i> View the Code on GitHub</a>
            </div>
        </div>
    </aside>
	
	<section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">What this boilerplate application covers</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-user-plus text-primary sr-icons"></i>
                        <h3>Basic Login with Token Check</h3>
                        <p class="text-muted">This application allows users to login to the administrator dashboard. The login functionality checks that the user has activated their account first.</p>
						<a href="{{ url('/login') }}" >Try to Login</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-exchange text-primary sr-icons"></i>
                        <h3>Registration with Activation Token</h3>
                        <p class="text-muted">This application allows user to signup for a new account. Once they signup, an activation key is sent to their email address so that they can activate their account.</p>
						<a href="{{ url('/register') }}">Try to Register</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-address-card text-primary sr-icons"></i>
                        <h3>Support for Forgetful Users</h3>
                        <p class="text-muted">This application takes care of forgetful users by supporting members who forget their password, forget their username or forget their activation key.</p>
						<a href="{{ url('/password/reset') }}" >Forgot Your Password?</a> or 
						<a href="{{ url('/username/reminder') }}" >Forgot Your Username?</a>
						
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-code text-primary sr-icons"></i>
                        <h3>Made with Laravel 5.3</h3>
                        <p class="text-muted">This applicatoin was created from Laravel 5.3 so the notificaiton system is used along with the new Auth controllers that were introduced in Laravel 5.3</p>
						<a href="{{ url('/activation/resend') }}" >Resend Activation Key using notifications?</a> 
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Check out the tutorial that builds this App!</h2>
				<p>The code that builds this app is explained in <a href="http://miftyisbored.com/a-complete-laravel-5-3-tutorial-for-user-authentication-with-activation-email">this tutorial</a>. You can follow the tutorial or fork the code on <a href="https://github.com/Mifty/Laravel-5.3-User-Authentication-with-Activation-Email-and-Custom-Notifications/" target="_blank" >GitHub</a>.</p>
                <a href="http://miftyisbored.com/a-complete-laravel-5-3-tutorial-for-user-authentication-with-activation-email" class="btn btn-success btn-xl sr-button"><i class="fa fa-magic "></i> View the Tutorial!</a> 
				<a href="https://github.com/Mifty/Laravel-5.3-User-Authentication-with-Activation-Email-and-Custom-Notifications/" target="_blank" class="btn btn-primary btn-xl sr-button"><i class="fa fa-github "></i> View the Code on GitHub</a>
            </div>
        </div>
    </aside>
@endsection
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Notifications\PasswordResetConfirmationNotification;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
	
	/**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
	
	/**
     * Get the response for a successful password reset.
     *
     * @param  string  $response
     * @return \Illuminate\Http\Response
     */
    protected function sendResetResponse($response)
    {
		// Get the currently authenticated user...
		$user = Auth::user();

		//send Activation Key notification
		// TODO: in the future, you may want to queue the mail since sending the mail can slow down the response
		$user->notify(new PasswordResetConfirmationNotification());
		
        return redirect($this->redirectPath())
			->with('message', 'Your password has been succesfully udpdated.')
			->with('status', 'success');
    }
}

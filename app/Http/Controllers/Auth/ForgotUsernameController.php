<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Notifications\UsernameReminderNotification;

class ForgotUsernameController extends Controller
{
    //
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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $validator = Validator::make($data,
            [
                'email'                 => 'required|email',
            ],
            [
                'email.required'        => 'Email is required',
                'email.email'           => 'Email is invalid',
            ]
        );

        return $validator;

    }
	
	public function showForgotUsernameForm(){
		return view('auth.username');
	}
	
	public function sendUserameReminder(Request $request)
    {
		$validator = $this->validator($request->all());

		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);
		}
		
		$email  = $request->get('email');
		
		// get the user associated to this activation key
		$user = User::where('email', $email)
			->first();
		
		if (empty($user)) {
			return redirect()->route('username_reminder')
				->with('message', 'We could not find this email in our system')
				->with('status', 'warning');
		}
		
		
		//send Activation Key notification
		// TODO: in the future, you may want to queue the mail since sending the mail can slow down the response
		$user->notify(new UsernameReminderNotification());

        return redirect()->route('front.home')
			->with('message', 'Your username has been sent to your email address')
            ->with('status', 'success');
            

    }

}

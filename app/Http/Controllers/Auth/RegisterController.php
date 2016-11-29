<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Traits\ActivationKeyTrait;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, ActivationKeyTrait;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '';

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
                'username'           	 => 'required|unique:users|min:4',
				'first_name'            => 'required',
                'last_name'             => 'required',
                'email'                 => 'required|email|unique:users',
                'password'              => 'required|min:6|max:20',
                'password_confirmation' => 'required|same:password',
            ],
            [
				'username.required'     => 'Username is required',
                'username.min'           => 'Username needs to have at least 6 characters',
                'first_name.required'   => 'First Name is required',
                'last_name.required'    => 'Last Name is required',
                'email.required'        => 'Email is required',
                'email.email'           => 'Email is invalid',
                'password.required'     => 'Password is required',
                'password.min'          => 'Password needs to have at least 6 characters',
                'password.max'          => 'Password maximum length is 20 characters',
            ]
        );

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'username' => $data['username'],
			'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'activated' => !config('settings.send_activation_email')  // if we do not send the activation email, then set this flag to 1 right away
        ]);

        return $user;
    }
	
	public function register(Request $request)
	{
		$validator = $this->validator($request->all());

		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);
		}
	
		// create the user
		$user = $this->create($request->all());

		// process the activation email for the user
		$this->queueActivationKeyNotification($user);

		// we do not want to login the new user
		return redirect('/login')
			->with('message', 'We sent you an activation code. Please check your email.')
			->with('status', 'success');
	}
}

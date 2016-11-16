<?php

namespace App\Http\Controllers\UserAuth;

use Illuminate\Support\Facades\Session;
use App\User;

use Illuminate\Support\Facades\Validator;
use  App\Mail\EmailVerification;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

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

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'user/active';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user-guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'FirstName' => 'required|max:255',
            'LastName' => 'required|max:255',
            'gender' => 'required|boolean',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'FirstName' => $data['FirstName'],
            'LastName' => $data['LastName'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_token' => bin2hex(random_bytes(15)),
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('user.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('user');
    }

    public function verify($token)
    {
        $user = User::where('email_token', $token)->first();
        $user->activated = 1;
        $user->save();

        auth('user')->login($user);

        return redirect('');

    }

    public function ResendCode(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|max:225|email|exists:users,email',

        ]);
        if ($validator->fails()) {
            flash('Error', 'Error');
            return back()->withErrors($validator)->withInput();

        }
        $user = \App\User::where('email', $request->email)->first();
        $num = user_log_get($user->id, 'number_send_emailVerify');
        if ($num < 4) {
            $email = new EmailVerification($user);
            Mail::to($user->email)->send($email);
            user_log_set($user->id, 'number_send_emailVerify', $num + 1);
        } else   abort(403, 'شما بیش از حد مجاز درخواست کرده اید');
        return back();


    }

}

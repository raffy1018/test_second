<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $rules = [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ];

        if (env('APP_ENV_LABEL') == 'production') {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

        $request->validate($rules);
    }

    protected function authenticated(Request $request, $user)
    {
        //check if user is activated
        if (!$user->is_active) {
            abort(404);
        }

        $user->last_login_at = \Carbon\Carbon::now();
        $user->save();

        if ($user->is_super_admin) {
            return redirect()->route('backoffice.dashboard');
        }

        return redirect()->route('frontoffice.courses.index');
    }

}

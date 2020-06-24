<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Aktivasi;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();


        $this->clearLoginAttempts($request);

        Aktivasi::create([
            'log_name' => 'default',
            'description' => 'login',
            'causer_id' => $this->guard()->user()->id,
            'causer_type' => 'App\User',
        ]);

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }

    public function logout(Request $request)
    {
        Aktivasi::create([
            'log_name' => 'default',
            'description' => 'logout',
            'causer_id' => $this->guard()->user()->id,
            'causer_type' => 'App\User',
        ]);
        
        $this->guard()->logout();

        $request->session()->invalidate();


        return $this->loggedOut($request) ?: redirect('/');
    }
}

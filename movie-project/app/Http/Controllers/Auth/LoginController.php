<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
    protected $redirectTo = '/home/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        //Role
        $role = Auth::user()->role;
        if ($role == 1) {
            return '/admin/index';
        } else {
            return '/home/index';
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/home/index');
    }

    public function showLoginForm()
    {
        return redirect('/home/index');
    }

    /**
   * Validate the user login request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return void
   */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
        $this->username() => ['required', 'string'],
        'password' => ['required', 'string'],
    ]);
  }
}

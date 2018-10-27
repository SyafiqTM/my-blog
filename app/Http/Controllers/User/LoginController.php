<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
     public function __construct()
     {
          // $this->middleware('auth:customer',['only' => 'edit'])->except('logout');
            $this->middleware('guest')->except('logout');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login');
    }

    public function loginCustomer(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);

      // dd(Auth::guard('customer')->attempt(['email' => request('email'), 'password' => request('password')], $request->remember));
      // Attempt to log the user in
      // if (Auth::guard('customer')->attempt(['email' => request('email'), 'password' => request('password')], $request->remember)) {
      if (auth()->attempt(['email' => request('email'), 'password' => request('password')], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->route('home');
      }
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(
        ['messages' => 'Invalid email / password']
      );

    }

    public function logout()
    {
        // Auth::guard('customer')->logout();
          auth()->logout();
        return redirect()->route('user.login');
    }

    public function d_logout()
    {
        // Auth::guard('customer')->logout();
        auth()->logout();
        return redirect()->route('user.login');
    }
}

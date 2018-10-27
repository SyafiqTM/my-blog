<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\User;
use Hash;

class RegisterController extends Controller
{

  use AuthenticatesUsers;


  protected $redirectTo = '/';
  protected $guard = 'customer';

  public function __construct()
   {
       $this->middleware('auth:customer',['only' => 'edit']);
   }

  public function create()
  {
      return view('register');
  }

  public function store(Request $request)
  {
      // Validate the form data
      // $this->validate($request, [
      //   'email'   => 'required|email',
      //   'password' => 'required|min:6'
      // ]);

      //make validation
      $messages = [
        'name.required' => 'Name is required',
        'email.required' => 'Email is required',
        'email.unique' => 'Email already taken',
        'email.regex' => 'Enter valid email address',
      ];

      $validator = Validator::make($request->all(), [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|confirmed|min:6'
      ], $messages);


      if ($validator->fails()) {
          return redirect()->back()
                      ->withErrors($validator)
                      ->withInput($request->input());
      }

      else{
        //store Request
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        //sign in the user after session_is_registered
        // auth()->login($user);
        // Attempt to log the user in
        // if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        //   // if successful, then redirect to their intended location
        //   return redirect()->intended(route('customer.login'));
        // }

        //return user to specific view or route
        return redirect()->route('user.login');
      }
  }

  public function edit()
  {
    //
  }

}

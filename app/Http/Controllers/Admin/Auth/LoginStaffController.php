<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Admin;

class LoginStaffController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
        //        $this->middleware('guest:admin');

    }

    public function showAdminLoginForm()
    {
        return view('auth.staff');
    }

    public  function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->remember)) {
            //           return  response('can not log  users in');
            Admin::update(['last_login' => Carbon::now()]);

            return redirect()->intended(route('staff.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email,remember'));
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        //        $request->session()->flush();
        //        $request->session()->regenerate();

        return redirect()->guest(route('login.form'));
    }
}

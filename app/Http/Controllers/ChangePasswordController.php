<?php

namespace App\Http\Controllers;

use App\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Session\Session;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('userDashboard.changePassword');
    }


    public function changePassword(Request $request)
    {
        $rules = [
            'old_pass' => ['required', new MatchOldPassword],
            'new_pass' => ['required', 'different:old_pass'],
            'confirm_new_pass' => ['same:new_pass'],
        ];

        // $validator = Validator::make($request->all(), $rules);
        $request->validate($rules);
        // if ($validator->fails()) {
        //     //return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        //     return redirect()->back()->withErrors($validator);
        // }

        $user = User::find(auth()->user()->client_id);

        $user->update(['password' => Hash::make($request->new_pass)]);
        $msg = Session()->flash('admin-created', 'Your password has successfully been changed.');

        return  redirect()->back()->with($msg);
    }
}

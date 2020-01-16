<?php

namespace App\Http\Controllers\DecideControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InterceptAuthController extends Controller
{


    public  function whoIsLoginIn(Request $request){

        if($request->input('role') == 'Admin'){

            return redirect()->action('Admin\Auth\LoginStaffController@adminLogin')->withInput(['email'=>$request->input('email')]);
        }

    }


}

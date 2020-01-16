<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTypeController extends Controller
{
   public  function  checkAdminType(Request $request){


       if ($request->input('role') !== 'super_admin'){


           return redirect(route('staff.login'));

       }
       else{
           return redirect(route('login'));
       }
   }
}

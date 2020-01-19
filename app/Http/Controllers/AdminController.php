<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\CreateAdminRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminCreationNotificaton;
use App\AdminAuditTrail;

class AdminController extends Controller
{


    public function __construct()
    {

        Auth::guard()->check();
        Auth::guard('admin')->check();
    }

    public function viewAdmins()
    {

        /* $admins = Admin::whereMedia_house_id(auth()->user()->client_id)->latest()->paginate(50);
        return view('userDashboard.manageAdmin')->with('admins', $admins); */

        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->admin_type == 'super_admin') {
            $admins = Admin::whereMedia_house_id(Auth::guard('admin')->user()->media_house_id)->latest()->paginate(50);
            return view('userDashboard.manageAdmin')->with('admins', $admins);
        } elseif (Auth::guard()->check()) {
            $admins = Admin::whereMedia_house_id(auth()->user()->client_id)->latest()->paginate(50);
            return view('userDashboard.manageAdmin')->with('admins', $admins);
        }
    }


    public function storeAdmin(CreateAdminRequest $request)
    {
        if (Auth::guard()->user()->is_admin === 1) {

            $unique_id = uniqid('K', true);
            if (User::where('client_id', '=', $unique_id)) {
                $unique_id = uniqid('K', true);
            }

            //generate password
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
            // $password = substr( str_shuffle( $chars ), 0, 8 );
            $password =  '123456';


            $admin =   Admin::create([
                'name' => $request->input('name'),
                'job_title' => $request->input('title'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'media_house_id' => auth()->user()->client_id,
                'admin_id' =>  $unique_id,
                'status' => true,
                'logo' => auth()->user()->logo,
                'admin_type' => $request->input('role'),
                'password' => Hash::make($password),
            ]);

            Notification::send($admin, new AdminCreationNotificaton($admin, $password));

            return redirect()->back()->with('admin-created', 'Admin  successfully created');
        } else {

            return redirect()->back();
        }
    }

    public function editAdmin(Request $request)
    {
        if (Auth::guard('')->check()) {
            $admin = Admin::whereMedia_house_id(auth()->user()->client_id)->whereAdmin_id($request->query('id'))->get();
            return view('userDashboard.updateAdmin')->with('admin', $admin);
        } else if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->admin_type == 'super_admin') {
            $admin = Admin::whereMedia_house_id(auth('admin')->user()->media_house_id)->whereAdmin_id($request->query('id'))->get();
            return view('staffDashboard.updateAdmin')->with('admin', $admin);
        }
    }


    public function updateAdmin(Request $request)
    {
        $admin_data = [
            'name' => $request->input('name'),
            'job_title' => $request->input('title'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'admin_type' => $request->input('role'),
        ];

        if (Auth::guard()->check()) {
            Admin::whereAdmin_id($request->input('id'))->update($admin_data);
            return  redirect(route('manage.admins'))->with('updated-admin', 'Admin successfully updated');
        } else if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->admin_type == 'super_admin') {
            Admin::whereAdmin_id($request->input('id'))->update($admin_data);
            return  redirect(route('staff.manage.admins'))->with('updated-admin', 'Admin successfully updated');
        }
    }


    public  function blockAdmin(Request $request)
    {
        $status =  false;
        if (Auth::guard()->check()) {
            Admin::whereAdmin_id($request->input('adminId'))->update([
                'status' => $status
            ]);
        } elseif (Auth::guard('admin')->check() && Auth::guard('admin')->user()->admin_type == 'super_admin') {
            Admin::whereAdmin_id($request->input('adminId'))->update([
                'status' => $status
            ]);
        }
        session()->flash('block-admin', "One Admin account successfully  unblocked");
        return response()->json('success');
    }

    public function unblockAdmin(Request $request)
    {
        $status =  true;
        if (Auth::guard()->check()) {
            Admin::whereAdmin_id($request->input('adminId'))->update(['status' => $status]);
        } elseif (Auth::guard('admin')->check() && Auth::guard('admin')->user()->admin_type == 'super_admin') {
            Admin::whereAdmin_id($request->input('adminId'))->update(['status' => $status]);
        }
        session()->flash('block-admin', "One Admin account successfully  unblocked");
        return response()->json('success');
    }


    public function deleteAdmin(Request $request)
    {
        $admin = Admin::whereMedia_house_id(auth()->user()->client_id)->whereAdmin_id($request->input('adminId'))->delete();
        session()->flash('block-admin', "One Admin account account successfully deleted");
        return response()->json('success');
    }

    public function adminProfileUpdate(Request $request)
    {

        $admin = User::whereClient_id(auth()->user()->client_id)->update([
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'email' => $request->input('email'),
            'phone1' => $request->input('phone1'),
            'phone2' => $request->input('phone2'),

            'address' => $request->input('address'),

        ]);

        return  redirect(route('profile'))->with('admin-profile', 'Profile successfully updated');
    }


    public function adminActivities()
    {
        $auditTrail =  AdminAuditTrail::select()->latest()->paginate(50);
        return view('userDashboard.auditTrail')->with('auditTrail', $auditTrail);
    }
}

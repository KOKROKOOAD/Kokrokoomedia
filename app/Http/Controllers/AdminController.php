<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\AdminAuditTrail;
use App\Avatars;
use App\Services\SendTextMessage;
use App\Jobs\SendAdminCredentialsJob;
use App\User;
use App\Notifications\AdminCreationNotificaton;
use App\UserProfile;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{


    public function __construct()
    {

        if (Auth::guard()->check() && Auth::guard()->user() == 'super_admin') {
            return true;
        }
    }

    public function viewAdmins()
    {
        $admins = User::whereCreatedBy(auth()->user()->client_id)->latest()->paginate(10);
        return view('userDashboard.manageAdmin')->with('admins', $admins);
    }


    public function storeAdmin(CreateAdminRequest $request)
    {

        $unique_id = uniqid('K', true);
        if (User::where('client_id', '=', $unique_id)) {
            $unique_id = uniqid('K', true);
        }

        //generate password
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
        $password = substr(str_shuffle($chars), 0, 8);
        // $password =  '123456';

        $admin =   User::create([
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'email' => $request->input('email'),
            'phone1' => $request->input('phone1'),
            'role' => $request->input('role'),
            'isActive'   => 'active',
            'client_id' => $unique_id,
           /*  'account_type' => 'media house', */
            'created_by' => auth()->user()->client_id,
            'password' => Hash::make($password),
        ]);

        AdminAuditTrail::create([
            'action_by' => auth()->user()->client_id, 'action' => 'Create admin ',
            'request_ip' => $_SERVER['REMOTE_ADDR'], 'activities' => "Created a new admin  " . $request->name, /* 'created_by' => auth()->user()->client_id */
        ]);

       /*  SendAdminCredentialsJob::dispatch($admin, $password);

        $sendMsg = new SendTextMessage(env("SMS_USERNAME"), env("SMS_PASSWORD")); */
/*         $sendSMS = new SendTextMessage(); */

     /*    $sendSMS->message(
            $request->input('name'),
            $request->input('email'),
            $password,
            env('SMS_USERNAME'),
            env('SMS_PASSWORD'),
            $request->input('phone1')
        );
 */
        Session::flash('admin-created', 'Admin  successfully created');
        return redirect()->back();
    }


    public function editAdmin(Request $request)
    {

        $admin = User::whereClientId($request->query('id'))->get();
        return view('userDashboard.updateAdmin')->with('admin', $admin);
    }


    public function updateAdmin(Request $request)
    {
        $admin =  User::find($request->id);
        $request->validate([
            'name' => 'required|regex:/^[\pL\s]+$/u|max:255',
            'title' => 'required|regex:/^[\pL\s]+$/u|max:255',
            'phone1' => 'required|unique:users,client_id,' . $admin->client_id,
            'email' => 'required|email|unique:users,client_id,' . $admin->client_id,
            'role'  => 'required'
        ]);

        $admin_data = [
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'email' => $request->input('email'),
            'phone1' => $request->input('phone1'),
            'role' => $request->input('role'),
        ];


        User::whereClientId($request->input('id'))->update($admin_data);
        AdminAuditTrail::create([
            'action_by' => auth()->user()->name, 'action' => 'update admin ',
            'request_ip' => $_SERVER['REMOTE_ADDR'], 'activities' => "Updated admin "
                . $request->name . " profile", 'created_by' => auth()->user()->client_id
        ]);

        return  redirect(route('manage.admins'))->with('updated-admin', 'Admin successfully updated');
    }


    public  function blockAdmin(Request $request)
    {
        User::whereClientId($request->input('adminId'))->update([
            'isActive' => 'inactive'
        ]);
        session()->flash('block-admin', "One Admin account successfully blocked");

        AdminAuditTrail::create([
            'action_by' => auth()->user()->name, 'action' => 'block admin ',
            'request_ip' => $_SERVER['REMOTE_ADDR'], 'activities' => "Set admin " . $request->name . " status to inactive ", 'created_by' => auth()->user()->client_id
        ]);
        return response()->json('success');
    }


    public function unblockAdmin(Request $request)
    {
        User::whereClientId($request->input('adminId'))->update(['isActive' => 'active']);
        session()->flash('block-admin', "One Admin account successfully  unblocked");
        AdminAuditTrail::create([
            'action_by' => auth()->user()->name, 'action' => 'Unblock admin ',
            'request_ip' => $_SERVER['REMOTE_ADDR'], 'activities' => "Set admin " . $request->name . " status to active ", 'created_by' => auth()->user()->client_id
        ]);
        return response()->json('success');
    }


    public function deleteAdmin(Request $request)
    {
        $admin = User::whereClientId(auth()->user()->client_id)->delete();
        session()->flash('block-admin', "One Admin account account successfully deleted");
        AdminAuditTrail::create([
            'action_by' => auth()->user()->name, 'action' => 'Delete admin ',
            'request_ip' => $_SERVER['REMOTE_ADDR'], 'activities' => "Deleted admin " . $request->name . " from application ", 'created_by' => auth()->user()->client_id
        ]);
        return response()->json('success');
    }

    public function adminProfileUpdate(Request $request)
    {

        $user = User::find(auth()->user()->client_id);
        $user->update([
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'email' => $request->input('email'),
            'phone1' => $request->input('phone1'),

        ]);

        $user->userProfile()->update([
            'phone2' => $request->input('phone2'),
            'address' => $request->input('address')
        ]);

        AdminAuditTrail::create([
            'action_by' => auth()->user()->name, 'action' => 'Update admin profile ',
            'request_ip' => $_SERVER['REMOTE_ADDR'], 'activities' => "Admin " . $request->name . " updated profile", 'created_by' => auth()->user()->client_id
        ]);
        return  redirect(route('profile'))->with('admin-profile', 'Profile successfully updated');
    }


    public function adminActivities()
    {
        $auditTrail =  AdminAuditTrail::whereCreatedBy(auth()->user()->client_id)->latest()->paginate(10);
        return view('userDashboard.auditTrail')->with('auditTrail', $auditTrail);
    }
}

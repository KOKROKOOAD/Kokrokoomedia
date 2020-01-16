<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Events\RegistrationSuccessEvent;
use App\Jobs\RegistrationSuccessfullJob;
use App\User;
use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Intervention\Image\Facades\Image;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'register.success';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone1' => 'required|string|max:10|unique:users',
                'title' => 'required|string|max:50',
                'role'  => 'required|string'

            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create( array $data)
    {
//
//        $unique_id = uniqid('K', true);
//        if (User::where('client_id', '=', $unique_id)) {
//            $unique_id = uniqid('K', true);
//        }
//
//        $user = User::create([
//
//            'name' => $data['name'],
//            'title' => $data['title'],
//            'email' => $data['email'],
//            'phone1' => $data['phone1'],
//            'address' => auth()->user()->address,
//            'media' => auth()->user()->media,
//            'media_house' => auth()->user()->media_house,
//            'website' => auth()->user()->website,
//            'company_profile' => auth()->user()->company_profile,
//            'company_name' => auth()->user()->comapany_name,
//            'industry_type' => auth()->user()->industry_type,
//            'policies' => auth()->user()->policies,
//            'logo' => auth()->user()->logo,
//            'file_path' => auth()->user()->file_path,
//            'file_size' => auth()->user()->file_size,
//            'role' => $data['role'],
//            'is_admin' => true,
//            'client_id' => $unique_id,
//            'account_type' => auth()->user()->account_type,
//            'password' => Hash::make($data['password']),
//        ]);
//
//        $this->dispatch(new RegistrationSuccessfullJob($user));

        return   response('am hitting register controller', 200);

    }
}

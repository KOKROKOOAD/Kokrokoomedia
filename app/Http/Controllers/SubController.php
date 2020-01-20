<?php

namespace App\Http\Controllers;

use App\Models\ScheduledAd;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Carbon;
use Reliese\Coders\Model\Model;
use Illuminate\Support\Facades\DB;
use App\Jobs\RegistrationSuccessfullJob;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AcceptSubscriptionNotificaton;
use App\Notifications\RejectedSubscriptionNotificaton;
use App\AdminAuditTrail;

class SubController extends Controller

{
    //        //fetch user transactions
    public function fetchUserTransac(Request $request)
    {

        $user = User::find(auth()->user()->client_id);

        return response()->json($user->transaction);
    }

    public function __construct()
    {
        $admin  = Auth::guard('admin')->user();
    }

    // login user fetch subscriptions
    public function fetchPendingSubs()
    {
        if (Auth::guard()->check()) {
            $sub  =  ScheduledAd::whereMedia_house_id(auth()->user()->client_id)->whereStatus('pending')->latest()->paginate(50);
            return  response()->json($sub);
        } elseif (Auth::guard('admin')) {
            $sub  =  ScheduledAd::whereMedia_house_id(Auth::guard('admin')->user()->media_house_id)->whereStatus('pending')->latest()->paginate(50);
            return  response()->json($sub);
        }
    }

    // update subscription status
    public function updateSubStatus(Request $request)
    {
        $client_id = $request->input('client_id');
        $sub_id = $request->input('sub_id');

        $user = User::find($client_id);

        $sub = ScheduledAd::find($sub_id);
        $sub->status = 'accepted';
        $sub->save();
        if ($sub) {
            // event(new UpdateSubscriptionStatusEvent($sub->status));
            $this->dispatch(new RegistrationSuccessfullJob($user));

            return response()->json($sub->status);
        }
        //         return response()->json($sub);

    }

    public function pendingSubs()
    {


        $pendSubs  =  ScheduledAd::select('created_ad_data')->whereMedia_house_id(auth()->user()->client_id)->whereStatus('pending')->latest()->paginate(50);


        return view('userDashboard.pendingSubscription')->with('pendSubs', $pendSubs);
    }

    public  function fetchAcceptedSubs()
    {
        $accepted_sub = null;

        if (Auth::guard()->check()) {
            $accepted_sub  =  ScheduledAd::whereMedia_house_id(auth()->user()->client_id)->whereStatus('accepted')->latest()->paginate(50);
            return response()->json($accepted_sub);
        } elseif (Auth::guard('admin')->check()) {
            $accepted_sub  =  ScheduledAd::whereMedia_house_id(auth()->guard('admin')->user()->media_house_id)->whereStatus('accepted')->latest()->paginate(50);
            return response()->json($accepted_sub);
        }
    }

    public  function fetchActiveSubs()
    {

        if (Auth::guard()->check()) {
            $active_sub  =  ScheduledAd::whereMedia_house_id(auth()->user()->client_id)->whereStatus('active')->latest()->paginate(50);
            return response()->json($active_sub);
        } elseif (Auth::guard('admin')->check()) {
            $active_sub  =  ScheduledAd::whereMedia_house_id(Auth::guard('admin')->user()->media_house_id)->whereStatus('active')->latest()->paginate(50);
            return response()->json($active_sub);
        }
    }

    public  function fetchRejectedSubs()
    {

        if (Auth::guard()->check()) {
            $rejected_sub  =  ScheduledAd::whereMedia_house_id(auth()->user()->client_id)->whereStatus('rejected')->latest()->paginate(50);
            return response()->json($rejected_sub);
        } elseif (Auth::guard('admin')) {
            $rejected_sub  =  ScheduledAd::whereMedia_house_id(Auth::guard('admin')->user()->media_house_id)->whereStatus('rejected')->latest()->paginate(50);
            return response()->json($rejected_sub);
        }
    }

    public  function fetchExpiredSubs()
    {

        if (Auth::guard('admin')->check()) {
            $expired_sub  =  ScheduledAd::whereMedia_house_id(auth()->user()->client_id)->whereStatus('expired')->lastest()->paginate(50);
            return response()->json($expired_sub);
        } elseif (Auth::guard('admin')->check()) {
            $expired_sub  =  ScheduledAd::whereMedia_house_id(Auth::guard('admin')->user()->media_house_id)->whereStatus('expired')->latest()->paginate(50);
            return response()->json($expired_sub);
        }
    }

    public  function fetchAllSubs()
    {

        // $sub = null;
        if (Auth::guard()->check()) {
            $sub  =  ScheduledAd::whereMedia_house_id(auth()->user()->client_id)->latest()->paginate(50);
            return response()->json($sub);
        } elseif (Auth::guard('admin')->check()) {
            $sub  =  ScheduledAd::whereMedia_house_id(Auth::guard('admin')->user()->media_house_id)->latest()->paginate(50);
            return response()->json($sub);
        }
    }

    public function fetchSubscriptions(Request $request)
    {
//        if ($request->ajax) {
//            return response($request->get('query'));
//        } else {
//            $subs  =  ScheduledAd::whereMedia_house_id(auth()->user()->client_id)->latest()->paginate(50);
//            return view('userDashboard.createSub')->with('subs', $subs);
//        }
         $schedAds = null;
        if(request()->ajax()) {
            $schedAds  = DB::table('scheduled_ads')
                ->join('users', 'scheduled_ads.media_house_id','=','users.client_id')
                ->join('rate_card_titles', 'scheduled_ads.rate_card_id','=','rate_card_titles.rate_card_title_id')
                ->select('scheduled_ads.*', 'users.media_house','users.id','users.client_id','users.name','rate_card_titles.rate_card_title_id','rate_card_titles.rate_card_title')
                ->where('scheduled_ads.status','=','pending')
                ->get();

            //die($schedAds);

            return datatables()->of($schedAds)
                ->addColumn('action', function($row){
                    $btn = '<div class="btn-group btn-group-sm"> ';
                    $btn =$btn.  '<a href="/media/admin/view-subscription/'.$row->subscription_id.'" data-toggle="tooltip"     data-id="'.$row->subscription_id.'" data-original-title="view" class="edit btn btn-success "><i class="fa fa-eye"></i></a>';
                    //$btn = $btn.' <button data-toggle="tooltip"  data-id="'.$row->subscription_id.'" data-original-title="Delete" class="btn btn-primary btn-sm unblock-user"><i class="fa fa-unlock"></i> </button>';
                    // $btn = $btn.' <button data-toggle="tooltip"  data-id="'.$row->subscription_id.'" data-original-title="Delete" class="btn btn-danger btn-sm block-user"><i class="fa fa-lock"></i> </button>';
                    $btn = $btn . '</div';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
                    return view('userDashboard.createSub')->with('schedAds',$schedAds);

    }

    public function getFile(Request $request)
    {
        $file_type = ScheduledAd::select('file_type')->where('subscription_id', $request->get('sub_id'))->get();
        // $fileType = '';
        return response()->json($file_type);
    }

    public function downloadableSub()
    {

        $today = Carbon::now()->format('Y-m-d');
        $accepted_sub  = null;

        if (Auth::guard()->check()) {
            $accepted_sub  =  ScheduledAd::whereMedia_house_id(auth()->user()->client_id)->whereStatus('active')->paginate(50);
            AdminAuditTrail::create(['action_by' => Auth::guard()->user()->name, 'activities' => "Downloaded a file from broadcaster download  page"]);
        } elseif (Auth::guard('admin')->check()) {
            $accepted_sub  =  ScheduledAd::whereMedia_house_id(Auth::guard('admin')->user()->media_house_id)->whereStatus('active')->paginate(50);
            AdminAuditTrail::create(['action_by' => Auth::guard('admin')->user()->name, 'activities' => "Downloaded a file from broadcaster download  page"]);
        }

        return view('userDashboard.downloadable-subs')->with('accepted_sub', $accepted_sub);
    }

    public function viewFile($id){
        $sub = ScheduledAd::select('subscription_id','file_name','file_path','file_size','file_type')->where('subscription_id',$id)->get();
        return view('userDashboard.viewSubDetails')->with('sub',$sub);
    }

    //download file
    public function downloadFile($id)
    {
        $f_name = null;
        $f_type = null;
        $file_name = null;

        if (Auth::guard()->check()) {
            $file_name = ScheduledAd::select('file_name', 'file_type')->whereMedia_house_id(auth()->user()->client_id)->whereSubscription_id($id)->get();
        } elseif (Auth::guard('admin')->check()) {
            $file_name = ScheduledAd::select('file_name', 'file_type')->whereMedia_house_id(Auth::guard('admin')->user()->media_house_id)->whereSubscription_id($id)->get();
        }

        foreach ($file_name as $file) {
            $f_name = $file->file_name;
            $f_type = $file->file_type;
        }
        $ext = explode('/', $f_type);

      //  $file_path = public_path() . "/storage/" . $f_name;
        $headers = [
            'Content-Type' => 'application/' . $ext[0]
        ];

       // $file = storage_path('app') . $f_name;
       // $file = env('SUB_FILES_URL').$f_name;
        $file = '/var/www/html/uploads/subscription-files/'.$f_name;


        return response()->download($file, $f_name, $headers);
    }

    //  pending subs are updated to accept when pass review
    public function acceptSubs(Request $request)
    {
        if (Auth::guard()->check()) {
            $accSub =    ScheduledAd::whereMedia_house_id(auth()->user()->client_id)->whereSubscription_id($request->input('sub_id'))->update([
                'status' => 'accepted'
            ]);

            AdminAuditTrail::create(['action_by' => Auth::guard()->user()->name, 'activities' => "Approved a subscription with id " . $request->input('sub_id')]);
        } elseif (Auth::guard('admin')->check()) {
            $accSub =    ScheduledAd::whereMedia_house_id(Auth::guard('admin')->user()->media_house_id)->whereSubscription_id($request->input('sub_id'))->update([
                'status' => 'accepted'
            ]);

            AdminAuditTrail::create(['action_by' => Auth::guard('admin')->user()->name, 'activities' => "Approved a subscription with id " . $request->input('sub_id')]);
        }

        $users =  User::find($request->input('user_id'));
        Notification::send($users, new AcceptSubscriptionNotificaton());

        session()->flash('sub-reviewed', "1  subscription successfully  accepted");
        return  response()->json('success');
    }


    //  pending subs are updated to accept when pass review
    public function rejectSubs(Request $request)
    {
        if (Auth::guard()->check()) {
            $accSub =    ScheduledAd::whereMedia_house_id(auth()->user()->client_id)->whereSubscription_id($request->input('sub_id'))->update([
                'status' => 'rejected'
            ]);
            AdminAuditTrail::create(['action_by' => Auth::guard('admin')->user()->name, 'activities' => "Rejected a subscription with id " . $request->input('sub_id')]);
        } elseif (Auth::guard('admin')->check()) {
            $accSub =    ScheduledAd::whereMedia_house_id(Auth::guard('admin')->user()->media_house_id)->whereSubscription_id($request->input('sub_id'))->update([
                'status' => 'rejected'
            ]);
            AdminAuditTrail::create(['action_by' => Auth::guard('admin')->user()->name, 'activities' => "Rejected a subscription with id " . $request->input('sub_id')]);
        }

        $users =  User::find($request->input('user_id'));
        Notification::send($users, new RejectedSubscriptionNotificaton());
        session()->flash('sub-rejected', "1  subscription rejected");

        return  response()->json('success');
    }

    public function activeDate()
    {
        $counts  = null;
        if (AUth::guard()->check()) {
            $sub_date = ScheduledAd::whereMedia_house_id(auth()->user()->client_id)->whereStatus('accepted')->whereCreated_at(Carbon::now()->format('Y-m-d'))->whereStart(Carbon::now()->format('Y:m:d H:i'))->update([
                'status' => 'active'
            ]);
            $counts = sizeof($sub_date);
        } elseif (Auth::guard('admin')) {
            $sub_date = ScheduledAd::whereMedia_house_id(Auth::guard('admin')->user()->media_house_id)->whereStatus('accepted')->whereCreated_at(Carbon::now()->format('Y-m-d'))->whereStart(Carbon::now()->format('Y:m:d H:i'))->update([
                'status' => 'active'
            ]);
            $counts = sizeof($sub_date);
        }

        session()->flash('sub_is_active',  " $counts subscription currently active");
    }

    public function expiredDate()
    {
        $counts = null;

        if (Auth::guard()->check()) {
            $sub_date = ScheduledAd::whereMedia_house_id(auth()->user()->client_id)->whereStatus('active')->whereCreated_at(Carbon::now()->format('Y-m-d'))->whereEnd(Carbon::now()->format('H'))->update([
                'status' => 'expired'
            ]);
            $counts = sizeof($sub_date);
        } elseif (Auth::guard('admin')) {
            $sub_date = ScheduledAd::whereMedia_house_id(Auth::guard('admin')->user()->media_house_id)->whereStatus('active')->whereCreated_at(Carbon::now()->format('Y-m-d'))->whereEnd(Carbon::now()->format('H'))->update([
                'status' => 'expired'
            ]);
            $counts = sizeof($sub_date);
        }

        session()->flash('sub_is_expired',  " $counts subscription currently active");


        //        return response()->json($sub_date);
    }

    public function demo()
    {
        $sub_date = ScheduledAd::whereMedia_house_id(auth()->user()->client_id)->whereStatus('accepted')->update([
            'status' => 'active'
        ]);
    }


    public function weekData()
    {

        $days = ScheduledAd::select([
            DB::raw('DATE(created_at) AS date'),
            DB::raw('COUNT(id) AS count'),
        ])
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get()
            ->toArray();

        return  response()->json($days);
    }
}

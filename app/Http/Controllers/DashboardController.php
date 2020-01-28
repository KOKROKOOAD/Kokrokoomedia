<?php

namespace App\Http\Controllers;

use App\Models\ScheduledAd;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // fetch total subscription for login media house
    public  function fetchTotalSubs(){

         if(Auth::guard()->check()){
            $id = Auth()->user()->client_id;
            $totalSubs  =  ScheduledAd::where('media_house_id',$id)->count();
    
            //  fetch active subscription associated with login in media admin
            $totalAcceptSubs  =  ScheduledAd::select('status')->where('media_house_id',$id)->where(function ($query){
                $query->where('status','accepted');
            })->count();
    
            //  fetch rejected subscription associated with login in media admin
            $totalRejSubs  =  ScheduledAd::select('status')->where('media_house_id',$id)->where(function ($query){
                $query->where('status','rejected');
            })->count();
    
    //  fetch expired subscription associated with login in media admin
            $totalExpSubs  =  ScheduledAd::select('status')->where('media_house_id',$id)->where(function ($query){
                $query->where('status','expired');
            })->count();
    
            //  fetch pending subscription associated with login in media admin
            $totalPenSubs  =  ScheduledAd::select('status')->where('media_house_id',$id)->where(function ($query){
                $query->where('status','pending');
            })->count();
    
            //  fetch reviewed subscription associated with login in media admin
            $totalRevSubs  =  ScheduledAd::select('status')->where('media_house_id',$id)->where(function ($query){
                $query->where('status','reviewed');
            })->count();


           $days = ScheduledAd::select([
            DB::raw('DATE(created_at) AS date'),
            DB::raw('COUNT(id) AS count'),
            ])
            ->whereMediaHouseId(auth()->user()->client_id)
            ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get()
            ->toArray();
    
            return  response()->json(['totalSubs'=>$totalSubs,'totalAcceptSub'=> $totalAcceptSubs,'totalRejSub'=> $totalRejSubs,'totalExpSub'=> $totalExpSubs,'totalPenSub'=>$totalPenSubs,'totalRevSub'=>$totalRevSubs,'dayS'=> $days]);
         }
         elseif(Auth::guard('admin')->check()){

            $id = Auth::guard('admin')->user()->media_house_id;
            $totalSubs  =  ScheduledAd::where('media_house_id',$id)->count();
    
            //  fetch active subscription associated with login in media admin
            $totalAcceptSubs  =  ScheduledAd::select('status')->where('media_house_id',$id)->where(function ($query){
                $query->where('status','accepted');
            })->count();
    
            //  fetch rejected subscription associated with login in media admin
            $totalRejSubs  =  ScheduledAd::select('status')->where('media_house_id',$id)->where(function ($query){
                $query->where('status','rejected');
            })->count();
    
    //  fetch expired subscription associated with login in media admin
            $totalExpSubs  =  ScheduledAd::select('status')->where('media_house_id',$id)->where(function ($query){
                $query->where('status','expired');
            })->count();
    
            //  fetch pending subscription associated with login in media admin
            $totalPenSubs  =  ScheduledAd::select('status')->where('media_house_id',$id)->where(function ($query){
                $query->where('status','pending');
            })->count();
    
            //  fetch reviewed subscription associated with login in media admin
            $totalRevSubs  =  ScheduledAd::select('status')->where('media_house_id',$id)->where(function ($query){
                $query->where('status','reviewed');
            })->count();


           $days = ScheduledAd::select([
           DB::raw('DATE(created_at) AS date'),
           DB::raw('COUNT(id) AS count'),
           ])
           ->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
           ->groupBy('date')
           ->orderBy('date', 'ASC')
           ->get()
           ->toArray();



    
            return  response()->json(['totalSubs'=>$totalSubs,'totalAcceptSub'=> $totalAcceptSubs,'totalRejSub'=> $totalRejSubs,'totalExpSub'=> $totalExpSubs,'totalPenSub'=>$totalPenSubs,'totalRevSub'=>$totalRevSubs,'days'=>$days]);
         }

        
    }

    public function activeSubscriptions(){
        $id = Auth()->user()->client_id;
        if(Auth::guard()->check()){
            $totalAcceptSubs  =  ScheduledAd::select('status')->where('media_house_id','=',$id,'and','status','=','accepted')->count();
            return response()->json($totalAcceptSubs);
        }
        elseif(Auth::guard('admin')->check()){
            $totalAcceptSubs  =  ScheduledAd::select('status')->where('media_house_id','=',Auth::guard('admin')->user()->media_house_id,'and','status','=','accepted')->count();
            return response()->json($totalAcceptSubs);
        }
        
    }
}

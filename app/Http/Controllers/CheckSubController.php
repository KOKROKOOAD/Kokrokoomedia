<?php

namespace App\Http\Controllers;

use App\ScheduledAds;
use Illuminate\Http\Request;

class CheckSubController extends Controller
{

    //check if selected subscription date is available
    public  function checkSubAvailable($sub_date){

        $sub_dat = ScheduledAds::where('created_ad_data->date',$sub_date)->get();
        //$sub_dat = ScheduledAds::select('created_ad_data')->where('day', $sub_date)->get();

         return response()->json($sub_dat);
    }
}

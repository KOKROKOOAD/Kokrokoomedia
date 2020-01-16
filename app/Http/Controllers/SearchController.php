<?php

namespace App\Http\Controllers;

use App\Models\ScheduledAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use  Auth;

class SearchController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //search ads
    public  function searchSub($q)
    {
        $output = '';
        $counter = 1;
        $subs  = ScheduledAd::where('media_house_id', auth()->user()->client_id)->Where('subscription_id', 'like', '%' . $q . '%')
        ->orWhere('status', 'like', '%' . $q . '%')
        ->orWhere('title', 'like', '%' . $q . '%')->get();

       
        return response()->json($subs);
    }
}

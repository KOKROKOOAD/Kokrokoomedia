<?php

namespace App\Http\Controllers;

use App\Models\ScheduledAd;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // fetch total subscription for login media house
    public  function fetchTotalSubs()
    {

        $id = auth()->user()->client_id;
        $totalSubs  =  ScheduledAd::select('id')->whereMediaHouseId($id)->whereNotIn('status', ['in cart'])->count();

        //  fetch active subscription associated with login in media admin
        $totalAcceptSubs  =  ScheduledAd::select('status')->where('media_house_id', $id)->where(function ($query) {
            $query->where('status', 'accepted');
        })->count();

        //  fetch rejected subscription associated with login in media admin
        $totalRejSubs  =  ScheduledAd::select('status')->where('media_house_id', $id)->where(function ($query) {
            $query->where('status', 'rejected');
        })->count();

        //  fetch expired subscription associated with login in media admin
        $totalExpSubs  =  ScheduledAd::select('status')->where('media_house_id', $id)->where(function ($query) {
            $query->where('status', 'completed');
        })->count();

        //  fetch pending subscription associated with login in media admin
        $totalPenSubs  =  ScheduledAd::select('status')->where('media_house_id', $id)->where(function ($query) {
            $query->where('status', 'pending');
        })->count();

        //  fetch reviewed subscription associated with login in media admin
        $totalRevSubs  =  ScheduledAd::select('status')->where('media_house_id', $id)->where(function ($query) {
            $query->where('status', 'active');
        })->count();

        //  fetch reviewed subscription associated with login in media admin
        $totalLiveSubs  =  ScheduledAd::select('status')->where('media_house_id', $id)->where(function ($query) {
            $query->where('status', 'Live');
        })->count();

        // fetch transactions associated with login in media admin
        $user = User::find($id);
        $totalTrans = count($user->transaction->toArray());

        $daysCounts = ScheduledAd::select([
            DB::raw('DATE(updated_at) AS date'),
            DB::raw('COUNT(id) AS count'),
        ])
            ->whereMediaHouseId($id)
            //->whereNotIn('status', ['in cart'])
            ->whereBetween('updated_at', [Carbon::now()->subDays(7)->toDateString(), Carbon::now()->toDateString()])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get()
            ->toArray();

        $transCounts = Transaction::select([
            DB::raw('DATE(updated_at) AS date'),
            DB::raw('COUNT(id) AS count'),
        ])
            ->whereMediaHouseId($id)
            //  ->whereTransactionStatus('paid')
            ->whereBetween('updated_at', [Carbon::now()->subDays(7)->toDateString(), Carbon::now()->toDateString()])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get()
            ->toArray();

        //print_r($transCounts);

        $dates = array();
        $counts = array();
        $transCounts = array();
        $transDates = array();
        foreach ($daysCounts as $date) {
            array_push($dates, $date['date']);
            array_push($counts, $date['count']);
        }

        foreach ($transCounts as $dates) {
            print_r($dates);
            array_push($transDates, $dates['date']);
            array_push($transCounts, $dates['count']);
        }


        return  response()->json([
            'totalSubs' => $totalSubs,
            'totalAcceptSub' => $totalAcceptSubs,
            'totalRejSub' => $totalRejSubs,
            'totalExpSub' => $totalExpSubs,
            'totalPenSub' => $totalPenSubs,
            'totalRevSub' => $totalRevSubs,
            'dates' => $dates,
            'counts' => $counts,
            'totalLiveSubs' => $totalLiveSubs,
            'totalTrans' => $totalTrans,
            'transDates' => $transDates,
            'transCounts' => $transCounts
        ]);
    }

    public function activeSubscriptions()
    {
        $id = Auth()->user()->client_id;
        $totalAcceptSubs  =  ScheduledAd::select('status')->where('media_house_id', '=', $id, 'and', 'status', '=', 'accepted')->count();
        return response()->json($totalAcceptSubs);
    }
}

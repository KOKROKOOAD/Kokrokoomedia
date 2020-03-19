<?php

namespace App\Http\Controllers;

use App\Models\ScheduledAd;
use App\Models\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        return view('userDashboard.generalReport');
    }

    public function showDailyReports()
    {
        return view('userDashboard.dailyReport');
    }

    public function fetchDailyTransactionReport(Request $request)
    {

        $user = User::find(auth()->user()->client_id);
        $data  = json_decode($request->data[0]);
        $trans = Transaction::select('transaction_id', 'amount', 'payment_source', 'transaction_status', 'updated_at')
            ->whereTransactionStatus('paid')->whereDate('updated_at', Carbon::today())->get();

        return response()->json($trans);
    }

    public function fetchDailyTransactionReportWithDate(Request $request)
    {
        $user = User::find(auth()->user()->client_id);
        $data  = json_decode($request->data[0]);
        $trans = Transaction::select('transaction_id', 'amount', 'payment_source', 'transaction_status', 'updated_at')
            ->whereTransactionStatus('paid')->whereDate('updated_at', '>=', $data->fromDate)->whereDate('updated_at', '<=', $data->toDate)->get();

        return response()->json($trans);
    }

    public function fetchDailySubscriptionReportWithDate(Request $request)
    {
        $data  = json_decode($request->data[0]);

        $subs  = ScheduledAd::select('*')->whereIn('status', ['in cart'])->whereDate('created_at', '>=', $data->fromDate)->whereDate('created_at', '<=', $data->toDate)->get();
        return response()->json($subs);
    }

    public function fetchDailySubscriptionReport()
    {
        $user = User::find(auth()->user()->created_by);
        $subs  = $user->ScheduledAds->whereIn('status', ['in cart']);
        return response()->json($subs);
    }
}

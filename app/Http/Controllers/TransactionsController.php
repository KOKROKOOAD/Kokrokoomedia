<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()) {
            $trans  = Transaction::whereMediaHouseId(auth()->user()->created_by)->whereTransactionStatus('paid')->get();
            return datatables()->of($trans)

                ->addColumn('action', function ($row) {
                    //  $btn = '<div class="btn-group btn-group-sm"> ';
                    $btn = '<button data-toggle="tooltip"     data-id="' . $row->subscription_id . '" data-original-title="view" class="btn btn-primary btn-sm view-sub"><i class="fa fa-eye"></i></button>';
                    //$btn = $btn.' <button data-toggle="tooltip"  data-id="'.$row->subscription_id.'" data-original-title="Delete" class="btn btn-primary btn-sm unblock-user"><i class="fa fa-unlock"></i> </button>';
                    // $btn = $btn.' <button data-toggle="tooltip"  data-id="'.$row->subscription_id.'" data-original-title="Delete" class="btn btn-danger btn-sm block-user"><i class="fa fa-lock"></i> </button>';
                    // $btn = $btn . '</div';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return  view('userDashboard.transactions');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function show(Transactions $transactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function edit(Transactions $transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transactions $transactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transactions $transactions)
    {
        //
    }
}

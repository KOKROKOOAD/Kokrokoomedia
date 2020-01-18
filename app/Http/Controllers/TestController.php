<?php

namespace App\Http\Controllers;

use App\Models\ScheduledAd;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class TestController extends Controller
{
//     public function dataTable(Request $request){
//         if ($request->ajax()) {
//
//             $data = ScheduledAd::latest()->get();
//
//             return DataTables::of($data)
//
//                 ->addIndexColumn()
//
//                 ->addColumn('action', function($row){
//
//
//
//                     $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
//
//
//
//                     return $btn;
//
//                 })
//
//                 ->rawColumns(['action'])
//
//                 ->make(true);
//
//         }
//
//
//
//         return view('test.test');
//     }

  public function  imagePaths(){
      dd('hello world');
  }
}

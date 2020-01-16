<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class ExcelController extends Controller
{
    function excelUpload()
    {


        return response('uploading excel file');
    }

    public function import()
    {
        Excel::import(new UsersImport, 'user.xlsx');
        return redirect('/')->with('success', 'All is good');
    }

    public function downloads(){
         $headers =  [
        'Content-Type' => 'Application/image'
    ];
    return response()->download(public_path() . '/download/food.jpg', 'food.jpg', $headers);
    }
}

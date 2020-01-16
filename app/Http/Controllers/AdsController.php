<?php

namespace App\Http\Controllers;

use App\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('userDashboard.personal.ads.ad');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $validator = \validator([
            'adTitle' => 'required'|'max:225',
            'media'    => 'required'|'max:50',
            'media_house' => 'required'|'max:50',
             'subDesc'=> 'required|string|max:50',
            'program'  => 'required'|'string'|'max:50',
            'publishDate' => 'required|date',
            'file' => 'required',
            'spots'    => 'required'|'max:50',

        ]);

         if ($validator->fails()){
             return response('Form validation failed');
         }

       //  return response('current user id = ' . auth()->user()->id);

        $ad = Ads::create([
            'client_id' =>  auth()->user()->client_id,
            'ad_title'=>$request->input('subTitle'),
            'media'=>$request->input('medias'),
            'media_house'=> $request->input('medias'),
            'program'=> $request->input('program'),
            'ad_subscription' => $request->input('subDesc'),
            'status'=>  'pending',
            'publish_at'=>$request->input('publishDate'),
            'file'=>$request->input('file'),


        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

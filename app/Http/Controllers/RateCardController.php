<?php

namespace App\Http\Controllers;

use App\Models\ProgramTitle;
use App\Models\User;
use App\PrintRateCard;
use App\RateCards;
use App\RateCardTitles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Illuminate\Support\Facades\Session;
use App\AdminAuditTrail;
use Illuminate\Support\Facades\Validator;

class RateCardController extends Controller
{

    public function index(){
        if(request()->ajax()) {
            $rate_cards  =  DB::table('rate_cards')
                ->join('rate_card_titles', 'rate_cards.rate_card_title_id','=','rate_card_titles.rate_card_title_id')
                ->join('users', 'rate_cards.media_house_id','=','users.client_id')
                ->select('rate_cards.*','rate_card_titles.rate_card_title', 'users.media_house')
                ->get();
            return datatables()->of($rate_cards)
                ->addColumn('action', function($row){

//                    $btn =  '<a href="ratecard/'.$row->rate_card_id.'" data-toggle="tooltip"     data-id="'.$row->rate_card_id.'"
//                    data-original-title="view" class="edit btn btn-success btn-sm view-sub"><i class="fa fa-eye"></i></a>';
//                    return $btn;

                    $btn = '<div class="btn-group btn-group-sm"> ';
                    $btn =$btn.  '<a href="/ratecard/'.$row->rate_card_id.'" data-toggle="tooltip"  data-id="'.$row->rate_card_id.'" data-original-title="Edit" class="edit btn btn-success btn-sm" ><i class="fa fa-eye"></i></a>';
                    $btn = $btn.' <a href="#" data-toggle="tooltip"  data-id="'.$row->rate_card_id.'" data-original-title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>';
                    $btn = $btn . '</div';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
          return view('userDashboard.viewRateCard');
    }

    // create rate card title
    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function storeRateCardTitle(Request $request)
    {

        $validateRequest  = request()->validate([
            'rateCardTitle' => 'required|unique:rate_card_titles'
        ]);

        $unique_id = uniqid('K', true);
        if (RateCardTitles::where('rate_card_title_id', '=', $unique_id)) {
            $unique_id = uniqid('K', true);
        }
         
        if(Auth::guard()->check()){
         RateCardTitles::create(['rate_card_title'=>$request->input('rateCardTitle'),'media_house_id' => Auth::guard()->user()->client_id,'rate_card_title_id'=> $unique_id]);

         $title = RateCardTitles::select('rate_card_title','rate_card_title_id')->where('media_house_id',Auth::guard()->user()->client_id)->where(function($query){
             $query->where('rate_card_title',Input::get('rateCardTitle'));
         })->get();

        AdminAuditTrail::create([ 'action_by' => Auth::guard()->user()->name, 'activities'=> "Created rate card title: ".$request->input('rateCardTitle')]);

        }
        else if(Auth::guard('admin')->check()){
                     RateCardTitles::create(['rate_card_title'=>$request->input('rateCardTitle'),'media_house_id' => Auth::guard('admin')->user()->media_house_id,'rate_card_title_id'=> $unique_id]);

                     $title = RateCardTitles::select('rate_card_title','rate_card_title_id')->where('media_house_id',Auth::guard('admin')->user()->media_house_id)->where(function($query){
             $query->where('rate_card_title',Input::get('rateCardTitle'));
         })->get();

         AdminAuditTrail::create([ 'action_by' => Auth::guard('admin')->user()->name, 'activities'=> "Created rate card title: ".$request->input('rateCardTitle')]);

        }

        $r_title = null;
        $_r_id = null;
        if ($title){
            foreach ($title as $title){
                $r_title = $title->rate_card_title;
                $_r_id = $title->rate_card_title_id;
            }

            session(['card_title'=> $r_title,'rate_card_title_id'=>$_r_id,'media'=> auth()->user()->media]);

            return Redirect::route('create.rate.cards');

        }
    }


    public function showRateCardDetails ($id){
        return view('userDashboard.viewRateCardDetails');
    }

    public  function storeRateCards(Request $request)
    {

        if (auth()->user()->media == 'Print') {
            $unique_id = uniqid('K', true);
            if (RateCardTitles::where('rate_card_title_id', '=', $unique_id)) {
                $unique_id = uniqid('K', true);
            }

            $rate_cards = PrintRateCard::create(['rate_card_title_id'=> $request->input('rate_card_title_id'),'rate_card_id'=>$unique_id,'rate_card_data'=> $request->input('rateCardData'),'media_house_id'=>auth()->user()->client_id]);
        }
            else {
                $unique_id = uniqid('K', true);
                if (RateCardTitles::where('rate_card_title_id', '=', $unique_id)) {
                    $unique_id = uniqid('K', true);
                }

                $rate_cards = RateCards::create(['rate_card_id' => $unique_id, 'rate_card_title_id' => $request->input('rate_card_title_id'),
                    'media_house_id' => auth()->user()->client_id, 'days_of_week' => $request->input('mons_to_fridays'),
                    'segments' => json_decode($request->input('weekdays')), 'days_of_weekend' => $request->input('sat_to_sun'),
                    'weekend_segments' => $request->input('weekends')]);
            }

//                  else if(Auth::guard('admin')->check()){
//
//                      $rate_cards =  RateCards::create(['rate_card_id'=> $unique_id,'rate_card_title_id' => $request->input('rate_card_title_id'), 'media_house_id' => auth()->user()->media_house_id, 'segments'=>$request->input('weekdays'),
//                      'weekend_segments' => $request->input('weekends')]);
//
//
//                     }

            // AdminAuditTrail::create([ 'action_by' => Auth::guard('admin')->user()->name, 'activities'=> "Created rate card with id: ".$request->input('rate_card_title_id')]);
            return response()->json('success');

//        else{
////            $rate_cards =  RateCards::create(['ad_types_id' => $id->id, 'client_id' => $client_id, 'segments'=>$data[0]]);
//        }


//        return  response()->json($rate_cards->segments);
        }


    // fetch rate cards for login media

    public function fetchRateCards(){

        if(Auth::guard()->check()){

            $rateCards  = DB::table('rate_card_titles')
                ->join('rate_cards','rate_card_titles.rate_card_title_id','=','rate_cards.rate_card_title_id')
                ->select('rate_card_titles.*')
                ->where('rate_card_titles.media_house_id','=', auth()->user()
                    ->client_id)->where('rate_cards.media_house_id','=',auth()->user()->client_id)
                ->latest()->paginate(10);     //whereRate_card_title_id(Input::get('rateCardTitleId'))->g;

            return response()->json($rateCards);
        }
        elseif(Auth::guard('admin')->check()){
//            $rateCared =    RateCardTitles:: whereMedia_house_id(Auth::guard('admin')->user()->media_house_id)->latest()->paginate(50);
//            return response()->json($rateCared);

            $rateCards  = DB::table('rate_card_titles')
                ->join('rate_cards','rate_card_titles.rate_card_title_id','=','rate_cards.rate_card_title_id')
                ->select('rate_card_titles.*')
                ->where('rate_card_titles.media_house_id','=', auth()
                    ->user()->client_id)->where('rate_cards.media_house_id','=',auth()
                    ->user()->client_id)->latest()->paginate(10);     //whereRate_card_title_id(Input::get('rateCardTitleId'))->get();
                        return response()->json($rateCards);


        }
   
    }

    // get media house name and display in rate cards table
    public function getMediaHouse(){
        $media_house = auth()->user()->media_house;
         return response()->json($media_house);
    }

//view  selected rate card by login media
   public function  viewRateCard(Request $request){

    if(auth()->user()->media != 'Print'){

        $rate_cards  = DB::table('rate_card_titles')
            ->join('rate_cards','rate_card_titles.rate_card_title_id','=','rate_cards.rate_card_title_id')
            ->select('rate_card_titles.rate_card_title', 'rate_cards.*')
            ->where('rate_cards.media_house_id','=', auth()->user()->client_id)->where('rate_card_titles.rate_card_title_id','=',Input::get('rateCardTitleId'))->get();     //whereRate_card_title_id(Input::get('rateCardTitleId'))->get();


        if($rate_cards){
            $segments = $rate_cards[0]->segments;
            $w_segments = json_decode($rate_cards[0]->weekend_segments);
            $days_of_week = json_decode($rate_cards[0]->days_of_week);
            $days_of_weekends = $rate_cards[0]->days_of_weekend;

            return response()->json(['rate_card'=>$rate_cards, 'rate_card_title'=> $rate_cards[0]->rate_card_title,'segments'=>$segments,'days_of_week' => $days_of_week,'days_of_weekends'=>$days_of_weekends,'w_segments'=>$w_segments]);
        }

//        $rate_cards = RateCards::whereMedia_house_id(auth()->user()->client_id)->whereRate_card_title_id(Input::get('rateCardTitleId'))->get();
//        $rate_cards_title = RateCardTitles::select('rate_card_title')->whereRate_card_title_id(Input::get('rateCardTitleId'))->first();
//      //  die($rate_cards);
//
//              $segments = $rate_cards[0]->segments;
//              $w_segments = $rate_cards[0]->weekend_segments;
//              $days_of_week = $rate_cards[0]->days_of_week;
//              $days_of_weekends = $rate_cards[0]->days_of_weekend;
//
//       return response()->json(['rate_card'=>$rate_cards, 'rate_card_title'=> $rate_cards_title,'segments'=>$segments,'days_of_week' => $days_of_week,'days_of_weekends'=>$days_of_weekends,'w_segments'=>$w_segments]);


    }
    elseif(auth()->user()->media == 'Print'){

        $rate_cards = PrintRateCard::whereMedia_house_id(auth()->user()->client_id)->whereRate_card_title_id(Input::get('rateCardTitleId'))->get();
        $print_segments = json_decode($rate_cards[0]->rate_card_data);
        $rate_cards_title = RateCardTitles::select('rate_card_title')->whereRate_card_title_id(Input::get('rateCardTitleId'))->get();

        return response()->json(['rate_card'=>$print_segments, 'rate_card_title'=> $rate_cards_title]);
    }
       

}

//view  selected rate card by login media
    public function  deleteRateCard(Request $request){

         if(auth()->user()->media !== 'Print')
         {
            RateCardTitles::whereRate_card_title_id($request->input('rateCardTitleId'))->delete();
            RateCards::whereMedia_house_id(auth()->user()->client_id)->whereRate_card_title_id($request->input('rateCardTitleId'))->delete();

        }
//        elseif(Auth::guard('admin')->check() && Auth::guard('admin')->admin_type == 'super_admin')
      else{

          RateCardTitles::whereRate_card_title_id($request->input('rateCardTitleId'))->delete();
          PrintRateCard::whereMedia_house_id(auth()->user()->client_id)->whereRate_card_title_id($request->input('rateCardTitleId'))->delete();
       // RateCards::whereMedia_house_id(Auth::guard('admin')->user()->media_house_id)->whereRate_card_title_id($request->input('rateCardTitleId'))->delete();
       // RateCardTitles::whereRate_card_title_id($request->input('rateCardTitleId'))->delete();

        }
             AdminAuditTrail::create(['action_by' => Auth::guard()->user()->name, 'activities' => "Deleted rate card with id  " . $request->input('rateCardTitleId')]);
             $request->session()->flash('delete', 'Rate card successfully deleted');
             return response()->json('success');


    }



}

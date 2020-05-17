<?php

namespace App\Http\Controllers;

use App\Models\ProgramTitle;
use App\Models\User;
use App\PrintRateCard;
use App\RateCards;
use App\RateCardTitles;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Illuminate\Support\Facades\Session;
use App\AdminAuditTrail;
use Illuminate\Support\Facades\Validator;

class RateCardController extends Controller
{

    public function index(Request $request)
    {

        if (request()->ajax()) {
            if(auth()->user()->media != 'Print'){
               $rate_cards  =  DB::table('rate_cards')
                ->join('rate_card_titles', 'rate_cards.rate_card_title_id', '=', 'rate_card_titles.rate_card_title_id')
                ->join('users', 'rate_cards.media_house_id', '=', 'users.client_id')
                ->select('rate_cards.*', 'rate_card_titles.rate_card_title', 'users.media_house')
                ->where('rate_card_titles.media_house_id', '=', auth()->user()->client_id)
                ->get();
            }
            else{
                $rate_cards  =  DB::table('print_rate_cards')
                ->join('rate_card_titles', 'print_rate_cards.rate_card_title_id', '=', 'rate_card_titles.rate_card_title_id')
                ->join('users', 'print_rate_cards.media_house_id', '=', 'users.client_id')
                ->select('print_rate_cards.*', 'rate_card_titles.rate_card_title', 'users.media_house')
                ->where('rate_card_titles.media_house_id', '=', auth()->user()->client_id)
                ->get();
            }
            


            return datatables()->of($rate_cards)
                ->addColumn('action', function ($row) {

                    //                    $btn =  '<a href="ratecard/'.$row->rate_card_id.'" data-toggle="tooltip"     data-id="'.$row->rate_card_id.'"
                    //                    data-original-title="view" class="edit btn btn-success btn-sm view-sub"><i class="fa fa-eye"></i></a>';
                    //                    return $btn;

                    $btn = '<div class="btn-group btn-group-sm"> ';
                    $btn = $btn .  '<button   data-id="' . $row->rate_card_title_id . '" title="View rate card" class="edit btn btn-info btn-sm viewRateCard" data-toggle="modal"><i class="fa fa-eye"></i></button>';
                    $btn = $btn . ' <button data-toggle="tooltip"  data-id="' . $row->rate_card_title_id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteRateCard"><i class="fa fa-trash"></i> </button>';
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

        $request->validate([
            'rateCardTitle' => 'required|unique:rate_card_titles,rate_card_title'
        ]);

        $unique_id = uniqid('K', true);
        if (RateCardTitles::where('rate_card_title_id', '=', $unique_id)) {
            $unique_id = uniqid('K', true);
        }


        RateCardTitles::create(['rate_card_title' => $request->input('rateCardTitle'), 'media_house_id' => Auth::guard()->user()->client_id, 'rate_card_title_id' => $unique_id, 'client_id' => Auth::guard()->user()->client_id]);

        $title = RateCardTitles::select('rate_card_title', 'rate_card_title_id')->where('media_house_id', Auth::guard()->user()->client_id)->where(function ($query) {
            $query->where('rate_card_title', Input::get('rateCardTitle'));
        })->get();




        AdminAuditTrail::create([
            'action_by' => auth()->user()->name, 'action' => 'Create rate title',
            'request_ip' => $_SERVER['REMOTE_ADDR'], 'activities' => "Created rate card title :" . $request->rateCardTitle, /* 'created_by' => auth()->user()->client_id */
        ]);


        $r_title = null;
        $_r_id = null;
        if ($title) {
            foreach ($title as $title) {
                $r_title = $title->rate_card_title;
                $_r_id = $title->rate_card_title_id;
            }

            session(['card_title' => $r_title, 'rate_card_title_id' => $_r_id, 'media' => auth()->user()->media]);

            return Redirect::route('create.rate.cards');
        }
    }


    public function showRateCardDetails($id)
    {
        return view('userDashboard.viewRateCardDetails');
    }

    public  function storeRateCards(Request $request)
    {
       /*  return $request->all(); */
       

        $unique_id = uniqid('K', true);
        if (PrintRateCard::where('rate_card_id', '=', $unique_id)) {
            $unique_id = uniqid('K', true);
        }

        if (auth()->user()->media == 'Print') {

            $rate_cards = PrintRateCard::create(['rate_card_title_id' => $request->input('rate_card_title_id'), 'rate_card_id' => $unique_id, 'rate_card_data' => $request->input('rateCardData'), 'media_house_id' => auth()->user()->created_by]);
        } else {

            $rate_cards = RateCards::create([
                'rate_card_id' => $unique_id, 'rate_card_title_id' => $request->input('rate_card_title_id'), 'client_id' => auth()->user()->client_id,
                'media_house_id' => auth()->user()->client_id, 'days_of_week' => $request->input('mons_to_fridays'),
                'segments' => json_decode($request->input('weekdays')), 'days_of_weekend' => $request->input('sat_to_sun'),
                'weekend_segments' => json_decode($request->input('weekends'))
            ]);
        }
        // AdminAuditTrail::create([
        //     'action_by' => auth()->user()->name, 'action' => 'Create ratecard ',
        //     'request_ip' => $_SERVER['REMOTE_ADDR'], 'activities' => "Admin " . $request->name . "created rate :" .$request->input('rate_card_title_id'), 'created_by' => auth()->user()->client_id
        // ]);
        return response()->json('success');
    }


    // fetch rate cards for login media

    public function fetchRateCards()
    {
         if(auth()->user()->media != 'Print'){
$rateCards  = DB::table('rate_card_titles')
            ->join('rate_cards', 'rate_card_titles.rate_card_title_id', '=', 'rate_cards.rate_card_title_id')
            ->select('rate_card_titles.*')
            ->where('rate_card_titles.media_house_id', '=', auth()->user()
                ->client_id)->where('rate_cards.media_house_id', '=', auth()->user()->client_id)
            ->latest()->paginate(10);     //whereRate_card_title_id(Input::get('rateCardTitleId'))->g;

        return response()->json($rateCards);
         }
         else{
             $rateCards  = DB::table('rate_card_titles')
            ->join('rate_cards', 'rate_card_titles.rate_card_title_id', '=', 'print_rate_cards.rate_card_title_id')
            ->select('rate_card_titles.*')
            ->where('rate_card_titles.media_house_id', '=', auth()->user()
                ->client_id)->where('print_rate_cards.media_house_id', '=', auth()->user()->client_id)
            ->latest()->paginate(10);     //whereRate_card_title_id(Input::get('rateCardTitleId'))->g;
          print_r($rateCard);
        return response()->json($rateCards);

         }
        
    }

    // get media house name and display in rate cards table
    public function getMediaHouse()
    {
        $media_house = auth()->user()->media_house;
        return response()->json($media_house);
    }

    //view  selected rate card by login media
    public function  viewRateCard(Request $request)
    {

        if (auth()->user()->media != 'Print') {
            $rate_cards  = DB::table('rate_card_titles')
                ->join('rate_cards', 'rate_card_titles.rate_card_title_id', '=', 'rate_cards.rate_card_title_id')
                ->select('rate_card_titles.rate_card_title', 'rate_cards.*')
                ->where('rate_cards.media_house_id', '=', auth()->user()->client_id)->where('rate_card_titles.rate_card_title_id', '=', Input::get('rateCardTitleId'))->get();     //whereRate_card_title_id(Input::get('rateCardTitleId'))->get();

            if ($rate_cards) {
                $segments = $rate_cards[0]->segments;
                $w_segments = json_decode($rate_cards[0]->weekend_segments);
                $days_of_week = json_decode($rate_cards[0]->days_of_week);
                $days_of_weekends = $rate_cards[0]->days_of_weekend;
                return response()->json(['rate_card' => $rate_cards, 'rate_card_title' => $rate_cards[0]->rate_card_title, 'segments' => $segments, 'days_of_week' => $days_of_week, 'days_of_weekends' => $days_of_weekends, 'w_segments' => $w_segments]);
            }
        } else{
            $rate_cards = PrintRateCard::whereMediaHouseId(auth()->user()->created_by)->whereRateCardTitleId(Input::get('rateCardTitleId'))->get();
            $print_segments = json_decode($rate_cards[0]->rate_card_data);
            $rate_cards_title = RateCardTitles::select('rate_card_title')->whereRate_card_title_id(Input::get('rateCardTitleId'))->get();
            return response()->json(['rate_card' => $print_segments, 'rate_card_title' => $rate_cards_title]);
        }
    }

    //view  selected rate card by login media
    public function  deleteRateCard(Request $request)
    {

        if (auth()->user()->media !== 'Print') {
            RateCardTitles::whereRate_card_title_id($request->input('rateCardTitleId'))->delete();
            RateCards::whereMedia_house_id(auth()->user()->created_by)->whereRate_card_title_id($request->input('rateCardTitleId'))->delete();
        }
        //        elseif(Auth::guard('admin')->check() && Auth::guard('admin')->admin_type == 'super_admin')
        else {

            RateCardTitles::whereRate_card_title_id($request->input('rateCardTitleId'))->delete();
            PrintRateCard::whereMedia_house_id(auth()->user()->created_by)->whereRate_card_title_id($request->input('rateCardTitleId'))->delete();
        }
        // AdminAuditTrail::create([
        //     'action_by' => auth()->user()->name, 'action' => 'Deleted ratecard',
        //     'request_ip' => $_SERVER['REMOTE_ADDR'], 'activities' => "Admin " . $request->name . " deleted rate card with id :'.$request->input('rateCardTIleId'", 'created_by' => auth()->user()->client_id
        // ]);
        // AdminAuditTrail::create(['action_by' => auth()->user()->name, 'activities' => "Deleted rate card with id  " . $request->input('rateCardTitleId')]);
        $request->session()->flash('delete-ratecard', 'Rate card successfully deleted');
        return response()->json('success');
    }
}
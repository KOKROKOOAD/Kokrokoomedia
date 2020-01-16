<?php

namespace App\Http\Controllers;

use App\Transactions;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

  public function  payment(Request $request){

      $client = new Client();

      $network = $request->input('network');
      $phoneNumber = $request->input('phone');
      $transaction_id =  uniqid('k', true);
      $amount = $request->input('amount');
      $invoice_id = $request->input('invoice_id');
      $subscription_id = $request->input('subscription_id');
      $client_id = auth()->user()->client_id;
      $media_house_id = $request->input('media_house_id');
      $service = $request->input('service');
      $amount_charge =  '10';



      $key = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
      $secrete = md5(env('MERCHANT_USERNAME'). $key . md5(env('MERCHANT_PASSWORD')));
      $formData = array(
          'merchant_id' => env('MERCHANT_ID'),
          'secret' => $secrete,
          'key'    => $key,
          'callback' =>  env('PAYCALL_BACK'),
          'order_id' => $transaction_id,
          'amount' => $amount,
          'item_desc' => env('ITEM_DESC').auth()->user()->client_id.''.date('Y-m-d H:i:s'),
          'customerNumber' => $phoneNumber,
          'payby' => $network,
          'customerName' => auth()->user()->client_id
      );

//      $res = $client->request('POST', 'http://213.133.97.233/payplus/api/index.php', [
//          'form_params' => $formData
//
//      ]);
              //$res->getStatusCode();
      // 200
             // $res->getHeader('content-type');
      // 'application/json; charset=utf8'
             // $res->getBody();
      $success = 'failed';
               if($phoneNumber){
                   $success = 'success';
                   $transac = Transactions::create([
                       'phone' => $phoneNumber,
                       'payment_source' => $network,
                       'transaction_id' => $transaction_id,
                       'media_house_id' => $media_house_id,
                       'amount' => $amount,
                       'invoice_id' => $invoice_id,
                       'client_id' => $client_id,
                       'subscription_id' => $subscription_id,
                       'service' => $service,
                       'transaction_status' => $success,
                       'total_charge' => $amount_charge

                   ]);
                   if ($transac){
                       return response()->json('success');

                   }
                   else{
                       return response()->json('error');
                   }


               }
               else{
                   return response()->json('failed');
               }
}


}

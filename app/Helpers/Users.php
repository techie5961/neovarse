<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function CheckPackage(){
 
  return null;
    
}
function Currency($user_id,$nation=null){
  if($nation == null){
 $country=DB::table('users')->where('id',$user_id)->first()->country;
  }else{
     $country=$nation;
  }
 
  switch($country){
    case 'ghana':
      $currency = 'GHC';
      break;
    case 'cameroon':
      $currency='XAF';
      break;
    default:
    $currency='NGN';
  }
  return $currency;
}



function ConvertCurrency($amount, $from, $to) {
    // define supported currencies and their codes
    $rates = [
        'NIGERIA' => 1.0,      // Nigerian Naira as base
        'GHANA' => 0.007,    // 1 NGN ≈ 0.007 GHS as per recent rate :contentReference[oaicite:0]{index=0}
        'CAMEROON' => 0.38      // 1 NGN ≈ 0.38 XAF as per recent rate :contentReference[oaicite:1]{index=1}
    ];

    $from = strtoupper($from);
    $to   = strtoupper($to);

    if (!isset($rates[$from]) || !isset($rates[$to])) {
        throw new Exception("Currency not supported: from={$from}, to={$to}");
    }

    // convert amount from “from” currency into base (NGN), then to “to” currency
    $amountInBase = $amount / $rates[$from];
    $converted    = $amountInBase * $rates[$to];

    return $converted;
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use PDO;

class UsersGetRequestController extends Controller
{
    // claim task reward
    public function ClaimTaskReward(){
        $task=DB::table('tasks')->where('id',request('id'))->first();
         $package=DB::table('packages')->where('id',json_decode(Auth::guard('users')->user()->package)->id)->first() ?? json_decode(Auth::guard('users')->user()->package);
        $task->reward=$package->earning_per_click;
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'activities_balance' => DB::raw('activities_balance + '.$task->reward.''),
            'updated' => Carbon::now()
        ]);
        DB::table('transactions')->insert([
             'uniqid' => strtoupper(uniqid('trx')),
            'user_id' => Auth::guard('users')->user()->id,
            'type' => 'Task Reward',
            'class' => 'credit',
            'amount' => $task->reward,
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M208,32H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32Zm-12.69,88L136,60.69V48h12.69L208,107.32V120ZM136,83.31,172.69,120H136Zm72,1.38L171.31,48H208ZM120,48v72H48V48ZM107.31,208,48,148.69V136H60.69L120,195.31V208ZM120,172.69,83.31,136H120Zm-72-1.38L84.69,208H48ZM208,208H136V136h72v72Z"></path></svg>',
            'json' => json_encode([
                'data' => $task,
                'wallet' => 'activities_balance'
            ]),
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        DB::table('task_proofs')->insert([
            'user_id' => Auth::Guard('users')->user()->id,
            'task_id' => $task->id,
            'json' => json_encode($task),
            'uniqid' => strtoupper(uniqid('PRF')),
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        DB::table('tasks')->where('id',request()->input('id'))->update([
            'completed' => DB::raw('`completed` + 1'),
            'status' => DB::raw('CASE WHEN `completed` + 1 >= `limit` THEN "completed" ELSE "active" END')
        ]);
        DB::table('notifications')->insert([
        'message' => '<strong class="font-1 c-green">'.Auth::guard('users')->user()->username.'</strong> Just performed a task',
        'status' => 'unread',
        'date' => Carbon::now(),
        'updated' => Carbon::now()
       ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Task completed and reward granted',
        
        ]);


    }
   
    //  bank auto verify
    public function BankAutoVerify(){
        //  return response()->json([
        //     'message' => 'David James',
        //     'status' => 'success'
        //   ]);
        $verify=Http::withToken(env('PSTCK_SECRET_KEY'))->get('https://api.paystack.co/bank/resolve',[
            'account_number' => request()->input('account_number'),
            'bank_code' => request()->input('bank_code')
        ]);
        if($verify->successful()){
            $data=$verify->json();
          return response()->json([
            'message' => $data['data']['account_name'],
            'status' => 'success'
          ]);
          
        }else{
            return response()->json([
                'message' => 'Invalid account details',
                'status' => 'error'
            ]);
        }
    }
    // vote article
    public function VoteArticle(){
        if(DB::table('article_votes')->where('article_id',request()->input('id'))->where('user_id',Auth::guard('users')->user()->id)->exists()){
            DB::table('article_votes')->where('user_id',Auth::guard('users')->user()->id)->where('article_id',request()->input('id'))->delete();
            DB::table('articles')->where('id',request()->input('id'))->update([
                'votes' => DB::raw('votes - 1')
            ]);
            return response()->json([
                'message' => number_format(DB::table('articles')->where('id',request()->input('id'))->first()->votes),
                'status' => 'success',
                'class' => '.votes-'.request()->input('id').'',
                'type' => 'unvoted',
                'svg_class' => '.svg-'.request()->input('id').''
            ]);
        }else{
            DB::table('article_votes')->insert([
                'user_id' => Auth::guard('users')->user()->id,
                'article_id' => request()->input('id'),
                'updated' => Carbon::now(),
                'date' => Carbon::now()
            ]);
            DB::table('articles')->where('id',request()->input('id'))->update([
                'votes' => DB::raw('votes + 1')
            ]);
            return response()->json([
                'message' => number_format(DB::table('articles')->where('id',request()->input('id'))->first()->votes),
                'status' => 'success',
                'class' => '.votes-'.request()->input('id').'',
                'type' => 'voted',
                'svg_class' => '.svg-'.request()->input('id').''
            ]);

        }
    }
    // airtime topup
    public function AirtimeTopup(){
        $settings=json_decode(DB::table('settings')->where('key','finance_settings')->first()->json);
        if($settings->vtu->airtime == 'closed'){
            return response()->json([
                'message' => 'Airtime portal is currently closed',
                'status' => 'error'
            ]);
        }
        
        $networks=[
            'mtn' => '01',
            'airtel' => '04',
            'globacom' => '02',
            '9mobile' => '03'
        ];
        $plans=[
            '50' => '50',
            '1000' => '10000',
            '2000' => '2000',
            '3000' => '3000',
            '4000' => '4000',
            '5000' => '5000',
            '6000' => '6000'
        ];
          if(Auth::guard('users')->user()->activities_balance < $plans[request()->input('amount')]){
            return response()->json([
                'message' => 'Insufficient funds in  your  Activities balance',
                'status' => 'error'
            ]);
        }
        $response=Http::withToken(env('CKONNECT_API_KEY'))->get('https://nellobytesystems.com/APIAirtimeV1.asp',[
            'UserID' => env('CKONNECT_USER_ID'),
            'APIKey' => env('CKONNECT_API_KEY'),
            'MobileNetwork' => $networks[strtolower(request()->input('network'))],
            'Amount' => request()->input('amount'),
            'MobileNumber' => request()->input('number'),
            'RequestID' => strtoupper(uniqid('VTU')),
            'CallBackURL' => url('users/get/airtime/topup/complete')
        ]);
       $json=json_decode(json_encode($response->json()));

       if($json->status = 'ORDER_RECEIVED'){
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'activities_balance' => DB::raw('activities_balance - '.$plans[request()->input('amount')].'')
        ]);
          DB::table('transactions')->insert([
             'uniqid' => strtoupper(uniqid('trx')),
            'user_id' => Auth::guard('users')->user()->id,
            'type' => 'Airtime Topup',
            'class' => 'debit',
            'amount' => request()->input('amount'),
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M176,16H80A24,24,0,0,0,56,40V216a24,24,0,0,0,24,24h96a24,24,0,0,0,24-24V40A24,24,0,0,0,176,16ZM72,64H184V192H72Zm8-32h96a8,8,0,0,1,8,8v8H72V40A8,8,0,0,1,80,32Zm96,192H80a8,8,0,0,1-8-8v-8H184v8A8,8,0,0,1,176,224Z"></path></svg>',
            'json' => json_encode([
                'data' => json_encode($json),
                'wallet' => 'activities_wallet',
                'body' => [
                    'number' => request()->input('number'),
                    'network' => request()->input('network'),
                    'amount' => request()->input('amount')
                ]
            ]),
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Airtime Topup successfull',
            'status' => 'success',
            'url' => url('users/transactions')
        ]);
       }else{
       // return $json->status;
        return response()->json([
            'message' => 'Internal server error,please try again later',
            'status' => 'error'
        ]);
       }

       
    }
    // data topup
    public function DataTopup(){
        $settings=json_decode(DB::table('settings')->where('key','finance_settings')->first()->json);
        if($settings->vtu->data == 'closed'){
            return response()->json([
                'message' => 'Airtime portal is currently closed',
                'status' => 'error'
            ]);
        }
        
        $networks=[
            'mtn' => '01',
            'airtel' => '04',
            'globacom' => '02',
            '9mobile' => '03'
        ];
        $plans=[
            '50' => '50',
            '1000' => '10000',
            '2000' => '2000',
            '3000' => '3000',
            '4000' => '4000',
            '5000' => '5000',
            '6000' => '6000'
        ];
        if(strtolower(request()->input('network')) == 'mtn'){
            $data_plans=[
                '1000' => '1000.0',
                '2000' => '2000.0',
                '3000' => '3000.0',
                '5000' => '5000.0'
            ];

        }
          if(strtolower(request()->input('network')) == 'glo'){
            $data_plans=[
                '1000' => '1000.11',
                '2000' => '2000',
                '3000' => '3000.12',
                '5000' => '5000.11',
                '6000' => '1500.02'
            ];

        }
        if(strtolower(request()->input('network')) == 'airtel'){
            $data_plans=[
                '1000' => '499.91',
                '2000' => '749.91',
                '3000' => '999.91',
                '5000' => '1499.91',
                '6000' => '2499.91'
            ];

        }
        if(strtolower(request()->input('network')) == '9mobile'){
            $data_plans=[
                '1000' => '1000.01',
                '2000' => '2000.01',
                '3000' => '3000.01',
                '5000' => '4000.01',
                '6000' => '5000.01'
            ];

        }
        if(Auth::guard('users')->user()->activities_balance < $plans[request()->input('amount')]){
            return response()->json([
                'message' => 'Insufficient funds in  your  Activities balance',
                'status' => 'error'
            ]);
        }
       $plan=$data_plans[strtolower(request()->input('amount'))] ?? '';
       if($plan == ''){
        return response()->json([
            'message' => 'This data plan is currently unavailable,please select another plan',
            'status' => 'error'
        ]);
       }
      

      
        $response=Http::withToken(env('CKONNECT_API_KEY'))->get('https://nellobytesystems.com/APIDatabundleV1.asp',[
            'UserID' => env('CKONNECT_USER_ID'),
            'APIKey' => env('CKONNECT_API_KEY'),
            'MobileNetwork' => $networks[strtolower(request()->input('network'))],
            'DataPlan' => $plan,
            'MobileNumber' => request()->input('number'),
            'RequestID' => strtoupper(uniqid('VTU')),
            'CallBackURL' => url('users/get/airtime/topup/complete')
        ]);
       $json=json_decode(json_encode($response->json()));

       if($json->status = 'ORDER_RECEIVED'){
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'activities_balance' => DB::raw('activities_balance - '.$plans[request()->input('amount')].'')
        ]);
          DB::table('transactions')->insert([
             'uniqid' => strtoupper(uniqid('trx')),
            'user_id' => Auth::guard('users')->user()->id,
            'type' => 'Data Bundle',
            'class' => 'debit',
            'amount' => request()->input('amount'),
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M135.16,84.42a8,8,0,0,0-14.32,0l-72,144a8,8,0,0,0,14.31,7.16L77,208h102.1l13.79,27.58A8,8,0,0,0,200,240a8,8,0,0,0,7.15-11.58ZM128,105.89,155.06,160H100.94ZM85,192l8-16h70.1l8,16Zm74.54-98.26a32,32,0,1,0-63,0,8,8,0,1,1-15.74,2.85,48,48,0,1,1,94.46,0,8,8,0,0,1-7.86,6.58,8.74,8.74,0,0,1-1.43-.13A8,8,0,0,1,159.49,93.74ZM64.15,136.21a80,80,0,1,1,127.7,0,8,8,0,0,1-12.76-9.65,64,64,0,1,0-102.18,0,8,8,0,0,1-12.76,9.65Z"></path></svg>',
            'json' => json_encode([
                'data' => json_encode($json),
                'wallet' => 'activities_wallet',
                'body' => [
                    'number' => request()->input('number'),
                    'network' => request()->input('network'),
                    'amount' => request()->input('amount')
                ]
            ]),
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Data Bundle purchase successfull',
            'status' => 'success',
            'url' => url('users/transactions')
        ]);
       }else{
      //  return $json->status;
        return response()->json([
            'message' => 'Internal server error,please try again later',
            'status' => 'error'
        ]);
       }

       
    }
    
    // color game 
    public function ColorGame(){
        $min=ConvertCurrency(500,'NIGERIA',strtoupper(Auth::guard('users')->user()->country));
        if(request()->input('amount') < $min){
            response()->json([
                'message' => 'Minimum stake amount is '.Currency(Auth::guard('users')->user()->id).''.number_format($min,2).'',
                'status' => 'error'
            ]);
        }
        if(request('amount') > Auth::guard('users')->user()->deposit_balance){
            return response()->json([
                'message' => 'Insufficient games balance',
                'status' => 'error'
            ]);
        }
      $colors=[
        ['red','white'],
        ['green','white'],
        ['blue','white'],
        ['white','black'],
      
      ];
     $i=rand(0,(count($colors) - 1));
    $color=$colors[$i];
    // debit games wallet 
    DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
        'deposit_balance' => DB::raw('deposit_balance - '.request()->input('amount').''),
       
    ]);
      DB::table('transactions')->insert([
             'uniqid' => strtoupper(uniqid('trx')),
            'user_id' => Auth::guard('users')->user()->id,
            'type' => 'Color Game Stake',
            'class' => 'debit',
            'amount' => request()->input('amount'),
            'svg' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M10.6669 6.13443L10.165 5.77922C9.44862 5.27225 8.59264 5 7.71504 5H7.10257C6.69838 5 6.29009 5.02549 5.90915 5.16059C3.52645 6.00566 1.88749 9.09504 2.00604 16.1026C2.02992 17.5145 2.3603 19.075 3.63423 19.6842C4.03121 19.8741 4.49667 20 5.02671 20C5.66273 20 6.1678 19.8187 6.55763 19.5632C6.96641 19.2953 7.32633 18.9471 7.68612 18.599C8.13071 18.1688 8.57511 17.7389 9.11125 17.4609C9.69519 17.1581 10.3434 17 11.0011 17H12.9989C13.6566 17 14.3048 17.1581 14.8888 17.4609C15.4249 17.7389 15.8693 18.1688 16.3139 18.599C16.6737 18.9471 17.0336 19.2953 17.4424 19.5632C17.8322 19.8187 18.3373 20 18.9733 20C19.5033 20 19.9688 19.8741 20.3658 19.6842C21.6397 19.075 21.9701 17.5145 21.994 16.1026C22.1125 9.09503 20.4735 6.00566 18.0908 5.16059C17.7099 5.02549 17.3016 5 16.8974 5H16.2849C15.4074 5 14.5514 5.27225 13.8351 5.77922L13.3332 6.13441C12.9434 6.41029 12.4776 6.55844 12 6.55844C11.5225 6.55844 11.0567 6.41029 10.6669 6.13443ZM16.75 9C17.1642 9 17.5 9.33579 17.5 9.75C17.5 10.1642 17.1642 10.5 16.75 10.5C16.3358 10.5 16 10.1642 16 9.75C16 9.33579 16.3358 9 16.75 9ZM7.5 9.25C7.91421 9.25 8.25 9.58579 8.25 10V10.75H9C9.41421 10.75 9.75 11.0858 9.75 11.5C9.75 11.9142 9.41421 12.25 9 12.25H8.25V13C8.25 13.4142 7.91421 13.75 7.5 13.75C7.08579 13.75 6.75 13.4142 6.75 13V12.25H6C5.58579 12.25 5.25 11.9142 5.25 11.5C5.25 11.0858 5.58579 10.75 6 10.75H6.75V10C6.75 9.58579 7.08579 9.25 7.5 9.25ZM19 11.25C19 11.6642 18.6642 12 18.25 12C17.8358 12 17.5 11.6642 17.5 11.25C17.5 10.8358 17.8358 10.5 18.25 10.5C18.6642 10.5 19 10.8358 19 11.25ZM15.25 12C15.6642 12 16 11.6642 16 11.25C16 10.8358 15.6642 10.5 15.25 10.5C14.8358 10.5 14.5 10.8358 14.5 11.25C14.5 11.6642 14.8358 12 15.25 12ZM17.5 12.75C17.5 12.3358 17.1642 12 16.75 12C16.3358 12 16 12.3358 16 12.75C16 13.1642 16.3358 13.5 16.75 13.5C17.1642 13.5 17.5 13.1642 17.5 12.75Z" fill="CurrentColor"></path>
</svg>
',
            'json' => json_encode([
                
                'wallet' => 'deposit_wallet'
            ]),
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
    if(request('color') == $color[0]){
        $winning=((40*request()->input('amount'))/100) + request()->input('amount');
        // credit activities wallet 
    DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
        'deposit_balance' => DB::raw('deposit_balance + '.$winning.''),
       
    ]);
      DB::table('transactions')->insert([
             'uniqid' => strtoupper(uniqid('trx')),
            'user_id' => Auth::guard('users')->user()->id,
            'type' => 'Color Game Winning',
            'class' => 'credit',
            'amount' => $winning,
            'svg' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M10.6669 6.13443L10.165 5.77922C9.44862 5.27225 8.59264 5 7.71504 5H7.10257C6.69838 5 6.29009 5.02549 5.90915 5.16059C3.52645 6.00566 1.88749 9.09504 2.00604 16.1026C2.02992 17.5145 2.3603 19.075 3.63423 19.6842C4.03121 19.8741 4.49667 20 5.02671 20C5.66273 20 6.1678 19.8187 6.55763 19.5632C6.96641 19.2953 7.32633 18.9471 7.68612 18.599C8.13071 18.1688 8.57511 17.7389 9.11125 17.4609C9.69519 17.1581 10.3434 17 11.0011 17H12.9989C13.6566 17 14.3048 17.1581 14.8888 17.4609C15.4249 17.7389 15.8693 18.1688 16.3139 18.599C16.6737 18.9471 17.0336 19.2953 17.4424 19.5632C17.8322 19.8187 18.3373 20 18.9733 20C19.5033 20 19.9688 19.8741 20.3658 19.6842C21.6397 19.075 21.9701 17.5145 21.994 16.1026C22.1125 9.09503 20.4735 6.00566 18.0908 5.16059C17.7099 5.02549 17.3016 5 16.8974 5H16.2849C15.4074 5 14.5514 5.27225 13.8351 5.77922L13.3332 6.13441C12.9434 6.41029 12.4776 6.55844 12 6.55844C11.5225 6.55844 11.0567 6.41029 10.6669 6.13443ZM16.75 9C17.1642 9 17.5 9.33579 17.5 9.75C17.5 10.1642 17.1642 10.5 16.75 10.5C16.3358 10.5 16 10.1642 16 9.75C16 9.33579 16.3358 9 16.75 9ZM7.5 9.25C7.91421 9.25 8.25 9.58579 8.25 10V10.75H9C9.41421 10.75 9.75 11.0858 9.75 11.5C9.75 11.9142 9.41421 12.25 9 12.25H8.25V13C8.25 13.4142 7.91421 13.75 7.5 13.75C7.08579 13.75 6.75 13.4142 6.75 13V12.25H6C5.58579 12.25 5.25 11.9142 5.25 11.5C5.25 11.0858 5.58579 10.75 6 10.75H6.75V10C6.75 9.58579 7.08579 9.25 7.5 9.25ZM19 11.25C19 11.6642 18.6642 12 18.25 12C17.8358 12 17.5 11.6642 17.5 11.25C17.5 10.8358 17.8358 10.5 18.25 10.5C18.6642 10.5 19 10.8358 19 11.25ZM15.25 12C15.6642 12 16 11.6642 16 11.25C16 10.8358 15.6642 10.5 15.25 10.5C14.8358 10.5 14.5 10.8358 14.5 11.25C14.5 11.6642 14.8358 12 15.25 12ZM17.5 12.75C17.5 12.3358 17.1642 12 16.75 12C16.3358 12 16 12.3358 16 12.75C16 13.1642 16.3358 13.5 16.75 13.5C17.1642 13.5 17.5 13.1642 17.5 12.75Z" fill="CurrentColor"></path>
</svg>
',
            'json' => json_encode([
                
                'wallet' => 'deposit_wallet'
            ]),
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
    // insert into games db 
    DB::table('games')->insert([
        'name' => 'color game',
        'stake' => request()->input('amount'),
        'win' => $winning,
        'json' => json_encode([
            'choice' => $color[0],
            'outcome' => request()->input('color')
        ]),
        'status' => 'win',
        'updated' => Carbon::now(),
        'date' => Carbon::now(),
        'user_id' => Auth::guard('users')->user()->id
    ]);
    $index=rand(0,(count($colors) - 1));
    return response()->json([
        'balance' => number_format(DB::table('users')->where('id',Auth::guard('users')->user()->id)->first()->deposit_balance,2),
        'message' => 'Congratulations,you won and your games wallet has been creditted with &#8358;'.number_format($winning,2).'',
        'status' => 'success',
        'color' => $colors[$index][0],
        'text_color' => $colors[$index][1],
        'choice' =>  $color[0],
        'choice_text' =>  $color[1]
    ]);
    }else{
          $winning=0;
       
    // insert into games db 
    DB::table('games')->insert([
        'name' => 'color game',
        'stake' => request()->input('amount'),
        'win' => $winning,
        'json' => json_encode([
            'choice' => $color[0],
            'outcome' => request()->input('color')
        ]),
        'status' => 'lost',
        'updated' => Carbon::now(),
        'date' => Carbon::now(),
        'user_id' => Auth::guard('users')->user()->id
    ]);
      $index=rand(0,(count($colors) - 1));
    return response()->json([
         'balance' => number_format(DB::table('users')->where('id',Auth::guard('users')->user()->id)->first()->deposit_balance,2),
        'message' => 'Oops you lost this time,try again',
        'status' => 'success',
        'color' => $colors[$index][0],
        'text_color' => $colors[$index][1],
        'choice' =>  $color[0],
        'choice_text' =>  $color[1]
    ]);
    }
    }
     // streamed
    public function Streamed(){
       DB::table('streams')->insert([
        'song' => json_encode(DB::table('songs')->where('id',request('song_id'))->first()),
        'user_id' => Auth::guard('users')->user()->id,
        'status' => 'success',
        'updated' => Carbon::now(),
        'date' => Carbon::now()
       ]);
    }
    // site mode
    public function SiteMode(){
     Session::put('mode_link',request('link'));
     return response(request('link'));
    }

    // game update
    public function GameUpdate(){
        if(request('score') >= config('settings.game_high_score')){
            DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
                'gaming_balance' => DB::raw('gaming_balance + '.config('settings.game_win').''),
                'updated' => Carbon::now()
            ]);
             DB::table('transactions')->insert([
             'uniqid' => strtoupper(uniqid('trx')),
            'user_id' => Auth::guard('users')->user()->id,
            'type' => 'Poll Game Winning',
            'class' => 'credit',
            'amount' => config('settings.game_win'),
            'svg' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M10.6669 6.13443L10.165 5.77922C9.44862 5.27225 8.59264 5 7.71504 5H7.10257C6.69838 5 6.29009 5.02549 5.90915 5.16059C3.52645 6.00566 1.88749 9.09504 2.00604 16.1026C2.02992 17.5145 2.3603 19.075 3.63423 19.6842C4.03121 19.8741 4.49667 20 5.02671 20C5.66273 20 6.1678 19.8187 6.55763 19.5632C6.96641 19.2953 7.32633 18.9471 7.68612 18.599C8.13071 18.1688 8.57511 17.7389 9.11125 17.4609C9.69519 17.1581 10.3434 17 11.0011 17H12.9989C13.6566 17 14.3048 17.1581 14.8888 17.4609C15.4249 17.7389 15.8693 18.1688 16.3139 18.599C16.6737 18.9471 17.0336 19.2953 17.4424 19.5632C17.8322 19.8187 18.3373 20 18.9733 20C19.5033 20 19.9688 19.8741 20.3658 19.6842C21.6397 19.075 21.9701 17.5145 21.994 16.1026C22.1125 9.09503 20.4735 6.00566 18.0908 5.16059C17.7099 5.02549 17.3016 5 16.8974 5H16.2849C15.4074 5 14.5514 5.27225 13.8351 5.77922L13.3332 6.13441C12.9434 6.41029 12.4776 6.55844 12 6.55844C11.5225 6.55844 11.0567 6.41029 10.6669 6.13443ZM16.75 9C17.1642 9 17.5 9.33579 17.5 9.75C17.5 10.1642 17.1642 10.5 16.75 10.5C16.3358 10.5 16 10.1642 16 9.75C16 9.33579 16.3358 9 16.75 9ZM7.5 9.25C7.91421 9.25 8.25 9.58579 8.25 10V10.75H9C9.41421 10.75 9.75 11.0858 9.75 11.5C9.75 11.9142 9.41421 12.25 9 12.25H8.25V13C8.25 13.4142 7.91421 13.75 7.5 13.75C7.08579 13.75 6.75 13.4142 6.75 13V12.25H6C5.58579 12.25 5.25 11.9142 5.25 11.5C5.25 11.0858 5.58579 10.75 6 10.75H6.75V10C6.75 9.58579 7.08579 9.25 7.5 9.25ZM19 11.25C19 11.6642 18.6642 12 18.25 12C17.8358 12 17.5 11.6642 17.5 11.25C17.5 10.8358 17.8358 10.5 18.25 10.5C18.6642 10.5 19 10.8358 19 11.25ZM15.25 12C15.6642 12 16 11.6642 16 11.25C16 10.8358 15.6642 10.5 15.25 10.5C14.8358 10.5 14.5 10.8358 14.5 11.25C14.5 11.6642 14.8358 12 15.25 12ZM17.5 12.75C17.5 12.3358 17.1642 12 16.75 12C16.3358 12 16 12.3358 16 12.75C16 13.1642 16.3358 13.5 16.75 13.5C17.1642 13.5 17.5 13.1642 17.5 12.75Z" fill="CurrentColor"></path>
</svg>
',
            'json' => json_encode([
                
                'wallet' => 'gaming_wallet'
            ]),
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        }
        
    }
    // debit for game
    public function DebitForGame(){
        if(Auth::guard('users')->user()->gaming_balance < config('settings.game_deposit')){
            return response()->json([
                'message' => 'Insufficient gaming balance,kindly fund your gaming balance to continue playing',
                'status' => 'error'
            ]);

        }
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'gaming_balance' => DB::raw('gaming_balance - '.config('settings.game_deposit').''),
            'updated' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'success',
            'status' => 'success'
        ]);

    }

    // neo chat
    public function NeoChat(){
        $message=request('message');
        $uniqid=uniqid();
       DB::table('chats')->insert([
            'uniqid' => $uniqid,
            'user_id' => Auth::guard('users')->user()->id,
            'raw_message' => request('raw_message'),
            'message' => $message,
            'role' => 'user',
            'rewarded' => null,
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
       ]);
       $chats=DB::table('chats')->where('user_id',Auth::guard('users')->user()->id)->orderBy('date','desc')->limit(20)->get()->sortBy('date');
       $messages=[];
       $messages[]=[
            'role' => 'user',
            'content' => 'Username:'.Auth::guard('users')->user()->username.', Name:'.Auth::guard('users')->user()->name.', Phone:'.Auth::guard('users')->user()->phone.''
       ];
        $messages[]=[
            'role' => 'assistant',
            'content' => 'Neovarse is a legit platform.Neovarse is a next-generation digital ecosystem powered by artifial intelligence. It offers users the opportunity to aquire practical skills, interact with intelligent tools, and earn tangible rewards on a daily basis.AI Leaning
interactive AI-powered learning system that adapts to your growth journey.
Earn Daily Rewards
Complete structure micro-tasks and earn consistent daily rewards.
Smart Technology
Built with modern technology for seamless user experience.
Ethical growth
Tech-based and structured environment for responsive digital earning.Introducing Neo-Chat Feature
Imagine being paid for what you do daily.With Neo-Chat,Every 60 seconds of chatting with our smart AI return rewards in cash.

Introducing Neo-Skill Feature
Earn from daily online skills session ranging from web develpment,forex trading,graphic designs copywriting etc and also gain practical knowledge

Start Earning from YouTube — Even as a Beginner
Turn your ideas into income with a simple step-by-step system. From creating your channel to growing views and cashing out in dollars — we guide you all the way.

Play Games. Earn Real Money.
Enjoy your favorite games like Ludo, Candy Crush, and more — and get paid while having fun. Withdraw directly to your bank account anytime.

Get Up to $12 Gift Card Instantly 🎁
Join NeoVarse today and enjoy unlimited rebates from clients.Trade your gift cards easily after claiming them — fast, simple, and secure.

'
       ];
       $messages[]=[
            'role' => 'user',
            'content' => 'Neovarse is a very legit platform,100% real,legit and transparent'
       ];
       if($chats->isNotEmpty()){
        foreach($chats as $chat){
            $messages[] = [
                'role' => $chat->role,
                'content' => $chat->message
            ];
        }
       }else{
        $messages[]=[
            'role' => 'user',
            'content' => $message
        ];
       }
        $response=Http::withToken(env('GROK_API_KEY'))->withHeaders([
            'Content-Type' => 'application/json'
        ])->post('https://api.groq.com/openai/v1/chat/completions',[
            'model' => 'llama-3.3-70b-versatile',
            'messages' => $messages,
            'temperature' => 0.7,
            'max_tokens' => 1024
        ]);

        if($response->successful()){
            $data=$response->json();
          
            $reply=$data['choices'][0]['message']['content'];
             DB::table('chats')->insert([
            'uniqid' => uniqid(),
            'user_id' => Auth::guard('users')->user()->id,
            'raw_message' => $reply,
            'message' => $reply,
            'role' => 'assistant',
            'rewarded' => null,
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
       ]);
            return response()->json([
                'message' => nl2br($reply),
                'status' => 'success'
            ]);
        }
        
        DB::table('chats')->where('uniqid',$uniqid)->where('user_id',Auth::guard('users')->user()->id)->where('message',$message)->delete();
        return response()->json([
            'message' => 'An unknown error occured,please try later',
            'status' => 'success'
        ]);
    }
}

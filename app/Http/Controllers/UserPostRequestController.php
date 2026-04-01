<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserPostRequestController extends Controller
{
    // register
    public function Register(){
        $welcome_bonus = 0;
        if(DB::table('users')->where('username',strtolower(str_replace(['-',' '],'_',request()->input('username'))))->exists()){
            return response()->json([
                'message' => 'Username has been taken',
                'status' => 'error'
            ]);
        }
        if(DB::table('users')->where('email',request()->input('email'))->exists()){
            return response()->json([
                'message' => 'Email address already exists',
                'status' => 'error'
            ]);
        }
    
       if(request()->has('coupon')){
        if(!DB::table('coupons')->where('code',request()->input('coupon'))->exists()){
            return response()->json([
                'message' => 'Invalid coupon code,kindly purchase new coupon code from any of our verified vendors',
                'status' => 'error'
            ]);
        }
        $coupon=DB::table('coupons')->where('code',request()->input('coupon'))->first();
        if($coupon->status !== 'active'){
            return response()->json([
                'message' => 'Coupon code has already been used,kindly purchase new coupon code from any of our verified vendors',
                'status' => 'error'

            ]);
        }
        if((json_decode($coupon->package)->country ?? 'nigeria') !== request()->input('country')){
            return response()->json([
                'message' => 'Please Enter a valid '.ucfirst(request()->input('country')).' coupon code',
                'status' => 'error'
            ]);
        }
       // return $coupon;
        $package=json_decode($coupon->package ?? '{}');
      //  return $package;
        $welcome_bonus=$package->cashback;
       }else{
        $package=DB::table('packages')->where('id',request()->input('package'))->first();
       }
       $usr_pkg=$package;
     DB::table('notifications')->insert([
        'message' => '<strong class="font-1 c-green">'.strtolower(str_replace(['-',' '],'_',request()->input('username'))).'</strong> Just registered an account',
        'status' => 'unread',
        'date' => Carbon::now(),
        'updated' => Carbon::now()
       ]);
       
     // == DB::table('users')->where('username',request()->input('ref'))->first()->type;
       DB::table('users')->insert([
        'uniqid' => strtoupper(uniqid('USR')),
        'name' => request()->input('name'),
        'email' => request()->input('email'),
        'username' => strtolower(str_replace(['-',' '],'_',request()->input('username'))),
        'phone' => request()->input('phone') ?? null,
        'country' => request()->input('country'),
        'package' => json_encode($package ?? []),
        'coupon' => request()->input('coupon') ?? null,
        'activities_balance' => $welcome_bonus,
        'photo' => 'avatar.jpeg',
        'ref' => request()->input('ref'),
        'password' => Hash::make(request()->input('password')),
        'updated' => Carbon::now(),
        'date' => Carbon::now()
       ]);
       if(request()->has('coupon')){
        DB::table('coupons')->where('code',request()->input('coupon'))->update([
            'status' => 'redeemed'
        ]);
       }
       
    //    referral
     if(request()->has('ref') &&  json_decode(DB::table('users')->where('username',request()->input('ref'))->first()->package)->type == $usr_pkg->type){

        if(request()->input('ref') !== ''){
              $ref=DB::table('users')->where('username',request()->input('ref'))->first();
              $package=json_decode($ref->package);
              $package->subordinate=ConvertCurrency($usr_pkg->subordinate,DB::table('users')->where('email',request()->input('email'))->first()->country,$ref->country) ?? 0;


            //   direct
              DB::table('users')->where('id',$ref->id)->update([
                'affiliate_balance' => DB::raw('affiliate_balance + '.$package->subordinate.'')
              ]);
              DB::table('transactions')->insert([
                'uniqid' => strtoupper(uniqid('trx')),
            'user_id' => $ref->id,
            'type' => 'Direct Commission',
            'class' => 'credit',
            'amount' => $package->subordinate,
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M254.3,107.91,228.78,56.85a16,16,0,0,0-21.47-7.15L182.44,62.13,130.05,48.27a8.14,8.14,0,0,0-4.1,0L73.56,62.13,48.69,49.7a16,16,0,0,0-21.47,7.15L1.7,107.9a16,16,0,0,0,7.15,21.47l27,13.51,55.49,39.63a8.06,8.06,0,0,0,2.71,1.25l64,16a8,8,0,0,0,7.6-2.1l55.07-55.08,26.42-13.21a16,16,0,0,0,7.15-21.46Zm-54.89,33.37L165,113.72a8,8,0,0,0-10.68.61C136.51,132.27,116.66,130,104,122L147.24,80h31.81l27.21,54.41ZM41.53,64,62,74.22,36.43,125.27,16,115.06Zm116,119.13L99.42,168.61l-49.2-35.14,28-56L128,64.28l9.8,2.59-45,43.68-.08.09a16,16,0,0,0,2.72,24.81c20.56,13.13,45.37,11,64.91-5L188,152.66Zm62-57.87-25.52-51L214.47,64,240,115.06Zm-87.75,92.67a8,8,0,0,1-7.75,6.06,8.13,8.13,0,0,1-1.95-.24L80.41,213.33a7.89,7.89,0,0,1-2.71-1.25L51.35,193.26a8,8,0,0,1,9.3-13l25.11,17.94L126,208.24A8,8,0,0,1,131.82,217.94Z"></path></svg>',
            'json' => json_encode([
                'data' => [
                    'type' => 'referral_commission',
                    'level' => 'direct',
                    'user_id' => DB::table('users')->where('username',request()->input('username'))->first()->id,
                   
                   
                ],
                'wallet' => 'affiliate_balance'
            ]),
            'gateway' => 'automatic',
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);

        // first indirect
        if(($ref->ref ?? '') !== ''){
           if(json_decode(DB::table('users')->where('username',$ref->ref)->first()->package)->type == $usr_pkg->type){

             $indirect=DB::table('users')->where('username',$ref->ref)->first();
            $pkg=json_decode($indirect->package);
            $pkg->first_indirect=ConvertCurrency($usr_pkg->first_indirect,DB::table('users')->where('email',request()->input('email'))->first()->country,$indirect->country) ?? 0;
            DB::table('users')->where('id',$indirect->id)->update([
                'affiliate_balance' => DB::raw('affiliate_balance + '.$pkg->first_indirect.'')
            ]);
              DB::table('transactions')->insert([
                 'uniqid' => strtoupper(uniqid('trx')),
            'user_id' => $indirect->id,
            'type' => 'First Indirect Commission',
            'class' => 'credit',
            'amount' => $pkg->first_indirect,
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M230.33,141.06a24.43,24.43,0,0,0-21.24-4.23l-41.84,9.62A28,28,0,0,0,140,112H89.94a31.82,31.82,0,0,0-22.63,9.37L44.69,144H16A16,16,0,0,0,0,160v40a16,16,0,0,0,16,16H120a7.93,7.93,0,0,0,1.94-.24l64-16a6.94,6.94,0,0,0,1.19-.4L226,182.82l.44-.2a24.6,24.6,0,0,0,3.93-41.56ZM16,160H40v40H16Zm203.43,8.21-38,16.18L119,200H56V155.31l22.63-22.62A15.86,15.86,0,0,1,89.94,128H140a12,12,0,0,1,0,24H112a8,8,0,0,0,0,16h32a8.32,8.32,0,0,0,1.79-.2l67-15.41.31-.08a8.6,8.6,0,0,1,6.3,15.9ZM164,96a36,36,0,0,0,5.9-.48,36,36,0,1,0,28.22-47A36,36,0,1,0,164,96Zm60-12a20,20,0,1,1-20-20A20,20,0,0,1,224,84ZM164,40a20,20,0,0,1,19.25,14.61,36,36,0,0,0-15,24.93A20.42,20.42,0,0,1,164,80a20,20,0,0,1,0-40Z"></path></svg>',
            'json' => json_encode([
                'data' => [
                    'type' => 'referral_commission',
                    'level' => 'first_indirect',
                    'user_id' => DB::table('users')->where('username',request()->input('username'))->first()->id,
                   
                   
                ],
                'wallet' => 'affiliate_balance'
            ]),
            'gateway' => 'automatic',
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
           }
           
        }

        }
     }



       return response()->json([
        'message' => 'Registration successfull',
        'status' => 'success',
        'url' => url('login')
       ]);
    }
    // login
    public function Login(){
        if(!DB::table('users')->where('username',request()->input('id'))->orWhere('email',request()->input('id'))->exists()){
            return response()->json([
                'message' => 'User not found',
                'status' => 'error'
            ]);
        }
        $user=DB::table('users')->where('username',request()->input('id'))->orWhere('email',request()->input('id'))->first();
        if(!Hash::check(request()->input('password'),$user->password)){
            return response()->json([
                'message' => 'Invalid account password',
                'status' => 'error'
            ]);
        }
        if($user->status == 'banned'){
            return response()->json([
                'message' => 'User account has been banned',
                'status' => 'error'
            ]);
        }
         DB::table('logs')->insert([
        'user_id' => $user->id,
        'ip' => request()->ip(),
        'updated' => Carbon::now(),
        'date' => Carbon::now(),
        'status' => 'success'
        ]);
        Auth::guard('users')->loginUsingId($user->id,true);
        return response()->json([
            'message' => 'Login successfull,redirecting',
            'status' => 'success',
            'url' => url('users/dashboard')
        ]);
    }

    // add bank
    public function AddBank(){
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'bank' => json_encode([
                'account_number' => request()->input('account_number'),
                'bank_name' => request()->input('bank_name'),
                'account_name' => request()->input('account_name')
            ])
           
            ]);
            DB::table('notifications')->insert([
        'message' => '<strong class="font-1 c-green">'.Auth::guard('users')->user()->username.'</strong> Just linked a bank account',
        'status' => 'unread',
        'date' => Carbon::now(),
        'updated' => Carbon::now()
       ]);
             return response()->json([
                'message' => 'Bank account linked successfully',
                'status' => 'success'
            ]);
    }
    // withdraw
    public function Withdraw(){
        // declare variables
         $pkg=json_decode(Auth::guard('users')->user()->package);
        $finance=json_decode(DB::table('settings')->where('key','finance_settings')->first()->json ?? '{}');
        $wallet=request('wallet');
        $minimum_withdrawal= $pkg->minimum_withdrawal ?? DB::table('packages')->where('id',$pkg->id)->first()->minimum_withdrawal ?? $finance->wallets->activities->minimum;
        $maximum_withdrawal=1000000000000;
        $uniqid=strtoupper(uniqid('TRX'));
        $finance=json_decode(DB::table('settings')->where('key','finance_settings')->first()->json ?? '{}');
        $wallet_key=[
            'activities_balance' => 'Coin Wallet',
            'affiliate_balance' => 'Profit Split Wallet',
            'gaming_balance' => 'Game Wallet',
        ];

            //check if wallet not selected
        if($wallet == ''){
        return response()->json([
            'message' => 'Please select a wallet to withdraw from',
            'status' => 'error'
        ]);
    }
   
       
    //    check if amount is zero
      if(request()->input('amount') == 0){
        return response()->json([
            'message' => 'Please enter a valid withdrawal amount',
            'status' => 'error'
        ]);
      }

    //   check if they have up to the balance
       if(Auth::guard('users')->user()->{request()->input('wallet')} < request()->input('amount')){
        return response()->json([
            'message' => 'You cannot withdraw above your available balance',
            'status' => 'error'
        ]);
       }
        
    //    check if its up to minimum withdrawal
      if(request()->input('amount') < ($minimum_withdrawal ?? 100)){
        return response()->json([
            'message' => 'Minimum withdrawal for '.$wallet_key[$wallet].' is &#8358;'.number_format($minimum_withdrawal,2).'',
            'status' => 'error'
        ]);
      }

    // check if portal is closed
      if(($finance->wallets->{str_replace('_balance','',request()->input('wallet'))}->portal ?? json_decode(DB::table('settings')->where('key','finance_settings')->first()->json)->wallets->games->portal) == 'closed'){
        return response()->json([
            'message' => ''.$wallet_key[$wallet].' withdrawal portal is currently closed,check back later',
            'status' => 'error'
        ]);

      }

    //   debit user
      DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
        request()->input('wallet') => DB::raw(''.request()->input('wallet').' - '.request()->input('amount').'') 
      ]);
    //   insert into transactions table
       DB::table('transactions')->insert([
        'uniqid' => $uniqid,
            'user_id' => Auth::guard('users')->user()->id,
            'type' => 'Account Withdrawal',
            'class' => 'debit',
            'amount' => request()->input('amount'),
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M224,48H32A16,16,0,0,0,16,64V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V64A16,16,0,0,0,224,48Zm0,16V88H32V64Zm0,128H32V104H224v88Zm-16-24a8,8,0,0,1-8,8H168a8,8,0,0,1,0-16h32A8,8,0,0,1,208,168Zm-64,0a8,8,0,0,1-8,8H120a8,8,0,0,1,0-16h16A8,8,0,0,1,144,168Z"></path></svg>',
            'json' => json_encode([
                'data' => [
                    'bank' => json_decode(Auth::guard('users')->user()->bank),
                   
                ],
                'wallet' => request()->input('wallet'),
                'wallet_key' => $wallet_key[$wallet]
            ]),
            'gateway' => 'manual',
            'status' => 'pending',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        // insert into notifications table
        DB::table('notifications')->insert([
        'message' => '<strong class="font-1 c-green">'.Auth::guard('users')->user()->username.'</strong> Just placed a withdrawal request',
        'status' => 'unread',
        'date' => Carbon::now(),
        'updated' => Carbon::now()
       ]);
        return response()->json([
            'message' => 'Withdrawal placed successfully,awaiting processing',
            'status' => 'success',
            'url' => url('users/transaction/receipt?id=').DB::table('transactions')->where('uniqid',$uniqid)->where('user_id',Auth::guard('users')->user()->id)->first()->id
        ]);
    }
    // update account password
    public function UpdatePassword(){
        if(!Hash::check(request()->input('current_password'),Auth::guard('users')->user()->password)){
            return response()->json([
                'message' => 'Invalid current password',
                'status' => 'error'
            ]);
        }
        if(strlen(request('new_password')) < 6){
            return response()->json([
                'message' => 'New password must contain at least 6 characters',
                'status' => 'error'
            ]);
        }
        if(!Hash::check(request()->input('confirm_password'),Hash::make(request()->input('new_password')))){
            return response()->json([
                'message' => 'New password and confirm password must be the same',
                'status' => 'error'
            ]);
        }
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'password' => Hash::make(request()->input('new_password'))
        ]);
        DB::table('notifications')->insert([
        'message' => '<strong class="font-1 c-green">'.Auth::guard('users')->user()->username.'</strong> Just updated his/her account password',
        'status' => 'unread',
        'date' => Carbon::now(),
        'updated' => Carbon::now()
       ]);
        return response()->json([
            'message' => 'Account password updated success',
            'status'  => 'success',
            'url' => url('users/more')
        ]);
    }
    // publish article
    public function PublishArticle(){
     if(DB::table('articles')->where('user_id',Auth::guard('users')->user()->id)->where('topic->id',request()->input('topic'))->exists()){
        return response()->json([
            'message' => 'You have already written an article on this topic',
            'status' => 'error'
        ]);
     }
     DB::table('articles')->insert([
        'user_id' => Auth::guard('users')->user()->id,
        'topic' => json_encode(DB::table('article_topics')->where('id',request()->input('topic'))->first()),
        'article' => request()->input('article'),
        'updated' => Carbon::now(),
        'date' => Carbon::now()
     ]);
     return response()->json([
        'message' => 'Article published successfully',
        'status' => 'success',
        'url' => url('users/articles/read')
     ]);

    }
    // update profile photo
    public function UpdatePhoto(){
        $name=time().'.'.request()->file('photo')->getClientOriginalExtension();
        if(request()->file('photo')->move(public_path('users'),$name)){
            DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
                'photo' => $name
            ]);
               DB::table('notifications')->insert([
        'message' => '<strong class="font-1 c-green">'.Auth::guard('users')->user()->username.'</strong> Just updated his/her profile photo',
        'status' => 'unread',
        'date' => Carbon::now(),
        'updated' => Carbon::now()
       ]);
             return response()->json([
            'message' => 'profile photo updated success',
            'status'  => 'success',
            'url' => url('users/more')
        ]);
        }
    }
    // coupon checker
    public function CouponChecker(){
        if(!DB::table('coupons')->where('code',request()->input('coupon'))->exists()){
            return response()->json([
                'message' => 'Invalid coupon code',
                'status' => 'error'
            ]);
        }
        $coupon=DB::table('coupons')->where('code',request()->input('coupon'))->first();
        $coupon->text=$coupon->status == 'active' ? 'Coupon code is active' : 'Coupon code has been used';
        $coupon->package=json_decode($coupon->package);
        $coupon->value=number_format($coupon->package->cost,2);
        // $coupon->user=DB::table('users')->where('coupon',$coupon->code)->first();
        return response()->json([
            'message' => 'Coupon code validated success',
            'status' => 'success',
            'coupon' => $coupon
        ]);
    }
     // claim task reward
    public function ClaimTaskReward(){
        $task=DB::table('tasks')->where('id',request('id'))->first();
        $task->reward=json_decode(Auth::guard('users')->user()->package)->earning_per_click;
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
                'wallet' => 'activities_wallet'
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
    // update profile picture
    public function UpdateProfile(){
        if(DB::table('users')->where('username',request('username'))->whereNot('id',Auth::guard('users')->user()->id)->exists()){
            return response()->json([
                'message' => 'Username already taken',
                'status' => 'error'
            ]);
        }
        if(DB::table('users')->where('email',request('email'))->whereNot('id',Auth::guard('users')->user()->id)->exists()){
            return response()->json([
                'message' => 'Email already exists',
                'status' => 'error'
            ]);
        }
       
        // if(DB::table('users')->where('phone',request('phone'))->whereNot('id',Auth::guard('users')->user()->id)->exists()){
        //     return response()->json([
        //         'message' => 'Phone number already exists',
        //         'status' => 'error'
        //     ]);
        // }
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'name' => request('name'),
            'username' => request('username'),
            'email' => request('email'),
            'phone' => request('phone')
        ]);
        return response()->json([
            'message' => 'Profile details updated successfully',
            'status' => 'success'
        ]);
    }
   
}

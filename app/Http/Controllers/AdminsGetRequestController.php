<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class AdminsGetRequestController extends Controller
{
    // delete coupon
    public function DeleteCoupon(){
        DB::table('coupons')->where('id',request('id'))->delete();
        return redirect(url()->previous());
    }
     // delete voucher
    public function DeleteVoucher(){
        DB::table('vouchers')->where('id',request('id'))->delete();
        return redirect(url()->previous());
    }
    // delete task
    public function DeleteTask(){
        DB::table('tasks')->where('id',request()->input('id'))->delete();
        return redirect()->to(url()->previous());
    }
     // delete package
    public function DeletePackage(){
        DB::table('packages')->where('id',request()->input('id'))->delete();
        return redirect()->to(url()->previous());
    }
       // delete topic
    public function DeleteTopic(){
        DB::table('article_topics')->where('id',request()->input('id'))->delete();
        return redirect()->to(url()->previous());
    }
    // approve transaction
    public function ApproveTransaction(){
       if(!DB::table('transactions')->where('id',request()->input('id'))->exists()){
        return response()->json([
            'message' =>'Invalid transaction reference',
            'status' => 'error'
        ]);
       }
        $trx=DB::table('transactions')->where('id',request()->input('id'))->first();
        if(str_contains(strtolower($trx->type),'deposit')){
            DB::table('users')->where('id',$trx->user_id)->update([
                'deposit_balance' => DB::raw('deposit_balance + '.$trx->amount.'')
            ]);
            DB::table('transactions')->where('id',$trx->id)->update([
                'status' => 'success'
            ]);
            return response()->json([
                'message' => 'Deposit request approved successfully',
                'status' => 'success'
            ]);
        }else{
           
            DB::table('transactions')->where('id',$trx->id)->update([
                'status' => 'success'
            ]);
            return response()->json([
                'message' => 'Withdrawal request approved successfully',
                'status' => 'success'
            ]);
        }

    }
     // reject transaction
    public function RejectTransaction(){
       if(!DB::table('transactions')->where('id',request()->input('id'))->exists()){
        return response()->json([
            'message' =>'Invalid transaction reference',
            'status' => 'error'
        ]);
       }
        $trx=DB::table('transactions')->where('id',request()->input('id'))->first();
        if(str_contains(strtolower($trx->type),'deposit')){
           
            DB::table('transactions')->where('id',$trx->id)->update([
                'status' => 'rejected'
            ]);
            return response()->json([
                'message' => 'Deposit request rejected successfully',
                'status' => 'success'
            ]);
        }else{
            DB::table('users')->where('id',$trx->user_id)->update([
                json_decode($trx->json)->wallet => DB::raw(''.json_decode($trx->json)->wallet.' + '.$trx->amount.'')
            ]);
            DB::table('transactions')->where('id',$trx->id)->update([
                'status' => 'rejected'
            ]);
            return response()->json([
                'message' => 'Withdrawal request rejected successfully',
                'status' => 'success'
            ]);
        }

    }
    // ban user
    public function BanUser(){
      if(request()->input('status') == 'active'){
          DB::table('users')->where('id',request()->input('id'))->update([
            'status' => 'banned'
          ]);
          return redirect('admins/user?id='.request()->input('id').'');
      }else{
          DB::table('users')->where('id',request()->input('id'))->update([
            'status' => 'active'
          ]);
          return redirect('admins/user?id='.request()->input('id').'');
      }
    }
    // search users
    public function SearchUsers(){
        $users=DB::table('users')->where('username','like','%'.request()->input('q').'%')->orWhere('email','like','%'.request()->input('q').'%')->orWhere('name','like','%'.request()->input('q').'%')->limit(10)->get();
        return view('components.search',[
            'users' => $users,
            'all_users' => true
        ]);
    }
    //  delete article
    public function DeleteArticle(){
        DB::table('articles')->where('id',request()->input('id'))->delete();
        return redirect(url()->previous());
    }
    // api balance 
    public function APIBalance(){
        $response=Http::withToken(env('CKONNECT_API_KEY'))->get('https://www.nellobytesystems.com/APIWalletBalanceV1.asp',[
            'UserID' => env('CKONNECT_USER_ID'),
            'APIKey' => env('CKONNECT_API_KEY')
        ]);
        if($response->successful()){
            $data=$response->json();
         
            if(DB::table('settings')->where('key','clubconnect_api_balance')->exists()){
                DB::table('settings')->where('key','clubconnect_api_balance')->update([
                    'json' => json_encode([
                        'balance' => $data['balance']
                    ])
                ]);
            }else{
                 DB::table('settings')->insert([
                    'key' => 'clubconnect_api_balance',
                    'json' => json_encode([
                        'balance' => $data['balance']
                    ]),
                    'updated' => Carbon::now(),
                    'date' => Carbon::now()
                ]);
            }
            return response()->json([
                'message' => $data['balance'],
                'status' => 'success'
            ]);

        }else{
            return response()->json([
                'message' => 'Could not fetch api balance,try again later',
                'status' => 'error'
            ]);
        }
    }
}

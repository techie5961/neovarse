<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminsPostRequestController extends Controller
{
    // login
    public function Login(){
        if(!DB::table('admins')->where('tag',request('tag'))->exists()){
            return response()->json([
                'message' => 'Admin not found',
                'status' => 'error'
            ]);
        }
        $admin=DB::table('admins')->where('tag',request('tag'))->first();
        if(!Hash::check(request('password'),$admin->password)){
            return response()->json([
                'message' => 'Invalid password',
                'status' => 'error'
            ]);
        }
        Auth::guard('admins')->loginUsingId($admin->id,true);
        return response()->json([
            'message' => 'Login successfull',
            'status' => 'success',
            'url' => url('admins/dashboard')
        ]);

    }
    // add package
    public function AddPackage(){
     $name=time().'.'.request()->file('banner')->getClientOriginalExtension();

      if(request()->file('banner')->move(public_path('packages'),$name)){
         DB::table('packages')->insert([
        'banner' => $name,
        'type' => request()->input('type'),
        'name' => request('name'),
        'country' => request()->input('country'),
        'cost' => request('fee'),
        'cashback' => request('cashback') ?? null,
        'subordinate' => request('subordinate') ?? null,
        'first_indirect' => request('first_indirect') ?? null,
        'free_data' => request('free_data') ?? null,
        'article_writing' => request('article_writing') ?? null,
        'earning_per_click' => request('earning_per_click') ?? null,
        'tiktok_monitizing' => request('tiktok_minitizing') ?? null,
        'casino_game' => request('casino_game') ?? null,
        'daily_advert' => request('daily_advert') ?? null,
        'neo_chat' => request('neo_chat') ?? null,
        'neo_translate' => request('neo_translate') ?? null,
        'music_streaming' => request('music_streaming') ?? null,
        'minimum_withdrawal' => request()->input('minimum_withdrawal'),
        'maximum_withdrawal' => request()->input('maximum_withdrawal'),
        'updated' => Carbon::now(),
        'date' => Carbon::now()
       ]);
       return response()->json([
        'message' => 'Package added successfully',
        'status' => 'success',
        'url' => url('admins/packages/manage')
        ]);
      }
    }
     // edit package
    public function EditPackage(){
      
        if(request()->file('banner') !== null){
 $name=time().'.'.request()->file('banner')->getClientOriginalExtension();

      if(request()->file('banner')->move(public_path('packages'),$name)){
          
       DB::table('packages')->where('id',request()->input('id'))->update([
        'banner' => $name,
        'type' => request()->input('type'),
        'name' => request('name'),
        'country' => request()->input('country'),
        'cost' => request('fee'),
        'cashback' => request('cashback') ?? null,
        'subordinate' => request('subordinate') ?? null,
        'first_indirect' => request('first_indirect') ?? null,
        'free_data' => request('free_data') ?? null,
        'article_writing' => request('article_writing') ?? null,
        'earning_per_click' => request('earning_per_click') ?? null,
        'tiktok_monitizing' => request('tiktok_minitizing') ?? null,
        'casino_game' => request('casino_game') ?? null,
        'daily_advert' => request('daily_advert') ?? null,
         'minimum_withdrawal' => request()->input('minimum_withdrawal'),
        'maximum_withdrawal' => request()->input('maximum_withdrawal'),
        'updated' => Carbon::now(),
      
       ]);
       return response()->json([
        'message' => 'Package edited successfully',
        'status' => 'success',
        'url' => url('admins/packages/manage')
        ]);
      }
        }else{
              
       DB::table('packages')->where('id',request()->input('id'))->update([
        'type' => request()->input('type'),
        'name' => request('name'),
        'country' => request()->input('country'),
        'cost' => request('fee'),
        'cashback' => request('cashback') ?? null,
        'subordinate' => request('subordinate') ?? null,
        'first_indirect' => request('first_indirect') ?? null,
        'free_data' => request('free_data') ?? null,
        'article_writing' => request('article_writing') ?? null,
        'earning_per_click' => request('earning_per_click') ?? null,
        'tiktok_monitizing' => request('tiktok_minitizing') ?? null,
        'casino_game' => request('casino_game') ?? null,
        'daily_advert' => request('daily_advert') ?? null,
        'minimum_withdrawal' => request()->input('minimum_withdrawal'),
        'maximum_withdrawal' => request()->input('maximum_withdrawal'),
        'updated' => Carbon::now(),
      
       ]);
       return response()->json([
        'message' => 'Package edited successfully',
        'status' => 'success',
        'url' => url('admins/packages/manage')
        ]);
        }
      
    }
    // create coupon
    public function CreateCoupon(){
        for($i=0;$i < request('amount');$i++){
             DB::table('coupons')->insert([
            'code' => substr(strtoupper(substr(DB::table('packages')->where('id',request('package'))->first()->name,0,3).Str::random(10)),0,12),
            'vendor_id' => request('vendor_id'),
            'package' => json_encode(DB::table('packages')->where('id',request('package'))->first()),
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        }
        return response()->json([
            'message' => 'Coupon code created success',
            'status' => 'success',
            'url' => url('admins/coupons/all')
        ]);
    }
     // create voucher
    public function CreateVoucher(){
        for($i=0;$i < request('amount');$i++){
             DB::table('vouchers')->insert([
            'code' => substr(strtoupper(Str::random(10)),0,10),
            'type' => 'games',
            'vendor_id' => request('vendor_id'),
            'value' => request()->input('value'),
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        }
        return response()->json([
            'message' => 'Voucher code created success',
            'status' => 'success',
            'url' => url('admins/vouchers/all')
        ]);
    }
    // add task
    public function AddTask(){
       DB::table('tasks')->insert([
        'uniqid' => strtoupper(uniqid('TSK')),
        'category' => request()->input('category'),
        'title' => (request()->input('category') == 'others') ? request()->input('title') : request()->input('category'),
        'link' => request()->input('link'),
        'reward' => request()->input('reward'),
        'limit' => request()->input('limit'),
        'updated' => Carbon::now(),
        'date' => Carbon::now()
       ]);
       return response()->json([
        'message' => 'Task posted successfully',
        'status' => 'success',
        'url' => url('admins/tasks/manage')
       ]);
    }
      // edit task
    public function EditTask(){
       DB::table('tasks')->where('id',request()->input('id'))->update([
        'category' => request()->input('category'),
        'title' => (request()->input('category') == 'others') ? request()->input('title') : request()->input('category'),
        'link' => request()->input('link'),
        'reward' => request()->input('reward'),
        'limit' => request()->input('limit'),
        'updated' => Carbon::now(),
        
       ]);
       return response()->json([
        'message' => 'Task editted successfully',
        'status' => 'success',
        'url' => url('admins/tasks/manage')
       ]);
    }
    // general settings
    public function GeneralSettings(){
        $key='general_settings';
        $json=[
            'spin_minimum' => request()->input('spin_minimum'),
            'spin_maximum' => request()->input('spin_maximum')
        ];
        if(DB::table('settings')->where('key',$key)->exists()){
            DB::table('settings')->where('key',$key)->update([
                'json' => json_encode($json),
                'updated' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'settings updated successfully',
                'status' => 'success'
            ]);
        }else{
             DB::table('settings')->insert([
                'key' => $key,
                'json' => json_encode($json),
                'updated' => Carbon::now(),
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'settings saved successfully',
                'status' => 'success'
            ]);
        }
    }
     // social settings
    public function SocialSettings(){
        $key='social_settings';
        $json=[
            'whatsapp' => request()->input('whatsapp'),
            'telegram' => request()->input('telegram'),
            'notification' => request()->input('notification') ?? '',
            'forex' => [
                'group' => request('group_link'),
                'link' => request('link')
            ]
        ];
        if(DB::table('settings')->where('key',$key)->exists()){
            DB::table('settings')->where('key',$key)->update([
                'json' => json_encode($json),
                'updated' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'settings updated successfully',
                'status' => 'success'
            ]);
        }else{
             DB::table('settings')->insert([
                'key' => $key,
                'json' => json_encode($json),
                'updated' => Carbon::now(),
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'settings saved successfully',
                'status' => 'success'
            ]);
        }
    }
     // finance settings
    public function FinanceSettings(){
        $key='finance_settings';
        $json=[
           'wallets' => [
            'activities' => [
                'minimum' => request()->input('activities_minimum_withdrawal'),
                'portal' => request()->input('activities_withdrawal_portal'),
               
            ],
             'affiliate' => [
                'minimum' => request()->input('affiliate_minimum_withdrawal'),
                'portal' => request()->input('affiliate_withdrawal_portal'),
               
            ],
             'games' => [
                'minimum' => request()->input('games_minimum_withdrawal'),
                'portal' => request()->input('games_withdrawal_portal'),
               
            ],
        ],
        'vtu' => [
            'airtime' => request()->input('airtime_portal'),
            'data' => request()->input('data_portal')
        ]
        ];
        if(DB::table('settings')->where('key',$key)->exists()){
            DB::table('settings')->where('key',$key)->update([
                'json' => json_encode($json),
                'updated' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'settings updated successfully',
                'status' => 'success'
            ]);
        }else{
             DB::table('settings')->insert([
                'key' => $key,
                'json' => json_encode($json),
                'updated' => Carbon::now(),
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'settings saved successfully',
                'status' => 'success'
            ]);
        }
    }
    // credit user 
    public function CreditUser(){
        DB::table('users')->where('id',request()->input('id'))->update([
            request()->input('wallet') => DB::raw(''.request()->input('wallet').' + '.request()->input('amount').'')
        ]);
        return response()->json([
            'message' => 'User wallet creditted successfully',
            'status' => 'success'
        ]);
    }
     // debit user 
    public function DebitUser(){
        DB::table('users')->where('id',request()->input('id'))->update([
            request()->input('wallet') => DB::raw(''.request()->input('wallet').' - '.request()->input('amount').'')
        ]);
        return response()->json([
            'message' => 'User wallet debitted successfully',
            'status' => 'success'
        ]);
    }
    // add article topic
    public function AddArticleTopic(){
        DB::table('article_topics')->insert([
            'topic' => request()->input('topic'),
            'status' => 'active',
            'updated' =>Carbon::now(),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Article topic added successfully',
            'status' => 'success'
        ]);
    }
    // add skill
    public function AddSkill(){
        $icon=time().'.'.request()->file('photo')->getClientOriginalExtension();
        if(request()->file('photo')->move(public_path('skills'),$icon)){
            DB::table('skills')->insert([
                'photo' => $icon,
                'name' => request('name'),
                'category' => request('category'),
                'community' => request('community'),
                'description' => request('description'),
                'status' => 'active',
                'updated' => Carbon::now(),
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Skill added successfully',
                'status' => 'success'
            ]);
        }
    }
     // edit skill
    public function EditSkill(){
        $skill=DB::table('skills')->where('id',request('id'))->first();
        $icon=$skill->photo;
        if(request()->hasFile('photo')){
     $icon=time().'.'.request()->file('photo')->getClientOriginalExtension();
     request()->file('photo')->move(public_path('skills'),$icon);
        }
       
        if($icon){
            DB::table('skills')->where('id',request('id'))->update([
                'photo' => $icon,
                'name' => request('name'),
                'category' => request('category'),
                'community' => request('community'),
                'description' => request('description'),
                'status' => 'active',
                'updated' => Carbon::now(),
            ]);
            return response()->json([
                'message' => 'Skill editted successfully',
                'status' => 'success'
            ]);
        }
    }
    // add song
    public function AddSong(){
        $photo=time().'.'.request()->file('photo')->getClientOriginalExtension();
        if(request()->file('photo')->move(public_path('songs/photos'),$photo)){
            $audio=time().'.'.request()->file('audio')->getClientOriginalExtension();
            if(request()->file('audio')->move(public_path('songs/audios'),$audio)){
                DB::table('songs')->insert([
                    'photo' => $photo,
                    'audio' => $audio,
                    'name' => request('name'),
                    'artist' => request('artist'),
                    'status' => 'active',
                    'updated' => Carbon::now(),
                    'date' => Carbon::now()
                ]);
                    return response()->json([
                        'message' => 'Music uploaded success',
                        'status' => 'success'
                    ]);
            }
        }
    }
  
}

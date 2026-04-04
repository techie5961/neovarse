<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class UsersDashboardController extends Controller
{
    // db queries
    public function DBQueries(){
       if(!Schema::hasColumn('users','giftcard_balance')){
            Schema::table('users',function($table){
                $table->float('giftcard_balance')->after('activities_balance')->default(0);
            });
       }
       if(!Schema::hasColumn('users','dailyclaim_balance')){
        Schema::table('users',function($table){
            $table->float('dailyclaim_balance')->after('giftcard_balance')->default(0);
        });
       }
     
       if(!Schema::hasTable('neo_translate')){
        Schema::create('neo_translate',function($table){
                $table->id();
                $table->string('uniqid')->default(Str::random(12));
                $table->text('primary')->nullable();
                $table->text('translation')->nullable();
                $table->text('language')->nullable();
                $table->json('json')->nullable();
                $table->text('status')->default('active');
                $table->timestamp('updated')->useCurrent();
                $table->timestamp('date')->useCurrent();
        });
       }
       if(!Schema::hasTable('translations')){
        Schema::create('translations',function($table){
            $table->id();
            $table->string('translate_id')->nullable();
            $table->json('json')->nullable();
            $table->string('status')->default('active');
            $table->timestamp('updated')->useCurrent();
        });
       }
    if(!Schema::hasColumn('translations','date')){
         Schema::table('translations',function($table){
                $table->timestamp('date')->useCurrent();
       });
     

    }
      if(!Schema::hasColumn('translations','user_id')){
        Schema::table('translations',function($table){
            $table->bigInteger('user_id')->nullable();
        });
       }
      
         return response()->json([
        'message' => 'All queries successfull'
       ]);
    }
    // login
    public function Login(){
        return view('users.auth.login');
    }
    
    // register
    public function Register(){
        return view('users.auth.register',[
            'pkg' => DB::table('packages')->where('status','active')->orderBy('date','desc')->get(),
            'nigeria_pkgs' => DB::table('packages')->where('status','active')->where('country','nigeria')->orderBy('date','desc')->get(),
            'ghana_pkgs' => DB::table('packages')->where('status','active')->where('country','ghana')->orderBy('date','desc')->get(),
            'cameroon_pkgs' => DB::table('packages')->where('status','active')->where('country','cameroon')->orderBy('date','desc')->get()
        ]);
    }
     // referral register
    public function RefRegister(){
        $ref=request('ref');
        $username='';
       if( DB::table('users')->where('username',$ref)->exists()){
         $username=DB::table('users')->where('username',$ref)->first()->username;
       }
      // return $username;
        return view('users.auth.register',[
            'pkg' => DB::table('packages')->where('status','active')->orderBy('date','desc')->get(),
            'ref' => $username,
             'nigeria_pkgs' => DB::table('packages')->where('status','active')->where('country','nigeria')->orderBy('date','desc')->get(),
            'ghana_pkgs' => DB::table('packages')->where('status','active')->where('country','ghana')->orderBy('date','desc')->get(),
            'cameroon_pkgs' => DB::table('packages')->where('status','active')->where('country','cameroon')->orderBy('date','desc')->get()
    
        ]);
    }
    // dashboard
    public function Dashboard(){
 //   return 'tech';
  $transactions=DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->orderBy('date','desc')->paginate(5);
        $transactions->getCollection()->transform(function($each){
            $each->date=Carbon::parse($each->date)->diffForHumans();
            return $each;
        });
    return view('users.dashboard',[
        'team_members' => DB::table('users')->where('ref',Auth::guard('users')->user()->username)->count(),
        'total_transactions' => DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->count(),
        'all_time' => DB::table('transactions')->where('class','credit')->whereNot('type','like','%deposit%')->where('status','success')->where('user_id',Auth::guard('users')->user()->id)->sum('amount'),
        'social' => json_decode(DB::table('settings')->where('key','social_settings')->first()->json),
        'transactions' => $transactions,
        'affiliate_earnings_today' => DB::table('transactions')->where('json->wallet','affiliate_balance')->where('json->data->type','referral_commission')->where('user_id',Auth::guard('users')->user()->id)->whereDate('date',Carbon::today())->sum('amount'),
        'affiliate_withdrawals_this_month' => DB::table('transactions')->where('type','like','%withdrawal%')->whereNot('status','rejected')->where('user_id',Auth::guard('users')->user()->id)->where('json->wallet','affiliate_balance')->whereBetween('date',[Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()])->count(),
         'activities_earnings_today' => DB::table('transactions')
         ->where('json->wallet','like','%activities%')
         ->where('class','credit')
         ->where('user_id',Auth::guard('users')->user()->id)
         ->whereDate('date',Carbon::today())->sum('amount'),
        'activities_withdrawals_this_month' => DB::table('transactions')->where('type','like','%withdrawal%')->whereNot('status','rejected')->where('user_id',Auth::guard('users')->user()->id)->where('json->wallet','activities_balance')->whereBetween('date',[Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()])->count(),
         'earnings_today' => DB::table('transactions')->where('class','credit')->where('user_id',Auth::guard('users')->user()->id)->whereDate('date',Carbon::today())->sum('amount'),
        'withdrawals_this_month' => DB::table('transactions')->where('type','like','%withdrawal%')->whereNot('status','rejected')->where('user_id',Auth::guard('users')->user()->id)->whereBetween('date',[Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()])->count()

    ]);
    }
    // tasks
    public function Tasks(){
    //    return json_decode(Auth::guard('users')->user()->package)->earning_per_click;
       
        if(!json_decode(Auth::guard('users')->user()->package)->earning_per_click){
            return CheckPackage();
        }
    //   return json_decode(Auth::guard('users')->user()->package)->earning_per_click;
    $package=DB::table('packages')->where('id',json_decode(Auth::guard('users')->user()->package)->id)->first() ?? json_decode(Auth::guard('users')->user()->package);
        $tasks=DB::table('tasks')->where('status','active')->whereNotIn('id',function($q){
          $q->select('task_id')->from('task_proofs')->where('user_id',Auth::guard('users')->user()->id);
        })->orderBy('date','desc')->paginate(10);
        if(request()->has('paginate')){
            return view('paginate.users',[
                'tasks' => $tasks,
                'reward' => $package->earning_per_click
            ]);
        }
    
        return view('users.tasks',[
            'tasks' => $tasks,
            'reward' => $package->earning_per_click
        ]);
    }
   
    // transactions
    public function Transactions(){
        
        $transactions=DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->orderBy('date','desc')->paginate(10);
       if(request()->has('status')){
           $transactions=DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('status',request()->input('status'))->orderBy('date','desc')->paginate(10);
        
        }
        if(request()->has('class')){
           $transactions=DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('class',request()->input('class'))->orderBy('date','desc')->paginate(10);
        
        }
        $transactions->getCollection()->transform(function($each){
            $each->date=Carbon::parse($each->date)->diffForHumans();
            $each->currency='₦';
            if(json_decode($each->json)->wallet == 'giftcard_wallet'){
                $each->amount=ToDollars($each->amount);
                $each->currency='$';
            }
            return $each;
        });
        if(request()->has('paginate')){
             return view('paginate.users',[
            'transactions' => $transactions
        ]);
        }
        return view('users.transactions',[
            'transactions' => $transactions
        ]);
    }
    // profile
    public function Profile(){
        return view('users.account',[
            'type' => 'account'
        ]);
    }
    // add bank
    public function AddBank(){
        return view('users.bank',[
            'bank_linked' => Auth::guard('users')->user()->bank ?? 'false',
            'bank' => json_decode(Auth::guard('users')->user()->bank ?? '{}'),
            'type' => 'bank'
        ]);
    }
    // withdraw
    public function Withdraw(){
        if((Auth::guard('users')->user()->bank ?? '') == ''){
            return redirect('users/bank/add');
        }
        $pkg=json_decode(Auth::guard('users')->user()->package);
        $finance=json_decode(DB::table('settings')->where('key','finance_settings')->first()->json ?? '{}');
        return view('users.withdraw',[
            'bank_linked' => Auth::guard('users')->user()->bank ?? 'false',
            'bank' => json_decode(Auth::guard('users')->user()->bank ?? '{}'),
            'deposit_minimum' => json_decode(DB::table('settings')->where('key','finance_settings')->first()->json)->wallets->games->minimum,
            'activities_minimum' => $pkg->minimum_withdrawal ?? DB::table('packages')->where('id',$pkg->id)->first()->minimum_withdrawal ?? $finance->wallets->activities->minimum,
            'affiliate_minimum' => $pkg->minimum_withdrawal ?? DB::table('packages')->where('id',$pkg->id)->first()->minimum_withdrawal ?? $finance->wallets->affiliate->minimum,
            'maximum_withdrawal' => $pkg->maximum_withdrawal ?? DB::table('packages')->where('id',$pkg->id)->first()->maximum_withdrawal ?? 100000000
        ]);
    }
    
    // team
    public function Team(){
        $team=DB::table('users')->where('ref',Auth::guard('users')->user()->username)->orWhereIn('ref',function($q){
            $q->select('username')->from('users')->where('ref',Auth::guard('users')->user()->username);
        })->paginate(10);
        $team->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->commission=DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('json->data->type','referral_commission')->where('json->data->user_id',$each->id)->sum('amount');
            $each->downlines=DB::table('users')->where('ref',$each->username)->count();
            return $each;
        });
        return view('users.referrals',[
            'team' => $team
        ]);
    }
    // password
    public function Password(){
        return view('users.password',[
            'type' => 'security'
        ]);
    }
    // write article
    public function WriteArticle(){
    if(CheckPackage()){
        return CheckPackage();
    }
        return view('users.articles.write',[
            'topics' => DB::table('article_topics')->where('status','active')->orderBy('date','desc')->limit(10)->get()
        ]);
    }
    // read articles
    public function ReadArticles(){
        $articles=DB::table('articles')->where('status','active')->orderBy('date','desc')->paginate(10);
        $articles->getCollection()->transform(function($each){
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->topic=json_decode($each->topic);
            $each->voted=DB::table('article_votes')->where('user_id',Auth::guard('users')->user()->id)->where('article_id',$each->id)->count();
            return $each;

        });
        if(request()->has('paginate')){
            return view('paginate.users',[
            'articles' => $articles,
            
        ]);
        }
        return view('users.articles.read',[
            'articles' => $articles
        ]);
    }
      // read more
    public function ReadMore(){
        $article=DB::table('articles')->where('id',request()->input('id'))->orderBy('date','desc')->first();
      
           $article->user=DB::table('users')->where('id',$article->user_id)->first();
           $article->topic=json_decode($article->topic);
           $article->voted=DB::table('article_votes')->where('user_id',Auth::guard('users')->user()->id)->where('article_id',$article->id)->count();
          

      
      
        return view('users.articles.more',[
            'data' => $article
        ]);
    }
    // airtime topup
    public function AirtimeTopup(){
        return view('users.airtime',[
            'general' => json_decode(DB::table('settings')->where('key','finance_settings')->first()->json)
        ]);
    }
     // data topup
    public function DataTopup(){
        return view('users.data',[
            'general' => json_decode(DB::table('settings')->where('key','finance_settings')->first()->json)
        ]);
    }
    //  index page
    public function Index(){
      
        return view('users.index.home');
    }
    // transaction receipt
    public function TransactionReceipt(){
        $trx=DB::table('transactions')->where('id',request()->input('id'))->first();
        $trx->date_format=Carbon::parse($trx->date)->format('M d, Y H : i : s');
        $trx->session_id=Str::random(20);
        $trx->json=json_decode($trx->json ?? '{}');
        return view('users.receipt',[
            'data' => $trx
        ]);
    }
    // vendors
    public function Vendors(){
     
        $vendors=DB::table('users')->where('type','vendor')->where('status','active')->paginate(100);

        return view('users.index.vendors',[
            'vendors' => $vendors
        ]);
    }
     // voucher vendors
    public function VoucherVendors(){
     
        $vendors=DB::table('users')->where('type','vendor')->where('status','active')->paginate(100);

        return view('users.index.vendors',[
            'vendors' => $vendors,
            'voucher' => 'voucher'
        ]);
    }
    // profile photo update
    public function ProfilePhoto(){
        return view('users.photo');
    }
    // logout
     public function Logout(){
        Auth::guard('users')->logout();
        return redirect('login');
     }
    //  vendor dashboard
    public function VendorDashboard(){
        if(Auth::guard('users')->user()->type == 'user'){
            return redirect('users/dashboard');
        }
        $coupons=DB::table('coupons')->where('vendor_id',Auth::guard('users')->user()->id)->paginate(10);
        if(request()->has('status')){
            $coupons=DB::table('coupons')->where('vendor_id',Auth::guard('users')->user()->id)->where('status',request('status'))->paginate(10);
        }
        $coupons->getCollection()->transform(function($each){
            $each->used_by=DB::table('users')->where('coupon',$each->code)->first()->username ?? '---';
            $each->ref=DB::table('users')->where('coupon',$each->code)->first()->ref ?? '---';
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->package=json_decode($each->package);
            return $each;
        });
        if(request()->has('paginate')){
            return view('paginate.users',[
            'coupons' => $coupons,
            'vendors_dashboard' => true

        ]);
        }
        return view('users.vendor.dashboard',[
            'total_coupons' => DB::table('coupons')->where('vendor_id',Auth::guard('users')->user()->id)->count(),
            'active_coupons' => DB::table('coupons')->where('vendor_id',Auth::guard('users')->user()->id)->where('status','active')->count(),
            'redeemed_coupons' => DB::table('coupons')->where('vendor_id',Auth::guard('users')->user()->id)->where('status','redeemed')->count(),
            'value' => DB::table('coupons')->where('vendor_id',Auth::guard('users')->user()->id)->sum('package->cost'),
            'coupons' => $coupons
        ]);
    }
      //  voucher codes
    public function VoucherCodes(){
        if(Auth::guard('users')->user()->type == 'user'){
            return redirect('users/dashboard');
        }
        $coupons=DB::table('vouchers')->where('vendor_id',Auth::guard('users')->user()->id)->paginate(10);
        if(request()->has('status')){
            $coupons=DB::table('vouchers')->where('vendor_id',Auth::guard('users')->user()->id)->where('status',request('status'))->paginate(10);
        }
        $coupons->getCollection()->transform(function($each){
            $each->used_by=$each->used_by ?? '---';
           // $each->ref=DB::table('users')->where('coupon',$each->code)->first()->ref ?? '---';
            $each->frame=Carbon::parse($each->date)->diffForHumans();
           
            return $each;
        });
        if(request()->has('paginate')){
            return view('paginate.users',[
            'vouchers' => $coupons,
            'voucher_codes' => true

        ]);
        }
        return view('users.vendor.vouchers',[
            'total_coupons' => DB::table('vouchers')->where('vendor_id',Auth::guard('users')->user()->id)->count(),
            'active_coupons' => DB::table('vouchers')->where('vendor_id',Auth::guard('users')->user()->id)->where('status','active')->count(),
            'redeemed_coupons' => DB::table('vouchers')->where('vendor_id',Auth::guard('users')->user()->id)->where('status','redeemed')->count(),
            'value' => DB::table('vouchers')->where('vendor_id',Auth::guard('users')->user()->id)->sum('value'),
            'coupons' => $coupons
        ]);
    }
    // coupon checker
    public function CouponChecker(){
        return view('users.index.checker');
    }
      // top earners
    public function TopStreamers(){
         $top_streamers=DB::table('streams')->select('user_id',DB::raw('COUNT(*) as total'))->groupBy('user_id')->orderBy('total','desc')->paginate(10);
        $top_streamers->getCollection()->transform(function($each){
    $each->user=DB::table('users')->where('id',$each->user_id)->first();
    return $each;
        });

        return view('users.index.top_streamers',[
            'top' => $top_streamers
        ]);
      //  ConvertCurrency()
    }
    // top earners
    public function TopEarners(){
        $top=DB::table('transactions')->where('type','like','%commission%')->groupBy('user_id')->select('user_id',DB::raw('SUM(amount) as total'))->having('total','>','0')->orderBy('total','desc')->limit(10)->get();
        $top->transform(function($each){
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            return $each;
        });

        return view('users.index.top_earners',[
            'top' => $top
        ]);
      //  ConvertCurrency()
    }
    
    // about us 
    public function AboutUs(){
        return view('users.index.about');
    }

    // terms
    public function Terms(){
        return view('users.index.terms');
    }
    // package list
    public function PackageList(){
        $packages=DB::table('packages')->orderBy('cost','asc')->get();
        return view('users.index.packages',[
            'packages' => $packages
        ]);
    }
    // games
    public function Games(){
        return view('users.games.index');
    }
    // color games 
    public function ColorGames(){
          $colors=[
        ['red','white'],
        ['green','white'],
        ['blue','white'],
        ['white','black'],
      
      ];
        return view('users.games.colors',[
            'color' => $colors[rand(0,(count($colors) - 1))]
        ]);
    }
    // referral contest
    public function ReferralContest(){
        $top=DB::table('users')
        ->select('ref',DB::raw('COUNT(*) as total'))
         ->whereNotNull('ref')
        ->whereBetween('date',['2025-12-13 00:00:00','2026-01-13 23:59:59'])
        ->groupBy('ref')
        ->orderBy('total','desc')
        ->limit(10)
        ->get();
        $top->transform(function($each){
            $each->user=DB::table('users')->where('username',$each->ref)->first();
            return $each;
        });
        return view('users.contest.referral',[
            'top' => $top,
            'status' => now()->gt(Carbon::parse('2026-01-13')) ? 'ended' : 'active'
        ]);
    }

    // skill aquisition
    public function SkillAquisition(){
        $skills=DB::table('skills')->get();
        return view('users.skills',[
            'skills' => $skills
        ]);
    }
    // forex trading
    public function ForexTrading(){
        return view('users.forex',[
             'social' => json_decode(DB::table('settings')->where('key','social_settings')->first()->json ?? '{}'),
          
        ]);
    }
    // neo chat
    public function NeoChat(){
        return view('users.neo_chat');
    }
    // neo stream
    public function NeoStream(){
        $songs=DB::table('songs')->orderBy('date','desc')->limit(10)->get();

        return view('users.neo.stream.music',[
            'songs' => $songs
        ]);
    }
    // neo translate
    public function NeoTranslate(){
        
        $translate=DB::table('neo_translate')->inRandomOrder()->first();
        return view('users.neo.translate',[
            'translate' => $translate,
            'translated' => DB::table('translations')->where('user_id',Auth::guard('users')->user()->id)->whereDate('date',Carbon::today())->exists() ? 'yes' : 'no'
        ]);
    }
    

}

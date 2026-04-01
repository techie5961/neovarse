<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminsDashboardController extends Controller
{
    // login
    public function Login(){
        return view('admins.login');
    }

    // dashboard
    public function Dashboard(){
        return view('admins.dashboard',[
            'all_users' => DB::table('users')->count(),
            'pending_withdrawals' => DB::table('transactions')->where('type','like','%withdrawal%')->where('status','pending')->sum('amount'),
            'successfull_withdrawals' => DB::table('transactions')->where('type','like','%withdrawal%')->where('status','success')->sum('amount'),
            'rejected_withdrawals' => DB::table('transactions')->where('type','like','%withdrawal%')->where('status','rejected')->sum('amount'),
            'coupon' => DB::table('coupons')->count()
            
            
        ]);
    }
    // add package
    public function AddPackage(){
        return view('admins.packages.add');
    }
    // add vendor
    public function AddVendor(){
        return view('admins.vendors.add');
    }
    // add coupon
    public function AddCoupon(){
        return view('admins.coupons.add',[
            'vendors' => DB::table('users')->where('type','vendor')->where('status','active')->get(),
            'packages' => DB::table('packages')->where('cost','>','0')->orderBy('cost','asc')->where('status','active')->get()
        ]);
    }
    // manage coupons
    public function ManageCoupons(){
        $coupons=DB::table('coupons')->orderBy('date','desc')->paginate(10);
        $coupons->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->vendor=DB::table('users')->where('id',$each->vendor_id)->first();
            $each->package=json_decode($each->package);
            return $each;
        });
        if(request()->has('paginate')){
            return view('paginate.admins',[
                'coupons' => $coupons
            ]);
        }
        return view('admins.coupons.manage',[
            'coupons' => $coupons,
            'total' => DB::table('coupons')->count(),
            'active' => DB::table('coupons')->where('status','active')->count(),
            'redeemed' => DB::table('coupons')->where('status','redeemed')->count()
        ]);
    }
    // all vouchers
   
    public function AllGamesVoucher(){
        $vouchers=DB::table('vouchers')->orderBy('date','desc')->paginate(10);
        $vouchers->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->vendor=DB::table('users')->where('id',$each->vendor_id)->first() ?? 'NUll';
            return $each;
        });
        if(request()->has('paginate')){
            return view('paginate.admins',[
                'vouchers' => $vouchers
            ]);
        }
        return view('admins.vouchers.games.manage',[
            'vouchers' => $vouchers,
            'total' => DB::table('vouchers')->count(),
            'active' => DB::table('vouchers')->where('status','active')->count(),
            'redeemed' => DB::table('vouchers')->where('status','redeemed')->count()
        ]);
    }
     // active coupons
    public function ActiveCoupons(){
        $coupons=DB::table('coupons')->where('status','active')->orderBy('date','desc')->paginate(10);
        $coupons->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->vendor=DB::table('users')->where('id',$each->vendor_id)->first();
            $each->package=json_decode($each->package);
            return $each;
        });
        if(request()->has('paginate')){
            return view('paginate.admins',[
                'coupons' => $coupons
            ]);
        }
        return view('admins.coupons.manage',[
            'coupons' => $coupons,
            'total' => DB::table('coupons')->count(),
            'active' => DB::table('coupons')->where('status','active')->count(),
            'redeemed' => DB::table('coupons')->where('status','redeemed')->count()
        ]);
    }
      // active vouchers
   
    public function ActiveVouchers(){
        $vouchers=DB::table('vouchers')->where('status','active')->orderBy('date','desc')->paginate(10);
        $vouchers->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->vendor=DB::table('users')->where('id',$each->vendor_id)->first() ?? 'NUll';
            return $each;
        });
        if(request()->has('paginate')){
            return view('paginate.admins',[
                'vouchers' => $vouchers
            ]);
        }
        return view('admins.vouchers.games.manage',[
            'vouchers' => $vouchers,
            'total' => DB::table('vouchers')->count(),
            'active' => DB::table('vouchers')->where('status','active')->count(),
            'redeemed' => DB::table('vouchers')->where('status','redeemed')->count()
        ]);
    }
    // redeemed vouchers
    public function RedeemedVouchers(){
        $vouchers=DB::table('vouchers')->where('status','redeemed')->orderBy('date','desc')->paginate(10);
        $vouchers->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->vendor=DB::table('users')->where('id',$each->vendor_id)->first() ?? 'NUll';
            return $each;
        });
        if(request()->has('paginate')){
            return view('paginate.admins',[
                'vouchers' => $vouchers
            ]);
        }
        return view('admins.vouchers.games.manage',[
            'vouchers' => $vouchers,
            'total' => DB::table('vouchers')->count(),
            'active' => DB::table('vouchers')->where('status','active')->count(),
            'redeemed' => DB::table('vouchers')->where('status','redeemed')->count()
        ]);
    }
     // redeemed coupons
    public function RedeemedCoupons(){
        $coupons=DB::table('coupons')->where('status','redeemed')->orderBy('date','desc')->paginate(10);
        $coupons->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->vendor=DB::table('users')->where('id',$each->vendor_id)->first();
            $each->package=json_decode($each->package);
            return $each;
        });
        if(request()->has('paginate')){
            return view('paginate.admins',[
                'coupons' => $coupons
            ]);
        }
        return view('admins.coupons.manage',[
            'coupons' => $coupons,
            'total' => DB::table('coupons')->count(),
            'active' => DB::table('coupons')->where('status','active')->count(),
            'redeemed' => DB::table('coupons')->where('status','redeemed')->count()
        ]);
    }
    // add tasks
    public function AddTasks(){
        return view('admins.tasks.add');
    }
    // manage tasks
    public function ManageTasks(){

        $tasks=DB::table('tasks')->orderBy('date','desc')->paginate(10);
        $tasks->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->updated)->diffForHumans();
            return $each;
        });
        if(request()->has('paginate')){
            return view('paginate.admins',[
                'tasks' => $tasks
            ]);
        }
        return view('admins.tasks.manage',[
            'total' => DB::table('tasks')->count(),
            'active' => DB::table('tasks')->where('status','active')->count(),
            'completed' => DB::table('tasks')->where('status','completed')->count(),
            'tasks' => $tasks
        ]);
    }
    // edit task
    public function EditTask(){
        return view('admins.tasks.edit',[
            'data' => DB::table('tasks')->where('id',request()->input('id'))->first()
        ]);
    }
    // site settings
    public function SiteSettings(){
        return view('admins.settings',[
            'social' => json_decode(DB::table('settings')->where('key','social_settings')->first()->json ?? '{}'),
            'general' => json_decode(DB::table('settings')->where('key','general_settings')->first()->json ?? '{}'),
            'finance' => json_decode(DB::table('settings')->where('key','finance_settings')->first()->json ?? '{}')
        ]);
    }
    // transactions
    public function Transactions(){
        $transactions=DB::table('transactions')->orderBy('date','desc')->paginate(10);
        $transactions->getCollection()->transform(function($each){
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->json=json_decode($each->json ?? '{}');
            return $each;
        });
        if(request()->has('paginate')){
            return view('paginate.admins',[
                'transactions' => $transactions
            ]);
        }

        return view('admins.transactions',[
            'total' => DB::table('transactions')->count(),
            'today' => DB::table('transactions')->whereDate('date',Carbon::today())->count(),
            'sum' => DB::table('transactions')->sum('amount'),
            'transactions' => $transactions
        ]);
    }
     // airtime transactions
    public function AirtimeTransactions(){
        $transactions=DB::table('transactions')->where('type','like','%airtime topup%')->orderBy('date','desc')->paginate(10);
        $transactions->getCollection()->transform(function($each){
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->json=json_decode($each->json ?? '{}');
            return $each;
        });
       
        if(request()->has('paginate')){
            return view('paginate.admins',[
                'airtime_transactions' => $transactions
            ]);
        }

        return view('admins.airtime',[
            'total' => DB::table('transactions')->where('type','like','%airtime topup%')->count(),
            'today' => DB::table('transactions')->where('type','like','%airtime topup%')->whereDate('date',Carbon::today())->count(),
            'sum' => DB::table('transactions')->where('type','like','%airtime topup%')->sum('amount'),
            'transactions' => $transactions,
            'api_balance' => json_decode(DB::table('settings')->where('key','clubconnect_api_balance')->first()->json ?? '{}')
        ]);
    }
     // data transactions
    public function DataTransactions(){
        $transactions=DB::table('transactions')->where('type','like','%data bundle%')->orderBy('date','desc')->paginate(10);
        $transactions->getCollection()->transform(function($each){
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->json=json_decode($each->json ?? '{}');
            return $each;
        });
       
        if(request()->has('paginate')){
            return view('paginate.admins',[
                'data_transactions' => $transactions
            ]);
        }

        return view('admins.data',[
            'total' => DB::table('transactions')->where('type','like','%data bundle%')->count(),
            'today' => DB::table('transactions')->where('type','like','%data bundle%')->whereDate('date',Carbon::today())->count(),
            'sum' => DB::table('transactions')->where('type','like','%data bundle%')->sum('amount'),
            'transactions' => $transactions,
            'api_balance' => json_decode(DB::table('settings')->where('key','clubconnect_api_balance')->first()->json ?? '{}')
        ]);
    }
    // withdrawals
    public function Withdrawals($status){
       if($status == 'all'){
         $transactions=DB::table('transactions')->where('type','like','%withdrawal%')->orderBy('date','desc')->paginate(10);
       
       } else{
         $transactions=DB::table('transactions')->where('type','like','%withdrawal%')->where('status',$status)->orderBy('date','desc')->paginate(10);
       
       }
       $transactions->getCollection()->transform(function($each){
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->json=json_decode($each->json ?? '{}');
            return $each;
        });
        if(request()->has('paginate')){
            return view('paginate.admins',[
                'transactions' => $transactions
            ]);
        }

        return view('admins.withdrawals',[
            'total' => $status == 'all' ? DB::table('transactions')->where('type','like','%withdrawal%')->count() : DB::table('transactions')->where('type','like','%withdrawal%')->where('status',$status)->count(),
            'today' => $status == 'all' ? DB::table('transactions')->where('type','like','%withdrawal%')->whereDate('date',Carbon::today())->count() : DB::table('transactions')->where('type','like','%withdrawal%')->where('status',$status)->whereDate('date',Carbon::today())->count(),
            'sum' => $status == 'all' ? DB::table('transactions')->where('type','like','%withdrawal%')->sum('amount') : DB::table('transactions')->where('type','like','%withdrawal%')->where('status',$status)->sum('amount'),
            'transactions' => $transactions,
            'total_text' => $status == 'all' ? '' : ($status == 'success' ? 'Successfull' : $status),
            'today_text' => $status == 'all' ? '' : ($status == 'success' ? 'Successfull' : $status),
            'title' => $status == 'success' ? 'Successfull' : ucfirst($status)
        ]);
    }
     // deposits
    public function Deposits($status){
       if($status == 'all'){
         $transactions=DB::table('transactions')->where('type','like','%deposit%')->orderBy('date','desc')->paginate(10);
       
       } else{
         $transactions=DB::table('transactions')->where('type','like','%deposit%')->where('status',$status)->orderBy('date','desc')->paginate(10);
       
       }
       $transactions->getCollection()->transform(function($each){
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->json=json_decode($each->json ?? '{}');
            return $each;
        });
        if(request()->has('paginate')){
            return view('paginate.admins',[
                'transactions' => $transactions
            ]);
        }

        return view('admins.deposits',[
            'total' => $status == 'all' ? DB::table('transactions')->where('type','like','%deposit%')->count() : DB::table('transactions')->where('type','like','%deposit%')->where('status',$status)->count(),
            'today' => $status == 'all' ? DB::table('transactions')->where('type','like','%deposit%')->whereDate('date',Carbon::today())->count() : DB::table('transactions')->where('type','like','%deposit%')->where('status',$status)->whereDate('date',Carbon::today())->count(),
            'sum' => $status == 'all' ? DB::table('transactions')->where('type','like','%deposit%')->sum('amount') : DB::table('transactions')->where('type','like','%deposit%')->where('status',$status)->sum('amount'),
            'transactions' => $transactions,
            'total_text' => $status == 'all' ? '' : ($status == 'success' ? 'Successfull' : $status),
            'today_text' => $status == 'all' ? '' : ($status == 'success' ? 'Successfull' : $status),
            'title' => $status == 'success' ? 'Successfull' : ucfirst($status)
        ]);
    }
    // users
    public function Users(){
        $users=DB::table('users')->orderBy('date','desc')->paginate(10);
        if(request()->has('package_id')){
               $users=DB::table('users')->where('package->id',request('package_id'))->orderBy('date','desc')->paginate(10);
        }
        $users->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->last_deposit=DB::table('transactions')->where('user_id',$each->id)->where('status','success')->where('type','like','%deposit%')->sum('amount');
           $each->package=json_decode($each->package);
           $username=$each->username;
           $each->total_downlines=DB::table('users')->where('ref',$each->username)->orWhereIn('id',function($q) use($username){
            $q->select('username')->from('users')->where('ref',$username);
           })->count();
           if(($each->ref ?? '') !== ''){
            $each->ref_id=DB::table('users')->where('username',$each->ref)->first()->id;
           }
           $each->total_withdrawn=DB::table('transactions')->where('user_id',$each->id)->where('type','like','%withdrawal%')->where('status','success')->sum('amount');
            return $each;
        });
        if(request()->has('paginate')){
             return view('paginate.admins',[
            'users' => $users
        ]);
        }
        return view('admins.users',[
            'total' => DB::table('users')->count(),
            'today' => DB::table('users')->whereDate('date',Carbon::today())->count(),
            'active' => DB::table('users')->where('status','active')->count(),
            'users' => $users,
            'package' => request('package_name') ?? null
        ]);
    }
      // active users
    public function ActiveUsers(){
        $users=DB::table('users')->where('status','active')->orderBy('date','desc')->paginate(10);
        $users->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->last_deposit=DB::table('transactions')->where('user_id',$each->id)->where('status','success')->where('type','like','%deposit%')->sum('amount');
           $each->package=json_decode($each->package);
           $username=$each->username;
           $each->total_downlines=DB::table('users')->where('ref',$each->username)->orWhereIn('id',function($q) use($username){
            $q->select('username')->from('users')->where('ref',$username);
           })->count();
           if(($each->ref ?? '') !== ''){
            $each->ref_id=DB::table('users')->where('username',$each->ref)->first()->id;
           }
           $each->total_withdrawn=DB::table('transactions')->where('user_id',$each->id)->where('type','like','%withdrawal%')->where('status','success')->sum('amount');
            return $each;
        });
        if(request()->has('paginate')){
             return view('paginate.admins',[
            'users' => $users
        ]);
        }
        return view('admins.users',[
            'total' => DB::table('users')->count(),
            'today' => DB::table('users')->whereDate('date',Carbon::today())->count(),
            'active' => DB::table('users')->where('status','active')->count(),
            'users' => $users
        ]);
    }
      // banned users
    public function BannedUsers(){
        $users=DB::table('users')->where('status','banned')->orderBy('date','desc')->paginate(10);
        $users->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->last_deposit=DB::table('transactions')->where('user_id',$each->id)->where('status','success')->where('type','like','%deposit%')->sum('amount');
           $each->package=json_decode($each->package);
           $username=$each->username;
           $each->total_downlines=DB::table('users')->where('ref',$each->username)->orWhereIn('id',function($q) use($username){
            $q->select('username')->from('users')->where('ref',$username);
           })->count();
           if(($each->ref ?? '') !== ''){
            $each->ref_id=DB::table('users')->where('username',$each->ref)->first()->id;
           }
           $each->total_withdrawn=DB::table('transactions')->where('user_id',$each->id)->where('type','like','%withdrawal%')->where('status','success')->sum('amount');
            return $each;
        });
        if(request()->has('paginate')){
             return view('paginate.admins',[
            'users' => $users
        ]);
        }
        return view('admins.users',[
            'total' => DB::table('users')->count(),
            'today' => DB::table('users')->whereDate('date',Carbon::today())->count(),
            'active' => DB::table('users')->where('status','active')->count(),
            'users' => $users
        ]);
    }
      // user
    public function User(){
        $user=DB::table('users')->where('id',request()->input('id'))->orderBy('date','desc')->first();
      
           $user->frame=Carbon::parse($user->date)->diffForHumans();
           $user->last_deposit=DB::table('transactions')->where('user_id',$user->id)->where('status','success')->where('type','like','%deposit%')->sum('amount');
          $user->package=json_decode($user->package);
           $username=$user->username;
          $user->total_downlines=DB::table('users')->where('ref',$user->username)->orWhereIn('id',function($q) use($username){
            $q->select('username')->from('users')->where('ref',$username);
           })->count();
           if(($user->ref ?? '') !== ''){
           $user->ref_id=DB::table('users')->where('username',$user->ref)->first()->id;
           }
          $user->total_withdrawn=DB::table('transactions')->where('user_id',$user->id)->where('type','like','%withdrawal%')->where('status','success')->sum('amount');
           $user->bank=($user->bank ?? '') == '' ? '' : json_decode($user->bank);
           $user->total_deposit=DB::table('transactions')->where('user_id',$user->id)->where('type','like','%deposit%')->where('status','success')->sum('amount');
           $user->total_tasks=DB::table('task_proofs')->where('user_id',$user->id)->count();
       
      
        return view('admins.user',[
           
            'data' => $user
        ]);
    }
    // login as user
    public function LoginAsUser(){
        Auth::guard('users')->loginUsingId(request()->input('id'));
        return redirect('users/dashboard');
    }
    // mark as vendor
    public function MarkAsVendor(){
        if(request()->input('type') == 'user'){
            DB::table('users')->where('id',request()->input('id'))->update([
                'type' => 'vendor'
            ]);
            return redirect()->to('admins/user?id='.request()->input('id').'');
        }else{
             DB::table('users')->where('id',request()->input('id'))->update([
                'type' => 'user'
            ]);
            return redirect()->to('admins/user?id='.request()->input('id').'');
        }
    }
    // vendors
    public function Vendors(){
        $users=DB::table('users')->where('type','vendor')->orderBy('date','desc')->paginate(10);
        $users->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->last_deposit=DB::table('transactions')->where('user_id',$each->id)->where('status','success')->where('type','like','%deposit%')->sum('amount');
           $each->package=json_decode($each->package);
           $username=$each->username;
           $each->total_downlines=DB::table('users')->where('ref',$each->username)->orWhereIn('id',function($q) use($username){
            $q->select('username')->from('users')->where('ref',$username);
           })->count();
           if(($each->ref ?? '') !== ''){
            $each->ref_id=DB::table('users')->where('username',$each->ref)->first()->id;
           }
           $each->total_withdrawn=DB::table('transactions')->where('user_id',$each->id)->where('type','like','%withdrawal%')->where('status','success')->sum('amount');
            return $each;
        });
        if(request()->has('paginate')){
             return view('paginate.admins',[
            'users' => $users
        ]);
        }
        return view('admins.users',[
            'total' => DB::table('users')->where('type','vendor')->count(),
            'today' => DB::table('users')->where('type','vendor')->whereDate('date',Carbon::today())->count(),
            'active' => DB::table('users')->where('type','vendor')->where('status','active')->count(),
            'users' => $users,
            'vendors' => true
        ]);
    }
    // manage packages
    public function ManagePackages(){
        $pkg=DB::table('packages')->orderBy('cost','asc')->paginate(10);
        if(request()->has('paginate')){
             return view('paginate.admins',[
            'pkg' => $pkg,
            'manage_packages' => true
        ]);
        }
        return view('admins.packages.manage',[
            'pkg' => $pkg
        ]);
    }
    // edit package
    public function EditPackage(){
        $pkg=DB::table('packages')->where('id',request()->input('id'))->first();
        return view('admins.packages.edit',[
            'data' => $pkg
        ]);
    }
     // tasks submitted
    public function TasksSubmitted(){
        $proofs=DB::table('task_proofs')->orderBy('date','desc')->paginate(10);
        $proofs->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->json=json_decode($each->json);
            return $each;
        });
        if(request()->has('paginate')){
              return view('paginate.admins',[
            'proofs' => $proofs,
            'task_proofs' => true
        ]);
        }
        return view('admins.tasks.submitted',[
            'total' => DB::table('task_proofs')->count(),
            'today' => DB::table('task_proofs')->whereDate('date',Carbon::today())->count(),
            'sum' => DB::table('task_proofs')->sum('json->reward'),
            'proofs' => $proofs
        ]);
    }
     // logs
    public function Logs(){
        $logs=DB::table('logs')->orderBy('date','desc')->paginate(10);
        $logs->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            return $each;
        });
        if(request()->has('paginate')){
            return view('paginate.admins',[
            'logs' => $logs
        ]);
        }
        return view('admins.logs',[
            'logs' => $logs
        ]);
    }
    // notifications
    public function Notifications(){
        $notifications=DB::table('notifications')->orderBy('date','desc')->paginate(10);
        $notifications->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            return $each;
        });
        if(request()->has('paginate')){
             return view('paginate.admins',[
            'notifications' => $notifications,
            
        ]);
        }
        return view('admins.notifications',[
            'notifications' => $notifications,
            'total' => DB::table('notifications')->where('status','unread')->count()
        ]);
    }
    // mark as read
    public function MarkAsRead(){
        DB::table('notifications')->where('id',request()->input('id'))->update([
            'status' => 'read'
        ]);
        return redirect()->to('admins/notifications');
    }
     // mark all as read
    public function MarkAllAsRead(){
        DB::table('notifications')->update([
            'status' => 'read'
        ]);
        return redirect()->to('admins/notifications');
    }
    // logout
    public function Logout(){
        Auth::guard('admins')->logout();
        return redirect()->to('admins/login');
    }
    // articles topic
    public function ArticlesTopic(){
        $topics=DB::table('article_topics')->orderBy('date','desc')->paginate(10);
        $topics->getCollection()->transform(function($each){
          if(($each->winner_id ?? '') !== ''){
              $each->winner_username=DB::table('users')->where('id',$each->winner_id)->first()->username;
          }
          $each->frame=Carbon::parse($each->date)->diffForHumans();
          return $each;
        });
        if(request()->has('paginate')){
              return view('paginate.admins',[
            'topics' => $topics,
            'article_topics' => true
        ]);
        }
        return view('admins.articles.topics',[
            'topics' => $topics
        ]);
    }
    // article writers
    public function ArticleWriters(){
        $writers=DB::table('articles')->where('topic->id',request()->input('id'))->orderBy('date','desc')->paginate(10);
        $writers->getCollection()->transform(function($each){
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->votes=DB::table('article_votes')->where('article_id',$each->id)->count();
            return $each;
        });
        if(request()->has('paginate')){
             return view('paginate.admins',[
            'writers' => $writers
        ]);
        }
        return view('admins.articles.writers',[
            'topic' => DB::table('article_topics')->where('id',request()->input('id'))->first()->topic,
            'writers' => $writers
        ]);
    }
    // read more 
    public function ReadMore(){
        $article=DB::table('articles')->where('id',request()->input('id'))->first();
          $article->user=DB::table('users')->where('id',$article->user_id)->first();
            $article->frame=Carbon::parse($article->date)->diffForHumans();
            $article->votes=DB::table('article_votes')->where('article_id',$article->id)->count();
        $article->topic=json_decode($article->topic);
        return view('admins.articles.more',[
            'data' => $article
        ]);
    }
    // add vouchers
    public function AddGamesVoucher(){
        return view('admins.vouchers.games.add',[
            'vendors' => DB::table('users')->where('type','vendor')->where('status','active')->get(),
            'packages' => DB::table('packages')->where('cost','>','0')->orderBy('cost','asc')->where('status','active')->get()
       
        ]);
    }
    // games history
    public function GamesHistory(){
        $games=DB::table('games')->orderBy('date','desc')->paginate(10);
        $games->getCollection()->transform(function($each){
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            return $each;

        });
           if(request()->has('paginate')){
            return view('paginate.admins',[
                'games_history' => 'true',
                'games' => $games
            ]);
        }
        return view('admins.games',[
            'games' => $games
        ]);
    }
    // add skills
    public function AddSkills(){
        return view('admins.skills.add');
    }
    // manage skills
    public function ManageSkills(){
        $skills=DB::table('skills')->orderBy('date','desc')->paginate(10);
        $skills->getCollection()->transform(function($each){
            $each->frame = Carbon::parse($each->date)->diffForHumans();
            return $each;
        });

        return view('admins.skills.manage',[
            'total' => DB::table('skills')->count(),
            'skills' => $skills
        ]);
    }
    // skills delete
    public function SkillsDelete(){
        DB::table('skills')->where('id',request('id'))->delete();
        return redirect(url()->previous());
    }
     // song delete
    public function DeleteSong(){
        DB::table('songs')->where('id',request('id'))->delete();
        return redirect(url()->previous());
    }
    // edit skills
    public function EditSkills(){
        $skill=DB::table('skills')->where('id',request('id'))->first();
       return view('admins.skills.edit',[
        'data' => $skill
       ]);
    }
    // stream add
    public function MusicStreamAdd(){
        return view('admins.stream.music.add');
    }
      // manage songs
    public function ManageSongs(){
        $songs=DB::table('songs')->orderBy('date','desc')->paginate(10);
        $songs->getCollection()->transform(function($each){
    $each->streams=DB::table('streams')->where('song->id',$each->id)->count();
    return $each;
        });
        return view('admins.stream.music.manage',[
            'total' => DB::table('songs')->count(),
            'songs' => $songs
        ]);
    }
    // streams
    public function ViewStreams(){
        $top_streamers=DB::table('streams')->select('user_id',DB::raw('COUNT(*) as total'))->groupBy('user_id')->orderBy('total','desc')->paginate(10);
        $top_streamers->getCollection()->transform(function($each){
    $each->user=DB::table('users')->where('id',$each->user_id)->first();
    return $each;
        });
        return view('admins.stream.music.streams',[
            'streams' => $top_streamers
        ]);
    }
}

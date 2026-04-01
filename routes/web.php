<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersDashboardController;
use App\Http\Controllers\AdminsDashboardController;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AdminsPostRequestController;
use App\Http\Middleware\AdminLoggedInMiddleware;
use App\Http\Controllers\AdminsGetRequestController;
use App\Http\Controllers\UserPostRequestController;
use App\Http\Controllers\UsersGetRequestController;
use App\Http\Middleware\UsersAuthCheckerMiddleware;
use Illuminate\Support\Facades\DB;




Route::get('hash',function(){
    return Hash::make(request('password'));
});
Route::get('db/queries',[
    UsersDashboardController::class,'DBQueries'
]);
Route::get('users/get/site/mode/process',[
    UsersGetRequestController::class,'SiteMode'
]);
Route::get('/',[
    UsersDashboardController::class,'Index'
]);
Route::get('coupon',[
    UsersDashboardController::class,'Vendors'
]);
Route::get('coupon/checker',[
    UsersDashboardController::class,'CouponChecker'
]);
Route::get('vendors',[
    UsersDashboardController::class,'Vendors'
]);
Route::get('voucher/vendors',[
    UsersDashboardController::class,'VoucherVendors'
]);
Route::get('login',[
    UsersDashboardController::class,'Login'
]);
Route::get('register',[
    UsersDashboardController::class,'Register'
]);
Route::get('register',[
    UsersDashboardController::class,'RefRegister'
]);
Route::get('earners/top',[
    UsersDashboardController::class,'TopEarners'
]);
Route::get('streamers/top',[
    UsersDashboardController::class,'TopStreamers'
]);
Route::get('about',[
    UsersDashboardController::class,'AboutUs'
]);
Route::get('terms',[
    UsersDashboardController::class,'Terms'
]);
Route::get('package/list',[
    UsersDashboardController::class,'PackageList'
]);


//  prefix users
Route::prefix('users')->group(function(){
   Route::middleware([UsersAuthCheckerMiddleware::class])->group(function(){
     Route::get('dashboard',[
        UsersDashboardController::class,'Dashboard'
    ]);
     Route::get('vendor/dashboard',[
        UsersDashboardController::class,'VendorDashboard'
    ]);
      Route::get('voucher/codes',[
        UsersDashboardController::class,'VoucherCodes'
    ]);
    Route::get('tasks',[
        UsersDashboardController::class,'Tasks'
    ]);
    
    Route::get('transactions',[
        UsersDashboardController::class,'Transactions'
    ]);
    Route::get('transaction/receipt',[
        UsersDashboardController::class,'TransactionReceipt'
    ]);
    Route::get('account/settings',[
        UsersDashboardController::class,'Profile'
    ]);
    Route::get('bank/add',[
        UsersDashboardController::class,'AddBank'
    ]);
    Route::get('bank/details',[
        UsersDashboardController::class,'AddBank'
    ]);
    Route::get('withdraw',[
        UsersDashboardController::class,'Withdraw'
    ]);
    
    Route::get('team',[
        UsersDashboardController::class,'Team'
    ]);
    Route::get('security/settings',[
        UsersDashboardController::class,'Password'
    ]);
     Route::get('profile/photo/update',[
        UsersDashboardController::class,'ProfilePhoto'
    ]);
    Route::get('articles/write',[
        UsersDashboardController::class,'WriteArticle'
    ]);
    Route::get('articles/read',[
        UsersDashboardController::class,'ReadArticles'
    ]);
    Route::get('article/read/more',[
        UsersDashboardController::class,'ReadMore'
    ]);
    Route::get('airtime/topup',[
        UsersDashboardController::class,'AirtimeTopup'
    ]);
     Route::get('data/topup',[
        UsersDashboardController::class,'DataTopup'
    ]);
    Route::get('logout',[
        UsersDashboardController::class,'Logout'
    ]);
    Route::get('games',[
        UsersDashboardController::class,'Games'
    ]);
    Route::get('games/color',[
        UsersDashboardController::class,'ColorGames'
    ]);
    Route::get('referral/contest',[
        UsersDashboardController::class,'ReferralContest'
    ]);
    Route::get('skill/aquisition',[
        UsersDashboardController::class,'SkillAquisition'
    ]);
    Route::get('forex/trading',[
        UsersDashboardController::class,'ForexTrading'
    ]);
    Route::get('neo/chat',[
        UsersDashboardController::class,'NeoChat'
    ]);
    Route::get('neo/stream',[
        UsersDashboardController::class,'NeoStream'
    ]);
    Route::get('neo/translate',[
        UsersDashboardController::class,'NeoTranslate'
    ]);
    


   });



//    prefix get
   Route::prefix('get')->group(function(){
    
   
    Route::get('bank/auto/verify',[
        UsersGetRequestController::class,'BankAutoVerify'
    ]);
    Route::get('vote/article',[
        UsersGetRequestController::class,'VoteArticle'
    ]);
    Route::get('airtime/topup',[
        UsersGetRequestController::class,'AirtimeTopup'
    ]);
     Route::get('data/topup',[
        UsersGetRequestController::class,'DataTopup'
    ]);
    Route::get('redeem/voucher/process',[
       UsersGetRequestController::class,'RedeemVoucher'
    ]);
    Route::get('color/game/play/process',[
        UsersGetRequestController::class,'ColorGame'
    ]);
     Route::get('streamed',[
            UsersGetRequestController::class,'Streamed'
        ]);
   });

    // prefix post
    Route::prefix('post')->group(function(){
        Route::post('register/process',[
          UserPostRequestController::class,'Register'
        ]);
        Route::post('claim/task/reward/process',[
        UsersGetRequestController::class,'ClaimTaskReward'
    ]);
        Route::post('login/process',[
            UserPostRequestController::class,'Login'
        ]);
        Route::post('add/bank/process',[
            UserPostRequestController::class,'AddBank'
        ]);
        Route::post('withdraw/process',[
            UserPostRequestController::class,'Withdraw'
        ]);
        Route::post('update/password/process',[
            UserPostRequestController::class,'UpdatePassword'
        ]);
         Route::post('update/profile/photo/process',[
            UserPostRequestController::class,'UpdatePhoto'
        ]);
        Route::post('publish/article/process',[
            UserPostRequestController::class,'PublishArticle'
        ]);
        Route::post('coupon/checker/process',[
            UserPostRequestController::class,'CouponChecker'
        ]);
        Route::post('upgrade/package/process',[
            UserPostRequestController::class,'UpgradeAccount'
        ]);
        Route::post('update/profile/process',[
            UserPostRequestController::class,'UpdateProfile'
        ]);
       
    });
});







// prefix admins
Route::prefix('admins')->group(function(){
    // auth
     Route::get('login',[
        AdminsDashboardController::class,'Login'
    ]);

// dashboard
   Route::middleware([AdminLoggedInMiddleware::class])->group(function(){
    

    Route::get('dashboard',[
        AdminsDashboardController::class,'Dashboard'
    ]);
    Route::get('packages/add',[
        AdminsDashboardController::class,'AddPackage'
    ]);
    Route::get('vendors/add',[
        AdminsDashboardController::class,'AddVendor'
    ]);
    Route::get('coupons/add',[
        AdminsDashboardController::class,'AddCoupon'
    ]);
    Route::get('coupons/all',[
        AdminsDashboardController::class,'ManageCoupons'
    ]);
     Route::get('coupons/active',[
        AdminsDashboardController::class,'ActiveCoupons'
    ]);
     Route::get('coupons/redeemed',[
        AdminsDashboardController::class,'RedeemedCoupons'
    ]);
    Route::get('tasks/add',[
        AdminsDashboardController::class,'AddTasks'
    ]);
    Route::get('tasks/manage',[
        AdminsDashboardController::class,'ManageTasks'
    ]);
    Route::get('task/edit',[
        AdminsDashboardController::class,'EditTask'
    ]);
    Route::get('site/settings',[
        AdminsDashboardController::class,'SiteSettings'
    ]);
    Route::get('transactions',[
       AdminsDashboardController::class,'Transactions'
    ]);
     Route::get('transactions/airtime',[
       AdminsDashboardController::class,'AirtimeTransactions'
    ]);
     Route::get('transactions/data',[
       AdminsDashboardController::class,'DataTransactions'
    ]);
    Route::get('deposits/{status}',[
        AdminsDashboardController::class,'Deposits'
    ]);
    Route::get('withdrawals/{status}',[
        AdminsDashboardController::class,'Withdrawals'
    ]);
    Route::get('users/all',[
        AdminsDashboardController::class,'Users'
    ]);
    Route::get('users/active',[
        AdminsDashboardController::class,'ActiveUsers'
    ]);
    Route::get('users/banned',[
        AdminsDashboardController::class,'BannedUsers'
    ]);
     Route::get('user',[
        AdminsDashboardController::class,'User'
    ]);
    Route::get('login/as/user',[
        AdminsDashboardController::class,'LoginAsUser'
    ]);
      Route::get('mark/as/vendor',[
        AdminsDashboardController::class,'MarkAsVendor'
    ]);
    Route::get('ban/user',[
        AdminsGetRequestController::class,'BanUser'
    ]);
    Route::get('vendors',[
        AdminsDashboardController::class,'Vendors'
    ]);
    Route::get('packages/manage',[
        AdminsDashboardController::class,'ManagePackages'
    ]);
    Route::get('package/edit',[
        AdminsDashboardController::class,'EditPackage'
    ]);
    Route::get('tasks/submitted',[
        AdminsDashboardController::class,'TasksSubmitted'
    ]);
    Route::get('articles/topic',[
        AdminsDashboardController::class,'ArticlesTopic'
    ]);
    Route::get('games/history',[
        AdminsDashboardController::class,'GamesHistory'
    ]);
    // vouchers
    Route::get('vouchers/add',[
        AdminsDashboardController::class,'AddGamesVoucher'
    ]);
    Route::get('vouchers/all',[
        AdminsDashboardController::class,'AllGamesVoucher'
    ]);
    Route::get('vouchers/active',[
        AdminsDashboardController::class,'ActiveVouchers'
    ]);
    Route::get('vouchers/redeemed',[
        AdminsDashboardController::class,'RedeemedVouchers'
    ]);
    // logs
    Route::get('logs',[
        AdminsDashboardController::class,'Logs'
    ]);
    Route::get('notifications',[
        AdminsDashboardController::class,'Notifications'
    ]);
    Route::get('notification/mark/as/read',[
        AdminsDashboardController::class,'MarkAsRead'
    ]);
     Route::get('notification/mark/all/as/read',[
        AdminsDashboardController::class,'MarkAllAsRead'
    ]);
    Route::get('logout',[
        AdminsDashboardController::class,'Logout'
    ]);
    Route::get('article/writers',[
        AdminsDashboardController::class,'ArticleWriters'
    ]);
    Route::get('article/read/more',[
        AdminsDashboardController::class,'ReadMore'
    ]);
    Route::get('skills/add',[
    AdminsDashboardController::class,'AddSkills'
    ]);
    Route::get('skills/manage',[
    AdminsDashboardController::class,'ManageSkills'
    ]);
    Route::get('skills/delete',[
        AdminsDashboardController::class,'SkillsDelete'
    ]);
     Route::get('song/delete',[
        AdminsDashboardController::class,'DeleteSong'
    ]);
    Route::get('skills/edit',[
        AdminsDashboardController::class,'EditSkills'
    ]);
    Route::get('music/stream/add',[
       AdminsDashboardController::class,'MusicStreamAdd'
    ]);
      //  manage songs
        Route::get('music/stream/manage',[
            AdminsDashboardController::class,'ManageSongs'
        ]);
        // view streams
        Route::get('music/stream/view',[
           AdminsDashboardController::class,'ViewStreams'
        ]);



   });
   Route::get('search/users',[
    AdminsGetRequestController::class,'SearchUsers'
   ]);
// get request
Route::prefix('get')->group(function(){
    Route::get('coupon/delete',[
        AdminsGetRequestController::class,'DeleteCoupon'
    ]);
     Route::get('voucher/delete',[
        AdminsGetRequestController::class,'DeleteVoucher'
    ]);
    Route::get('task/delete',[
        AdminsGetRequestController::class,'DeleteTask'
    ]);
    Route::get('package/delete',[
        AdminsGetRequestController::class,'DeletePackage'
    ]);
    Route::get('topic/delete',[
        AdminsGetRequestController::class,'DeleteTopic'
    ]);
    Route::get('transaction/approve',[
        AdminsGetRequestController::class,'ApproveTransaction'
    ]);
     Route::get('transaction/reject',[
        AdminsGetRequestController::class,'RejectTransaction'
    ]);

    Route::get('article/delete',[
        AdminsGetRequestController::class,'DeleteArticle'
    ]);
  
    Route::get('api/balance',[
        AdminsGetRequestController::class,'APIBalance'
    ]);
});


//    post request
    Route::prefix('post')->group(function(){
        Route::post('login/process',[
            AdminsPostRequestController::class,'Login'
        ]);
        Route::post('packages/add/process',[
            AdminsPostRequestController::class,'AddPackage'
        ]);
         Route::post('packages/edit/process',[
            AdminsPostRequestController::class,'EditPackage'
        ]);
        Route::post('create/coupon/process',[
            AdminsPostRequestController::class,'CreateCoupon'
        ]);
        Route::post('task/add/process',[
            AdminsPostRequestController::class,'AddTask'
        ]);
         Route::post('task/edit/process',[
            AdminsPostRequestController::class,'EditTask'
        ]);
        Route::post('general/settings/process',[
            AdminsPostRequestController::class,'GeneralSettings'
        ]);
         Route::post('social/settings/process',[
            AdminsPostRequestController::class,'SocialSettings'
        ]);
         Route::post('finance/settings/process',[
            AdminsPostRequestController::class,'FinanceSettings'
        ]);
        Route::post('credit/user/process',[
            AdminsPostRequestController::class,'CreditUser'
        ]);
         Route::post('debit/user/process',[
            AdminsPostRequestController::class,'DebitUser'
        ]);
        Route::post('add/article/topic/process',[
            AdminsPostRequestController::class,'AddArticleTopic'
        ]);
        // add skill
        Route::post('add/skill/process',[
            AdminsPostRequestController::class,'AddSkill'
        ]);
          // edit skill
        Route::post('edit/skill/process',[
            AdminsPostRequestController::class,'EditSkill'
        ]);
        // vouchers
          Route::post('create/voucher/process',[
            AdminsPostRequestController::class,'CreateVoucher'
        ]);
        // add song
        Route::post('add/song/process',[
            AdminsPostRequestController::class,'AddSong'
        ]);
      
    });
});
 


Route::get('queries',function(){
    $trx=DB::table('transactions')->where('type','First Indirect Commission')->where('class','credit')->where('amount',7000)->get();
    foreach($trx as $data){
        DB::table('users')->where('id',$data->user_id)->update([
            'affiliate_balance' => DB::raw('affiliate_balance - 6800')
        ]);
        DB::table('transactions')->where('id',$data->id)->update([
            'amount' => '200'
        ]);
    }
     $trx=DB::table('transactions')->where('type','First Indirect Commission')->where('class','credit')->where('amount',2000)->get();
    foreach($trx as $data){
        DB::table('users')->where('id',$data->user_id)->update([
            'affiliate_balance' => DB::raw('affiliate_balance - 1900')
        ]);
        DB::table('transactions')->where('id',$data->id)->update([
            'amount' => '100'
        ]);
    }
    if(!DB::getSchemaBuilder()->hasColumn('users','country')){
  DB::statement("ALTER TABLE `users` ADD `country` VARCHAR(255) DEFAULT 'nigeria' AFTER `phone`");

    }
      if(!DB::getSchemaBuilder()->hasColumn('packages','country')){
  DB::statement("ALTER TABLE `packages` ADD `country` VARCHAR(255) DEFAULT 'nigeria' AFTER `name`");

    }
    if(!DB::getSchemaBuilder()->hasTable('vouchers')){
        DB::statement("CREATE TABLE IF NOT EXISTS `vouchers`(`id` INT PRIMARY KEY AUTO_INCREMENT,`code` VARCHAR(255) DEFAULT NULL,`vendor_id` VARCHAR(255) DEFAULT 'non_vendor',`value` FLOAT DEFAULT NULL,`status` VARCHAR(255) DEFAULT 'active',`date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,`updated` TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");
    }
     if(DB::getSchemaBuilder()->hasTable('vouchers')){
        if(!DB::getSchemaBuilder()->hasColumn('vouchers','json')){
            DB::statement("ALTER TABLE `vouchers` ADD `json` JSON DEFAULT NULL");
        }
        if(!DB::getSchemaBuilder()->hasColumn('vouchers','type')){
            DB::statement("ALTER TABLE `vouchers` ADD `type` VARCHAR(255) DEFAULT NULL AFTER `code`");
        }
          if(!DB::getSchemaBuilder()->hasColumn('vouchers','used_by')){
            DB::statement("ALTER TABLE `vouchers` ADD `used_by` VARCHAR(255) DEFAULT NULL AFTER `code`");
        }
     }
     if(!DB::getSchemaBuilder()->hasTable('games')){
        DB::statement("CREATE TABLE IF NOT EXISTS `games`(`id` BIGINT PRIMARY KEY AUTO_INCREMENT,`name` VARCHAR(255) DEFAULT NULL,`stake` BIGINT DEFAULT 0,`win` BIGINT DEFAULT 0,`json` JSON DEFAULT NULL,`status` VARCHAR(255) DEFAULT 'win',`updated` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,`date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");
     }
     if(DB::getSchemaBuilder()->hasTable('games')){
        if(!DB::getSchemaBuilder()->hasColumn('games','user_id')){
            DB::statement("ALTER TABLE `games` ADD `user_id` BIGINT DEFAULT NULL");
        }
     }
  
});

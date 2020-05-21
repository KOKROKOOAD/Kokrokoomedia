<?php

use App\Models\ScheduledAd;
use App\AdminAuditTrail;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//
Route::get('/', function () {
    return redirect('/admin/dashboard');
})->middleware('auth')->name('welcome');

Route::get('/datatables', 'TestController@dataTable')->name('datatables');


Route::get('/upload', function () {
    return view('excel.upload_excel');
});

Route::get('/view-file', function () {
    return view('excel.upload');
});

Route::post('/excel-upload', 'ExcelController@excelUpload')->name('upload-excel');
Route::get('/down', 'ExcelController@downloads')->name('download');

//
//Route::get('/personal-account',function (){
//        return view('Registration.personalAccount');
//    })->name('register.personal');
//
//Route::get('/organization-account',function (){
//    return view('Registration.companyAccount');
//})->name('register.org');
//
//Route::get('/media-account',function (){
//    return view('Registration.mediaAccount');
//})->name('register.media');
//
//Route::get('create-ratecard/success',function (){
//    return view('notifications.register_success');
//})->name('ratecard.success');
//
//
//
//Route::get('/test',function (){
//    return view('test');
//})->name('test');
//
//Route::get('/guest-login',function (){
//    return view('guest.guest');
//})->name('guest.login');
//
//
////Route::get('/staff-login',function (){
////    return view('admin.login');
////})->name('staff.login');
//
//
//
//
//
Route::middleware(['auth'])->prefix('media/admin')->group(function () {

/* 
    Route::get('/relation', function () {
        echo  User::find(13)->user_id;
    }); */


    Route::get('/fetch', 'TestController@imagePaths');



    Route::get('active-subscription', function () {
        return view('userDashboard.activeSubscription');
    })->name('sub.active');


    Route::get('/view-file', function () {
        return view('excel.upload');
    });

    Route::post('/excel-upload', 'ExcelController@excelUpload')->name('upload-excel');
    Route::get('/down', 'ExcelController@downloads')->name('download');


    Route::get('inactive-subscription', function () {
        return view('userDashboard.inactiveSubscription');
    })->name('sub.inactive');

    Route::get('expired-subscription', function () {
        return view('userDashboard.expiredSubscription');
    })->name('sub.expired');

    Route::get('/admin-activities', 'AdminController@adminActivities')->name('activities.admins');


    /* Route::get('pending-subscription', function () {

        if (Auth::guard()->check()) {
            $pendSubs  =  ScheduledAd::select('created_ad_data')->whereMedia_house_id(auth()->user()->client_id)->whereStatus('pending')->latest()->paginate(50);
        } elseif (Auth::guard('admin')) {
            $pendSubs  =  ScheduledAd::select('created_ad_data')->whereMedia_house_id(Auth::guard('admin')->user()->media_house_id)->whereStatus('pending')->latest()->paginate(50);
        }
        return view('userDashboard.pendingSubscription')->with('pendSubs', json_decode($pendSubs),true);
    })->name('sub.pending');
 */
    Route::get('pending-subscription', 'SubController@pendingSubs')->name('sub.pending');


    //    Route::get('transactions', function () {
    //        return view('userDashboard.transactions');
    //    })->name('transact');
    //
    Route::get('transactions', 'TransactionsController@index')->name('transact');

    Route::get('user-profile', function () {
        return view('userDashboard.accountSettings');
    })->name('profile');

    Route::get('new-subscriptions', function () {
        return view('userDashboard.newSubscription');
    })->name('sub.new');

    Route::get('dashboard', function () {
        $media = \App\Models\Avatar::all('logo');
        return view('userDashboard.dashboard', ['media' => $media]);
    })->name('dashboard');

  /*   Route::get('/existing-') */

/*     Route::get('dashboard', function () {

        return view('userDashboard.dashboard');
    })->name('dashboard'); 
 */
    /* Route::get('/subscription', function () {
         
        $subs  =  ScheduledAd::whereMedia_house_id(auth()->user()->client_id)->latest()->paginate(50);

        return view('userDashboard.createSub', ['subs' => $subs]); 
    })->name('sub.all');*/

    Route::get('/subscriptions', 'SubController@fetchSubscriptions')->name('sub.all');
    //securyity routes
    Route::get('/password-reset', 'ChangePasswordController@index')->name('show.change.password');

    Route::post('/change-password', 'ChangePasswordController@changePassword')->name('change.password');
    // Route::get('alls-subscription', 'subController@fetchSubScriptions');

    Route::get('rejected-subscription', function () {
        return view('userDashboard.rejectedSubscription');
    })->name('sub.reject');

    Route::get('testing', function () {
        return view('test');
    });
    Route::get('create-ratecard/success', function () {
        return view('notifications.register_success');
    })->name('ratecard.success');


    //RATE CARDS
    Route::get('rate-card-title', function () {
        return view('userDashboard.createRateCardTitle');
    })->name('create.ratecard');

    //    Route::get('downloadable-subscriptions',function (){
    //        return view('userDashboard.downloadable-subs');
    //    })->name('downloadable.subs');

    Route::get('create-rate-card', function () {
        return view('userDashboard.createRateCard');
    })->name('create.rate.cards');


    //    Route::get('view-rate-card', function () {
    //        return view('userDashboard.viewRateCard');
    //    })->name('view.ratecard');

    Route::get('ratecards', 'RateCardController@index')->name('view.ratecard');
    Route::get('/ratecard/{id}', 'RateCardController@showRateCardDetails')->name('show.ratecard');


    //    Route::get('manage-admins',function (){
    //        return view('userDashboard.manageAdmin');
    //    })->name('manage.admins');

    Route::get('create-admins', function () {
        return view('userDashboard.createAdmin');
    })->name('create.admins');

    Route::post('store-ratecard/api', 'RateCardController@storeRateCards');
    Route::post('rate-card-title/api-store', 'RateCardController@storeRateCardTitle')->name('store.rate.card.title');
    Route::get('ratecard-title/api/{ratecard_id}', 'RateCardController@fetchRateCardTitle');
    Route::get('fetch-ratecards/api', 'RateCardController@getRateCards')->name('fetch.rate.cards');
    Route::get('view-ratecard/api', 'RateCardController@viewRateCard')->name('view.rate.card');
    Route::post('delete-ratecard/api', 'RateCardController@deleteRateCard')->name('delete.rate.card');



    // RATE  CARDS ENDS HERE

    Route::post('ads-store', 'SubController@createSub');
    Route::get('ads/media-api', 'SubController@loadMedia');
    Route::get('fetch-ads/api', 'SubController@fetchAds');
    Route::get('media-houses-api/{media}', 'SubController@fetchMediaHouse');
    Route::get('media-program-api/{mediaHouse}', 'SubController@fetchMediaProgram');
    Route::get('program-date-api/{mediaProgram}', 'SubController@fetchProgramDates');
    Route::get('fetch-segments-titles/{id}', 'SegmentController@fetchSegmentTitles');
    Route::get('fetch-segments/{mediaHouse}/{segmentTitle}/{date}', 'SegmentController@fetchSegments');
    Route::get('check-spots-api/{segment}', 'SegmentController@checkSpots');
    Route::post('sub-update-api', 'SubController@updateAds');
    Route::get('downloadable-subscriptions', 'SubController@downloadableSub')->name('downloadable.subs');
    Route::get('download-sub/{id}', 'SubController@downloadFile')->name('download.sub');
    Route::get('view-subscription/download-sub/{id}', 'SubController@downloadFile')->name('download.sub');

    //admin controller routes
    Route::get('/manage-admins', 'AdminController@viewAdmins')->name('manage.admins');
    Route::post('/store-admin', 'AdminController@storeAdmin')->name('admin.store');
    Route::get('admin-edit', 'AdminController@editAdmin')->name('edit.admin');
    Route::post('admin-update', 'AdminController@updateAdmin')->name('update.admin');
    Route::post('block-admin/api', 'AdminController@blockAdmin')->name('block.admin');
    Route::post('unblock-admin/api', 'AdminController@unblockAdmin')->name('unblock.admin');
    Route::post('admin-profile/update', 'AdminController@adminProfileUpdate')->name('admin.profile');
    Route::post('delete-admin/api', 'AdminController@deleteAdmin')->name('delete.admin');



    Route::post('/tests', 'AdminController@test')->name('test.store');
    Route::get('/reports', 'ReportsController@index')->name('reports');
    Route::get('/reports-daily', 'ReportsController@showDailyReports')->name('reports.daily');
    Route::get('/fetch-dailyTrans/api', 'ReportsController@fetchDailyTransactionReport');
    Route::get('/fetch-dailySubs/api', 'ReportsController@fetchDailySubscriptionReport');
    Route::get('/fetch-generalSubs/api', 'ReportsController@fetchDailySubscriptionReportWithDate');
    Route::get('/fetch-generalTrans/api', 'ReportsController@fetchDailyTransactionReportWithDate');








    // media house admin routes
    Route::get('fetch-pending-subs/api', 'SubController@fetchPendingSubs');
    Route::post('update-subs-status/api', 'SubController@updateSubStatus');
    Route::get('fetch-accepted-subs/api', 'SubController@fetchAcceptedSubs');
    Route::get('fetch-active-subs/api', 'SubController@fetchActiveSubs');
    Route::get('fetch-rejected-subs/api', 'SubController@fetchRejectedSubs');
    Route::get('fetch-expired-subs/api', 'SubController@fetchExpiredSubs');
    Route::get('fetch-all-subs/api', 'SubController@fetchAllSubs');
    Route::post('accept-sub/api', 'SubController@acceptSubs')->name('admin.accept.subs');
    Route::post('reject-sub/api', 'SubController@rejectSubs')->name('admin.reject.subs');

    Route::get('test-date', 'SubController@testDate');
    Route::post('test-date', 'SubController@demo')->name('demo');

    //fetch total subscription for login in media house and display on dashboard
    Route::get('fetch-total-ads/api', 'DashboardController@fetchTotalSubs');
    Route::get('search/{q}', 'SearchController@searchSub');
    Route::get('fetch-ratecards/api', 'RateCardController@fetchRateCards');

    Route::get('fetch-media/api', 'RateCardController@getMediaHouse');

    Route::get('test-api', 'SegmentController@api');
    Route::post('test-post', 'SegmentController@apiPost');
    Route::post('test-update-event', 'SegmentController@eventUpdate');
    Route::post('test-check-segment', 'SegmentController@eventCheck');
    Route::post('check-sub/api', 'SubController@checkIfSubExist');
    Route::get('fetch-transac/api', 'SubController@fetchUserTransac');
    Route::get('/view-subscription/{id}', 'SubController@viewFile')->name('view.file');
    Route::get('fetch-trans-subs/{id}', 'SubController@fetchTransSubs')->name('trans.subs');



    // segment routs
    Route::get('fetch-media-types-api', 'SegmentController@fetchMediaTypes');
    Route::post('api-payment', 'PaymentController@payment');
    Route::get('check-segment-api/{sub_date}', 'CheckSubController@checkSubAvailable');

    //get fie for view routes
    Route::get('fetch-file/api', 'SubController@getFile');
});

Route::post('check-login', 'DecideControllers\InterceptAuthController@whoIsLoginIn')->name('check.login');



// MEDIA STAFF ROUTES

Route::prefix('media/staff')->group(function () {
    Route::get('dashboard', function () {
        return view('staffDashboard.dashboard');
    })->name('staff.dashboard');

    Route::get('active-subscription', function () {
        return view('staffDashboard.activeSubscription');
    })->name('staff.sub.active');


    Route::get('inactive-subscription', function () {
        return view('staffDashboard.inactiveSubscription');
    })->name('staff.sub.inactive');

    Route::get('expired-subscription', function () {
        return view('staffDashboard.expiredSubscription');
    })->name('staff.sub.expired');


    Route::get('pending-subscription', function () {
        return view('staffDashboard.pendingSubscription');
    })->name('staff.sub.pending');

    Route::get('transactions', function () {
        return view('staffDashboard.transactions');
    })->name('staff.transact');

    Route::get('user-profile', function () {
        return view('staffDashboard.accountSettings');
    })->name('staff.profile');

    Route::get('new-subscriptions', function () {
        return view('staffDashboard.newSubscription');
    })->name('staff.sub.new');

    Route::get('dashboard', function () {
        $media = \App\User::all('logo');
        return view('staffDashboard.dashboard', ['media' => $media]);
    })->name('staff.dashboard');

    Route::get('subscription', function () {
        return view('staffDashboard.createSub');
    })->name('staff.sub.all');

    Route::get('rejected-subscription', function () {
        return view('staffDashboard.rejectedSubscription');
    })->name('staff.sub.reject');

    Route::get('testing', function () {
        return view('test');
    });
    Route::get('create-ratecard/success', function () {
        return view('notifications.register_success');
    })->name('staff.ratecard.success');


    //RATE CARDS
    Route::get('rate-card-title', function () {
        return view('staffDashboard.createRateCardTitle');
    })->name('staff.create.ratecard');

       Route::get('/existing-ratecard-titles/{ratecardtitle}','RateCardController@existingTitles');

    Route::get('create-rate-card', function () {
        return view('staffDashboard.createRateCard');
    })->name('staff.create.rate.cards');


    Route::get('view-rate-card', function () {
        return view('staffDashboard.viewRateCard');
    })->name('staff.view.ratecard');

    //    Route::get('manage-admins',function (){
    //        return view('staffDashboard.manageAdmin');
    //    })->name('manage.admins');

    Route::get('create-admins', function () {
        return view('staffDashboard.createAdmin');
    })->name('staff.create.admins');

    /* Route::post('store-ratecard/api', 'RateCardController@storeRateCards'); */
    //   Route::post('rate-card-title/api-store', 'RateCardController@storeRateCardTitle')->name('store.rate.card.title');



 /*    Route::get('ratecard-title/api/{ratecard_id}', 'RateCardController@fetchRateCardTitle');
    Route::get('fetch-ratecards/api', 'RateCardController@getRateCards')->name('fetch.rate.cards');
    Route::get('view-ratecard/api', 'RateCardController@viewRateCard')->name('view.rate.card');
    Route::post('delete-ratecard/api', 'RateCardController@deleteRateCard')->name('delete.rate.card');
 */
    // RATE  CARDS ENDS HERE

    Route::post('ads-store', 'SubController@createSub');
    Route::get('ads/media-api', 'SubController@loadMedia');
    Route::get('fetch-ads/api', 'SubController@fetchAds');
    Route::get('media-houses-api/{media}', 'SubController@fetchMediaHouse');
    Route::get('media-program-api/{mediaHouse}', 'SubController@fetchMediaProgram');
    Route::get('program-date-api/{mediaProgram}', 'SubController@fetchProgramDates');
    Route::get('fetch-segments-titles/{id}', 'SegmentController@fetchSegmentTitles');
    Route::get('fetch-segments/{mediaHouse}/{segmentTitle}/{date}', 'SegmentController@fetchSegments');
    Route::get('check-spots-api/{segment}', 'SegmentController@checkSpots');
    Route::post('sub-update-api', 'SubController@updateAds');
    Route::get('downloadable-subscriptions', 'SubController@downloadableSub')->name('staff.downloadable.subs');
    Route::get('download-file/{id}', 'SubController@downloadSub')->name('download.sub');

    //admin controller routes
    Route::get('manage-admins', 'AdminController@viewAdmins')->name('staff.manage.admins');
    Route::post('/store-admin', 'AdminController@storeAdmin')->name('staff.admin.store');
    Route::get('admin-edit', 'AdminController@editAdmin')->name('staff.edit.admin');
    Route::post('admin-update', 'AdminController@updateAdmin')->name('staff.update.admin');
    Route::post('block-admin/api', 'AdminController@blockAdmin')->name('staff.block.admin');
    Route::post('unblock-admin/api', 'AdminController@unblockAdmin')->name('staff.unblock.admin');
    Route::post('admin-profile/update', 'AdminController@adminProfileUpdate')->name('staff.admin.profile');
    Route::post('delete-admin/api', 'AdminController@deleteAdmin')->name('staff.delete.admin');

    Route::post('/tests', 'AdminController@test')->name('test.store');

    // media house admin routes
    Route::get('fetch-pending-subs/api', 'SubController@fetchPendingSubs');
    Route::post('update-subs-status/api', 'SubController@updateSubStatus');
    Route::get('fetch-accepted-subs/api', 'SubController@fetchAcceptedSubs');
    Route::get('fetch-active-subs/api', 'SubController@fetchActiveSubs');
    Route::get('fetch-rejected-subs/api', 'SubController@fetchRejectedSubs');
    Route::get('fetch-expired-subs/api', 'SubController@fetchExpiredSubs');
    Route::get('fetch-all-subs/api', 'SubController@fetchAllSubs');
    //    Route::post('accept-sub/api', 'SubController@acceptSubs')->name('accept.subs');
    //    Route::post('reject-sub/api', 'SubController@rejectSubs')->name('reject.subs');

    Route::get('test-date', 'SubController@testDate');
    Route::post('test-date', 'SubController@demo')->name('demo');

    //fetch total subscription for login in media house and display on dashboard
    Route::get('fetch-total-ads/api', 'DashboardController@fetchTotalSubs');
    Route::get('api/search', 'SearchController@searchSub');
    Route::get('fetch-ratecards/api', 'RateCardController@fetchRateCards');

    Route::get('test-api', 'SegmentController@api');
    Route::post('test-post', 'SegmentController@apiPost');
    Route::post('test-update-event', 'SegmentController@eventUpdate');
    Route::post('test-check-segment', 'SegmentController@eventCheck');
    Route::post('check-sub/api', 'SubController@checkIfSubExist');
    Route::get('fetch-transac/api', 'SubController@fetchUserTransac');

    // segment routs
    Route::get('fetch-media-types-api', 'SegmentController@fetchMediaTypes');
    Route::post('api-payment', 'PaymentController@payment');
    Route::get('check-segment-api/{sub_date}', 'CheckSubController@checkSubAvailable');

    //get fie for view routes
    Route::get('fetch-file/api', 'SubController@getFile');
});


Route::post('/check-admin', 'Admin\AdminTypeController@checkAdminType')->name('check.admin');
//Route::post('/login-staff', 'Admin\Auth\LoginStaffController@adminLogin')->name('login.staff');

Route::get('/admin/login', 'Admin\Auth\LoginStaffController@showLoginForm')->name('staff.login');

//Route::prefix('/media/staff')->group(function (){

Route::get('/login', 'Admin\Auth\LoginStaffController@showAdminLoginForm')->name('login.form');
Route::post('/login', 'Admin\Auth\LoginStaffController@adminLogin')->name('login.staff');
Route::post('/logout', 'Admin\Auth\LoginStaffController@logout')->name('staff.logout');
//});

Route::prefix('/media/staff')->group(function () {
    Route::get('/login', 'staffAuth\LoginController@showLoginForm')->name('login.staff');
    Route::post('/login', 'staffAuth\LoginController@login')->name('login.staff');
    Route::post('/logout', 'staffAuth\LoginController@logout')->name('logout.staff');

    // Route::post('/logout', 'staffAuth\LoginStaffController@logout')->name('staff.logout');

    Route::get('week-data', 'SubController@weekData');
});



Route::prefix('auth')->group(function () {
    Auth::routes();
});







































//Route::get('/users-media-accounts', function () {
//    return view('userDashboard.users.users-media');
//})->name('users-media');


//Route::get('/all-users-accounts', function () {
//    return view('userDashboard.users.all');
//})->name('users-all');
//
//Route::get('/users-org-accounts', function () {
//    return view('userDashboard.users.organization');
//})->name('users-org');



//Route::get('/test', function () {
//    return view('userDashboard.pages.dashboard');
//})->name('userDashboard');


//
//Route::get('/ads', function () {
//    return view('userDashboard.media-house.ads.ad');
//})->name('media-ads');
//
//Route::get('/publish', function () {
//    return view('userDashboard.media-house.ads.published');
//})->name('media-publish');
//
//Route::get('/pending', function () {
//    return view('userDashboard.media-house.ads.pending');
//})->name('media-pending');
//
//Route::get('/review', function () {
//    return view('userDashboard.media-house.ads.review');
//})->name('media-review');


//email messages
//Route::get('/compose', function () {
//    return view('userDashboard.pages.messages.compose');
//})->name('email-compose');
//
//Route::get('/read', function () {
//    return view('userDashboard.pages.messages.read');
//})->name('email-read');
//
//Route::get('/inbox', function () {
//    return view('userDashboard.pages.messages.inbox');
//})->name('email-inbox');
//// sent sms
//Route::get('/create-sms', function () {
//    return view('userDashboard.pages.sms.create-sms');
//})->name('sms-compose');
//
//Route::get('/read-sms', function () {
//    return view('userDashboard.pages.sms.read');
//})->name('sms-read');
//
//Route::get('/sms-inbox', function () {
//    return view('userDashboard.pages.sms.inbox');
//})->name('sms-inbox');

// user management

// organisations ad managements
//Route::get('/org-accounts-ads', function () {
//    return view('userDashboard.organisations.ads.ad');
//})->name('org-ads');
//
//Route::get('/org-accounts-publish', function () {
//    return view('userDashboard.organisations.ads.published');
//})->name('org-publish');
//
//Route::get('/org-accounts-pending', function () {
//    return view('userDashboard.organisations.ads.pending');
//})->name('org-pending');
//
//Route::get('/org-account-review', function () {
//    return view('userDashboard.organisations.ads.review');
//})->name('org-review');

//
//Route::get('/ads/create-step1', 'AdController@createstep1');
//Route::post('/ads/create-step1', 'AdController@createstep1');
//
//Route::get('/ads/create-step2', 'AdController@createstep2');
//Route::post('/ads/create-step2','AdController@createstep2');
//
//

//Route::get('/home', 'HomeController@index')->name('home');

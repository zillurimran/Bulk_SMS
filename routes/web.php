<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogTagController;
use App\Http\Controllers\BulkSmsController;
use App\Http\Controllers\ColorSettingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\NexmoSettingController;
use App\Http\Controllers\PhoneDirectoryController;
use App\Http\Controllers\PackagePricingController;
use App\Http\Controllers\SocialurlController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ThemeSettingController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HideShowController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\StripeSettingController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OfferController;

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

Route::group(['middleware' => 'visitor_log'], function(){
    Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
    Route::get('forgot-password', [FrontendController::class, 'forgotPassword'])->name('forgot.password');
    Route::get('verify-code', [FrontendController::class, 'verifyCode'])->name('verify.code');
    Route::post('send-code', [FrontendController::class, 'sendCode'])->name('send.code');
    Route::post('validate-code', [FrontendController::class, 'validateCode'])->name('validate.code');
    Route::get('change-password', [FrontendController::class, 'changePassword'])->name('change.password');
    Route::post('update-password', [FrontendController::class, 'updatePassword'])->name('update.password');

    // Route::get('/pricing', [FrontendController::class, 'pricing'])->name('frontend.pricing');
    // Route::get('/blogs', [FrontendController::class, 'blog'])->name('frontend.blog');
    // Route::get('/blog-details', [FrontendController::class, 'blogDetails'])->name('frontend.blog-details');
    // Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
});

Route::post('/comment/store',[CommentController::class,'storeComment'])->name('comment.store');

//UserController
Route::post('/user/register',[UserController::class,'storeUser'])->name('user.store');
Route::post('user-login',[UserController::class,'checkUser'])->name('registered-user.login');

// ProductOrderController
Route::post('/order/store',[ProductOrderController::class,'orderStore'])->name('order.store');
Route::post('pamment/success', [ProductOrderController::class, 'paymentSuccess'])->name('pamment.success');
Route::post('user/email/check', [FrontendController::class, 'userEmailCheck'])->name('user.email.check');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('admin.index');
// })->name('dashboard');

// Admin Group Route
Route::group(['prefix' => 'admin','middleware' => ['auth', 'verified']], function(){


    Route::group(['middleware' => ['adminCheck']], function(){

        // OfferController 
        Route::get('offers', [OfferController::class, 'index'])->name('offers.index'); 
        Route::post('offer/store', [OfferController::class, 'store'])->name('offer.store'); 
        Route::post('offer/{id}/update', [OfferController::class, 'update'])->name('offer.update');
        Route::post('offer/delete', [OfferController::class, 'delete'])->name('offer.delete');


        // BannerController
        Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
        Route::post('/banner-store', [BannerController::class, 'store'])->name('banners.store');
        Route::post('/banners/{id}/update', [BannerController::class, 'update'])->name('banners.update');
        Route::get('/banners/{id}/delete', [BannerController::class, 'delete'])->name('banners.delete');

        // FeatureController
        Route::get('/features',[FeatureController::class,'index'])->name('features.index');
        Route::post('/feature/store',[FeatureController::class,'store'])->name('feature.store');
        Route::post('/single-feature/store',[FeatureController::class,'storeSingleFeature'])->name('singleFeature.store');
        Route::post('/feature/{id}/update',[FeatureController::class,'update'])->name('feature.update');
        Route::get('/feature/{id}/delete',[FeatureController::class,'delete'])->name('feature.delete');
        Route::post('/specs-store',[FeatureController::class,'storeSpecs'])->name('specs.store');
        Route::post('/specs/{id}/update',[FeatureController::class,'updateSpecs'])->name('specs.update');
        Route::get('/specs/{id}/delete',[FeatureController::class,'deleteSpecs'])->name('specs.delete');

        // HideShowController
        Route::post('/banner-status', [HideShowController::class, 'bannerStatus'])->name('banner.status');
        Route::post('/banner-bottom-status', [HideShowController::class, 'bannerBottomStatus'])->name('banner.bottom.status');
        Route::post('/pricing-status', [HideShowController::class, 'pricingStatus'])->name('pricing.status');
        Route::post('/testimonial-status', [HideShowController::class, 'testimonialStatus'])->name('testimonial.status');
        Route::post('/contact-status', [HideShowController::class, 'contactStatus'])->name('contact.status');
        Route::post('/map-status', [HideShowController::class, 'mapStatus'])->name('map.status');

        // LocationController
        Route::get('/location',[LocationController::class,'index'])->name('location.index');
        Route::post('/location/{id}/update',[LocationController::class,'update'])->name('location.update');
        // // AddressController
        // Route::get('/address/details',[AddressController::class,'index'])->name('detailAddress.index');
        // Route::post('/address/{id}/update',[AddressController::class,'update'])->name('address.update');
        // Route::post('/phone-store',[AddressController::class,'storePhone'])->name('phone.store');
        // Route::post('/phone/{id}/update',[AddressController::class,'updatePhone'])->name('phone.update');
        // Route::get('/phone/{id}/delete',[AddressController::class,'deletePhone'])->name('phone.delete');
        // Route::post('/email/store',[AddressController::class,'emailStore'])->name('email.store');
        // Route::post('/email/{id}/update',[AddressController::class,'emailUpdate'])->name('email.update');
        // Route::get('/email/{id}/delete',[AddressController::class,'emailDelete'])->name('email.delete');

        // CommentController
        Route::get('/all-comments',[CommentController::class,'index'])->name('comments.index');
        Route::get('/comment/{id}/delete',[CommentController::class,'deleteComment'])->name('comment.delete');
        //PackagePricingController
        Route::get('/packages',[PackagePricingController::class,'index'])->name('packages.index');
        Route::get('/items',[PackagePricingController::class,'packageItem'])->name('packages.item');
        Route::post('/package/store',[PackagePricingController::class,'packageStore'])->name('package.store');
        Route::post('/package/{id}/update',[PackagePricingController::class,'packageUpdate'])->name('package.update');
        Route::get('/package/{id}/delete',[PackagePricingController::class,'packageDelete'])->name('package.delete');
        Route::post('/item/store',[PackagePricingController::class,'itemStore'])->name('item.store');
        Route::post('/item/{id}/update',[PackagePricingController::class,'itemUpdate'])->name('item.update');
        Route::get('/item/{id}/delete',[PackagePricingController::class,'itemDelete'])->name('item.delete');

        // BlogController
        Route::get('/blog/list', [BlogController::class, 'index'])->name('blog.list.index');
        Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');

        // BlogCategoryController
        Route::get('/blog/categories', [BlogCategoryController::class, 'index'])->name('blog_categories.index');
        Route::post('/blog/categories-store', [BlogCategoryController::class, 'store'])->name('blog_categories.store');
        Route::post('/blog/categories/{id}/update', [BlogCategoryController::class, 'update'])->name('blog_categories.update');
        Route::post('/blog/categories/{id}/delete', [BlogCategoryController::class, 'delete'])->name('blog_categories.delete');

        // BlogTagController
        Route::get('/blog/tags', [BlogTagController::class, 'index'])->name('blog_tags.index');
        Route::post('/blog/create', [BlogTagController::class, 'create'])->name('blog_tags.create');
        Route::post('/blog/tags/{id}/update', [BlogTagController::class, 'update'])->name('blog_tags.update');
        Route::post('/blog/tag/{id}/delete', [BlogTagController::class, 'delete'])->name('blog_tags.delete');

        // AdminController
        Route::get('users/list', [AdminController::class, 'userList'])->name('users.index');
        Route::get('users/create', [AdminController::class, 'userCreate'])->name('users.create');
        Route::get('users/{id}/destroy', [AdminController::class, 'userDestroy'])->name('users.destroy');
        //  GeneralSettingController
        Route::resource('generalSettings', GeneralSettingController::class);

        //  ColorSettingController
        Route::resource('colorSettings', ColorSettingController::class);

        //  SocialurlController
        Route::resource('socialurls', SocialurlController::class);

        //StripeSettingController
        Route::get('/stripe/settings',[StripeSettingController::class,'index'])->name('stripe.index');
        Route::post('/key/{id}/update',[StripeSettingController::class,'updateKey'])->name('key.update');

        // NexmoSettings
        Route::get('nexmo-settings', [NexmoSettingController::class, 'index'])->name('nexmo.index');
        Route::put('nexmo-settings/{id}/update', [NexmoSettingController::class, 'update'])->name('nexmo.update');
    });


    Route::get('histories/{id}/destroy', [AdminController::class, 'historyDestroy'])->name('histories.destroy');
    Route::get('histories-all-destroy', [AdminController::class, 'historyAllDestroy'])->name('histories_all.destroy');
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');


    Route::get('create-sms', [BulkSmsController::class, 'create'])->name('create-sms');

    Route::post('send-sms', [BulkSmsController::class, 'index']);
    Route::post('user/balance/topup', [BulkSmsController::class, 'balanceTopup'])->name('user.balance.topup');
    Route::post('topup/success', [BulkSmsController::class, 'topupSuccess'])->name('topup.success');


    // GroupController
    Route::get('groups', [GroupController::class, 'index'])->name('groups.index');
    Route::get('groups/create', [GroupController::class, 'create'])->name('groups.create');
    Route::post('groups/store', [GroupController::class, 'store'])->name('groups.store');
    Route::get('groups/{id}/edit', [GroupController::class, 'edit'])->name('groups.edit');
    Route::put('groups/{id}/update', [GroupController::class, 'update'])->name('groups.update');
    Route::delete('groups/{id}/destroy', [GroupController::class, 'destroy'])->name('groups.destroy');



    Route::get('/phone-directories', [PhoneDirectoryController::class, 'index'])->name('phone-directories.index');
    Route::get('/phone-directories/create', [PhoneDirectoryController::class, 'create'])->name('phone-directories.create');
    Route::post('/phone-directories/store', [PhoneDirectoryController::class, 'store'])->name('phone-directories.store');
    Route::get('/phone-directories/{id}/edit', [PhoneDirectoryController::class, 'edit'])->name('phone-directories.edit');
    Route::put('/phone-directories/{id}/update', [PhoneDirectoryController::class, 'update'])->name('phone-directories.update');
    Route::delete('/phone-directories/{id}/destroy', [PhoneDirectoryController::class, 'destroy'])->name('phone-directories.destroy');



});

    // My Profile
    Route::get('my-profile', [AdminController::class, 'myProfile'])->name('my-profile');

    // ThemeSettingController
    Route::get('theme-color', [ThemeSettingController::class, 'color'])->name('theme.color');
    Route::get('theme-toggle', [ThemeSettingController::class, 'toggle'])->name('theme.toggle');



    //  ContactController
    Route::resource('contacts', ContactController::class);

    //  SubscriberController
    Route::resource('subscribers', SubscriberController::class);
    // Route::get('/subscibers',[SubscriberController::class,'index'])->name('subscriber.index');
    // Route::post('/subscibers/store',[SubscriberController::class,'store'])->name('subscriber.store');

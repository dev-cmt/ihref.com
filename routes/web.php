<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PageSeoController;
use App\Http\Controllers\DeveloperApiController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MemberController;

//___________________________________// START \\______________________________________________//
Route::get('/', [HomeController::class, 'welcome'])->name('home');

/**______________________________________________________________________________________________
 * View Page => ALL
 * ______________________________________________________________________________________________
 */
//______________ PAGE SINGLE
Route::get('page/activities', [HomeController::class, 'activities'])->name('page.activities');
Route::get('page/chairman-message', [HomeController::class, 'chairmanMessage'])->name('page.chairman-message');
Route::get('page/committee-members', [HomeController::class, 'committeeMembers'])->name('page.committee-members');
Route::get('page/member-list', [HomeController::class, 'memberList'])->name('page.member-list');
Route::get('page/photo-gallery', [HomeController::class, 'photoGallery'])->name('page.photo-gallery');
Route::get('page/contact', [HomeController::class, 'contact'])->name('page.contact');
//______________ NEWS
Route::get('page/news', [HomeController::class, 'news'])->name('page.news');
Route::get('page/news-details/{slug}', [HomeController::class, 'newsDetails'])->name('page.news-details');


Route::get('/registration/from', [MemberController::class, 'memberRegistration'])->name('registration.from');
Route::post('/registration/store', [MemberController::class, 'registrationStore'])->name('registration.store');

// Route::middleware(['auth:member'])->group(function () {
    Route::get('/registration-payment', [MemberController::class, 'registrationPayment'])->name('registration-payment');
    Route::post('/registration-payment/store', [MemberController::class, 'registrationPaymentStore'])->name('registration-payment.store');
    Route::get('/payment/waiting-approval', [MemberController::class, 'waitingApproval'])->name('waiting-approval');
// });


/**______________________________________________________________________________________________
 * Admin Pages
 * ______________________________________________________________________________________________
 */
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/change-password', [ProfileController::class, 'editPassword'])->name('password.change');
    Route::put('/change-password', [ProfileController::class, 'updatePassword'])->name('password.update');
});


Route::group(['middleware' => ['auth']], function() {
    // MEMBER
    Route::get('members', [MemberController::class, 'index'])->name('members.index');
    Route::get('members/{member}/show', [MemberController::class, 'show'])->name('members.show');
    Route::get('members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::patch('members/{member}', [MemberController::class, 'update'])->name('members.update');
    Route::delete('members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');


    Route::get('member-approve', [MemberController::class, 'index'])->name('members-approve.index');
    Route::patch('members/{member}/approve', [MemberController::class, 'membersApprove'])->name('members.approve');
    Route::patch('members/{member}/cancel', [MemberController::class, 'membersCancel'])->name('members.cancel');

    Route::get('payments', [MemberController::class, 'paymentsIndex'])->name('payments.index');
    Route::patch('payments/{payment}/approve', [MemberController::class,'paymentsApprove'])->name('payments.approve');
    Route::patch('payments/{payment}/cancel', [MemberController::class,'paymentsCancel'])->name('payments.cancel');
    Route::get('payments/{payment}/download-slip', [MemberController::class,'downloadSlip'])->name('payments.download-slip');
});


Route::middleware('auth')->group(function () {
    // Developer API
    Route::get('/developer-api', [DeveloperApiController::class, 'index'])->name('developer-api.index');
    Route::post('/developer-api/generate-token', [DeveloperApiController::class, 'generateToken'])->name('developer-api.generate-token');


    /**----------------------------------------------------------------------------------------------
     * ----------------------------------------------------------------------------------------------
     * BACKEND TEMPLATE
     * ----------------------------------------------------------------------------------------------
     * ----------------------------------------------------------------------------------------------
     */
    Route::resource('roles', RoleController::class);

    // User Management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/settings-update', [SettingController::class, 'update'])->name('setting.update');

    // SEO settings
    Route::get('/seo-pages',[PageSeoController::class,'index'])->name('settings.seo.index');
    Route::post('/seo-pages/{page}',[PageSeoController::class,'update'])->name('settings.seo.update');
});



//==================// Location //==================//
Route::get('/location', [LocationController::class, 'index'])->name('location');
Route::get('/get-districts', [LocationController::class, 'getDistricts'])->name('get_districts');
Route::get('/get-upazila', [LocationController::class, 'getUpazilas'])->name('get_upazila');
Route::get('/get-thana', [LocationController::class, 'getThanas'])->name('get_thana');


require __DIR__.'/auth.php';

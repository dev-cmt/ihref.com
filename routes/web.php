<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MemberController;

Route::get('/', [HomeController::class, 'welcome'])->name('home');
Route::post('/registation/store', [HomeController::class, 'registationStore'])->name('registation.store');

Route::middleware(['auth:member'])->group(function () {
    Route::get('/registation-payment', [HomeController::class, 'registationPayment'])->name('registation-payment');
    Route::post('/registation-payment/store', [HomeController::class, 'registationPaymentStore'])->name('registation-payment.store');
    Route::get('/payment/waiting-approval', [HomeController::class, 'waitingApproval'])->name('waiting-approval');
});

/**-------------------------------------------------------------------------
 * KEY : DASHBOARD PROFILE
 * -------------------------------------------------------------------------
 */
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile-index', [ProfileController::class, 'profileIndex'])->name('profile.index');
    Route::get('/profile-settings', [ProfileController::class, 'profileSettings'])->name('profile.settings');
    Route::post('/profile-update/image', [ProfileController::class, 'updateImage'])->name('profile.updateImage');
    Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::delete('/profile-destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

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


    // COMPANY SETTING
    Route::get('company-setting', [PagesController::class, 'companySetting'])->name('company-setting');
    Route::post('company-setting/store', [PagesController::class, 'companySettingStore'])->name('company-setting.store');
});




//==================// Location //==================//
Route::get('/location', [LocationController::class, 'index'])->name('location');
Route::get('/get-districts', [LocationController::class, 'getDistricts'])->name('get_districts');
Route::get('/get-upazila', [LocationController::class, 'getUpazilas'])->name('get_upazila');
Route::get('/get-thana', [LocationController::class, 'getThanas'])->name('get_thana');




require __DIR__.'/auth.php';

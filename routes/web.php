<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PagesController;

Route::get('/', [HomeController::class, 'welcome'])->name('home');

Route::post('/registation/store', [HomeController::class, 'registationStore'])->name('registation.store');
Route::get('/registation-payment', [HomeController::class, 'registationPayment'])->name('registation-payment');
Route::post('/registation-payment/store', [HomeController::class, 'registationPaymentStore'])->name('registation-payment.store');
Route::get('/get/payment-number', [HomeController::class, 'registationPaymentStore'])->name('get-payment-number');

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

    // COMPANY SETTING
    Route::get('company-setting', [PagesController::class, 'companySetting'])->name('company-setting');
    Route::post('company-setting/store', [PagesController::class, 'companySettingStore'])->name('company-setting.store');
});








require __DIR__.'/auth.php';

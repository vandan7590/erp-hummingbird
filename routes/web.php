<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('pages/roles', RoleController::class);
    Route::resource('pages/users', UserController::class);
    Route::get('pages/users/change-password/{id}',[UserController::class, 'password_change_index'])->name('change-password-view');
    Route::post('pages/users/change-password/{id}',[UserController::class, 'password_change'])->name('change-password');

    Route::get('configuration/email-config', [SettingsController::class, 'email_config'])->name('setting-email-config');    
    Route::post('configuration/send-env-update', [SettingsController::class, 'send_env_update'])->name('setting-env-update-send');
    Route::get('configuration/db-config', [SettingsController::class, 'db_config'])->name('setting-db-config');
    Route::post('configuration/send-db-update', [SettingsController::class, 'send_db_update'])->name('setting-db-update-send');
    Route::get('configuration/email-test', [SettingsController::class, 'email_test'])->name('setting-email-test');
    Route::post('configuration/send-email', [SettingsController::class, 'send_email_test'])->name('setting-send-email');
    Route::get('settings/site-info', [SettingsController::class, 'site_info_index'])->name('setting-site-info-index');
    Route::post('settings/site-info-store', [SettingsController::class, 'site_info_store'])->name('setting-site-info-store');
});
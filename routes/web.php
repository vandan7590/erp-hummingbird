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
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::get('settings/email-config', [SettingsController::class, 'email_config'])->name('setting-email-config');
    Route::post('settings/send-env-update', [SettingsController::class, 'send_env_update'])->name('setting-env-update-send');
    Route::get('settings/email-test', [SettingsController::class, 'email_test'])->name('setting-email-test');
    Route::post('settings/send-email', [SettingsController::class, 'send_email_test'])->name('setting-send-email');
});
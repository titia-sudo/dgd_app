<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\TempsController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\TypeDossiersController;
use App\Http\Controllers\FlueController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;            
            

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');


	Route::get('/users', [UserProfileController::class, 'show'])->name('dashboard-ls-users');
	Route::get('/cr-users', [RegisterController::class, 'create'])->name('dashboard-cr-users');
	Route::get('/dossiers', [DocController::class, 'show'])->name('dashboard-ls-dossiers');
	Route::get('/conf-temps', [TempsController::class, 'show'])->name('dashboard-temps');
	Route::get('/conf-dossiers', [TypeDossiersController::class, 'show'])->name('dashboard-type-dossiers');
	Route::get('/conf-niveau', [NiveauController::class, 'show'])->name('dashboard-niveau');
	Route::get('/conf-flux', [FlueController::class, 'show'])->name('dashboard-config-flux');
	Route::get('/dossiers', [DocController::class, 'NewDossier'])->name('nouveau-dossier');

	

	

	

	


	
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout'); 
});
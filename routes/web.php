<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\UniteTempsTraitementController;
use App\Http\Controllers\TempsTraitementController;

use App\Http\Controllers\DocController;
use App\Http\Controllers\FlueController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\TypeDossiersController;
use App\Http\Controllers\TempsController;
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

Route::get('/roles/create', 'RoleController@create')->name('roles.create');
Route::resource('/roles', RoleController::class); 
Route::resource('/uniteTempsTraitements', UniteTempsTraitementController::class);
Route::resource('/tempsTraitements', TempsTraitementController::class);
Route::resource('/niveauTraitements', NiveauTraitementController::class);
Route::resource('/users', UserController::class);    
Route::resource('/profils', ProfilController::class);
Route::resource('/directions', DirectionController::class);
Route::resource('/services', ServiceController::class);
Route::resource('/typeDossiers', TypeDossierController::class);
Route::resource('/dossiers', DossierController::class);
Route::resource('/historique', HistoriqueController::class);
 //Auth::routes();
 /*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:demandeur'])->group(function () {
  
    Route::get('/demandeurHome', [HomeController::class, 'index'])->name('demandeurHome');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:validateur'])->group(function () {
  
    Route::get('/validatorHome', [HomeController::class, 'validatorHome']);
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/adminHome', [HomeController::class, 'adminHome']);
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:superAdmin'])->group(function () {
  
    Route::get('/superAdminHome', [HomeController::class, 'superAdminHome']);
});
 
//lien vers les CRUD

 
Route::get('/creation', [UniteTempsTraitementController::class,'create'])->name('creation');

Route::get('/user/Creation', [RegisterController::class, 'create'])->name('dashboard-cr-users');
Route::get('/users-liste', [UserProfileController::class, 'show'])->name('dashboard-ls-users');
Route::get('/dossiers-liste', [DocController::class, 'show'])->name('dashboard-ls-dossiers');
Route::get('/temps', [TempsController::class, 'show'])->name('dashboard-temps');
Route::get('/type-dossiers', [TypeDossiersController::class, 'show'])->name('dashboard-type-dossiers');
Route::get('/niveau', [NiveauController::class, 'show'])->name('dashboard-niveau');
Route::get('/conf-flue', [FlueController::class, 'show'])->name('dashboard-config-flux');
Route::get('/dossier-new', [DocController::class, 'NewDossier'])->name('nouveau-dossier');



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
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
	


});
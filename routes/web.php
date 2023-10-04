<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\FlueController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TempsController;

use App\Http\Controllers\NiveauController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\TypeDossiersController;
use App\Http\Controllers\TempsTraitementController;
use App\Http\Controllers\UniteTempsTraitementController;

use App\Http\Controllers\DossierValidateurController;
use App\Http\Controllers\DossierAdminController;
use App\Http\Controllers\DossierController;

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
    return view('auth.login');
});

Auth::routes(['login' => false, 'verify' => false]);


Route::get('/roles/index', 'RoleController@index')->name('roles.index')->middleware('permission:role-lire');
Route::get('/roles/create', 'RoleController@create')->name('roles.create')->middleware('permission:role-creer');
Route::get('/roles/update', 'RoleController@update')->name('roles.update')->middleware('permission:role-modifier');
Route::get('/roles/delete', 'RoleController@destroy')->name('roles.destroy')->middleware('permission:role-supprimer');
Route::get('/roles/store', 'RoleController@store')->name('roles.store');
Route::get('/roles/edit/{id}', 'RoleController@edit')->name('roles.edit');
Route::get('/roles/show/{id}', 'RoleController@show')->name('roles.show');

Route::resource('/uniteTempsTraitements', UniteTempsTraitementController::class);
Route::resource('/tempsTraitements', TempsTraitementController::class);
Route::resource('/niveauTraitements', NiveauTraitementController::class);

Route::get('/adminDossiers/filtrer', 'DossierAdminController@index')->name('FiltrerAdmin');
Route::get('/validateurs/filtrer', 'DossierValidateurController@index')->name('FiltrerValidateur');
Route::get('/dossiers/filtrer', 'DossierController@index')->name('filtreDemandeur');
Route::get('/users/filtrer', 'UserController@index')->name('Filtrer');
Route::resource('/users', UserController::class);  
Route::resource('/profils', ProfilController::class);
Route::resource('/directions', DirectionController::class);
Route::resource('/services', ServiceController::class);
Route::resource('/typeDossiers', TypeDossierController::class);


//les routes du validateurs dossiers
Route::get('/validateurs/dossiers/index', [DossierValidateurController::class,'index'])->name('validateurs.index');
Route::get('/validateurs/dossiers/create', [DossierValidateurController::class,'create'])->name('validateurs.create');
Route::post('/validateurs/dossiers/store', [DossierValidateurController::class,'store'])->name('validateurs.store');
Route::get('/validateurs/dossiers/update', [DossierValidateurController::class,'update'])->name('validateurs.update');
Route::get('/validateurs/dossiers/delete', [DossierValidateurController::class,'delete'])->name('validateurs.destroy');
Route::get('/validateurs/dossiers/edit/{dossier}', [DossierValidateurController::class,'edit'])->name('validateurs.edit');
Route::get('/validateurs/dossiers/show/{dossier}', [DossierValidateurController::class,'show'])->name('validateurs.show');

//les routes de depmandeurs dossiers
Route::get('/demandeurs/dossiers/index', [DossierController::class,'index'])->name('demandeurs.index');
Route::get('/demandeurs/dossiers/create', [DossierController::class,'create'])->name('demandeurs.create');
Route::post('/demandeurs/dossiers/store', [DossierController::class,'store'])->name('demandeurs.store');
Route::get('/demandeurs/dossiers/update', [DossierController::class,'update'])->name('demandeurs.update');
Route::get('/demandeurs/dossiers/delete', [DossierController::class,'delete'])->name('demandeurs.destroy');
Route::get('/demandeurs/dossiers/edit/{dossier}', [DossierController::class,'edit'])->name('demandeurs.edit');
Route::get('/demandeurs/dossiers/show/{dossier}', [DossierController::class,'show'])->name('demandeurs.show');

//les routes de admin dossiers
Route::get('/admin/dossiers/index', [DossierAdminController::class,'index'])->name('admin.dossiers.index');
Route::get('/admin/dossiers/create', [DossierAdminController::class,'create'])->name('admin.dossiers.create');
Route::post('/admin/dossiers/store', [DossierAdminController::class,'store'])->name('admin.dossiers.store');
Route::get('/admin/dossiers/update', [DossierAdminController::class,'update'])->name('admin.dossiers.update');
Route::get('/admin/dossiers/delete', [DossierAdminController::class,'delete'])->name('admin.dossiers.destroy');
Route::get('/admin/dossiers/edit/{dossier}', [DossierAdminController::class,'edit'])->name('admin.dossiers.edit');
Route::get('/admin/dossiers/show/{dossier}', [DossierAdminController::class,'show'])->name('admin.dossiers.show');



//Route::put('/dossiers/{id}/update/{idUser}', [DossierController::class, 'update'])->name('dossiers.update');
Route::resource('/historique', HistoriqueController::class);
 //Auth::routes();
 /*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:demandeur'])->group(function () {
  
    Route::get('/demandeurHome', [DossierController::class, 'index']);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:validateur'])->group(function () {
  
    Route::get('/validatorHome', [DossierValidateurController::class, 'index']);
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:administrateur'])->group(function () {
  
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('homeAdmin');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:super-administrateur'])->group(function () {
  
    Route::get('/superAdminHome', [HomeController::class, 'superAdminHome']);
});




 //Auth::routes();
 /*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/

//routes pour la ,gestion des pdf
//Route::get('/export_users', [UserController::class,'export_user'])->name('userPDF');
//lien vers les CRUD

 
Route::get('/creation', [UniteTempsTraitementController::class,'create'])->name('creation');

Route::get('/user/Creation', [RegisterController::class, 'create'])->name('dashboard-cr-users');
Route::get('/users-liste', [UserProfileController::class, 'show'])->name('dashboard-ls-users');
//Route::get('/dossiers-liste', [DocController::class, 'show'])->name('dashboard-ls-dossiers');
Route::get('/temps', [TempsController::class, 'show'])->name('dashboard-temps');
Route::get('/type-dossiers', [TypeDossiersController::class, 'show'])->name('dashboard-type-dossiers');
Route::get('/niveau', [NiveauController::class, 'show'])->name('dashboard-niveau');
Route::get('/conf-flue', [FlueController::class, 'show'])->name('dashboard-config-flux');
Route::get('/dossier-new', [DossierController::class, 'create'])->name('nouveau-dossier');



//Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
    //Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
    Route::get('/login', 'LoginController@show')->name('login');
	//Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
 	//Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
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
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

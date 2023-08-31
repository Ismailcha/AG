<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TechnicienController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TechnicienController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;

Route::get('/offress/create',  [OffreController::class, 'searchArticles'])->name('articles.search');
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('article.delete');
Route::post('/articles', [ArticleController::class, 'createproduct'])->name('articles.store');
Route::get('/produits/{id}', [ProduitController::class, 'show']);
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('articless', [ArticleController::class, 'index'])->name('articless.index');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::get('users/createclient', [ClientController::class, 'create'])->name('users.createclient');
Route::post('users/createclient', [ClientController::class, 'store'])->name('createclient.store');
Route::get('/get-client-data/{clientId}', [ClientController::class, 'getClientData']);
// ----------------------------- sales  ------------------------------//
Route::controller(SalesController::class)->group(function () {

    // -------------------- estimate  -------------------//
    Route::get('form/estimates/page', 'estimatesIndex')->middleware('auth')->name('form/estimates/page');
    Route::get('create/estimate/page', 'createEstimateIndex')->middleware('auth')->name('create/estimate/page');
    Route::get('edit/estimate/{estimate_number}', 'editEstimateIndex')->middleware('auth');
    Route::get('estimate/view/{estimate_number}', 'viewEstimateIndex')->middleware('auth');

    Route::post('create/estimate/save', 'createEstimateSaveRecord')->middleware('auth')->name('create/estimate/save');
    Route::post('create/estimate/update', 'EstimateUpdateRecord')->middleware('auth')->name('create/estimate/update');
    Route::post('estimate_add/delete', 'EstimateAddDeleteRecord')->middleware('auth')->name('estimate_add/delete');
    Route::post('estimate/delete', 'EstimateDeleteRecord')->middleware('auth')->name('estimate/delete');
});
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

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });
    // produits
    Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');
    Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');
    Route::get('/produits/liste', [ProduitController::class, 'index'])->name('produits.liste');
    Route::get('/produits/{id}/modify', [ProduitController::class, 'edit'])->name('produits.edit');
    Route::delete('/produits/{id}', [ProduitController::class, 'destroy'])->name('produits.delete');
    Route::put('/produits/{id}', [ProduitController::class, 'update'])->name('produits.update');
    // technicien 
    Route::resource('techniciens', TechnicienController::class);
});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';

//

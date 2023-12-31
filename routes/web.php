<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrganismeController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\TechnicienController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\CommandeOffreIndividuController;
use App\Http\Controllers\Apps\PermissionManagementController;

// les condidate
Route::resource('candidates', CandidateController::class);
Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates.index');
Route::get('/candidates/create', [CandidateController::class, 'create'])->name('candidates.create');
Route::post('/candidates', [CandidateController::class, 'store'])->name('candidates.store');
Route::get('/candidates/{candidate}', [CandidateController::class, 'show'])->name('candidates.show');
Route::get('/candidates/{candidate}/edit', [CandidateController::class, 'edit'])->name('candidates.edit');
Route::put('/candidates/{candidate}', [CandidateController::class, 'update'])->name('candidates.update');
Route::delete('/candidates/{candidate}', [CandidateController::class, 'destroy'])->name('candidates.destroy');

Route::post('/specialities', [SpecialityController::class, 'store'])->name('specialities.store');


// Route::get('/offress/create',  [OffreController::class, 'searchArticles'])->name('articles.search');
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


    //admin
    Route::get('/admin/commandes', [AdminController::class, 'index'])->name('admin.commandes');
    // commande offer individual 
    Route::post('/commandesindividu', [CommandeOffreIndividuController::class, 'store'])->name('commandesindividu.store');
    // user_commandes
    Route::get('/commandes', [CommandeOffreIndividuController::class, 'index'])->name('user.commandes');
    // user_commandes -> details
    Route::get('/commande/{id}', [CommandeOffreIndividuController::class, 'show'])->name('commande.show');

    //commande filter
    Route::get('/commande/filter', [CommandeOffreIndividuController::class, 'filter'])->name('commande.filter');
    // produits
    Route::resource('produit', ProduitController::class);
    // recherche produit
    Route::get('/search_produit', [ProduitController::class, 'search'])->name('produits.search');
    // all produit
    Route::get('/produits', [ProduitController::class, 'all'])->name('produits.all');
    // technicien 
    Route::resource('techniciens', TechnicienController::class);
    // categories
    Route::resource('categories', CategorieController::class);
    // organisme
    Route::get('/organismes/liste', [OrganismeController::class, 'index'])->name('organismes.index');
    // store organisme
    Route::post('/organismes/store', [OrganismeController::class, 'store'])->name('organismes.store');
    //show organisme
    // In routes/web.php
    Route::get('/organismes/{organisme}', [OrganismeController::class, 'show'])->name('organismes.show');

    // edit organisme
    Route::get('/organismes/{organisme}/edit', [OrganismeController::class, 'edit'])->name('organismes.edit');
    // delete organisme
    Route::delete('/organismes/{organisme}', [OrganismeController::class, 'destroy'])->name('organismes.destroy');
    //update organisme
    Route::put('/organismes/{organisme}', [OrganismeController::class, 'update'])->name('organismes.update');

    //items
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');
    Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
    // List all offers
    Route::get('/offers', [OfferController::class, 'index'])->name('offers.index');

    // Show the form to create a new offer
    Route::get('/offers/create', [OfferController::class, 'create'])->name('offers.create');

    // Store a newly created offer
    Route::post('/offers', [OfferController::class, 'store'])->name('offers.store');

    // Show the details of a specific offer
    Route::get('/offers/{id}', [OfferController::class, 'show'])->name('offers.show');

    // Show the form to edit an existing offer
    Route::get('/offers/{id}/edit', [OfferController::class, 'edit'])->name('offers.edit');

    // Update an existing offer
    Route::put('/offers/{id}', [OfferController::class, 'update'])->name('offers.update');

    // Remove a product from an offer
    Route::delete('/offers/{offerId}/remove-product/{produitId}', [OfferController::class, 'removeProduct'])->name('offers.removeProduct');

    // Delete an offer
    Route::delete('/offers/{id}', [OfferController::class, 'destroy'])->name('offers.destroy');
});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';

//

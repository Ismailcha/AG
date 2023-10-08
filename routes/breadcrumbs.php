<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Role;

// Home
Breadcrumbs::for('Accueil', function (BreadcrumbTrail $trail) {
    $trail->push('Accueil', route('dashboard'));
});

// Home > Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('Accueil');
    $trail->push('Dashboard', route('dashboard'));
});

// Home > Dashboard > User Management
Breadcrumbs::for('user-management.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User Management', route('user-management.users.index'));
});

// Home > Dashboard > User Management > Users
Breadcrumbs::for('user-management.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Users', route('user-management.users.index'));
});

// Home > Dashboard > User Management > Users > [User]
Breadcrumbs::for('user-management.users.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.users.index');
    $trail->push(ucwords($user->name), route('user-management.users.show', $user));
});

// Home > Dashboard > User Management > Roles
Breadcrumbs::for('user-management.roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Roles', route('user-management.roles.index'));
});

// Home > Dashboard > User Management > Roles > [Role]
Breadcrumbs::for('user-management.roles.show', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('user-management.roles.index');
    $trail->push(ucwords($role->name), route('user-management.roles.show', $role));
});

// Home > Dashboard > User Management > Permission
Breadcrumbs::for('user-management.permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Permissions', route('user-management.permissions.index'));
});
// Home > Dashboard > produit form
Breadcrumbs::for('added_pages.produit.add_produit', function (BreadcrumbTrail $trail) {
    $trail->parent('Accueil');
    $trail->push('Ajoute Produit', route('dashboard'));
});
// Home > Dashboard > produit liste
Breadcrumbs::for('added_pages.produit.liste_produit', function (BreadcrumbTrail $trail) {
    $trail->parent('Accueil');
    $trail->push('Liste des produits', route('dashboard'));
});
// Home > Dashboard > produit > Liste des categorie
Breadcrumbs::for('added_pages.produit.categorie.liste.cat', function (BreadcrumbTrail $trail) {
    $trail->parent('Accueil');
    $trail->push('Liste des categories', route('dashboard'));
});
// offers liste 
Breadcrumbs::for('offers.index', function (BreadcrumbTrail $trail) {
    $trail->parent('Accueil');
    $trail->push('Liste des offers', route('dashboard'));
});
// Commande detail
Breadcrumbs::for('offers.commande_detail', function (BreadcrumbTrail $trail) {
    $trail->parent('Accueil');
    $trail->push('Commande detail', route('dashboard'));
});
// USER Commande
Breadcrumbs::for('offers.user_commandes', function (BreadcrumbTrail $trail) {
    $trail->parent('Accueil');
    $trail->push('Vos commandes', route('dashboard'));
});
// Liste candidat
Breadcrumbs::for('candidats.index', function (BreadcrumbTrail $trail) {
    $trail->parent('Accueil');
    $trail->push('Liste candidats', route('dashboard'));
});
// Liste candidat
Breadcrumbs::for('added_pages.organismes.index', function (BreadcrumbTrail $trail) {
    $trail->parent('Accueil');
    $trail->push('Liste organismes', route('dashboard'));
});
// items > show
Breadcrumbs::for('items.show', function (BreadcrumbTrail $trail) {
    $trail->parent('Accueil');
    $trail->push('Detail item', route('dashboard'));
});

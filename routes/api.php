<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SanctumController;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\LibrarianController;


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get('activate/{user}', [CuentasController::class, 'activate'])->name('activate')->middleware('signed');
Route::post('reactivate', [CuentasController::class, 'reActivate']);


Route::middleware(['auth:sanctum'])->GROUP(function () {

    Route::middleware(['admin/user'])->GROUP(function () {
        // FOTOS DE PERFIL
        Route::post('subirImagen', [ImagenesController::class, 'subirImagen']);
        Route::get('verImagen', [ImagenesController::class, 'verImagen']);
        Route::post('actualizarImagen', [ImagenesController::class, 'editarImagen']);

        //TABLAS

        //BRANCHES
        Route::get('Branches', [BranchController::class, 'index']);
        Route::get('Branches/{id}', [BranchController::class, 'show']);

        // Authors
        Route::get('authors', [AuthorController::class, 'index']);
        Route::get('authors/{id}', [AuthorController::class, 'show']);

        // Books
        Route::get('books', [BookController::class, 'index']);
        Route::get('books/{id}', [BookController::class, 'show']);

        // Categories
        Route::get('categories', [CategoryController::class, 'index']);
        Route::get('categories/{id}', [CategoryController::class, 'show']);

        // Members
        Route::get('members', [MemberController::class, 'index']);
        Route::get('members/{id}', [MemberController::class, 'show']);

        // Loans
        Route::get('loans', [LoanController::class, 'index']);
        Route::get('loans/{id}', [LoanController::class, 'show']);

        // Publishers
        Route::get('publishers', [PublisherController::class, 'index']);
        Route::get('publishers/{id}', [PublisherController::class, 'show']);

        // Reservations
        Route::get('reservations', [ReservationController::class, 'index']);
        Route::get('reservations/{id}', [ReservationController::class, 'show']);

        // Fines
        Route::get('fines', [FineController::class, 'index']);
        Route::get('fines/{id}', [FineController::class, 'show']);

        // Librarians
        Route::get('librarians', [LibrarianController::class, 'index']);
        Route::get('librarians/{id}', [LibrarianController::class, 'show']);
    });
    
    // RUTAS DE ADMIN
    Route::middleware(['admin'])->GROUP(function () {
        // USUARIOS
        Route::get('usuarios', [UsersController::class, 'index']);
        Route::get('usuarios/{id}', [UsersController::class, 'show']);
        Route::put('usuarios/{id}', [UsersController::class, 'update']);
        Route::delete('usuarios/{id}', [UsersController::class, 'destroy']);
        Route::put('usuarios', [UsersController::class, 'updateRol']);

        //BRANCHES
        Route::resource('Branch', BranchController::class);
        //AUTHORS
        Route::resource('Authors', AuthorController::class);
        //CATEGORIES
        Route::resource('Categories', CategoryController::class);
        //PUBLISHER
        Route::resource('Publishers', PublisherController::class);
        //BOOKS
        Route::resource('Books', BookController::class);
        //MEMBERS
        Route::resource('Members', MemberController::class);
        //LOANS
        Route::resource('Loans', LoanController::class);
        //RESERVATIONS
        Route::resource('Reservations', ReservationController::class);
        //FINES
        Route::resource('Fines', FineController::class);
        //LIBRARIANS
        Route::resource('Librarians', LibrarianController::class);
    });
});

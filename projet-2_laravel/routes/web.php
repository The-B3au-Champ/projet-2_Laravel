<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;

Route::get('/',[BookController::class, "getBooks"]);
Route::get('/accueil',[BookController::class, "getBooks"]);

Route::get('/nouveau-livre',[BookController::class, "showAddBookForm"]);
Route::post('/nouveau-livre',[BookController::class, "addBook"]);
Route::get('/show-detail/{id}',[BookController::class, "showBookDetail"]);
Route::delete('/delete-book/{id}',[BookController::class, "deleteBook"]);
Route::get('/edit-book/{id}',[BookController::class, "showEditBookForm"]);
Route::put('/edit-book/{id}',[BookController::class, "editBook"]);

Route::get('/login', function () {
    return view('login');
});

Route::get('/contactez-nous', function () {
    return view('contactezNous');
});

Route::post('register', [UserController::class, "register"]);
Route::post('login', [UserController::class, "login"]);
Route::post('logout', [UserController::class, "logout"]);


Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

Route::patch('/messages/{id}/read', [MessageController::class, 'markAsRead'])->name('messages.markAsRead');
Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');

Route::patch('/messages/{id}/read', [MessageController::class, 'markAsRead'])->name('messages.markAsRead');

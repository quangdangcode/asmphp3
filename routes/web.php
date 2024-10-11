<?php

use App\Http\Controllers\AdminCustomer;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->as('admin.')
    ->group(function () {
        Route::get('/', [CategoryController::class, 'dashboard'])->name('dashboard');

        Route::get('/danh-sach-chuyen-muc', [CategoryController::class, 'index'])->name('index');
        Route::get('/them-moi-chuyen-muc', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/sua-chuyen-muc/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{category}', [CategoryController::class, 'update'])->name('update');

        Route::get('/danh-sach-ban-tin', [PostController::class, 'indexPost'])->name('indexPost');
        Route::get('/them-ban-tin', [PostController::class, 'addPost'])->name('addPost');
        Route::post('/storePost', [PostController::class, 'storePost'])->name('storePost');
        Route::get('/sua-ban-tin/{post}', [PostController::class, 'editPost'])->name('editPost');
        Route::put('/updatePost/{post}', [PostController::class, 'updatePost'])->name('updatePost');
        Route::put('/deletePost/{post}', [PostController::class, 'deletePost'])->name('deletePost');
        Route::get('/thung-rac-1', [PostController::class, 'recycleP'])->name('recyclePost');
        Route::put('/recoverPost/{post}', [PostController::class, 'recoverPost'])->name('recoverPost');

        Route::get('/danh-sach', [AdminCustomer::class, 'customer'])->name('customer');
        Route::put('/deleteUser/{user}', [AdminCustomer::class, 'deleteUser'])->name('deleteUser');
        Route::get('/thung-rac', [AdminCustomer::class, 'recycle'])->name('recycle');
        Route::put('/recycleUser/{user}', [AdminCustomer::class, 'recycleUser'])->name('recycleUser');

        Route::get('/danh-sach-binh-luan', [CommentController::class, 'indexComment'])->name('indexComment');
        Route::delete('/deleteComment/{comment}', [CommentController::class, 'deleteComment'])->name('deleteComment');
        Route::delete('/deleteCommentClient/{comment}', [CommentController::class, 'deleteCommentClient'])->name('deleteCommentClient');

    });

Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('/category/{id}', [Controller::class, 'category'])->name('category');
Route::get('/detail/{id}', [Controller::class, 'show'])->name('show');
Route::get('/search', [Controller::class, 'search'])->name('search');

Route::get('/register', [CustomerController::class, 'register'])->name('register');
Route::post('/register', [CustomerController::class, 'registerBehail'])->name('registerBehail');
Route::get('/login', [CustomerController::class, 'login'])->name('login');
Route::post('loginBehail', [CustomerController::class, 'loginBehail'])->name('loginBehail');
Route::post('/logout', [CustomerController::class, 'logout'])->name('logout');
Route::get('/updateUser', [CustomerController::class, 'updateUser'])->name('updateUser');
Route::put('/updateUser', [CustomerController::class, 'UpdateBehail'])->name('UpdateBehail');
// Route::match(['get', 'post'], '/updateUser', [CustomerController::class, 'updateUser'])->name('updateUser')->middleware('auth');
Route::get('/password', [CustomerController::class, 'password'])->name('password');
Route::post('/password', [CustomerController::class, 'passwordBehail'])->name('passwordBehail');


Route::post('/post/{id}', [Controller::class, 'storeComment'])->name('storeComment');
Route::delete('/deleteCommentClient2/{comment}', [CommentController::class, 'deleteCommentClient2'])->name('deleteCommentClient2');

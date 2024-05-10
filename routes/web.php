<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\CommentController;
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\frontend\PostController as FrontendPostController;
use App\Http\Controllers\frontend\UserController as FrontendUserController;
use App\Http\Controllers\frontend\CommentController as FrontendCommentController;

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

//website routes
Route::get('/', [FrontendHomeController::class, 'home'])->name('frontend.home');

Route::get('/About', [FrontendHomeController::class, 'about'])->name('about.Us');

Route::get('/registration', [FrontendUserController::class, 'registration'])->name('user.registration');
Route::post('/reg-form-store', [FrontendUserController::class, 'store'])->name('user.regform.store');

Route::get('/login', [FrontendUserController::class, 'login'])->name('user.login');
Route::post('/login', [FrontendUserController::class, 'loginpost'])->name('user.login.post');

Route::group(['middleware' => 'auth'], function () {

  
    Route::get('/blod-add', [FrontendPostController::class, 'blogAdd'])->name('blog.add');
    Route::post('/postSubmit', [FrontendPostController::class, 'blogStore'])->name('post.store');
    Route::get('/post-view/{id}', [FrontendPostController::class, 'postView'])->name('post.view');
    Route::get('/my-post', [FrontendPostController::class, 'myPost'])->name('my.post');
    Route::get('/blog/delete/{id}', [FrontendPostController::class, 'delete'])->name('blog.delete');
    Route::get('/blog/edit/{id}', [FrontendPostController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/update/{id}', [FrontendPostController::class, 'update'])->name('blog.update');


    Route::get('/logout', [FrontendUserController::class, 'logout'])->name('user.logout');


    Route::get('/add-comment/{id}', [FrontendCommentController::class, 'commentAdd'])->name('comment.add');
    Route::post('/comment/{id}', [FrontendCommentController::class, 'store'])->name('comment.store');
    Route::get('/comment/delete/{id}', [FrontendCommentController::class, 'delete'])->name('website.comment.delete');
    Route::get('/comment/edit/{id}', [FrontendCommentController::class, 'edit'])->name('website.comment.edit');
    Route::put('/comment/update/{id}', [FrontendCommentController::class, 'update'])->name('website.comment.update');
});


//admin panel routes
Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [UserController::class, 'loginform'])->name('admin.login');
    Route::post('/login-form-post', [UserController::class, 'loginpost'])->name('admin.login.post');

    Route::group(['middleware' => 'checkAdmin'], function () {

        Route::get('/logout', [UserController::class, 'logout'])->name('admin.logout');

        Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');

        Route::get('/users/list', [UserController::class, 'list'])->name('users.list');
        Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
        Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');

        Route::get('/post/list', [PostController::class, 'list'])->name('post.list');
        Route::get('/post/form', [PostController::class, 'form'])->name('post.form');
        Route::post('/post/add', [PostController::class, 'addPost'])->name('post.add');
        Route::get('/post/delete/{id}', [PostController::class, 'delete'])->name('post.delete');


        Route::get('/comment/list', [CommentController::class, 'list'])->name('comment.list');
        Route::get('/comment/delete/{id}', [CommentController::class, 'delete'])->name('comment.delete');

    });
});

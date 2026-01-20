<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class);
Route::get('/contact', ContactController::class);

Route::get('/job', [JobController::class, 'index']);

Route::resource('tags', TagController::class);

Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

   // Admin
    Route::middleware('role:admin')->group(function () {
        Route::delete('/blog/{post}', [PostController::class, 'destroy']);
    });

    
    // Editor,Admin
    Route::middleware('role:editor,admin')->group(function () {
        Route::get('/blog/create', [PostController::class, 'create']);
        Route::post('/blog', [PostController::class, 'store']);

        Route::middleware('can:update,post')->group(function(){
            Route::get('/blog/{post}/edit', [PostController::class, 'edit']);
            Route::patch('/blog/{post}', [PostController::class, 'update']);
        });
    });

    // Viewer, Editor, Admin
    Route::middleware('role:viewer,editor,admin')->group(function () {
        Route::get('/blog', [PostController::class, 'index']);
        Route::get('/blog/{post}', [PostController::class, 'show']);
        Route::resource('comments', CommentController::class);
    });

});

Route::middleware('onlyMe')->group(function () {
    Route::get('/about', AboutController::class);
});












//Route::get('/tags',[TagController::class,'index']);
//Route::post('/tags',[TagController::class,'create']);
//Route::get('/tags/test-many',[TagController::class,'testManyToMany']);

// Route::get('/blog',[PostController::class,'index']);
// Route::post('/blog',[PostController::class,'create']);
// Route::delete('/blog/{id}',[PostController::class,'delete']);
// Route::get('/blog/{id}',[PostController::class,'show']);

//Route::get('/comments',[CommentController::class,'index']);
//Route::post('/comments',[CommentController::class,'create']);
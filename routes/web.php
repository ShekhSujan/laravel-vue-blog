<?php

use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('/', function()
{
return view('site.layout');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/{anypath}', [App\Http\Controllers\HomeController::class, 'index'])->where('path','.*');

//Category
 Route::post('/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('add_category');
 Route::get('/get-categories', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
 Route::get('/get-active-categories', [App\Http\Controllers\Admin\CategoryController::class, 'getActiveCategories']);
 Route::get('/active-categories', [App\Http\Controllers\Admin\CategoryController::class, 'activeCategories']);
 Route::get('/remove-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
 Route::get('/show-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'show']);
 Route::post('/update-category', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
 Route::post('/categories/remove-items', [App\Http\Controllers\Admin\CategoryController::class, 'removeItems']);
 Route::post('/categories/change-status', [App\Http\Controllers\Admin\CategoryController::class, 'changeStatus']);
 
 //Post
 Route::post('/add-post', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('add_post');
 Route::get('/get-posts', [App\Http\Controllers\Admin\PostController::class, 'index']);
 Route::get('/get-active-posts', [App\Http\Controllers\Admin\PostController::class, 'activePosts']);
 Route::get('/remove-post/{slug}', [App\Http\Controllers\Admin\PostController::class, 'destroy']);
 Route::get('/show-post/{slug}', [App\Http\Controllers\Admin\PostController::class, 'show']);
 Route::post('/update-post', [App\Http\Controllers\Admin\PostController::class, 'update']);

 Route::post('/posts/remove-items', [App\Http\Controllers\Admin\PostController::class, 'removeItems']);
 Route::post('/posts/change-status', [App\Http\Controllers\Admin\PostController::class, 'changeStatus']);
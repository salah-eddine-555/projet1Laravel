<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategorieController;



Route::resource('posts', PostController::class);
Route::resource('categories', CategorieController::class)->parameters(['categories' => 'categorie']);

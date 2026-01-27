<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);

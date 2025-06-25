<?php
// routes/api.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::prefix('api')->group(function () {

  Route::post   ('materiales',                 [MaterialController::class, 'store']);
Route::put    ('materiales/{material}',      [MaterialController::class, 'update']);
Route::get    ('materiales',                 [MaterialController::class, 'index']);
});



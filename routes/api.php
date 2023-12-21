<?php

use App\Http\Controllers\Api\DetailInformativeController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\InformativeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//route api gallery
Route::get('gallery', [GalleryController::class, 'index']);
Route::get('gallery/{id}', [GalleryController::class, 'show']);
Route::post('gallery', [GalleryController::class, 'store']);
Route::put('gallery/{id}', [GalleryController::class, 'update']);
Route::delete('gallery/{id}', [GalleryController::class, 'destroy']);

//route api informative
Route::get('informative', [InformativeController::class, 'index']);
Route::get('informative/{id}', [InformativeController::class, 'show']);
Route::post('informative', [InformativeController::class, 'store']);
Route::put('informative/{id}', [InformativeController::class, 'update']);
Route::delete('informative/{id}', [InformativeController::class, 'destroy']);

//route api detail informative
Route::get('informative/detail/{id}', [DetailInformativeController::class, 'show']);
Route::post('informative/detail', [DetailInformativeController::class, 'store']);
Route::put('informative/detail/{id}', [DetailInformativeController::class, 'update']);
Route::delete('informative/detail/{id}', [DetailInformativeController::class, 'destroy']);
Route::get('informative/detail', [DetailInformativeController::class, 'index']);
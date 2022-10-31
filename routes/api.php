<?php

use App\Http\Controllers\Admin\RegionController;
use App\Services\AdminService;
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

Route::get('getLang', [AdminService::class, 'getLang'])->name('api.getLang');

Route::controller(RegionController::class)->prefix('region')->name('region.')->group(function () {
    Route::get('/getDistricts/{id}', 'getDistricts')->where('id', '[0-9]+')->name('getDistricts');
});



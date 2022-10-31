<?php

use App\Http\Controllers\Web\ProjectController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\SeeAllController;
use App\Http\Controllers\Web\Terminal\TerminalController;
use App\Services\AdminService;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware("locale.web")->group(function () {

    Route::prefix(AdminService::setLocalePrefix())->name('web.')->group(function () {

        Route::controller(HomeController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
        });

        Route::controller(ProjectController::class)->prefix('project')->name('project.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('show/{id}', 'show')->where('id', '[0-9]+')->name('view');
        });

        //see all
        Route::controller(SeeAllController::class)->prefix('see-all')->name('see-all.')->group(function () {
            Route::get('/news', 'news')->name('news');
        });
    });
});


Route::middleware(['auth:admin'])->group(function () {
    //File Manager
    Route::group(['prefix' => 'filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

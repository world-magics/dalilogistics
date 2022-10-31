<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\KachestvaController;
use App\Http\Controllers\Admin\NadyojnostController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\FilterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\PartnersController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\NewsController;
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

Route::name('admin.')->group(function () {

    Route::controller(AuthController::class)->middleware(['guest:admin'])->group(function () {
        Route::get('/login', 'showLogin')->name('login');
        Route::post('/login', 'loginForAdmin')->name('login');
    });

    Route::middleware(['auth:admin'])->group(function () {

        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/logout',[AuthController::class,'logout'])->name('logout');

        //Settings
        Route::controller(SettingController::class)->prefix('setting')->name('setting.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/delete/{id}', 'delete')->where('id', '[0-9]+')->name('delete');
            Route::get('/edit/{id}', 'edit')->where('id', '[0-9]+')->name('edit');
            Route::post('/update/{id}', 'update')->where('id', '[0-9]+')->name('update');

        });

        //Roles
        Route::controller(RoleController::class)->prefix('role')->name('role.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
        });

        //Users
        Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
        });

        //About
        Route::controller(AboutController::class)->prefix('about')->name('about.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/delete/{id}', 'delete')->where('id', '[0-9]+')->name('delete');
            Route::get('/edit/{id}', 'edit')->where('id', '[0-9]+')->name('edit');
            Route::post('/update/{id}', 'update')->where('id', '[0-9]+')->name('update');
        });

        //Kachestva
        Route::controller(KachestvaController::class)->prefix('kachestva')->name('kachestva.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/delete/{id}', 'delete')->where('id', '[0-9]+')->name('delete');
            Route::get('/edit/{id}', 'edit')->where('id', '[0-9]+')->name('edit');
            Route::post('/update/{id}', 'update')->where('id', '[0-9]+')->name('update');
        });

        //Nadyojnost
        Route::controller(NadyojnostController::class)->prefix('nadyojnost')->name('nadyojnost.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/delete/{id}', 'delete')->where('id', '[0-9]+')->name('delete');
            Route::get('/edit/{id}', 'edit')->where('id', '[0-9]+')->name('edit');
            Route::post('/update/{id}', 'update')->where('id', '[0-9]+')->name('update');
        });

        // Projects
        Route::controller(ProjectController::class)->prefix('project')->name('project.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/delete/{id}', 'delete')->where('id', '[0-9]+')->name('delete');
            Route::get('/edit/{id}', 'edit')->where('id', '[0-9]+')->name('edit');
            Route::post('/update/{id}', 'update')->where('id', '[0-9]+')->name('update');
        });

        // Banner
        Route::controller(BannerController::class)->prefix('banner')->name('banner.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/delete/{id}', 'delete')->where('id', '[0-9]+')->name('delete');
            Route::get('/edit/{id}', 'edit')->where('id', '[0-9]+')->name('edit');
            Route::post('/update/{id}', 'update')->where('id', '[0-9]+')->name('update');
        });

        // Partners
        Route::controller(PartnersController::class)->prefix('partners')->name('partners.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/delete/{id}', 'delete')->where('id', '[0-9]+')->name('delete');
            Route::get('/edit/{id}', 'edit')->where('id', '[0-9]+')->name('edit');
            Route::post('/update/{id}', 'update')->where('id', '[0-9]+')->name('update');
        });

        // News
        Route::controller(NewsController::class)->prefix('news')->name('news.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/delete/{id}', 'delete')->where('id', '[0-9]+')->name('delete');
            Route::get('/edit/{id}', 'edit')->where('id', '[0-9]+')->name('edit');
            Route::post('/update/{id}', 'update')->where('id', '[0-9]+')->name('update');
        });

        Route::controller(MessageController::class)->prefix('message')->name('message.')->group(function() {
            Route::get('/','index')->name('index');
        });

    });
});

<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backpanel\BacklinkController;
use App\Http\Controllers\Backpanel\DashboardController;
use App\Http\Controllers\Backpanel\Gallery\AlbumController;
use App\Http\Controllers\Backpanel\Gallery\MediaController;
use App\Http\Controllers\Backpanel\SiteMenuController;
use App\Http\Controllers\Backpanel\HeroSliderController;
use App\Http\Controllers\Backpanel\Media\DigitalMediaController;
use App\Http\Controllers\Backpanel\Media\SocialMediaController;
use App\Http\Controllers\Backpanel\News\NewsController;
use App\Http\Controllers\Backpanel\News\NewsTypeController;
use App\Http\Controllers\Backpanel\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login_check'])->middleware('guest')->name('login.check');

Route::middleware(['auth'])->group(function () {

    Route::prefix('backpanel')->name('backpanel.')->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::resource('users', UserController::class)->except(['show']);

        Route::prefix('website_settings')->name('website_settings.')->group(function () {
            Route::resource('hero_sliders', HeroSliderController::class)->except(['show']);
            Route::resource('site_menus', SiteMenuController::class)->except(['show']);
            Route::resource('backlinks', BacklinkController::class)->except(['show']);
        });

        Route::resource('news_types', NewsTypeController::class)->except(['show']);
        Route::prefix('news')->name('news.')->group(function () {
            Route::get('/{news_type}', [NewsController::class, 'index'])->name('index');
            Route::get('/{news_type}/create', [NewsController::class, 'create'])->name('create');
            Route::post('/{news_type}', [NewsController::class, 'store'])->name('store');
            Route::get('/{news_type}/{news}', [NewsController::class, 'show'])->name('show');
            Route::get('/{news_type}/{news}/edit', [NewsController::class, 'edit'])->name('edit');
            Route::put('/{news_type}/{news}', [NewsController::class, 'update'])->name('update');
            Route::delete('/{news_type}/{news}', [NewsController::class, 'destroy'])->name('destroy');

            Route::get('/{news_type}/{news}/edit_picture', [NewsController::class, 'edit_picture'])->name('edit_picture');
            Route::put('/{news_type}/{news}/update_picture', [NewsController::class, 'update_picture'])->name('update_picture');

            Route::get('/{news_type}/{news}/edit_content', [NewsController::class, 'edit_content'])->name('edit_content');
            Route::put('/{news_type}/{news}/update_content', [NewsController::class, 'update_content'])->name('update_content');

            Route::get('/{news_type}/{news}/publish', [NewsController::class, 'publish'])->name('publish');
            Route::put('/{news_type}/{news}/update_publish', [NewsController::class, 'update_publish'])->name('update_publish');
            Route::get('/{news_type}/{news}/unpublish', [NewsController::class, 'unpublish'])->name('unpublish');
        });

        Route::prefix('media')->name('media.')->group(function () {
          Route::resource('social', SocialMediaController::class)->except(['show'])->parameters(['social' => 'social_post']);
          Route::resource('digital', DigitalMediaController::class)->except(['show'])->parameters(['digital' => 'digital_media']);
        });

        Route::resource('albums', AlbumController::class);
        Route::resource('albums.medias', MediaController::class)->except(['index', 'show']);
        Route::get('/albums/{album}/publish', [AlbumController::class, 'publish'])->name('albums.publish');
        Route::put('/albums/{album}/update_publish', [AlbumController::class, 'update_publish'])->name('albums.update_publish');
        Route::get('/albums/{album}/unpublish', [AlbumController::class, 'unpublish'])->name('albums.unpublish');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

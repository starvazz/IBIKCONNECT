<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BEIController;
use App\Http\Controllers\CDCController;
use App\Http\Controllers\Admin\BeiAdminController;
use App\Http\Controllers\Admin\CdcAdminController;
use App\Http\Controllers\Admin\CdcJobController;
use App\Http\Controllers\Admin\CdcEventController;
use App\Http\Controllers\Admin\CdcNewsController;
use App\Http\Controllers\Admin\CdcRegistrationController;
use App\Http\Controllers\Auth\AdminLoginController;

// Public routes - CDC
Route::get('/', [CDCController::class, 'index'])->name('home');
Route::prefix('cdc')->name('cdc.')->group(function () {
    Route::get('/lowongan', [CDCController::class, 'jobs'])->name('jobs');
    Route::get('/lowongan/{job}', [CDCController::class, 'jobDetail'])->name('jobs.detail');
    Route::get('/agenda', [CDCController::class, 'events'])->name('events');
    Route::get('/agenda/{event}', [CDCController::class, 'eventDetail'])->name('events.detail');
    Route::post('/agenda/{event}/register', [CDCController::class, 'registerEvent'])->name('events.register');
    Route::get('/berita', [CDCController::class, 'news'])->name('news');
    Route::get('/berita/{news}', [CDCController::class, 'newsDetail'])->name('news.detail');
    Route::get('/kontak', [CDCController::class, 'contact'])->name('contact');
});

// Public routes - BEI
Route::get('/bei', [BEIController::class, 'index'])->name('bei.home');
Route::prefix('bei')->name('bei.')->group(function () {
    Route::get('/profil', [BEIController::class, 'profile'])->name('profile');
    Route::get('/edukasi', [BEIController::class, 'educations'])->name('educations');
    Route::get('/edukasi/{education}', [BEIController::class, 'educationDetail'])->name('educations.detail');
    Route::get('/event', [BEIController::class, 'events'])->name('events');
    Route::get('/event/{event}', [BEIController::class, 'eventDetail'])->name('events.detail');
    Route::post('/event/{event}/register', [BEIController::class, 'registerEvent'])->name('events.register');
    Route::get('/galeri', [BEIController::class, 'gallery'])->name('gallery');
    Route::get('/pendaftaran', [BEIController::class, 'registration'])->name('registration');
    Route::post('/pendaftaran', [BEIController::class, 'submitRegistration'])->name('registration.submit');
});

// Auth routes
Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminLoginController::class, 'login'])->name('login.post');
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

// Protected admin routes
Route::middleware('auth')->prefix('admin-page')->name('admin.')->group(function () {
    
    // Overview - Default landing page (accessible by all admins)
    Route::get('/', [\App\Http\Controllers\Admin\OverviewController::class, 'index'])->name('overview');
    
    // User Management - Super Admin Only
    Route::middleware('role:super_admin')->prefix('users')->name('users.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('destroy');
        Route::put('/{user}/password', [\App\Http\Controllers\Admin\UserController::class, 'updatePassword'])->name('password');
    });
    
    // CDC Admin Routes - Super Admin & CDC Admin Only
    Route::middleware('role:super_admin,cdc_admin')->prefix('cdc')->name('cdc.')->group(function () {
        Route::get('/', [CdcAdminController::class, 'dashboard'])->name('dashboard');
        
        // Job Listings
        Route::resource('jobs', CdcJobController::class);
        Route::post('jobs/{job}/toggle-active', [CdcJobController::class, 'toggleActive'])->name('jobs.toggle-active');
        
        // Events
        Route::resource('events', CdcEventController::class);
        Route::get('events/{event}/registrations', [CdcEventController::class, 'registrations'])->name('events.registrations');
        Route::post('events/registrations/{registration}/approve', [CdcEventController::class, 'approveRegistration'])->name('events.registrations.approve');
        Route::post('events/registrations/{registration}/reject', [CdcEventController::class, 'rejectRegistration'])->name('events.registrations.reject');
        Route::post('events/registrations/{registration}/reset', [CdcEventController::class, 'resetRegistration'])->name('events.registrations.reset');
        Route::delete('events/registrations/{registration}', [CdcEventController::class, 'destroyRegistration'])->name('events.registrations.destroy');
        Route::get('events/{event}/export', [CdcEventController::class, 'exportRegistrations'])->name('events.export');
        Route::post('events/{event}/toggle-publish', [CdcEventController::class, 'togglePublish'])->name('events.toggle-publish');
        Route::post('events/{event}/toggle-registration', [CdcEventController::class, 'toggleRegistration'])->name('events.toggle-registration');

        Route::get('registrations', [CdcRegistrationController::class, 'index'])->name('registrations.index');
        
        // News
        Route::resource('news', CdcNewsController::class);
        Route::post('news/{news}/publish', [CdcNewsController::class, 'publish'])->name('news.publish');
    });
    
    // BEI Admin Routes - Super Admin & BEI Admin Only
    Route::middleware('role:super_admin,bei_admin')->prefix('bei')->name('bei.')->group(function () {
        Route::get('/', [BeiAdminController::class, 'dashboard'])->name('dashboard');
        
        // Events
        Route::resource('events', \App\Http\Controllers\Admin\BeiEventController::class);
        Route::get('events/{event}/registrations', [\App\Http\Controllers\Admin\BeiEventController::class, 'registrations'])->name('events.registrations');
        
        // Education Materials
        Route::resource('educations', \App\Http\Controllers\Admin\BeiEducationController::class);
        
        // Galleries
        Route::resource('galleries', \App\Http\Controllers\Admin\BeiGalleryController::class);
        
        // Member Registrations
        Route::get('registrations', [\App\Http\Controllers\Admin\BeiRegistrationController::class, 'index'])->name('registrations.index');
        Route::put('registrations/{registration}/status', [\App\Http\Controllers\Admin\BeiRegistrationController::class, 'updateStatus'])->name('registrations.status');
        Route::delete('registrations/{registration}', [\App\Http\Controllers\Admin\BeiRegistrationController::class, 'destroy'])->name('registrations.destroy');
    });
});
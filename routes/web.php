<?php
Auth::routes();
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('/', 'DashboardController')->name('dashboard');
});
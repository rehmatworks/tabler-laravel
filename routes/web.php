<?php
Auth::routes();
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('/', 'DashboardController')->name('dashboard');
    Route::prefix('users')->name('users')->group(function() {
        Route::get('roles', 'UserController@roles')->name('roles');
    });
    Route::resource('users', 'UserController', [
        'names' => [
            'index' => 'users'
        ]
    ]);
});

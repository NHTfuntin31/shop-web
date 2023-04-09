<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    // Route::get('/', 'HomeController@index');

    /**
     * Admin Routes
     */
    Route::prefix('admin')->group(function() {
        Route::get('/', 'Admin\HomeController@index')->name('admin');
        // Route::group(['middleware' => ['admin']], function() {
            Route::get('/login', 'Admin\LoginController@index')->name('admin.login');
            Route::post('/login', 'Admin\LoginController@login')->name('login.perform');
            Route::get('/logout', 'Admin\LogoutController@logout')->name('admin.logout');
        // });
        
    });

    Route::prefix('user')->group(function() {
        Route::get('/', 'User\HomeController@index')->name('user');
        // Route::group(['middleware' => ['admin']], function() {
            Route::get('/login', 'User\LoginController@index')->name('user.login');
            Route::post('/login', 'User\LoginController@login')->name('user.perform');
            Route::get('/logout', 'User\LogoutController@logout')->name('user.logout');
        // });
        
    });


    // Route::group(['middleware' => ['admin']], function() {
    //     Route::prefix('admin')->group(function() {
    //         Route::get('/', 'Admin\HomeController@index')->name('admin');
    //         Route::get('/login', 'Admin\LoginController@index')->name('admin.login');
    //         Route::post('/login', 'Admin\LoginController@login')->name('login.perform');
    //     });

    //     Route::prefix('user')->group(function() {
    //         Route::get('/', 'User\HomeController@index')->name('user');
    //     });
    // });
    

    /**
     * User Routes
     */
    // Route::prefix('user')->group(function() {
    //     Route::get('/', 'HomeController@index')->name('user');
    // });

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        // Route::get('/login', 'LoginController@show')->name('login.show');
        // Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    // Route::group(['middleware' => ['auth']], function() {
    //     /**
    //      * Logout Routes
    //      */
    //     Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    // });
});
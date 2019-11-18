<?php

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

/*
* Аутентификация и регистрация пользователей Larovel 6
* */
Auth::routes();

/**
 * Показать глалвную страницу
 */
Route::get('/', function () {
    return view('auth/login');
})->name('/');

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Вывести список users
 */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/user', "UserController@index");
    Route::get('/users', "UserController@index");
    Route::get('/user/list', "UserController@index");
    Route::get('/users/list', "UserController@index");

    Route::get('/user/show/{id}', "UserController@show");
    Route::post('/user/update/{user}', 'UserController@update');
    Route::delete('/user/delete/{user}', 'UserController@delete');
});

/*
 * Товары:
 * */
Route::group(['prefix' => 'products', 'middleware' => 'auth'], function () {
    Route::get('/', "ProductController@index");
    Route::get('/search/{product}', 'ProductController@show');
    Route::post('/update/{product}', 'ProductController@update');
    Route::delete('/delete/{product}', 'ProductController@delete');
});

/*
 * Barcodes:
 * */
Route::group(['prefix' => 'barcode', 'middleware' => 'auth'], function () {
    Route::get('list', 'BarcodeController@index');
    Route::get('form', 'BarcodeController@form');
    Route::get('generate', 'BarcodeController@generate');
    Route::delete('delete/{barcode}', 'BarcodeController@delete');
    Route::post('delete_list', 'BarcodeController@delete_list');
});


/*
 * Import-Export:
 * пока используем только экспорт кодов
 * */
Route::group(['middleware' => 'auth'], function () {
    Route::get('export/{tableName}/{fileType}/{productId?}/{count?}', 'ExportController@export');
});


/* Sms */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/sms/form', "SmsController@form");
    Route::post('/sms/send', 'SmsController@send');
});








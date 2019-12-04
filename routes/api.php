<?php
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
//bearer token Y6mwB0w78T1dSv4LlwZMZzkXE9ufJbCE4ikdfUJBWDF1V5HaOgATGG1wgjm8
/*
 * Для регистрации и входа по email
 * */
Route::post('/users/email/create', 'UserController@store'); //name, email, password
Route::post('/users/email/login', 'UserController@login');
// старый путь (на всякий случай)
Route::post('/users/create', 'UserController@store');
Route::post('/users/login', 'UserController@login');


/*
 * Для регистрации и входа по номеру телефона
 * */
Route::post('/users/phone/create', 'UserController@storePhone');
Route::post('/users/phone/verify', 'UserController@verifyPhone');

Route::post('/users/phone/login', 'UserController@loginPhone');
Route::post('/users/phone/login/verify', 'UserController@loginVerifyPhone');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/users/logout', 'UserController@logout');
});


/**
 * Users
 */
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/users/', "UserController@index");
    Route::get('/users/list', "UserController@index");

    Route::get('/users/show/{user_id}', "UserController@show"); //user_id
    Route::put('/users/update/{user_id}', "UserController@update"); //user_id, new data
    Route::post('/users/search', "UserController@search"); //name or email
    Route::delete('/users/delete/{user_id}', "UserController@delete"); //user_id
});


/*
 * Товары:
 * */
//список товаров для формы генерацици в фронте
Route::get('/products/form', "ProductController@form");

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/products', "ProductController@index");
    Route::post('/products/create', 'ProductController@store'); // обязательные данные 'product_code' и 'product_name'
    Route::post('/products/show/{product_id}', 'ProductController@show'); //product_id
    Route::put('/products/update/{product_id}', 'ProductController@update');
    Route::delete('/products/delete/{product_id}', 'ProductController@delete');
});


/*
 * Barcodes
 * */
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/barcode', 'BarcodeController@index'); //product_id
    Route::get('barcode/generate', 'BarcodeController@generate'); //product_code (код товара), barcode_count (кол-во кодов для генерации)
    Route::post('/barcode/search', 'BarcodeController@search'); //barcode (код)
    Route::put('/barcode/update/{barcode}', 'BarcodeController@update'); //barcode
    Route::delete('/barcode/delete/{barcode}', 'BarcodeController@delete');
});


/*
 * Магазины
 * */
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/shops', "ShopController@index");
    Route::post('/shop/add', 'ShopController@store'); //address - обязательный параметр
    Route::post('/shop/show/{shop_id}', 'ShopController@show');

    Route::post('/shop/search', 'ShopController@search');
    Route::post('/shop/geo', 'ShopController@geo');

    Route::put('/shop/update/{shop_id}', 'ShopController@update');
    Route::delete('/shop/delete/{shop_id}', 'ShopController@delete');
});


Route::group(['middleware' => 'auth:api'], function () {
    /* Экспорт базы*/
    Route::get('/barcode/export', 'ExportController@exportApi'); //fileType, productId, count (количество последних сгенерированных кодов)

    /* Sms */
//  Route::get('/sms/form', "SmsController@form");
    Route::post('/sms/send/{to}', 'SmsController@send');

});



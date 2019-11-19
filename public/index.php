<?php

//namespace App\Http\Controllers;

use App\Models;

//use Illuminate\Support\Facades\DB;
//use App\Http\Controllers\Controller;
/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));


/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__ . '/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__ . '/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();


$kernel->terminate($request, $response);

//if (DB::connection()->getDatabaseName()) {
//    echo "Connected successfully to database " . DB::connection()->getDatabaseName() . "";
//}
//
//$product = DB::connection();
//
//$products =  $product->select ("select * from product");
//$products = DB::select('select * from products where active = ?', [1])
//$APISystem = App\Models\APISystem::all();


//var_dump($products[0]);
//exit;
//foreach ($products as $product) {
//
//    var_dump($product);
//    var_dump($product-);
//    echo $product->name;
//}


//Schema::create('APISystem', function (Blueprint $table) {
//    $table->increments('id');
//});
//$products = App\Models\Product::all();
//$APISystem = App\Models\APISystem::all();
//
//foreach ($products as $product) {
//    echo $product->name;
//}

//$product = new \App\Models\APISystem();
//$product->title = "Торшер";
//$product->created = "2019-10-10 15:10:00";
//$product->save();

//$product = new Product();
//$product->id = "1";
//$product->title = "Торшер";
//$product->created = "2019-10-10 15:10:00";
//$product->updated_at = "";
//$product->created_at="";
//$product->save();



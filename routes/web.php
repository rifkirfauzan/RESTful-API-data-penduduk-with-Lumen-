<?php


/** @var \Laravel\Lumen\Routing\Router $router */
use App\Http\Controllers\PendudukController;
use \Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//Login,Register & Middleware
$router->post("/register", "AuthController@register");
$router->post("/login", "AuthController@login");
$router->get("/user", "UserController@index");


//CRUD
$router->get('Penduduk/get', 'PendudukController@get');
$router->post('Penduduk/add', 'PendudukController@add');
$router->put('Penduduk/update/{id}', 'PendudukController@update');
$router->delete('Penduduk/delete/{id}', 'PendudukController@delete');




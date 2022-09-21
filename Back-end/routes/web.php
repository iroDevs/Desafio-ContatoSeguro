<?php
use App\Registro;
/** @var \Laravel\Lumen\Routing\Router $router */

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
    return \App\Models\Registro::all();
});

$router->group(['prefix' => 'registro'], function () use ($router) {
   /*
   Recurso: registro
   Endpoint: /registro
    */
   $router->get('/',"RegistroController@index");
    $router->get('/{typed}/{deleted}','RegistroController@index'); 
    

   
});




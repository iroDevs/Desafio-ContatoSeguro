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

   Rest Nomeclatura se apegar ao substantivo não ao verbo ou seja 
   o meteodo diz oque a rota faz não o nome da rota exemplo:
   post -> registro
   get -> registro
   put -> registro
   delete -> registro
    */
    $router->get('/',"RegistroController@index");
    $router->get('/{id}',"RegistroController@peguePeloIdRegistro");
    $router->get('/{typed}/{deleted}','RegistroController@index'); 
    $router->post('/','RegistroController@salvarRegistro');
    $router->delete('/{id}','RegistroController@deletarRegistro');
    $router->put('/{id}','RegistroController@updateRegistro');
    

});




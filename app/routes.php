<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	//return View::make('wsusu.index');
	//return DB::table('WS_USUARIO')->get();
	$x = new AppWsusu\Repositories\BaseRepo;
	$sql = 'TEST.USP_USUARIO_WEB_LISTAR (:P_REFCURSOR)';
	$params = array( 
		array('parametro'=>':P_REFCURSOR','tipo_parametro'=>\PDO::PARAM_STMT) 
	);
	$data = $x->getResultado($sql,$params);
	return $data;
});
Route::get('/listausuario', function()
{
	return View::make('wsusu.listausuario');
});


Route::get('/detalle', function()
{
	return View::make('wsusu.vuejs.detalle');
});

Route::get('usuarios', array('uses' => 'UsuarioController@index'));
Route::post('api/usuarios', array('uses' => 'UsuarioController@listar'));
Route::post('api/usuarios/add', array('uses' => 'UsuarioController@add'));
Route::post('api/usuarios/edit/{id}', array('uses' => 'UsuarioController@edit'));


Route::get('consumo', array('uses' => 'ConsultaController@index'));
Route::post('api/consumo', array('uses' => 'ConsultaController@listar'));
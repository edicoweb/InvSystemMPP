
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

Route::get('/', function () {
   return view('auth.login');
/*
    $funcionario = App\Funcionario::findOrFail(2);
    return $funcionario->servicio;
*/
});

Auth::routes();

Route::resource('home', 'HomeController');

Route::resource('sede', 'SedeController');

Route::resource('area', 'AreaController');

Route::resource('cargo', 'CargoController');

Route::resource('servicio', 'ServicioController');

Route::resource('tipo_equipo', 'Tipo_equipoController');

Route::resource('protocolo_internet', 'Protocolo_internetController');

Route::resource('funcionario', 'FuncionarioController');

Route::resource('equipo_computo', 'Equipo_computoController');

Route::resource('index', 'IndexController');
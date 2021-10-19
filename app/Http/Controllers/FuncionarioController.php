<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Funcionario;
use App\Area;
use App\Cargo;
use App\Servicio;

class FuncionarioController extends Controller
{
    public function index(Request $request)
    {

      $nombre = $request->get('nombre');

      $funcionarios = Funcionario::orderBy('id_funcionario')
      ->nombre($nombre)
      ->paginate(5);
      $servicios = Servicio::orderBy('id_servicio');
      return view("funcionario.funcionario", compact('funcionarios', 'servicios'));
    }

    public function create()
    {
      $areas = Area::select('nombre_area','id_area')->get();
      $cargos = Cargo::select('nombre_cargo', 'id_cargo')->get();
      return view("funcionario.createfuncionario")->with('areas', $areas)->with('cargos', $cargos);
    }

    public function store(Request $request)
    {
      $this->validate($request, [
      'codigo_plaza' => 'required',
      'nombre' => 'required',
      'apellido_paterno' => 'required',
      'apellido_materno' => 'required',
      'id_area' => 'required',
      'id_cargo' => 'required',
      'observacion' => 'required',
      ]);

      $codigo_plaza = $request['codigo_plaza'];
      $nombre = $request['nombre'];
      $apellido_paterno = $request['apellido_paterno'];
      $apellido_materno = $request['apellido_materno'];
      $id_area = $request['id_area'];
      $id_cargo = $request['id_cargo'];
      $observacion = $request['observacion'];

      $funcionario = new Funcionario();
      $funcionario->codigo_plaza = $codigo_plaza;
      $funcionario->nombre = $nombre;
      $funcionario->apellido_paterno = $apellido_paterno;
      $funcionario->apellido_materno = $apellido_materno;
      $funcionario->id_area = $id_area;
      $funcionario->id_cargo = $id_cargo;
      $funcionario->observacion = $observacion;
      $funcionario->save();
      return redirect('funcionario')->with('notice', 'El FUNCIONARIO ha sido creado correctamente.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $funcionarios = Funcionario::where('id_funcionario', $id)->get();
      $areas = Area::select('nombre_area','id_area')->get();
      $cargos = Cargo::select('nombre_cargo', 'id_cargo')->get();
      return view("funcionario.editfuncionario")->with('funcionarios', $funcionarios) ->with('areas', $areas)->with('cargos', $cargos);
    }

    public function update(Request $request, $id)
    {
      $funcionarios = Funcionario::where('id_funcionario', $id)->get();
      $areas = Area::select('nombre_area','id_area')->get();
      $cargos = Cargo::select('nombre_cargo', 'id_cargo')->get();
      $request->validate([
      'codigo_plaza' => 'required',
      'nombre' => 'required',
      'apellido_paterno' => 'required',
      'apellido_materno' => 'required',
      'id_area' => 'required',
      'id_cargo' => 'required',
      'observacion' => 'required',
      ]);

      $funcionarios-> each -> update($request->all());
      $funcionarios-> each -> save();
      return redirect('funcionario');
    }

    public function destroy($id)
    {
      $funcionarios = Funcionario::where('id_funcionario', $id)->get();
      $areas = Area::select('nombre_area','id_area')->get();
      $cargos = Cargo::select('nombre_cargo', 'id_cargo')->get();
      try{
        $funcionarios-> each -> delete();
      }
      catch (\Illuminate\Database\QueryException $e) {
        Session::flash('message', 'El registro no puede ser eliminado. Puede ser que se esté usando');
        return redirect('funcionario');
      }
        Session::flash('message', 'El registro fue eliminado correctamente');
        return redirect('funcionario');
    }
}
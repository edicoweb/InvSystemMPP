<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Equipo_computo;
use App\Protocolo_internet;
use App\Funcionario;
use App\Tipo_equipo;

class Equipo_computoController extends Controller
{

    public function index(Request $request)
    {
      $marca = $request->get('marca');
      $equipo_computos = Equipo_computo::orderBy('id')->with('tipo_equipo')
      ->marca($marca)
      ->paginate(10);
      return view("equipo_computo.equipo_computo", compact('equipo_computos'));
    }
    public function create()
    {
      $protocolo_internets = Protocolo_internet::select('ip', 'id_ip')->get();
      $funcionarios = Funcionario::select('nombre','apellido_paterno', 'apellido_materno', 'id_funcionario')->get();
      $tipo_equipos = Tipo_equipo::select('nombre_tipo_equipo', 'id_tipo_equipo')->get();
      return view("equipo_computo.createequipo_computo")->with('protocolo_internets', $protocolo_internets)->with('funcionarios', $funcionarios)->with('tipo_equipos', $tipo_equipos);
    }
    public function store(Request $request)
    {
      $this->validate($request, [
      'direccion_mac' => 'required',
      'marca' => 'required',
      'modelo' => 'required',
      'nombre_equipo' => 'required',
      'nombre_usuario_equipo' => 'required',
      'id_ip' => 'required',
      'id_funcionario' => 'required',
      'id_tipo_equipo' => 'required',
      'observacion' => 'required',
      ]);
      $direccion_mac = $request['direccion_mac'];
      $marca = $request['marca'];
      $modelo = $request['modelo'];
      $nombre_equipo = $request['nombre_equipo'];
      $nombre_usuario_equipo = $request['nombre_usuario_equipo'];
      $id_ip = $request['id_ip'];
      $id_funcionario = $request['id_funcionario'];
      $id_tipo_equipo = $request['id_tipo_equipo'];
      $observacion = $request['observacion'];

      $equipo_computo = new Equipo_computo();
      $equipo_computo->direccion_mac = $direccion_mac;
      $equipo_computo->marca = $marca;
      $equipo_computo->modelo = $modelo;
      $equipo_computo->nombre_equipo = $nombre_equipo;
      $equipo_computo->nombre_usuario_equipo = $nombre_usuario_equipo;
      $equipo_computo->id_ip = $id_ip;
      $equipo_computo->id_funcionario = $id_funcionario;
      $equipo_computo->id_tipo_equipo = $id_tipo_equipo;
      $equipo_computo->observacion = $observacion;
      $equipo_computo->save();
      return redirect('equipo_computo')->with('notice', 'El EQUIPO COMPUTO ha sido creado correctamente.');
    }
    public function show($id)
    {
      //show
    }

    public function edit($id)
    {
      $equipo_computos = Equipo_computo::where('id', $id)->get();
      $protocolo_internets = Protocolo_internet::select('ip', 'id_ip')->get();
      $funcionarios = Funcionario::select('nombre','apellido_paterno', 'apellido_materno', 'id_funcionario')->get();
      $tipo_equipos = Tipo_equipo::select('nombre_tipo_equipo', 'id_tipo_equipo')->get();
      return view("equipo_computo.editequipo_computo")->with('equipo_computos', $equipo_computos)->with('protocolo_internets', $protocolo_internets)->with('funcionarios', $funcionarios)->with('tipo_equipos', $tipo_equipos);
    }
    public function update(Request $request, $id)
    {
      $equipo_computos = Equipo_computo::where('id', $id)->get();
      $protocolo_internets = Protocolo_internet::select('ip', 'id_ip')->get();
      $funcionarios = Funcionario::select('nombre','apellido_paterno', 'apellido_materno', 'id_funcionario')->get();
      $tipo_equipos = Tipo_equipo::select('nombre_tipo_equipo', 'id_tipo_equipo')->get();
      $request->validate([
        'direccion_mac' => 'required',
        'marca' => 'required',
        'modelo' => 'required',
        'nombre_equipo' => 'required',
        'nombre_usuario_equipo' => 'required',
        'id_ip' => 'required',
        'id_funcionario' => 'required',
        'id_tipo_equipo' => 'required',
        'observacion' => 'required',
      ]);

      $equipo_computos-> each -> update($request->all());
      $equipo_computos-> each -> save();
      return redirect('equipo_computo');
    }
    public function destroy($id)
    {
      $equipo_computos = Equipo_computo::where('id', $id)->get();
      $protocolo_internets = Protocolo_internet::select('ip', 'id_ip')->get();
      $funcionarios = Funcionario::select('nombre','apellido_paterno', 'apellido_materno', 'id_funcionario')->get();
      $tipo_equipos = Tipo_equipo::select('nombre_tipo_equipo', 'id_tipo_equipo')->get();
      try{
        $equipo_computos-> each -> delete();
      }
      catch (\Illuminate\Database\QueryException $e) {
        Session::flash('message', 'El registro no puede ser eliminado, Puede ser que se esté usando');
        return redirect('equipo_computo');
      }
        Session::flash('message', 'El registro fue eliminado correctamente');
        return redirect('equipo_computo');
    }
}

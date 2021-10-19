<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Tipo_equipo;

class Tipo_equipoController extends Controller
{
    //
    public function index(Request $request)
    {
      $nombre_tipo_equipo = $request->get('nombre_tipo_equipo');
      $tipo_equipos = Tipo_equipo::orderBy('id_tipo_equipo')
      ->nombre_tipo_equipo($nombre_tipo_equipo)
      ->paginate(7);
      return view("tipo_equipo.tipo_equipo", $tipo_equipos) -> with('tipo_equipos',$tipo_equipos);
    }

    public function create()
    {
      return view("tipo_equipo.createtipo_equipo");
    }

    public function store(Request $request)
    {
      $this->validate($request, [
      'nombre_tipo_equipo' => 'required',
      ]);
      $nombre_tipo_equipo = $request['nombre_tipo_equipo'];
      $tipo_equipo = new Tipo_equipo();
      $tipo_equipo->nombre_tipo_equipo = $nombre_tipo_equipo;
      $tipo_equipo->save();
      return redirect('tipo_equipo')->with('notice', 'El TIPO EQUIPO ha sido creado correctamente.');
    }

    public function show($id)
    {
      //
    }

    public function edit($id)
    {
      $tipo_equipos=Tipo_equipo::where('id_tipo_equipo',$id)->get();
      return view('tipo_equipo.edittipo_equipo',compact('tipo_equipos'));
    }

    public function update(Request $request, $id)
    {
      $tipo_equipos = Tipo_equipo::where('id_tipo_equipo',$id)->get();
      $request->validate([
      'nombre_tipo_equipo' => 'required',
      ]);
      $tipo_equipos -> each -> update($request->all());
      $tipo_equipos -> each -> save();
      return redirect('tipo_equipo');
    }

    public function destroy($id)
    {
      $tipo_equipos = Tipo_equipo::where('id_tipo_equipo',$id)->get();
      try{
        $tipo_equipos -> each -> delete();
      }
      catch (\Illuminate\Database\QueryException $e) {
        Session::flash('message', 'El registro no puede ser eliminado. Puede ser que se esté usando');
        return redirect('tipo_equipo');
      }
        Session::flash('message', 'El registro fue eliminado correctamente');
        return redirect('tipo_equipo');
    }
}

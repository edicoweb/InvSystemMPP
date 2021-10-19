<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Area;
use App\Sede;

class AreaController extends Controller
{
    //
    public function index(Request $request)
    {
      $nombre_area = $request->get('nombre_area');
      $areas = Area::orderBy('id_area')->with('sede')
      ->nombre_area($nombre_area)
      ->paginate(7);
      return view("area.area", compact('areas'));
    }

    public function create()
    {
      $sedes = Sede::select('nombre_sede','id_sede')->get();
      return view("area.createarea") -> with('sedes', $sedes);
    }

    public function store(Request $request)
    {
      $this->validate($request, [
      'nombre_area' => 'required',
      'sigla_area' => 'required',
      'id_sede' => 'required',
      ]);

      $nombre_area = $request['nombre_area'];
      $sigla_area = $request['sigla_area'];
      $id_sede = $request['id_sede'];

      $area = new Area();
      $area->nombre_area = $nombre_area;
      $area->sigla_area = $sigla_area;
      $area->id_sede = $id_sede;
      $area->save();
      return redirect('area')->with('notice','El AREA ha sido creado correctamente.');
    }

    public function show($id)
    {
      //
    }

    public function edit($id)
    {
      $areas=Area::where('id_area',$id)->get();
      $sedes = Sede::select('nombre_sede','id_sede')->get();
      return view('area.editarea')->with('areas',$areas)->with('sedes',$sedes);
    }

    public function update(Request $request, $id)
    {
      $areas=Area::where('id_area',$id)->get();
      $sedes = Sede::select('nombre_sede','id_sede')->get();
      $request->validate([
        'nombre_area' => 'required',
        'sigla_area' => 'required',
        'id_sede' => 'required',
      ]);
      $areas-> each -> update($request->all());
      $areas-> each -> save();
      return redirect('area');
    }

    public function destroy($id)
    {
      $areas=Area::where('id_area',$id)->get();
      $sedes = Sede::select('nombre_sede','id_sede')->get();
      try {
      $areas-> each -> delete();
      }
      catch (\Illuminate\Database\QueryException $e) {
        Session::flash('message', 'El registro no puede ser eliminado, Puede ser que se esté usando');
        return redirect('area');
      }
        Session::flash('message', 'El registro fue eliminado correctamente');
        return redirect('area');
    }
}

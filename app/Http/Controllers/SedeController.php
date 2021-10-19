<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Sede;

class SedeController extends Controller
{
    public function index(Request $request)
    {
      $nombre_sede = $request->get('nombre_sede');

      $sedes = Sede::orderBy('id_sede')
      ->nombre_sede($nombre_sede)
      ->paginate(7);
      return view("sede.sede", $sedes) -> with('sedes',$sedes);
    }

    public function create()
    {
      return view("sede.createsede");
    }

    public function store(Request $request)
    {
      $this->validate($request, [
      'nombre_sede' => 'required',
      ]);

      $nombre_sede = $request['nombre_sede'];
      $sede = new Sede();
      $sede->nombre_sede = $nombre_sede;
      $sede->save();
      return redirect('sede')->with('notice', 'El SEDE ha sido creado correctamente.');
    }

    public function show($id)
    {
      //
    }

    public function edit($id)
    {
      $sedes=Sede::where('id_sede',$id)->get();
      return view('sede.editsede',compact('sedes'));
    }

    public function update(Request $request, $id)
    {
      $sedes=Sede::where('id_sede',$id)->get();
      $request->validate([
      'nombre_sede' => 'required',
      ]);
      $sedes-> each -> update($request->all());
      $sedes-> each -> save();
      return redirect('sede');
    }

    public function destroy($id)
    {
      $sedes=Sede::where('id_sede',$id)->get();
      try {
        $sedes-> each -> delete();
      } 
      catch (\Illuminate\Database\QueryException $e) {
      Session::flash('message', 'El registro no puede ser eliminado, Puede ser que se esté usando');
      return redirect('sede');
    }
      Session::flash('message', 'El registro fue eliminado correctamente');
      return redirect('sede');
    }
}

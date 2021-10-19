<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use\App\Cargo;

class CargoController extends Controller
{
    public function index(Request $request)
    {
      $nombre_cargo = $request->get('nombre_cargo');

      $cargos = Cargo::orderBy('id_cargo')
      ->nombre_cargo($nombre_cargo)
      ->paginate(7);
      return view("cargo.cargo", $cargos) -> with('cargos',$cargos);
    }

    public function create()
    {
      return view("cargo.createcargo");
    }

    public function store(Request $request)
    {
      $this->validate($request, [
      'nombre_cargo' => 'required',
      ]);

      $nombre_cargo = $request['nombre_cargo'];
      $cargo = new Cargo();
      $cargo->nombre_cargo = $nombre_cargo;
      $cargo->save();
      return redirect('cargo')->with('notice', 'El CARGO ha sido creado correctamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $cargos=Cargo::where('id_cargo',$id)->get();
      return view('cargo.editcargo',compact('cargos'));
    }

    public function update(Request $request, $id)
    {
      $cargos=Cargo::where('id_cargo',$id)->get();
      $request->validate([
          'nombre_cargo' => 'required',
      ]);
      $cargos-> each -> update($request->all());
      $cargos-> each -> save();
      return redirect('cargo');
    }

    public function destroy($id)
    {
      $cargos=Cargo::where('id_cargo',$id)->get();
      try {
      $cargos-> each -> delete();
      }
      catch (\Illuminate\Database\QueryException $e) {
        Session::flash('message', 'El registro no puede ser eliminado, Puede ser que se esté usando');
        return redirect('cargo');
      }
        Session::flash('message', 'El registro fue eliminado correctamente');
        return redirect('cargo');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Servicio;

class ServicioController extends Controller
{
    public function index(Request $request)
    {
      $nombre_servicio = $request->get('nombre_servicio');
      $servicios = Servicio::orderBy('id_servicio')
      ->nombre_servicio($nombre_servicio)
      ->paginate(7);
      return view("servicio.servicio", $servicios) -> with('servicios',$servicios);
    }

    public function create()
    {
      return view("servicio.createservicio");
    }

    public function store(Request $request)
    {
      $this->validate($request, [
      'nombre_servicio' => 'required',
      ]);

      $nombre_servicio = $request['nombre_servicio'];
      $servicio = new Servicio();
      $servicio->nombre_servicio = $nombre_servicio;
      $servicio->save();
      return redirect('servicio')->with('notice','El SERVICIO ha sido creado correctamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $servicios=Servicio::where('id_servicio',$id)->get();
      return view('servicio.editservicio',compact('servicios'));
    }

    public function update(Request $request, $id)
    {
      $servicios=Servicio::where('id_servicio',$id)->get();
      $request->validate([
      'nombre_servicio' => 'required',
      ]);
      $servicios-> each -> update($request->all());
      $servicios-> each -> save();
      return redirect('servicio');
    }

    public function destroy($id)
    {
      $servicios=Servicio::where('id_servicio',$id)->get();
      try{
        $servicios-> each -> delete();
      }
      catch (\Illuminate\Database\QueryException $e) {
        Session::flash('message', 'El registro no puede ser eliminado, Puede ser que se esté usando');
        return redirect('servicio');
      }
        Session::flash('message', 'El registro fue eliminado correctamente');
        return redirect('servicio');
    }
}

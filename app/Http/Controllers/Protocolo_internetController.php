<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Protocolo_internet;

class Protocolo_internetController extends Controller
{
    public function index(Request $request)
    {
      $ip = $request->get('ip');
      $protocolo_internets = Protocolo_internet::orderBy('id_ip')
      ->ip($ip)
      ->paginate(7);
      return view("protocolo_internet.protocolo_internet", $protocolo_internets) -> with('protocolo_internets',$protocolo_internets);
    }
    public function create()
    {
      return view("protocolo_internet.createprotocolo_internet");
    }
    public function store(Request $request)
    {
      $this->validate($request, [
      'ip' => 'required',
      'puerta_enlace' => 'required',
      'observacion' => 'required',
      ]);
      $ip = $request['ip'];
      $puerta_enalce = $request['puerta_enlace'];
      $observacion = $request['observacion'];
      $protocolo_internet = new Protocolo_internet();
      $protocolo_internet->ip = $ip;
      $protocolo_internet->puerta_enlace = $puerta_enalce;
      $protocolo_internet->observacion = $observacion;
      $protocolo_internet->save();
      return redirect('protocolo_internet')->with('notice', 'El PROTOCOLO DE INTERNET ha sido creado correctamente.');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
      $protocolo_internets=Protocolo_internet::where('id_ip',$id)->get();
      return view('protocolo_internet.editprotocolointernet', compact('protocolo_internets'));
    }
    public function update(Request $request, $id)
    {
      $protocolo_internets=Protocolo_internet::where('id_ip', $id)->get();
      $request->validate([
        'ip' => 'required',
        'puerta_enlace' => 'required',
        'observacion' => 'required',
      ]);
      $protocolo_internets -> each -> update($request->all());
      $protocolo_internets -> each -> save();
      return redirect('protocolo_internet');
    }
    public function destroy($id)
    {
      $protocolo_internets=Protocolo_internet::where('id_ip',$id)->get();
      try{
        $protocolo_internets->each->delete();
      }
      catch (\Illuminate\Database\QueryException $e) {
        Session::flash('message', 'El registro no puede ser eliminado, Puede ser que se esté usando');
        return redirect('protocolo_internet');
      }
        Session::flash('message', 'El registro fue eliminado correctamente');
        return redirect('protocolo_internet');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo_computo;
use App\Protocolo_internet;
use App\Funcionario;
use App\Tipo_equipo;
use App\Area;
use App\Cargo;
use App\Servicio;
use App\Sede;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $id = $request->get('id');
        $equipo_computos = Equipo_computo::orderBy('id')
        ->id($id)
        ->paginate(5);
        $funcionarios = Funcionario::with('servicio')->orderBy('id_funcionario')->get();
        return view('home', compact('equipo_computos','funcionarios'));
    }

    public function show($id)
    {
        $equipo_computos = Equipo_computo::find($id);
        return view("home.showhome", compact('equipo_computos'));
    }
}

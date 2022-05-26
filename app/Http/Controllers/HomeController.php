<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Tablon;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * If it fails, show the view error.
     * We create the dashboard counters for the dashboard view.
     * @param  $request, $user
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request, User $user)
    {

        try{


        //counters administrador
        $users=User::count();
        $incidenciasCurso=Ticket::where('status', 'en curso')->count();
        $incidenciasAbiertas=Ticket::where('status', 'abierta')->count();
        $incidenciasCerradas=Ticket::where('status', 'cerrada')->count();

         //counters operario

         $operarioCurso= Ticket::where('tipe', '=', $request->user()->tipe)
         ->where('status','=','en curso')->count();
         $operarioAbiertas= Ticket::where('tipe', '=', $request->user()->tipe)
         ->where('status', 'abierta')->count();
         $operarioCerradas= Ticket::where('tipe', '=', $request->user()->tipe)
         ->where('status', 'cerrada')->count();


        //counters usuario

       $anuncioUsuario=Tablon::where('idUser', '=', $request->user()->id)->count();

        $usuarioCurso=Ticket::where('idUser', '=', $request->user()->id)
       ->where('status','=','en curso')->count();
       $usuarioAbiertas=Ticket::where('idUser', '=', $request->user()->id)
       ->where('status', 'abierta')->count();
       $usuarioCerradas=Ticket::where('idUser', '=', $request->user()->id)
       ->where('status', 'cerrada')->count();


        return view('home', compact('users', 'incidenciasCerradas', 'incidenciasAbiertas', 'incidenciasCurso', 'operarioCurso', 'operarioAbiertas', 'operarioCerradas' ,'anuncioUsuario' ,'usuarioCurso', 'usuarioAbiertas', 'usuarioCerradas'));






        }
        catch(\Exception $e){
            return view('error');
        }


    }
}

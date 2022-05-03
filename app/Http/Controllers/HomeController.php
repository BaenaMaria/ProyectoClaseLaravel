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
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, User $user)
    {
        //counters administrador
        $users = DB::table('users')->count();
        $incidenciasCurso= DB::table('ticket')->where('status', 'en curso')->count();
        $incidenciasAbiertas= DB::table('ticket')->where('status', 'abierta')->count();
        $incidenciasCerradas= DB::table('ticket')->where('status', 'cerrada')->count();

         //counters operario

         $operarioCurso= Ticket::where('tipe', '=', $request->user()->tipe)
         ->where('status','=','en curso')->count();
         $operarioAbiertas= Ticket::where('tipe', '=', $request->user()->tipe)
         ->where('status', 'abierta')->count();
         $operarioCerradas= Ticket::where('tipe', '=', $request->user()->tipe)
         ->where('status', 'cerrada')->count();


        //counters usuario

       $anuncioUsuario=tablon::where('idUser', '=', $request->user()->id)->count();




        return view('home', compact('users', 'incidenciasCerradas', 'incidenciasAbiertas', 'incidenciasCurso', 'operarioCurso', 'operarioAbiertas', 'operarioCerradas' ,'anuncioUsuario'));
    }
}

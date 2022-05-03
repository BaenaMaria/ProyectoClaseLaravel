<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Ticket;

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


         $operarioCurso= Ticket::where('tipe', '=', $request->user()->tipe)->count();
               $operarioAbiertas= DB::table('ticket')->where('status', 'abierta')->count();
               $operarioCerradas= DB::table('ticket')->where('status', 'cerrada')->count();







        return view('home', compact('users', 'incidenciasCerradas', 'incidenciasAbiertas', 'incidenciasCurso', 'operarioCurso', 'operarioAbiertas', 'operarioCerradas'));
    }
}

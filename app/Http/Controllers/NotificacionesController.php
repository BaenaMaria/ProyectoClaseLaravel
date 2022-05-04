<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificaciones;
use Illuminate\Support\Facades\Validator;

class NotificacionesController extends Controller
{
    protected $table = "notification";

    public function index(Request $request, Notificaciones $notificacion)
    {
        try{




            $notificaciones = Notificaciones::orderBy('id', 'desc')->paginate(1000);
            return view('notificaciones.index', compact('notificaciones'));





        }
        catch(\Exception $e){
            return view('error');
        }

    }
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'idUser' => ['integer'],
            'notification' => ['required', 'string'],
            'date' => ['required', 'string'],
            'title' => ['required', 'string', 'max:50'],


        ]);
    }

    public function create(array $data)
    {


        return Notificaciones::create([



            'notification' => $data['notification'],
            'date' =>  $data['date'],
            'idUser' => $data['iduser'],
            'title' => $data['title'],

        ]);

    }
    public function store(Request $request)
    {

        try{


            $notificacion = Notificaciones::create($request->all());
            $notificacion->save();
            $notificaciones = Notificaciones::orderBy('id', 'desc')->paginate();
            return view('notificaciones.index', compact('notificaciones'));
        }
        catch(\Exception $e){
            return view('error');
        }

    }
    public function register(){
        return view('notificaciones.register');
    }
    public function edit(Request $request)
    {
        try{

            $notificacion = Notificaciones::findOrFail($request->id);
            return view('notificaciones.edit', compact('notificacion'));

        }
        catch(\Exception $e){
            return view('error');
        }

    }
    public function update(Request $request)
    {
        try{

            $notificacion = Notificaciones::findOrFail($request->id);
            $notificacion->notification = $request->notification;
            $notificacion->title = $request->title;
            $notificacion->date = $request->date;
            $notificacion->save();
            $notificaciones = Notificaciones::orderBy('id', 'desc')->paginate(1000);
            return view('notificaciones.index', compact('notificaciones'));

        }
        catch(\Exception $e){
            return view('error');
        }

    }

    public function destroy(Request $request)
    {
        try{

            $notificacion = Notificaciones::destroy($request->id);
            $notificaciones = Notificaciones::orderBy('id', 'desc')->paginate(1000);
            return view('notificaciones.index', compact('notificaciones'));


        }
        catch(\Exception $e){
            return view('error');
        }

    }
}


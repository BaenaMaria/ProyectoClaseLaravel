<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificaciones;
use Illuminate\Support\Facades\Validator;

class NotificacionesController extends Controller
{
    protected $table = "notification";

     /*
    |--------------------------------------------------------------------------
    |Notificaciones Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new notificacion as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    /**
     * Show the application listaUsuarios.
     * If it fails, show the view error.
     * @param  $request, $notificaction
     * @return \Illuminate\Contracts\Support\Renderable
     */


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
   /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'idUser' => ['integer'],
            'notification' => ['required', 'string'],
            'date' => ['required', 'string'],
            'title' => ['required', 'string', 'max:50'],


        ]);
    }
     /**
     * Create a new notification instance.
     * @param  array  $data
     * @return \App\Models\Notificaciones
     */

    public function create(array $data)
    {


        return Notificaciones::create([



            'notification' => $data['notification'],
            'date' =>  $data['date'],
            'idUser' => $data['iduser'],
            'title' => $data['title'],

        ]);

    }
    /**
     * Save the different data of the form view in the notification object.
     * If it fails, show the view error.
     * @param  array  $request.
     * @return \App\Models\Notificaciones
     */



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
       /**
     * Save the different data of the form view in the notification object.
     * Open register view.
     */

    public function register(){
        return view('notificaciones.register');
    }

  /**
     * Open edit view.
     * If it fails, show the view error.
     * @param  array  $request.
     * @return \App\Models\Notificaciones
     */



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
     /**
     * Allows to update the object notificacion.
     * If it fails, show the view error.
     * @param  array  $request.
     * @return \App\Models\Notificaciones
     */

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
/**
* Allows to delete the object notificacion.
* If it fails, show the view error.
* @param  array  $request.
* @return \App\Models\Notificaciones
*/

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


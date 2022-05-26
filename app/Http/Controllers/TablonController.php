<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tablon;
use Illuminate\Support\Facades\Validator;


class TablonController extends Controller
/*
    |--------------------------------------------------------------------------
    |Notificaciones Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new tablon as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
{
    protected $table = 'tablon';


    /**
     * Show the application listaTablones.
     * If it fails, show the view error.
     * @param  $request, $notificaction
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        try{

            $title = $request->get('buscarpor');

            $tablones = Tablon::where('title','like',"%$title%")->paginate(1000);

            return view('tablones.index', compact('tablones'));


            $tablones = Tablon::orderBy('id', 'desc')->paginate(1000);
            return view('tablones.index', compact('tablones'));

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
            'anuncio' => ['required', 'string', 'max:100'],
            'title' => ['required','in:venta,alquiler, aviso, obras, ayuda, otros'],
            'idUser' => ['required'],


        ]);
    }
     /**
     * Create a new notification instance.
     * @param  array  $data
     * @return \App\Models\Tablon
     */

    public function create(array $data)
    {

        return Tablon::create([
            'anuncio' => $data['anuncio'],
            'title' => $data['title'],
            'idUser' => $data['idUser'],

        ]);
    }
    /**
     * Save the different data of the form view in the notification object.
     * If it fails, show the view error.
     * @param  array  $request.
     * @return \App\Models\Tablon
     */



    public function store(Request $request)
    {

        try{

            $tablon = Tablon::create($request->all());
            $tablon->save();
            $tablones = Tablon::orderBy('id', 'desc')->paginate();
            return view('tablones.index', compact('tablones'));

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
        return view('tablones.register');
    }

  /**
     * Open edit view.
     * Not used.
     * If it fails, show the view error.
     * @param  array  $request.
     * @return \App\Models\Tablon
     */


    public function edit(Request $request)
    {
        $tablon = Tablon::findOrFail($request->id);
        return view('tablones.edit', compact('tablon'));
    }
     /**
     * Allows to update the object notificacion.
     * If it fails, show the view error.
     * Not used.
     * @param  array  $request.
     * @return \App\Models\Notificaciones
     */
    public function update(Request $request)
    {
        try{

            $tablon = Tablon::findOrFail($request->id);
            $tablon->anuncio = $request->anuncio;
            $tablon->title = $request->title;
            $tablon->idUser = $request->idUser;

            $tablon->save();

            $tablones = Tablon::orderBy('id', 'desc')->paginate(1000);
            return view('tablones.index', compact('tablones'));

        }
        catch(\Exception $e){
            return view('error');
        }

    }
    /**
* Allows to delete the object notificacion.
* If it fails, show the view error.
* @param  array  $request.
* @return \App\Models\Tablon
*/

    public function destroy(Request $request)
    {
        try{

            $tablon = Tablon::destroy($request->id);
            $tablones = Tablon::orderBy('id', 'desc')->paginate(1000);
            return view('tablones.index', compact('tablones'));

        }
        catch(\Exception $e){
            return view('error');
        }

    }

}

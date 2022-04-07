<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class OperarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operarios = Operario::orderBy('id', 'desc')->paginate();
        return view('operarios.index', compact('operarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'integer', 'min:9'],
            'tipe' => ['required','in:fontaneria,electricidad, limpieza, pintura, ascensores, cristal, albañil, conserje'],

        ]);
    }

    public function create(array $data)
    {
        return Operario::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'tipe' => $data['tipe'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $operario = Operario::create($request->all());
        $operario->save();
        $operarios = Operario::orderBy('id', 'desc')->paginate();
        return view('operarios.index', compact('operarios'));
    }
    public function register(){
        return view('operarios.register');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $operario = Operario::findOrFail($request->id);
        return view('operarios.edit', compact('operario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $operario = Operario::findOrFail($request->id);
        $operario->name = $request->name;
        $operario->phone = $request->phone;
        $operario->email = $request->email;
        $operario->password = $request->password;
        $operario->tipe = $request->tipee;

        $operario->save();

        $operarios = Operario::orderBy('id', 'desc')->paginate();
        return view('operarios.index', compact('operarios'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $operario = Operario::destroy($request->id);
        $operarios = Operario::orderBy('id', 'desc')->paginate();
        return view('operarios.index', compact('operarios'));
    }
}

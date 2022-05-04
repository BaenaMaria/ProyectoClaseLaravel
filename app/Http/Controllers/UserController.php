<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{

            $name = $request->get('buscarpor');

            $usuarios = User::where('name','like',"%$name%")->paginate(1000);
            return view('usuarios.index', compact('usuarios'));



            $usuarios = User::orderBy('id', 'desc')->paginate(1000);
            return view('usuarios.index', compact('usuarios'));

        }
        catch(\Exception $e){
            return view('error');
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $usuario = User::findOrFail($request->id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{

            $usuario = User::findOrFail($request->id);
        $usuario->name = $request->name;
        $usuario->phone = $request->phone;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->role = $request->role;
        $usuario->tipe = $request->tipe;
        $usuario->adress = $request->adress;

        $usuario->save();

        $usuarios = User::orderBy('id', 'desc')->paginate(1000);
        return view('usuarios.index', compact('usuarios'));

        }
        catch(\Exception $e){
            return view('error');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{

        $usuario = User::destroy($request->id);
        $usuarios = User::orderBy('id', 'desc')->paginate(1000);
        return view('usuarios.index', compact('usuarios'));


        }
        catch(\Exception $e){
            return view('error');
        }

    }
}

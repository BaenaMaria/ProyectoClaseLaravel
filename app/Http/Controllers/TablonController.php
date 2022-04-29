<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tablon;
use Illuminate\Support\Facades\Validator;


class TablonController extends Controller
{
    protected $table = 'tablon';

    public function index(Request $request)
    {

        $title = $request->get('buscarpor');

        $tablones = Tablon::where('title','like',"%$title%")->paginate(5);

        return view('tablones.index', compact('tablones'));


        $tablones = Tablon::orderBy('id', 'desc')->paginate();
        return view('tablones.index', compact('tablones'));
    }
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'anuncio' => ['required', 'string', 'max:100'],
            'title' => ['required','in:venta,alquiler, aviso, obras, ayuda, otros'],
            'userId' => [],


        ]);
    }

    public function create(array $data)
    {

        return Tablon::create([
            'anuncio' => $data['anuncio'],
            'title' => $data['title'],
            'idUser' => $data['userId'],

        ]);
    }
    public function store(Request $request)
    {
        $tablon = Tablon::create($request->all());
        $tablon->save();
        $tablones = Tablon::orderBy('id', 'desc')->paginate();
        return view('tablones.index', compact('tablones'));
    }
    public function register(){
        return view('tablones.register');
    }
    public function edit(Request $request)
    {
        $tablon = Tablon::findOrFail($request->id);
        return view('tablones.edit', compact('tablon'));
    }
    public function update(Request $request)
    {
        $tablon = Tablon::findOrFail($request->id);
        $tablon->anuncio = $request->anuncio;

        $tablon->save();

        $tablones = Tablon::orderBy('id', 'desc')->paginate();
        return view('tablones.index', compact('tablones'));
    }

    public function destroy(Request $request)
    {
        $tablon = Tablon::destroy($request->id);
        $tablones = Tablon::orderBy('id', 'desc')->paginate();
        return view('tablones.index', compact('tablones'));
    }

}

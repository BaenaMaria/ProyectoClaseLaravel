<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Mail\CerradaIncidencia;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        try{

            // $name = $request->get('buscarpor');
            // $tikets = Ticket::where('tipe','like',"%$name%")->paginate(1000);

            $tickets = Ticket::orderBy('id', 'desc')->paginate(1000);
            return view('tickets.index', compact('tickets'));


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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'idUser' => ['required', 'integer'],
            'tipe' => ['required', 'in:fontaneria,electricidad, limpieza, pintura, ascensores, cristal, albañil, conserje'],
            'description' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:abierta, asignada, en curso, esperando respuesta, cerrada resuelta, cerrada sin resolver'],
            'dateIni' => ['required'],
            'dateEnd',
            'bill' => ['string'],
            'firma' => ['string'],
            'photo' => ['string, image, mimes:jpg,jpeg,bmp,png'],


        ]);


    }
       /**
     * Create a new notification instance.
     * @param  array  $data
     * @return \App\Models\Ticket
     */


    public function create(array $data)
    {
        return ticket::create([
            'idUser' => $data['idUser'],
            'tipe' => $data['tipe'],
            'description' => $data['description'],
            'status' => $data['status'],
            'dateIni' => $data['dateIni'],
            'dateEnd'=>$data['dateEnd'],
            'bill' => $data['bill'],
            'photo' => $data['photo'],
            'firma' => $data['firma'],
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

        try{


            $ticket=$request->all();


            if ($photo=$request->file('photo')) {
                $rutaGuardarImg='imagen/';  //ruta donde guardar la imagen
                $imagenIncidencia = date('YmdH').".".'png';  //nombre de la imagen
                $photo->move($rutaGuardarImg,$imagenIncidencia );
                $ticket['photo']=(string)$rutaGuardarImg.$imagenIncidencia;



            }
            else {

                $rutaGuardarImg='imagen/';  //ruta donde guardar la imagen
                $ticket['photo']=(string)$rutaGuardarImg."incidencia.png";
            }

            $ticket = Ticket::create($ticket);
            $ticket->save();
            $tickets = Ticket::orderBy('id', 'desc')->paginate(1000);
            return view('tickets.index', compact('tickets'));






        }
        catch(\Exception $e){
            return view('error');
        }




    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $ticket = Ticket::findOrFail($request->id);
        return view('tickets.edit', compact('ticket'));

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

        try{
            $ticket=$request->all();

            $ticket = Ticket::findOrFail($request->id);
            $ticket->idUser = $request->idUser;
            $ticket->tipe = $request->tipe;
            $ticket->description = $request->description;
            $ticket->status = $request->status;
            $ticket->dateIni = $request->dateIni;
            $ticket->dateEnd = $request->dateEnd;
            $ticket->bill = $request->bill;


         if($ticket->status=='cerrada'||$ticket->status=='Cerrada' ){
                 $email= DB::table('users')->select('email')->where('role', '=', 'administrador')->get();
                 $email3= DB::table('users')->select('email')
                 ->leftjoin("ticket", "users.id", "=", "ticket.idUser")
                 ->where('users.id', '=', $ticket->idUser)->get();


                  Mail::to($email)->send(new CerradaIncidencia($ticket));
                 Mail::to($email3)->send(new CerradaIncidencia($ticket));
            }
             else{

             }



            if (isset($_POST['actualizar'])) {


                if ($bill=$request->file('bill')) {
                    $bill      =   $request->file('bill');
                    $nombreimagen   =   Str::slug("nombre").time().'.'.$bill->getClientOriginalExtension();
                    $nuevaruta      =   public_path('/bill/'.$nombreimagen);
                    copy($bill->getRealPath(),$nuevaruta);
                    $ticket['bill']='/imagen/'.$nombreimagen;
                }
            }

            $ticket->save();




            $tickets = Ticket::orderBy('id', 'desc')->paginate();
            return view('tickets.index', compact('tickets'));


        }
        catch(\Exception $e){
            return view('error');
        }







    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        try{

            $ticket = Ticket::destroy($request->id);


            $foto=(string)$ticket=$request->file('photo');

            Storage::delete('/'.$foto);


        }
        catch(\Exception $e){
            return view('error');
        }






        $tickets = Ticket::orderBy('id', 'desc')->paginate(1000);
        return view('tickets.index', compact('tickets'));


    }
    public function register(){
        return view('tickets.register');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Mail\NuevaIncidencia;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class Ticket extends Model
{
    use HasFactory;
    protected $table = "ticket";

/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idUser',
        'idOperario',
        'tipe',
        'description',
        'status',
        'dateIni',
        'dateEnd',
        'bill',
        'photo',
        'firma',

    ];

     /**
     *Create an email instance when creating a new user
     *
     *
     */

    public static function boot(){

        parent::boot();

         static::created(function($ticket){



             $email= DB::table('users')->select('email')->where('role', '=', 'administrador')->get();
             $email3= DB::table('users')->select('email')->where('tipe', '=', $ticket->tipe)->get();

             Mail::to($email)->send(new NuevaIncidencia($ticket));
             Mail::to($email3)->send(new NuevaIncidencia($ticket));
         });

    }


}

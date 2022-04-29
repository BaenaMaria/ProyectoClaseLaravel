<?php

namespace App\Models;

use App\Mail\NuevoUsuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'tipe',
        'adress'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Evento se ejecuta cuando un usuario es creado

    public static function boot(){

        parent::boot();

        // static::created(function($user){

        //     $email= DB::table('users')->select('email')->where('role', '=', 'administrador')->get();
        //     $email2= DB::table('users')->select('email')->where('id', '=', $user->id)->get();

        //     Mail::to($email)->send(new NuevoUsuario($user));
        //     Mail::to($email2)->send(new NuevoUsuario($user));
        // });

    }


}

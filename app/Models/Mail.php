<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Mail\NuevoUsuario;

class Mail extends Model
{
    use HasFactory;

    protected static function boot(){

        parent::boot();

        static::created(function($user){

            Mail::to('info@diarioprogramador.com')->send(new NuevoUsuario($user));

        });

    }
}

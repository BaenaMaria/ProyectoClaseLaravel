<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Mail\NuevoUsuario;

class Mail extends Model
{
    use HasFactory;
    /**
     *Create an email instance when creating a new user
     *
     * @var array<int, string>
     */

    protected static function boot(){

        parent::boot();

        static::created(function($user){

            Mail::to('info@gescomver.com')->send(new NuevoUsuario($user));

        });

    }
}

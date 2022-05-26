<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tablon extends Model
{
    use HasFactory;

    protected $table = "tablon";
/**
     * The attributes that are mass assignable.
     *
     *
     */
    protected $fillable = [
        'anuncio',
        'title',
        'idUser',


    ];
}

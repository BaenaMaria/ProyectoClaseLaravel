<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tablon extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "tablon";

    protected $fillable = [
        'anuncio',
        'title',
        'idUser',


    ];
}
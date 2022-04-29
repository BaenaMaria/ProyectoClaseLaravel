<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
    use HasFactory;

    protected $table = "notification";

    protected $fillable = [
        'idUser',
        'notification',
        'date',
        'title',



    ];

    protected $casts = [
        'date' => 'datetime:dd-mm-YYYY   hh-mm',
    ];
}

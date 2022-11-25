<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partidos extends Model
{
    use HasFactory;
    protected $table= 'partidos';
    protected $fillable= [
        'equipo1',
        'equipo2',
        'hora',
        'fecha',
        ];
}

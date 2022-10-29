<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juez extends Model
{
    use HasFactory;
    protected $table= 'juez';
    protected $fillable= [
        'nameJuez',
        'apellidoJuez',
        'ci',
        'fechaNac',
        'genero',
        'foto',

    ];
}

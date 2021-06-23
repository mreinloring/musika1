<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $fillable=['nombre','tipo'];

    //Relacion muchos a muchos
    public function profesores()
    {
        return $this->belongsToMany('App\Models\Profesore')->withPivot('nombre', 'apellido1','apellido2');
    }
    //Relacion muchos a muchos
    public function alumnos()
    {
        return $this->belongsToMany('App\Models\Alumno')->withPivot('nombre', 'apellido1', 'apellido2');
    }
}

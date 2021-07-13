<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    protected $fillable=['anoCurso','nivel','curso','asignatura_id','alumno_id','profesore_id','refuerzo',
                            'instrumento2','principal','libre','fechaBaja','causaBaja',
                            'eva1','obs1','eva2','obs2','eva3','obs3','notaFinal','obsNotaFinal'];

    //Relacion uno a muchos inversa
    public function alumno()
    {
        return $this->belongsTo('App\Models\Alumno');
    }
    //Relacion uno a muchos inversa
    public function profesore()
    {
        return $this->belongsTo('App\Models\Profesore');
    }
    //Relacion uno a muchos inversa
    public function asignatura()
    {
        return $this->belongsTo('App\Models\Asignatura');
    }

}

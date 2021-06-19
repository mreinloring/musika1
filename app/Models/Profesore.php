<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Profesore extends Model
{
    use HasFactory;
    protected $fillable=['nombre', 'apellido1', 'apellido2', 'email', 'telefono',
                            'dni', 'numSS', 'fechaNto', 'fechaAlta', 'fechaBaja', 'image', 'iban',
                            'calle', 'numero', 'piso', 'codigoPostal', 'poblacion', 'provincia'];

    //Para calcular la edad
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes["fechaNto"])->age;
    }

    //Relacion muchos a muchos
    public function asignaturas()
    {
        return $this->belongsToMany('App\Models\Asignatura');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;


class Alumno extends Model
{
    use HasFactory;


    protected $fillable = [
        'nombre', 'apellido1', 'apellido2', 'email','email2', 'telefono','telefono2',
        'fechaNto', 'fechaAlta', 'fechaBaja', 'image','nombrePadres', 'iban','dni',
        'unidadFamiliar', 'familiaNumerosa','fechaFamNum','noAutorizoFoto','gazteTxartela15','incidencias','centroTarine',
         'calle', 'numero', 'piso', 'codigoPostal', 'poblacion', 'provincia','profesore_id'
    ];

    //Para calcular la edad
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes["fechaNto"])->age;
    }

    //Relacion muchos a muchos
    public function asignaturas()
    {
        return $this->belongsToMany('App\Models\Asignatura')->withPivot('nombre', 'tipo');
    }
    //Relacion uno a muchos
    public function expedientes()
    {
        return $this->hasMany('App\Models\Expediente');
    }

}

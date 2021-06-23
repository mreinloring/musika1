<?php

namespace App\Http\Livewire\Alumnos;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;



use App\Models\Alumno;

class ShowAlumnos extends Component
{


    //Propiedades del buscador y orden
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';
    public $readyToLoad = false;
    public $disabled = true;
    public $filtered;


    protected $rules = [
        'alumno.nombre' => 'required|max:50',
        'alumno.apellido1' => 'required|max:50',
        'alumno.apellido2' => 'required|max:50',
        'alumno.email' => 'required|max:50',
        'alumno.email2' => 'required|max:50',
        'alumno.telefono' => 'required|max:50',
        'alumno.telefono2' => 'required|max:50',
        'alumno.fechaNto' => 'required',
        'alumno.fechaAlta' => 'required',
        'alumno.fechaBaja' => '',
        'alumno.nombrePadres' => 'required|max:50',
        'alumno.sexo' => 'required|max:1',
        'alumno.iban' => 'required|max:28',
        'alumno.dni' => 'required|max:9',
        'alumno.unidadFamiliar' => '',
        'alumno.familiaNumerosa' => '',
        'alumno.fechaFamNum' => '',
        'alumno.noAutorizoFoto' => '',
        'alumno.GazteTxartela15' => '',
        'alumno.incidencias' => '',
        'alumno.centroTarine' => 'required',
    ];
    public function render()
    {
        //$alumnos=Alumno::whereNull('fechaBaja')->get();


         $alumnos=Alumno::whereNull('fechaBaja')
                        ->where('id', 'like', '%' . $this->search . '%')
                        ->where('nombre', 'like', '%' . $this->search . '%')
                        ->where('apellido1', 'like', '%' . $this->search . '%')
                        ->where('apellido2', 'like', '%' . $this->search . '%')
                        ->where('email', 'like', '%' . $this->search . '%')
                        ->where('telefono', 'like', '%' . $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->get();


        return view('livewire.alumnos.show-alumnos', compact('alumnos'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}
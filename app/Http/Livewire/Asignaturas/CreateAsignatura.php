<?php

namespace App\Http\Livewire\Asignaturas;

use Livewire\Component;
use App\Models\Asignatura;

class CreateAsignatura extends Component
{
    public $open = false; //para que el modal este cerrado al ingresar en la pagina

    public $nombre, $tipo;

    protected $rules = [
        'nombre' => 'required|max:50',
        'tipo' => 'required|max:1',
    ];


    public function save()
    {
        $this->validate();

        Asignatura::create([
            'nombre' => $this->nombre,
            'tipo' => $this->tipo,
        ]);
        $this->reset([
            'open', 'nombre', 'tipo'
        ]);

        //Esto es para que vuelva a cargarse la pagina de asignaturas unicamente, no todas
        $this->emitTo('asignaturas.show-asignaturas', 'render');
        $this->emit('alert', 'La asignatura se ha creado satisfactoriamente');
    }


    public function render()
    {
        return view('livewire.asignaturas.create-asignatura');
    }
}

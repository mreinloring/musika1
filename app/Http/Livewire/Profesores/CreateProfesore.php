<?php

namespace App\Http\Livewire\Profesores;

use Livewire\Component;
use App\Models\Profesore;

class CreateProfesore extends Component
{
    public $open = false; //para que el modal este cerrado al ingresar en la pagina

    //Declaramos las propiedades del profesor o campos de la tabla
    public $profesore_id, $nombre, $apellido1, $apellido2, $email, $telefono, $dni, $numSS, $fechaNto, $fechaAlta, $fechaBaja ,
           $image,$iban,$calle,$numero,$piso,$codigoPostal,$poblacion,$provincia;
    protected $rules = [
        'nombre' => 'required|max:50',
        'apellido1' => 'required|max:50',
        'apellido2' => 'required|max:50',
        'email' => 'required|max:50',
        'telefono' => 'required|max:50',
        'dni' => 'required|max:9',
        'numSS' => 'required|max:50',
        'fechaNto' => 'required',
        'fechaAlta' => 'required',
        'fechaBaja' => '',
    ];
    //Funcion para los mensajes y reglas de validacion
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate();

        Profesore::create([
            'nombre' => $this->nombre,
            'apellido1'=> $this->apellido1,
            'apellido2' => $this->apellido2,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'dni' => $this->dni,
            'numSS' => $this->numSS,
            'fechaNto' => $this->fechaNto,
            'fechaAlta' => $this->fechaAlta,
            'fechaBaja' => $this->fechaBaja,
            'image' => $this->image,
            'iban' => $this->iban,
            'calle' => $this->calle,
            'numero' => $this->numero,
            'piso' => $this->piso,
            'codigoPostal' => $this->codigoPostal,
            'poblacion' => $this->poblacion,
            'provincia' => $this->provincia,
        ]);
        $this->reset(['open', 'nombre', 'apellido1', 'apellido2', 'email', 'telefono',
            'dni', 'numSS', 'fechaNto', 'fechaAlta', 'fechaBaja', 'image', 'iban',
            'calle', 'numero', 'piso', 'codigoPostal', 'poblacion', 'provincia'    ]);
        //Esto es para que vuelva a cargarse la pagina de profesores unicamente, no todas
        $this->emitTo('show-profesores','render');
        $this->emit('alert', 'El profesor se ha dado de alta satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.profesores.create-profesore');
    }
}

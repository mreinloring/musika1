<?php

namespace App\Http\Livewire\Profesores;

use Livewire\Component;
use App\Models\Profesore;

class CreateProfesore extends Component
{
    public $open = false;

    //Declaramos las propiedades del profesor o campos de la tabla
    public $profesore_id, $nombre, $apellido1, $apellido2, $email, $telefono, $dni, $numSS, $fechaNto, $fechaAlta, $fechaBaja ,
           $image,$iban,$calle,$numero,$piso,$codigoPostal,$poblacion,$provincia;


    public function save(){
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

;        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.profesores.create-profesore');
    }
}

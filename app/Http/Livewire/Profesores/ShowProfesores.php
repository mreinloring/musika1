<?php

namespace App\Http\Livewire\Profesores;

use Livewire\Component;
use App\Models\Profesore;
use Carbon\Carbon;

class ShowProfesores extends Component
{

    public $profesore, $fechaNto,$age;

    public $search;

    public function render()
    {
        $profesores= Profesore::where ('fechaBaja','=','0000-00-00')
                                ->where('nombre', 'like','%'.$this->search.'%')
                                ->orWhere('apellido1', 'like', '%' . $this->search . '%')
                                ->orWhere('apellido2', 'like', '%' . $this->search . '%')
                                ->orWhere('email', 'like', '%' . $this->search . '%')
                                ->orWhere('telefono', 'like', '%' . $this->search . '%')
                                ->get();

        return view('livewire.profesores.show-profesores',compact('profesores'));


    }

    public function getAge()
    {
        return Carbon::parse($this->attributes['fechaNto'])->age;
    }

}

<?php

namespace App\Http\Livewire\Profesores;

use App\Models\Profesore;
use Livewire\Component;

class EditProfesore extends Component
{
    public $profesore;

    public function mount(Profesore $profesore){
        $this->profesore = $profesore;
    }

    public function render()
    {

        return view('livewire.profesores.edit-profesore');
    }
}

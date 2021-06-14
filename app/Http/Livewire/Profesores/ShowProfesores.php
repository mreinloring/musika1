<?php

namespace App\Http\Livewire\Profesores;

use Livewire\Component;
use App\Models\Profesore;
use Carbon\Carbon;

class ShowProfesores extends Component
{

    public $profesore, $fechaNto;
    //Propiedades del buscador y orden
    public $search;
    public $sort= 'id';
    public $direction= 'desc';

    //Cuando escuche el metodo render de createProfesores, ejecuta el metodo render de showProfesores
    //protected $listeners =['render'=>'render'];
    //Si el metodo es el mismo, se escribe una vez
    protected $listeners = ['render'];
    protected $rules = [
        'profesore.nombre' => 'required|max:50',
        'profesore.apellido1' => 'required|max:50',
        'profesore.apellido2' => 'required|max:50',
        'profesore.email' => 'required|max:50',
        'profesore.telefono' => 'required|max:50',
        'profesore.dni' => 'required|max:9',
        'profesore.numSS' => 'required|max:50',
        'profesore.fechaNto' => 'required',
        'profesore.fechaAlta' => 'required',
        'profesore.fechaBaja' => '',
    ];


    public function render()
    {
        $profesores= Profesore::where('id', 'like','%'.$this->search.'%')
                                ->orWhere('nombre', 'like', '%' . $this->search . '%')
                                ->orWhere('apellido1', 'like', '%' . $this->search . '%')
                                ->orWhere('apellido2', 'like', '%' . $this->search . '%')
                                ->orWhere('email', 'like', '%' . $this->search . '%')
                                ->orWhere('telefono', 'like', '%' . $this->search . '%')
                                ->orderBy($this->sort,$this->direction)
                                ->get();

        return view('livewire.profesores.show-profesores',compact('profesores'));


    }

    public function order($sort){
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

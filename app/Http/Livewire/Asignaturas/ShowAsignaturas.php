<?php

namespace App\Http\Livewire\Asignaturas;

use Livewire\Component;
use App\Models\Asignatura;

class ShowAsignaturas extends Component
{
    //Propiedades del buscador y orden
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';

    public $asignatura;

    protected $rules = [
        'asignatura.nombre' => 'required|max:50',
        'asignatura.tipo'=>'required',
    ];

    public function mount()
    {
        $this->asignaturas = Asignatura::all(); //Inicializamos esta variable
    }


    public function render()
    {
        $asignaturas = Asignatura::where('id', 'like', '%' . $this->search . '%')
            ->orWhere('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('tipo', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->get();

        return view('livewire.asignaturas.show-asignaturas',compact('asignaturas'));
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

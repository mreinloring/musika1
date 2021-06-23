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


    public $open = false; //para que el modal este cerrado al ingresar en la pagina

    public $nombre, $tipo, $asignatura;

    protected $rules = [
        'asignatura.nombre' => 'required|max:50',
        'asignatura.tipo'=>'required',
    ];
    //Para abrir el modal de editar
    public $open_edit = false;

    protected $listeners = ['render', 'delete'];

    public function mount(Asignatura $asignatura)
    {
        $this->asignatura = $asignatura;

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
    public function edit(Asignatura $asignatura)
    {
        $this->asignatura = $asignatura;
        $this->open_edit = true;
    }
    public function update()
    {

        $this->validate();
        $this->asignatura->save();
        $this->reset(['open_edit']);

        $this->emit('alert', 'La asignatura se ha actualizado correctamente');
    }
    public function delete(Asignatura $asignatura)
    {
        $asignatura->delete();
    }


}

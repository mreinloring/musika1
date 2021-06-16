<?php

namespace App\Http\Livewire\Profesores;

use App\Models\Profesore;
use Livewire\Component;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditProfesore extends Component
{
    use WithFileUploads;

    public $open = false ;
    public $profesore ,$image,$identificador;



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
        'profesore.iban'=>'',
        'profesore.calle'=>'',
        'profesore.numero' => '',
        'profesore.piso' => '',
        'profesore.poblacion' => '',
        'profesore.provincia' => '',
    ];

    public function mount(Profesore $profesore){
        $this->profesore = $profesore;
        $this->identificador = rand();
    }

    public function save(){
        $this->validate();


        if ($this->image) {
            //Para eliminar la imagen almacenada antes de cambiarla
            Storage::delete([$this->profesore->image]);
            //subo la nueva imagen y reemplazo la url
            $this->profesore->image = $this->image->store('profesores');

        }

        $this->profesore->save();
        $this->reset(['open','image']);
        $this->identificador = rand();


        $this->emitTo('profesores.show-profesores', 'render');
        $this->emit('alert', 'El profesor se ha actualizado correctamente');
    }

    public function render()
    {

        return view('livewire.profesores.edit-profesore');
    }
}

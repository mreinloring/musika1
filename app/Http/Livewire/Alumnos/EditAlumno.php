<?php

namespace App\Http\Livewire\Alumnos;

use App\Models\Alumno;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


class EditAlumno extends Component
{
    use WithFileUploads;

    public $open = false;
    public $alumno, $image, $identificador;

    protected $rules = [
        'alumno.nombre' => 'required|max:50',
        'alumno.apellido1' => 'required|max:50',
        'alumno.apellido2' => 'max:50',
        'alumno.email' => 'required|max:50',
        'alumno.email2' => 'max:50',
        'alumno.telefono' => 'required|max:50',
        'alumno.telefono2' => 'max:50',
        'alumno.fechaNto' => 'required',
        'alumno.fechaAlta' => 'required',
        'alumno.fechaBaja' => '',
        'alumno.nombrePadres' => 'max:50',
        'alumno.sexo' => 'required|max:1',
        'alumno.iban' => 'required|max:28',
        'alumno.dni' => 'max:9',
        'alumno.unidadFamiliar' => '',
        'alumno.familiaNumerosa' => '',
        'alumno.fechaFamNum' => '',
        'alumno.noAutorizoFoto' => '',
        'alumno.GazteTxartela15' => '',
        'alumno.incidencias' => '',
        'alumno.centroTarine' => 'required',
        'alumno.calle' => '',
        'alumno.numero' => '',
        'alumno.piso' => '',
        'alumno.codigoPostal' => 'max:5',
        'alumno.poblacion' => '',
        'alumno.provincia' => '',
    ];
    public function mount(Alumno $alumno)
    {
        $this->alumno = $alumno;
        $this->identificador = rand();
    }
    public function save()
    {
        $this->validate();

        if ($this->image) {
            //Para eliminar la imagen almacenada antes de cambiarla
            Storage::delete([$this->alumno->image]);
            //subo la nueva imagen y reemplazo la url
            $this->alumno->image = $this->image->store('alumnos');
        }

        $this->alumno->save();
        $this->reset(['open', 'image']);
        $this->identificador = rand();


        $this->emitTo('alumnos.show-alumnos', 'render');
        $this->emit('alert', 'El alumno se ha actualizado correctamente');
    }

    public function render()
    {
        return view('livewire.alumnos.edit-alumno');
    }
}

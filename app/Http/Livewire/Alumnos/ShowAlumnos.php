<?php

namespace App\Http\Livewire\Alumnos;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Carbon\Carbon;

use App\Models\Alumno;

class ShowAlumnos extends Component
{
    use WithFileUploads;
    use WithPagination;

    //Propiedades del buscador y orden
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';
    public $readyToLoad = false;
    public $disabled = true;
    public $filtered;

    //Para enviar el paginador y buscador por la url
    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => '']
    ];

    protected $rules = [
        'alumno.nombre' => 'required|max:50',
        'alumno.apellido1' => 'required|max:50',
        'alumno.apellido2' => 'required|max:50',
        'alumno.email' => 'required|max:50',
        'alumno.email2' => 'required|max:50',
        'alumno.telefono' => 'required|max:50',
        'alumno.telefono2' => 'required|max:50',
        'alumno.fechaNto' => 'required',
        'alumno.fechaAlta' => 'required',
        'alumno.fechaBaja' => '',
        'alumno.nombrePadres' => 'required|max:50',
        'alumno.sexo' => 'required|max:1',
        'alumno.iban' => 'required|max:28',
        'alumno.dni' => 'required|max:9',
        'alumno.unidadFamiliar' => '',
        'alumno.familiaNumerosa' => '',
        'alumno.fechaFamNum' => '',
        'alumno.noAutorizoFoto' => '',
        'alumno.GazteTxartela15' => '',
        'alumno.incidencias' => '',
        'alumno.centroTarine' => 'required',
    ];
    public $alumnosActuales;

    public function mount()
    {
        $this->identificador = rand();
        $this->alumno = new Alumno(); //Inicializamos esta variable
    }

    public function render()
    {
         $this->alumnosActuales=Alumno::whereNull('fechaBaja')->get();

          $alumnos=Alumno::where('id', 'like', '%' . $this->search . '%')
                        ->orWhere('nombre', 'like', '%' . $this->search . '%')
                        ->orWhere('apellido1', 'like', '%' . $this->search . '%')
                        ->orWhere('apellido2', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('telefono', 'like', '%' . $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->paginate($this->cant);


        return view('livewire.alumnos.show-alumnos', compact('alumnos'));
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
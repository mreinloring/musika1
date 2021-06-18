<?php

namespace App\Http\Livewire\Profesores;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Livewire\WithPagination;

use App\Models\Profesore;



class ShowProfesores extends Component
{

    use WithFileUploads;
    use WithPagination;


    public $profesore, $fechaNto, $image , $identificador;
    //Propiedades del buscador y orden
    public $search ='';
    public $sort= 'id';
    public $direction= 'desc';
    public $cant = '10';
    public $readyToLoad = false;
    public $disabled = true;

   //Para enviar el paginador y buscador por la url
    protected $queryString = [
        'cant' =>['except'=> '10'],
        'sort' =>['except'=>'id'],
        'direction' =>['except'=>'desc'],
        'search' =>['except'=>'']
    ];

    public function mount(){
        $this->identificador = rand();
        $this->profesore = new Profesore(); //Inicializamos esta variable
    }

    //Para abrir el modal de editar
    public $open_edit = false;

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
        'profesore.iban' => '',
        'profesore.calle' => '',
        'profesore.numero' => '',
        'profesore.piso' => '',
        'profesore.poblacion' => '',
        'profesore.provincia' => '',
     ];

    //Cuando escuche el metodo render de createProfesores, ejecuta el metodo render de showProfesores
    //protected $listeners =['render'=>'render'];
    //Si el metodo es el mismo, se escribe una vez. se pueden añadir tantos metodos como sean necesarios
    protected $listeners = ['render','delete'];

    public function render()
    {
        if ($this->readyToLoad) {
            $profesores = Profesore::where('id', 'like', '%' . $this->search . '%')
                ->orWhere('nombre', 'like', '%' . $this->search . '%')
                ->orWhere('apellido1', 'like', '%' . $this->search . '%')
                ->orWhere('apellido2', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('telefono', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        }else {
            $profesores =[];
        }

        return view('livewire.profesores.show-profesores',compact('profesores'));

    }

    public function loadRegistro(){
        $this->readyToLoad= true;
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
    public function edit(Profesore $profesore){

        $this->profesore =$profesore;
        $this->open_edit= true;
    }

    public function update(){

        $this->validate();

        if ($this->image) {
            //Para eliminar la imagen almacenada antes de cambiarla
            Storage::delete([$this->profesore->image]);
            //subo la nueva imagen y reemplazo la url
            $this->profesore->image = $this->image->store('profesores');
        }

        $this->profesore->save();
        $this->reset(['open_edit', 'image']);
        $this->identificador = rand();

        $this->emit('alert', 'El profesor se ha actualizado correctamente');
    }
    public function delete(Profesore $profesore){
        $profesore->delete();
    }
}

<?php

namespace App\Http\Livewire\Asignaturas;

use Livewire\Component;
use App\Models\Asignatura;
use App\Models\Profesore;
use Illuminate\Support\Facades\DB;


class ShowAsignaturaProfesore extends Component
{
    //Propiedades del buscador y orden
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';

    public $asignaturas_profesores, $asignaturas, $profesore , $asignatura_profesore;

    protected $fillable=['asignatura_id','profesore_id'];



    public function render()
    {

        $asignaturas = DB::table('asignaturas')->get();


        return view('livewire.asignaturas.show-asignatura-profesore');
    }
}

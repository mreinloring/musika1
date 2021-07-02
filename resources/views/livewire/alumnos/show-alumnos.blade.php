<div>
     <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alumnos') }}
        </h2>
     </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <h2 class="font-semibold text-l text-gray-800 ">
        Alumnos actuales: {{$alumnosActuales->count()}}
        </h2>
        <x-table>

                <div class="px-4 py-6 flex items-center">
                    {{-- Esta es la paginacion --}}
                      <div class="flex items-center">
                        <span>Mostrar</span>
                        <select wire:model="cant" class="mx-2 form-control">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="600">600</option>
                        </select>
                        <span>registros</span>
                    </div>
                    {{-- Este es el buscador --}}
                    <x-jet-input class="flex-1 mx-4" placeholder="Escriba su busqueda" wire:model="search" type='text' />
                    {{-- @livewire('alumnos.create-alumno') --}}
                </div>
                {{-- Esta es la tabla --}}
                {{-- @if ($profesores->count()) //Esto es para contar en una coleccion --}}
                {{--@if (count($alumnos)) //Esto es para contar una array --}}
                @if (count($alumnos))

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                    wire:click="order('id')">
                                    ID
                                    {{-- Sort --}}
                                    @if ($sort == 'id')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                    wire:click="order('nombre')">
                                    Nombre
                                    {{-- Sort --}}
                                    @if ($sort == 'nombre')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                    wire:click="order('telefono')">
                                    Telefono
                                    {{-- Sort --}}
                                    @if ($sort == 'telefono')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                    wire:click="order('nombrePadres')">
                                    Nombre Padres
                                    {{-- Sort --}}
                                    @if ($sort == 'nombrePadres')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                    Fecha Baja
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                    Edad
                                    {{-- Sort --}}
                                    @if ($sort == 'id')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>


                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">




                            @foreach ($alumnos as $item)
                                     <tr>
                                        <td class="px-6 py-4 ">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-gray-800">
                                                {{ $item->id }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 ">
                                            {{-- <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full"
                                                        src="{{Storage::url($profesore->image)}}" >
                                                </div> --}}

                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-black-900">
                                                    {{ $item->nombre . ' ' . $item->apellido1 . ' ' . $item->apellido2 }}
                                                </div>
                                                <div class="text-sm font-medium text-gray-500">
                                                    {{ $item->email }}
                                                </div>
                                                <div class="text-sm font-medium text-gray-500">
                                                    {{ $item->email2 }}
                                                </div>
                                            </div>

                                        </td>
                                        <td class="px-6 py-4 ">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-500">
                                                        {{ $item->telefono }}
                                                </div>
                                                <div class="text-sm font-medium text-gray-500">
                                                        {{ $item->telefono2 }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4  text-sm text-gray-500">
                                            {{ $item->nombrePadres }}
                                        </td>
                                        <td class="px-6 py-4  text-sm text-gray-500">
                                            {{ $item->fechaBaja }}
                                        </td>
                                        <td class="px-6 py-4  text-sm text-gray-500">
                                            {{ $item->age }}
                                        </td>
                                        <!-- Botones... -->
                                        <td class="px-6 py-4 text-sm font-medium flex">
                                            {{-- @livewire('profesores.edit-profesore', ['profesore' => $profesore], key($profesore->id)) --}}
                                            <a class="btn btn-green mr-2" wire:click="edit({{ $item }})">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {{-- No eliminamos alumnos ya que tienen  expedientes --}}
                                            <a class="btn btn-red mr-2 "  wire:click="$emit('deleteRegistro',{{ $item->id }})">
                                                <i class="fas fa-trash-alt"></i>

                                            </a>
                                            {{-- Boton para ver los expedientes por profesor --}}
                                            <a class="btn btn-blue" wire:click="ver({{ $item }})">
                                                <i class="fas fa-server"></i>

                                            </a>

                                        </td>
                                    </tr>


                            @endforeach


                        </tbody>
                    </table>
                  @if ($alumnos->hasPages())
                    <div class="px-6 py-3">
                        {{ $alumnos->links() }}
                    </div>
                @endif
                @else
                    <div class="px-4 py-6">
                        No existe ningun registro coincidente
                    </div>
                @endif
        </x-table>
    </div>

     {{-- //Modal para editar un alumno --}}
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name='title'>
            Editar el alumno :  {{ $alumno->nombre . ' ' . $alumno->apellido1 . ' ' . $alumno->apellido2}}
        </x-slot>
        <x-slot name='content'>
            {{-- Imagen alumno --}}
            {{-- <div wire:loading wire:target="image"
                class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Imagen cargando...!</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado.</span>
            </div>
            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}">
            @else
                <img src="{{ Storage::url($alumno->image) }}">
            @endif
            <div class="mb-4">
                <x-jet-input type="file" wire:model="image" id="{{ $identificador }}"></x-jet-input>
                <x-jet-input-error for="image" />
            </div> --}}
            <div class="mb-4">
                <x-jet-label value="Nombre"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="alumno.nombre"></x-jet-input>
                <x-jet-input-error for="nombre" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Apellido 1"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="alumno.apellido1"></x-jet-input>
                <x-jet-input-error for="apellido1" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Apellido 2"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="alumno.apellido2"></x-jet-input>
                <x-jet-input-error for="apellido2" />
            </div>
            <div class="mb-4 grid grid-cols-2">
                <div class="mb-4 grid-1 mr-4">
                    <x-jet-label value="Email"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="alumno.email"></x-jet-input>
                    <x-jet-input-error for="email" />
                </div>
                <div class="mb-4 grid-1 ">
                    <x-jet-label value="Email 2"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="alumno.email2"></x-jet-input>
                    <x-jet-input-error for="email2" />
                </div>
                <div class="mb-4 grid-2 mr-4">
                    <x-jet-label value="Telefono"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="alumno.telefono"></x-jet-input>
                    <x-jet-input-error for="telefono" />
                </div>
                <div class="mb-4 grid-2 ">
                    <x-jet-label value="Telefono 2" ></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="alumno.telefono2"></x-jet-input>
                    <x-jet-input-error for="telefono2" />
                </div>
            </div>
            <div class="mb-4 grid grid-cols-3">
                <div class=" grid-1 mr-2">
                    <x-jet-label value="Sexo"></x-jet-label>
                    <select name="sexo" id="sexo" class="form-control" wire:model="alumno.sexo">
                        <option value="E">E- Emakunde</option>
                        <option value="G">G- Gizona</option>
                    </select>

                </div>
                <div class="grid-2">
                    <x-jet-label value="Nombre padres"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="alumno.nombrePadres"></x-jet-input>
                </div>
                <div class="ml-4 mr-2 grid-3">
                    <x-jet-label value="DNI"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="alumno.dni"></x-jet-input>
                    <x-jet-input-error for="dni" />
                </div>

            </div>
            <div class="mb-4 grid grid-cols-3">
                <div class="grid-1">
                    <x-jet-label value="Fecha Nto"></x-jet-label>
                    <x-jet-input type="date" wire:model="alumno.fechaNto"></x-jet-input>
                    <x-jet-input-error for="fechaNto" />
                </div>
                <div class="grid-2">
                    <x-jet-label value="Fecha Alta"></x-jet-label>
                    <x-jet-input type="date" wire:model="alumno.fechaAlta"></x-jet-input>
                    <x-jet-input-error for="fechaAlta" />
                </div>
                <div class="grid-3">
                    <x-jet-label value="Fecha Baja"></x-jet-label>
                    <x-jet-input type="date" wire:model="alumno.fechaBaja"></x-jet-input>
                    <x-jet-input-error for="fechaBaja" />
                </div>
            </div>

            <div class="mb-4">
                <x-jet-label value="Iban"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="alumno.iban" pattern="^ES\d{2}[ ]\d{4}[ ]\d{4}[ ]\d{4}[ ]\d{4}[ ]\d{4}|ES\d{20}$"></x-jet-input>
                <x-jet-input-error for="iban" />
            </div>
            <div class="mb-4 grid grid-cols-3">
                <div class="grid grid-1 mr-4">
                    <x-jet-label value="centroTarine"></x-jet-label>
                    <select name="centroTarine" id="centroTarine" class="form-control" wire:model="alumno.centroTarine">
                        <option value="Berriatua">Berriatua</option>
                        <option value="Markina-Xemein">Markina-Xemein</option>
                    </select>
                </div>
                 <div class="grid grid-2 mr-4">
                    <x-jet-label value="Incidencias"></x-jet-label>
                    <x-jet-input type="text" class="form-control " wire:model="alumno.incidencias"></x-jet-input>
                </div>

                <div class="grid grid-3">
                    <x-jet-label value="U.Familiar"></x-jet-label>
                    <x-jet-input type="text" wire:model="alumno.unidadFamiliar"></x-jet-input>

                </div>

            </div>
            <div class="">
                <div>
                  No autorizo foto:  <x-jet-input type="checkbox" class="form-checkbox " wire:model="alumno.noAutorizoFoto"></x-jet-input>
                  Gazte txartela 15%:  <x-jet-input type="checkbox" class="form-checkbox " wire:model="alumno.GazteTxartela15"></x-jet-input>
                  Familia Numerosa:  <x-jet-input type="checkbox" class="form-checkbox " wire:model="alumno.familiaNumerosa"></x-jet-input>
                </div>

                <div>
                    <x-jet-label value="Fecha F. Numerosa"></x-jet-label>
                    <x-jet-input type="date" wire:model.hidden="alumno.fechaFamNum" ></x-jet-input>
                </div>



            </div>
            <div class="mb-4 grid grid-cols-3">
                <div class="grid-1 mr-4 ">
                    <x-jet-label value="Calle"></x-jet-label>
                    <x-jet-input type="text" wire:model="alumno.calle"></x-jet-input>
                    <x-jet-input-error for="calle" />
                </div>
                <div class="grid-2 ">
                    <x-jet-label value="Numero"></x-jet-label>
                    <x-jet-input type="text" wire:model="alumno.numero"></x-jet-input>
                    <x-jet-input-error for="numero" />
                </div>
                <div class="grid-3 ml-2">
                    <x-jet-label value="Piso"></x-jet-label>
                    <x-jet-input type="text" wire:model="alumno.piso"></x-jet-input>
                    <x-jet-input-error for="piso" />
                </div>
            </div>
            <div class="mb-4 grid grid-cols-3">
                <div class="grid-1 mx-2">
                    <x-jet-label value="Codigo postal"></x-jet-label>
                    <x-jet-input type="text" wire:model="alumno.codigoPostal"></x-jet-input>
                    <x-jet-input-error for="codigoPostal" />
                </div>
                <div class="grid-2 mx-2">
                    <x-jet-label value="Poblacion"></x-jet-label>
                    <select name="poblacion" id="poblacion" class="form-control" wire:model="alumno.poblacion">
                        <option value="">Seleccione Poblacion</option>
                        <option value="Abadiño">Abadiño</option>
                        <option value="Amurrio">Amurrio</option>
                        <option value="Azkoitia">Azkoitia</option>
                        <option value="Berriatua">Berriatua</option>
                        <option value="Berriz">Berriz</option>
                        <option value="Deba">Deba</option>
                        <option value="Durango">Durango</option>
                        <option value="Eibar">Eibar</option>
                        <option value="Etxebarria">Etxebarria</option>
                        <option value="Galdakao">Galdakao</option>
                        <option value="Leioa">Leioa</option>
                        <option value="Lekeitio">Lekeitio</option>
                        <option value="Markina-Xemein">Markina-Xemein</option>
                        <option value="Mutriku">Mutriku</option>
                        <option value="Ondarroa">Ondarroa</option>
                        <option value="Zaldibar">Zaldibar</option>
                        <option value="Zaratamo">Zaratamo</option>
                        <option value="Ziortza-Bolibar">Ziortza-Bolibar</option>
                    </select>
                    <x-jet-input-error for="poblacion" />

                </div>

                <div class="grid-3 mx-2">
                    <x-jet-label value="Provincia"></x-jet-label>
                    <select name="provincia" id="provincia" class="form-control" wire:model="alumno.provincia">
                        <option value="Bizkaia">Bizkaia</option>
                        <option value="Araba">Araba</option>
                        <option value="Gipuzkoa">Gipuzkoa</option>
                    </select>
                    <x-jet-input-error for="provincia" />

                </div>

            </div>

        </x-slot>
        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_edit',false)">
                Cancelar
            </x-jet-secondary-button>
            {{-- Si hay imagen....
             <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" class="disbled:opacity-25"> --}}
            <x-jet-danger-button wire:click="update" >
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

     {{-- Para mostrar la alerta antes de eliminar --}}
    @push('js')
        <script src="sweetalert2.all.min.js"></script>
        <script>
            Livewire.on('deleteRegistro', registroId =>{
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emitTo('alumnos.show-alumnos','delete', registroId);

                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })
            })
        </script>
    @endpush

</div>

<div>
     <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alumnos') }}
        </h2>
     </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- This example requires Tailwind CSS v2.0+ -->

        <x-table>

                <div class="px-4 py-6 flex items-center">
                    {{-- Esta es la paginacion --}}
                     {{-- <div class="flex items-center">
                        <span>Mostrar</span>
                        <select wire:model="cant" class="mx-2 form-control">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="600">600</option>
                        </select>
                        <span>registros</span>
                    </div> --}}
                    {{-- Este es el buscador --}}
                    <x-jet-input class="flex-1 mx-4" placeholder="Escriba su busqueda" wire:model="search" type='text' />
                    {{-- @livewire('alumnos.create-alumno') --}}
                </div>
                {{-- Esta es la tabla --}}
                {{-- @if ($profesores->count()) //Esto es para contar en una coleccion --}}
                {{--@if ($alumnos->count()) //Esto es para contar una array --}}
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
                                    DNI
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                    Edad
                                </th>


                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">



                            @foreach ($alumnos as $item)
                                {{-- para que solo salgan los alumnos actuales --}}
                                 @if ($item->fechaBaja = 'Null')

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

                                @endif
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

</div>

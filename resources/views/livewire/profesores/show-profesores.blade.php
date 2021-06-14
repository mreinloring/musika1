<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profesores') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table>
            <div class="px-4 py-6 flex items-center">
                {{-- Este es el buscador --}}
                <x-jet-input class="flex-1 mr-4" placeholder="Escriba su busqueda" wire:model="search" type='text'></x-input>
                    @livewire('profesores.create-profesore')
            </div>
             {{-- Esta es la tabla --}}
            @if ($profesores->count())
                Profesores :{{$profesores->count()}}
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="order('id')">
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
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="order('nombre')">
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
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="order('telefono')">
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
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="order('numSS')">
                                Numero SS
                                 {{-- Sort --}}
                                        @if ($sort == 'numSS')
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
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" >
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

                            @foreach ($profesores as $profesore)
                            {{-- para que solo salgan los profesores actuales --}}
                                @if ($profesore->fechaBaja= 'Null')


                                <tr>
                                    <td class="px-6 py-4 ">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-gray-800">
                                            {{$profesore->id}}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 ">
                                       {{-- <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full"
                                                    src=""
                                                    alt="">
                                            </div> --}}

                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-black-900">
                                                    {{$profesore->nombre ." ". $profesore->apellido1." ".$profesore->apellido2}}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{$profesore->email}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 ">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-gray-500">
                                            {{$profesore->telefono}}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4  text-sm text-gray-500">
                                        {{$profesore->numSS}}
                                    </td>
                                    <td class="px-6 py-4  text-sm text-gray-500">
                                        {{$profesore->dni}}
                                    </td>
                                    <td class="px-6 py-4  text-sm text-gray-500">
                                        {{$profesore->age}}
                                    </td>


                                    <td class="px-6 py-4  text-right text-sm font-medium">
                                            @livewire('profesores.edit-profesore', ['profesore' => $profesore], key($profesore->id))
                                    </td>
                                </tr>

                                @endif
                            @endforeach

                        <!-- More people... -->
                    </tbody>
                </table>

            @else
                <div class="px-4 py-6">
                    No existe ningun registro coincidente
                </div>
            @endif
         </x-table>

    </div>


</div>

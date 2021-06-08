<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table>
            <div class="px-4 py-6">
                {{-- <input type="text" wire:model="search"> --}}
                <x-jet-input class="w-full" placeholder="Escriba su busqueda" wire:model="search" type='text'></x-input>
            </div>
            @if ($profesores->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Telefono
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha Nacimiento
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Edad
                            </th>


                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($profesores as $profesore)

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
                                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                                                alt="">
                                        </div> --}}

                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-black-900">
                                                {{$profesore->nombre." ". $profesore->apellido1." ".$profesore->apellido2}}
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
                                    {{$profesore->fechaNto}}
                                </td>
                                <td class="px-6 py-4  text-sm text-gray-500">
                                    {{$profesore->age}}
                                </td>


                                <td class="px-6 py-4  text-right text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>
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

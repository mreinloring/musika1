<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Asignaturas- Profesores') }}
        </h2>
    </x-slot>
    <x-table>
            <div class="px-4 py-6 flex items-center">
                {{-- Este es el buscador --}}
                <x-jet-input class="flex-1 mx-4" placeholder="Escriba su busqueda" wire:model="search" type='text' />
                 {{-- @livewire('asignaturas.create-asignatura') --}}
            </div>

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
                            wire:click="order('profesor')">
                            Profesor
                            {{-- Sort --}}
                            @if ($sort == 'profesor')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>

                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($profesore->asignaturas as $item)
                            <tr>
                                <td class="px-6 py-4 ">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-gray-800">
                                        {{ $item->pivot->nombre}}
                                    </span>
                                </td>
                                <td class="px-6 py-4 ">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-gray-800">
                                        {{ $item->profesore->nombre }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
    </x-table>
</div>

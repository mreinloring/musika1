<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Asignaturas') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table>

                <div class="px-4 py-6 flex items-center">
                    {{-- Este es el buscador --}}
                    <x-jet-input class="flex-1 mx-4" placeholder="Escriba su busqueda" wire:model="search" type='text' />
                    @livewire('asignaturas.create-asignatura')
                </div>
                {{-- Esta es la tabla --}}
                @if (count($asignaturas))
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
                                wire:click="order('tipo')">
                                Tipo
                                {{-- Sort --}}
                                @if ($sort == 'tipo')
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
                        @if ($asignaturas->count())
                            @foreach ($asignaturas as $item)
                                <tr>
                                    <td class="px-6 py-4 ">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-gray-800">
                                            {{ $item->id }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 ">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-gray-800">
                                            {{ $item->nombre }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 ">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-gray-800">
                                            {{ $item->tipo }}
                                        </span>
                                    </td>
                                    <!-- Botones... -->
                                    <td class="px-6 py-4 text-sm font-medium flex">
                                        <a class="btn btn-green mr-2" wire:click="edit({{ $item }})">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- No eliminamos profesores ya que tienen alumnos y expedientes --}}
                                        <a class="btn btn-red mr-2 "  wire:click="$emit('deleteRegistro',{{ $item->id }})">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>


                </table>
                @endif

        </x-table>

    </div>
    {{-- //Modal para editar una asignatura --}}
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name='title'>
            Editar la asignatura: {{$asignatura->nombre}}
        </x-slot>
        <x-slot name='content'>

            <div class="mb-4">
                <x-jet-label value="Nombre"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="asignatura.nombre"></x-jet-input>
                <x-jet-input-error for="nombre" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Tipo"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="asignatura.tipo"></x-jet-input>
                <x-jet-input-error for="tipo" />
            </div>

        </x-slot>
        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_edit',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" class="disbled:opacity-25">
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

                    Livewire.emitTo('asignaturas.show-asignaturas','delete', registroId);

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

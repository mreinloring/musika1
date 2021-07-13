<div>
   <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expedientes') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table>
            @if (count($expedientes))
              Expedientes: {{count($expedientes)}}
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
                                    wire:click="order('anoCurso')">
                                    Año Curso
                                    {{-- Sort --}}
                                    @if ($sort == 'anoCurso')
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
                                    wire:click="order('asignatura')">
                                    Asignatura
                                    {{-- Sort --}}
                                    @if ($sort == 'asignatura')
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
                                    wire:click="order('nivel')">
                                    Nivel
                                    {{-- Sort --}}
                                    @if ($sort == 'nivel')
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
                                    wire:click="order('curso')">
                                    Curso
                                    {{-- Sort --}}
                                    @if ($sort == 'curso')
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
                                    wire:click="order('profesore')">
                                    Profesor
                                    {{-- Sort --}}
                                    @if ($sort == 'profesore')
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
                        <tbody>
                            @foreach ($expedientes as $item)
                                @if ($item->fechaBaja='Null')
                                    <tr>
                                        <td class="px-6 py-4 ">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-gray-800">
                                                {{ $item->id }}
                                            </span>
                                        </td>
                                        <tr>
                                        <td class="px-6 py-4 ">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-gray-800">
                                                {{ $item->asignatura_id }}
                                            </span>
                                        </td>
                                        <tr>
                                        <td class="px-6 py-4 ">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-gray-800">
                                                {{ $item->alumno_id }}
                                            </span>
                                        </td>
                                        <tr>
                                        <td class="px-6 py-4 ">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-gray-800">
                                                {{ $item->profesore_id }}
                                            </span>
                                        </td>
                                        <tr>
                                        <td class="px-6 py-4 ">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-gray-800">
                                                {{ $item->nivel }}
                                            </span>
                                        </td>
                                        <tr>
                                        <td class="px-6 py-4 ">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-gray-800">
                                                {{ $item->curso }}
                                            </span>
                                        </td>
                                    </tr>
                                @endif

                            @endforeach

                        </tbody>
              </table>
            @endif
        </x-table>
    </div>
</div>

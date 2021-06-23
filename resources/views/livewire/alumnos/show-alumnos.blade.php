<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alumnos actuales') }}
        </h2>
     </x-slot>
     <x-table>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Fecha Baja</th>
                    </tr>
                </thead>
                <tbody>

                        @foreach ($alumnos as $item)

                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{ $item->nombre . ' ' . $item->apellido1 . ' ' . $item->apellido2 }}</td>
                                <td>{{$item->fechaBaja}}</td>
                            </tr>

                        @endforeach
                    Alumnos actuales: {{$alumnos->count() }}

                </tbody>
            </table>

     </x-table>
</div>
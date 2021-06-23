<div>
     {{-- Boton para agregar registro --}}
    <x-jet-button wire:click="$set('open', true)" class="btn btn-blue">
        Crear nueva asignatura
    </x-jet-button>

    {{-- Modal para agregar asignatura --}}
    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nueva asignatura
        </x-slot>
        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Nombre"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="nombre"></x-jet-input>
                <x-jet-input-error for="nombre" />
            </div>
            <div class="mb-4">
                <x-jet-label value="tipo"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="tipo"></x-jet-input>
                <x-jet-input-error for="tipo" />
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            {{-- wire:loading.attr="disabled" class="disabled:opacity-25"  si queremos el boton desabilitado --}}
            <x-jet-danger-button wire:click="save">
                Crear asignatura
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
</div>

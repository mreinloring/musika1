<div>
    {{-- //boton para agregar registro --}}
   <x-jet-danger-button wire:click="$set('open', true)">
       Crear nuevo profesor
   </x-jet-danger-button>

{{-- //Modal para agregar profesor --}}
   <x-jet-dialog-modal wire:model="open">

    <x-slot name="title">
        Crear nuevo profesor
    </x-slot>
    <x-slot name="content">
        <div class="mb-4">
            <x-jet-label value="Nombre"></x-jet-label>
            <x-jet-input type="text" class="w-full" wire:model.defer="nombre"></x-jet-input>
        </div>
        <div class="mb-4">
            <x-jet-label value="Apellido 1"></x-jet-label>
            <x-jet-input type="text" class="w-full" wire:model.defer="apellido1"></x-jet-input>
        </div>

        <div class="mb-4">
            <x-jet-label value="Apellido 2"></x-jet-label>
            <x-jet-input type="text" class="w-full" wire:model.defer="apellido2"></x-jet-input>
        </div>
        <div class="mb-4 grid grid-cols-2">
        <div class="mb-4 grid-1 mr-4">
            <x-jet-label value="Email"></x-jet-label>
            <x-jet-input type="text" class="w-full" wire:model.defer="email"></x-jet-input>
        </div>
        <div class="mb-4 grid-2 ">
            <x-jet-label value="Telefono"></x-jet-label>
            <x-jet-input type="text" class="w-full" wire:model.defer="telefono"></x-jet-input>
        </div>
        </div>
        <div class="mb-4 grid grid-cols-2">
        <div class="mb-4 grid-1 mr-4">
            <x-jet-label value="DNI"></x-jet-label>
            <x-jet-input type="text" class="w-full" wire:model.defer="dni"></x-jet-input>
        </div>
        <div class="mb-4 grid-2">
            <x-jet-label value="Numero SS"></x-jet-label>
            <x-jet-input type="text" class="w-full" wire:model.defer="numSS"></x-jet-input>
        </div>
        </div>
        <div class="mb-4 grid grid-cols-3">
            <div class="grid-1">
                <x-jet-label value="Fecha Nto"></x-jet-label>
                <x-jet-input type="date" wire:model.defer="fechaNto"></x-jet-input>
            </div>
            <div class="grid-2">
                <x-jet-label value="Fecha Alta"></x-jet-label>
                <x-jet-input type="date" wire:model.defer="fechaAlta"></x-jet-input>
            </div>
            <div class="grid-3">
                <x-jet-label value="Fecha Baja"></x-jet-label>
                <x-jet-input type="date" wire:model.defer="fechaBaja"></x-jet-input>
            </div>
        </div>

        <div class="mb-4">
            <x-jet-label value="Iban"></x-jet-label>
            <x-jet-input type="text" class="w-full" wire:model.defer="iban"></x-jet-input>
        </div>
        <div class="mb-4 grid grid-cols-3">
            <div class="grid-1">
                <x-jet-label value="Calle"></x-jet-label>
                <x-jet-input type="text" wire:model.defer="calle"></x-jet-input>
            </div>
            <div class="grid-2">
                <x-jet-label value="Numero"></x-jet-label>
                <x-jet-input type="text" wire:model.defer="numero"></x-jet-input>
            </div>
            <div class="grid-3">
                <x-jet-label value="Piso"></x-jet-label>
                <x-jet-input type="text" wire:model.defer="piso"></x-jet-input>
            </div>
        </div>
        <div class="mb-4 grid grid-cols-3">
            <div class="grid-1">
                <x-jet-label value="Codigo postal"></x-jet-label>
                <x-jet-input type="text" wire:model.defer="codigoPostal" ></x-jet-input>
            </div>
            <div class="grid-2">
                <x-jet-label value="Poblacion"></x-jet-label>
                    <select  name="poblacion" id="poblacion" class="form-control" wire:model.defer="poblacion">
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

            </div>

            <div class="grid-3">
                <x-jet-label value="Provincia"></x-jet-label>
                    <select  name="provincia" id="provincia" class="form-control" wire:model.defer="provincia">
                            <option value="">Seleccione provincia</option>
                            <option value="Araba">Araba</option>
                            <option value="Bizkaia">Bizkaia</option>
                            <option value="Gipuzkoa">Gipuzkoa</option>
                    </select>

            </div>

        </div>


    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('open',false)">
            Cancelar
        </x-jet-secondary-button>
        <x-jet-danger-button wire:click="save">
            Crear profesor
        </x-jet-danger-button>


    </x-slot>


   </x-jet-dialog-modal>

</div>

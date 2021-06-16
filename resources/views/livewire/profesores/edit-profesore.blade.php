<div>
     <a class="btn btn-green" wire:click="$set('open',true)">
         <i class="fas fa-edit"></i>
     </a>


     <x-jet-dialog-modal wire:model="open">
           <x-slot name='title'>
                Editar el profesor {{$profesore->nombre." ".$profesore->apellido1}}
           </x-slot>
            <x-slot name='content'>
                <div wire:loading wire:target="image" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">¡Imagen cargando...!</strong>
                    <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado.</span>
                </div>
                @if ($image)
                    <img class="mb-4" src="{{$image->temporaryUrl()}}">
                @else
                    <img src="{{Storage::url($profesore->image)}}" >
                @endif
                <div class="mb-4">
                    <x-jet-input type="file"  wire:model="image" id="{{$identificador}}"></x-jet-input>
                    <x-jet-input-error for="image"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Nombre"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="profesore.nombre"></x-jet-input>
                    <x-jet-input-error for="nombre"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Apellido 1"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="profesore.apellido1"></x-jet-input>
                    <x-jet-input-error for="apellido1"/>
                </div>

                <div class="mb-4">
                    <x-jet-label value="Apellido 2"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="profesore.apellido2"></x-jet-input>
                    <x-jet-input-error for="apellido2"/>
                </div>
                <div class="mb-4 grid grid-cols-2">
                <div class="mb-4 grid-1 mr-4">
                    <x-jet-label value="Email"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="profesore.email"></x-jet-input>
                    <x-jet-input-error for="email"/>
                </div>
                <div class="mb-4 grid-2 ">
                    <x-jet-label value="Telefono"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="profesore.telefono"></x-jet-input>
                    <x-jet-input-error for="telefono"/>
                </div>
                </div>
                <div class="mb-4 grid grid-cols-2">
                <div class="mb-4 grid-1 mr-4">
                    <x-jet-label value="DNI"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="profesore.dni"></x-jet-input>
                    <x-jet-input-error for="dni"/>
                </div>
                <div class="mb-4 grid-2">
                    <x-jet-label value="Numero SS"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="profesore.numSS"></x-jet-input>
                </div>
                </div>
                <div class="mb-4 grid grid-cols-3">
                    <div class="grid-1">
                        <x-jet-label value="Fecha Nto"></x-jet-label>
                        <x-jet-input type="date" wire:model="profesore.fechaNto"></x-jet-input>
                        <x-jet-input-error for="fechaNto"/>
                    </div>
                    <div class="grid-2">
                        <x-jet-label value="Fecha Alta"></x-jet-label>
                        <x-jet-input type="date" wire:model="profesore.fechaAlta"></x-jet-input>
                        <x-jet-input-error for="fechaAlta"/>
                    </div>
                    <div class="grid-3">
                        <x-jet-label value="Fecha Baja"></x-jet-label>
                        <x-jet-input type="date" wire:model="profesore.fechaBaja"></x-jet-input>
                        <x-jet-input-error for="fechaBaja"/>
                    </div>
                </div>

                <div class="mb-4">
                    <x-jet-label value="Iban"></x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="profesore.iban"></x-jet-input>
                    <x-jet-input-error for="iban"/>
                </div>
                <div class="mb-4 grid grid-cols-3">
                    <div class="grid-1">
                        <x-jet-label value="Calle"></x-jet-label>
                        <x-jet-input type="text" wire:model="profesore.calle"></x-jet-input>
                        <x-jet-input-error for="calle"/>
                    </div>
                    <div class="grid-2">
                        <x-jet-label value="Numero"></x-jet-label>
                        <x-jet-input type="text" wire:model="profesore.numero"></x-jet-input>
                        <x-jet-input-error for="numero"/>
                    </div>
                    <div class="grid-3">
                        <x-jet-label value="Piso"></x-jet-label>
                        <x-jet-input type="text" wire:model="profesore.piso"></x-jet-input>
                        <x-jet-input-error for="piso"/>
                    </div>
                </div>
                <div class="mb-4 grid grid-cols-3">
                    <div class="grid-1">
                        <x-jet-label value="Codigo postal"></x-jet-label>
                        <x-jet-input type="text" wire:model="profesore.codigoPostal" ></x-jet-input>
                        <x-jet-input-error for="codigoPostal"/>
                    </div>
                    <div class="grid-2">
                        <x-jet-label value="Poblacion"></x-jet-label>
                            <select  name="poblacion" id="poblacion" class="form-control" wire:model="profesore.poblacion">
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
                            <x-jet-input-error for="poblacion"/>

                    </div>

                    <div class="grid-3">
                        <x-jet-label value="Provincia"></x-jet-label>
                            <select  name="provincia" id="provincia" class="form-control" wire:model="profesore.provincia">
                                    <option value="">Seleccione provincia</option>
                                    <option value="Araba">Araba</option>
                                    <option value="Bizkaia">Bizkaia</option>
                                    <option value="Gipuzkoa">Gipuzkoa</option>
                            </select>
                        <x-jet-input-error for="provincia"/>

                    </div>

                </div>

           </x-slot>
            <x-slot name='footer'>
                <x-jet-secondary-button wire:click="$set('open',false)">
                    Cancelar
                </x-jet-secondary-button>
                <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" class="disbled:opacity-25">
                    Actualizar
                </x-jet-danger-button>
           </x-slot>
     </x-jet-dialog-modal>
</div>

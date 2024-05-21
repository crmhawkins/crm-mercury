<div class="container mx-auto">
    <form wire:submit.prevent="">
        <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
        <div class="card mb-3">
            <h5 class="card-header">
                Registrar nuevo vendedor
            </h5>
            <div class="card-body">
                <div class="mb-3 row d-flex align-items-center">
                    <label for="nombre" class="col-sm-2 col-form-label"> <strong>Nombre</strong> </label>
                    <div class="col-sm-10">
                        <input type="text" wire:model="nombre" class="form-control" name="nombre"
                            id="nombre" placeholder="Nombre del propietario">
                        @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row d-flex align-items-center">
                    <label for="apellidos" class="col-sm-2 col-form-label"> <strong>Apellidos</strong> </label>
                    <div class="col-sm-10">
                        <input type="text" wire:model="apellidos" class="form-control" name="apellidos"
                            id="apellidos" placeholder="Apellidos del propietario">
                        @error('apellidos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row d-flex align-items-center">
                    <label for="dni" class="col-sm-2 col-form-label"> <strong>DNI</strong> </label>
                    <div class="col-sm-10">
                        <input type="text" wire:model="dni" class="form-control" name="dni" id="dni"
                            placeholder="Añade la identificación del propietario.">
                        @error('dni')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row d-flex align-items-center">
                    <label for="dni" class="col-sm-2 col-form-label"> <strong>Teléfono</strong> </label>
                    <div class="col-sm-10">
                        <input type="text" wire:model="telefono" class="form-control" name="telefono" id="telefono"
                            placeholder="Añade el teléfono del propietario.">
                        @error('dni')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row d-flex align-items-center">
                    <label for="correo" class="col-sm-2 col-form-label"> <strong>Email</strong> </label>
                    <div class="col-sm-10">
                        <input type="text" wire:model="correo" class="form-control" name="correo" id="correo"
                            placeholder="Añade el Correo del propietario.">
                        @error('dni')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                
            </div>
        </div>
        <div class="mb-3 row d-flex align-items-center gap-2">
            <button type="submit" wire:click="update()" class="btn btn-primary">Guardar</button>
            
            <button wire:click="destroy()" class="btn btn-danger">Eliminar</button>
        </div>
    </form>
</div>

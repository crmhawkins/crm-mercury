<div class="container mx-auto">
    <form wire:submit.prevent="update">
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
                            id="nombre" placeholder="Nombre del vendedor">
                        @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row d-flex align-items-center">
                    <label for="apellidos" class="col-sm-2 col-form-label"> <strong>Apellidos</strong> </label>
                    <div class="col-sm-10">
                        <input type="text" wire:model="apellidos" class="form-control" name="apellidos"
                            id="apellidos" placeholder="Apellidos del vendedor">
                        @error('apellidos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row d-flex align-items-center">
                    <label for="dni" class="col-sm-2 col-form-label"> <strong>DNI</strong> </label>
                    <div class="col-sm-10">
                        <input type="text" wire:model="dni" class="form-control" name="dni" id="dni"
                            placeholder="Añade la identificación del vendedor.">
                        @error('dni')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                
            </div>
        </div>
        <div class="mb-3 row d-flex align-items-center">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
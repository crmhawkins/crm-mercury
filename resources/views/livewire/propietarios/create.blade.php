<div class="container mx-auto">
    <form wire:submit.prevent="">
        <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
        <div class="card mb-3">
            <h5 class="card-header">
                Register new owner
            </h5>
            <div class="card-body">
                <div class="mb-3 row d-flex align-items-center">
                    <label for="nombre_completo" class="col-sm-2 col-form-label"> <strong>Name</strong> </label>
                    <div class="col-sm-10">
                        <input type="text" wire:model="nombre" class="form-control" name="nombre"
                            id="nombre" placeholder="Name">
                        @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row d-flex align-items-center">
                    <label for="apellidos" class="col-sm-2 col-form-label"> <strong>Surnames</strong> </label>
                    <div class="col-sm-10">
                        <input type="text" wire:model="apellidos" class="form-control" name="apellidos"
                            id="apellidos" placeholder="Surnames">
                        @error('apellidos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row d-flex align-items-center">
                    <label for="dni" class="col-sm-2 col-form-label"> <strong>DNI</strong> </label>
                    <div class="col-sm-10">
                        <input type="text" wire:model="dni" class="form-control" name="dni" id="dni"
                            placeholder="DNI">
                        @error('dni')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row d-flex align-items-center">
                    <label for="telefono" class="col-sm-2 col-form-label"> <strong>Telephone</strong> </label>
                    <div class="col-sm-10">
                        <input type="text" wire:model="telefono" class="form-control" name="telefono" id="telefono"
                            placeholder="Telephone.">
                        @error('telefono')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row d-flex align-items-center">
                    <label for="correo" class="col-sm-2 col-form-label"> <strong>Email</strong> </label>
                    <div class="col-sm-10">
                        <input type="text" wire:model="correo" class="form-control" name="correo" id="correo"
                            placeholder="Email.">
                        @error('correo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

        </div>

        <div class="mb-3 row d-flex align-items-center">
            <button wire:click="submit()" type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

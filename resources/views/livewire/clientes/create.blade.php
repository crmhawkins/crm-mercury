<div class="container mx-auto">
    <form wire:submit.prevent="submit">
        <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
        @mobile
        <div class="row justify-content-center">
            <div class="col">
                <div class="card mb-3">
                    <h5 class="card-header">
                        Add customer data
                    </h5>
                    <div class="card-body">
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="nombre" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="nombre" class="form-control"
                                    name="nombre" id="nombre"
                                    placeholder="Customer name">
                                @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="apellidos" class="col-sm-2 col-form-label">Surnames</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="apellido" class="form-control"
                                    name="apellidos" id="apellidos"
                                    placeholder="Client's last name">
                                @error('apellido')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="dni" class="col-sm-2 col-form-label">DNI / NIF</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="dni" class="form-control" name="dni"
                                    id="dni" placeholder="Client Dni (ex; 12345678A)">
                                @error('dni')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="telefono" class="col-sm-2 col-form-label">Telephone</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="telefono" class="form-control" name="telefono"
                                    id="telefono" placeholder="Client telephone (ej; 123456789)">
                                @error('telefono')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 row d-flex align-items-center">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="email" class="form-control" name="email"
                                    id="email" placeholder="client email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="direccion" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="direccion" class="form-control" name="direccion"
                                    id="direccion" placeholder="Client address">
                                @error('direccion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="direccion" class="col-sm-2 col-form-label">Search</label>
                            <div class="col-sm-10">
                                <select class="form-select" wire:model="busqueda" name="busqueda" id="busqueda">
                                    <option value="">-- Select --</option>
                                    <option value="Compra">Buy</option>
                                    <option value="Alquiler">Rent</option>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3 row d-flex align-items-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        @elsemobile
        <div class="row justify-content-center">
            <div class="col">
                <div class="card mb-3" style="max-width: 90rem">
                    <h5 class="card-header">
                        Add customer data
                    </h5>
                    <div class="card-body">
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="nombre" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="nombre" class="form-control"
                                    name="nombre" id="nombre"
                                    placeholder="Name">
                                @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="apellidos" class="col-sm-2 col-form-label">Surnames</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="apellido" class="form-control"
                                    name="apellidos" id="apellidos"
                                    placeholder="Surnames">
                                @error('apellido')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="dni" class="col-sm-2 col-form-label">DNI / NIF</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="dni" class="form-control" name="dni"
                                    id="dni" placeholder="Client dni (ex; 12345678A)">
                                @error('dni')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="telefono" class="col-sm-2 col-form-label">Telephone</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="telefono" class="form-control" name="telefono"
                                    id="telefono" placeholder="Telephone (ex; 123456789)">
                                @error('telefono')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 row d-flex align-items-center">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="email" class="form-control" name="email"
                                    id="email" placeholder="Email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="direccion" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="direccion" class="form-control" name="direccion"
                                    id="direccion" placeholder="Address">
                                @error('direccion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="busqueda" class="col-sm-2 col-form-label">Búsqueda</label>
                            <div class="col-sm-10">
                                <select class="form-select" wire:model="busqueda" name="busqueda" id="busqueda">
                                    <option value="">-- Select --</option>
                                    <option value="Compra">Buy</option>
                                    <option value="Alquiler">Rent</option>
                                </select>
                                @error('busqueda')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>

           
        </div>
        <div class="mb-3 row d-flex align-items-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        @endmobile
    </form>
</div>

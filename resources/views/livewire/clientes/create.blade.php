<div class="container mx-auto">
    <form wire:submit.prevent="submit">
        <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
        @mobile
        <div class="row justify-content-center">
            <div class="col">
                <div class="card mb-3">
                    <h5 class="card-header">
                        Añadir datos del cliente
                    </h5>
                    <div class="card-body">
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="nombre" class="form-control"
                                    name="nombre" id="nombre"
                                    placeholder="Nombre del cliente">
                                @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="apellido" class="form-control"
                                    name="apellidos" id="apellidos"
                                    placeholder="Apellidos del cliente">
                                @error('apellido')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="dni" class="col-sm-2 col-form-label">DNI / NIF</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="dni" class="form-control" name="dni"
                                    id="dni" placeholder="Documento de identidad del cliente (ej; 12345678A)">
                                @error('dni')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="telefono" class="form-control" name="telefono"
                                    id="telefono" placeholder="Teléfono del cliente (ej; 123456789)">
                                @error('telefono')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 row d-flex align-items-center">
                            <label for="email" class="col-sm-2 col-form-label">Correo electrónico</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="email" class="form-control" name="email"
                                    id="email" placeholder="Correo electrónico del cliente (ej; 12345678A)">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="direccion" class="form-control" name="direccion"
                                    id="direccion" placeholder="Dirección del cliente ">
                                @error('direccion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="direccion" class="col-sm-2 col-form-label">Búsqueda</label>
                            <div class="col-sm-10">
                                <select class="form-select" wire:model="busqueda" name="busqueda" id="busqueda">
                                    <option value="">-- seleccione --</option>
                                    <option value="compra">Compra</option>
                                    <option value="alquiler">Alquiler</option>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3 row d-flex align-items-center">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        @elsemobile
        <div class="row justify-content-center">
            <div class="col">
                <div class="card mb-3" style="max-width: 90rem">
                    <h5 class="card-header">
                        Añadir datos del cliente
                    </h5>
                    <div class="card-body">
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="nombre" class="form-control"
                                    name="nombre" id="nombre"
                                    placeholder="Nombre del cliente">
                                @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="apellido" class="form-control"
                                    name="apellidos" id="apellidos"
                                    placeholder="Apellidos del cliente">
                                @error('apellido')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="dni" class="col-sm-2 col-form-label">DNI / NIF</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="dni" class="form-control" name="dni"
                                    id="dni" placeholder="Documento de identidad del cliente (ej; 12345678A)">
                                @error('dni')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="telefono" class="form-control" name="telefono"
                                    id="telefono" placeholder="Teléfono del cliente (ej; 123456789)">
                                @error('telefono')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 row d-flex align-items-center">
                            <label for="email" class="col-sm-2 col-form-label">Correo electrónico</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="email" class="form-control" name="email"
                                    id="email" placeholder="Correo electrónico del cliente (ej; 12345678A)">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="direccion" class="form-control" name="direccion"
                                    id="direccion" placeholder="Dirección del cliente">
                                @error('direccion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="busqueda" class="col-sm-2 col-form-label">Búsqueda</label>
                            <div class="col-sm-10">
                                <select class="form-select" wire:model="busqueda" name="busqueda" id="busqueda">
                                    <option value="">-- seleccione --</option>
                                    <option value="compra">Compra</option>
                                    <option value="alquiler">Alquiler</option>
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
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        @endmobile
    </form>
</div>

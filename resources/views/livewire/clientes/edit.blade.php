<div class="container mx-auto">
    <form wire:submit.prevent="">
        <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
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
                                    name="apellido" id="apellido"
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
                                    id="dni" placeholder="DNI (ex; 12345678A)">
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
                            <label for="busqueda" class="col-sm-2 col-form-label">Search</label>
                            <div class="col-sm-10">
                                <select class="form-select" wire:model="busqueda" name="busqueda" id="busqueda">
                                    <option value="">-- Search --</option>
                                    <option value="Alquiler">Rent</option>
                                    <option value="Compra">Buy</option>
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
        
        <div class="mb-3 row d-flex align-items-center gap-2">
            <button type="submit" class="btn btn-primary" wire:click="update()">Save</button>
            <button type="button" class="btn btn-danger" wire:click="destroy()">Delete</button>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card mb-3">
                    <h5 class="card-header">
                        Properties visited
                    </h5>
                    <div class="card-body">
                        <div class="row justify-content-center">
                           @if(count($visita_inmueble) > 0)
                                @foreach ($visita_inmueble as $item )
                                    @if(isset($item['visita']) && isset($item['inmueble']) && count($item['visita']) > 0 && count($item['inmueble']) > 0)
                                        <div class="col-md-4 mb-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title"> {{ $this->formatearFecha($item['visita']['fecha']) }}</h5>
                                                    <p class="card-text">
                                                        <strong>Address:</strong> {{ $item['inmueble']['direccion'] }} - {{ $item['inmueble']['localidad']; }} , {{ $item['inmueble']['cod_postal']; }}<br>
                                                        <strong>Square meter:</strong> <?php echo $item['inmueble']['m2']; ?> m²<br>
                                                        <strong>Bedrooms:</strong> {{ $item['inmueble']['habitaciones'] }}<br>
                                                        <strong>Availability:</strong> {{$item['inmueble']['disponibilidad'] }} <br>
                                                    </p>
                                                    <a href="/{{ $item['visita']['ruta'] }}" class="btn btn-primary" target="_blank">See visit document</a>
                                                    <a href="inmuebles?idinmueble={{ $item['inmueble']['id'] }}" class="btn btn-secondary" >See property</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                           @endif
                        </div>
                       

                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card mb-3">
                    <h5 class="card-header">
                        Properties mailed
                    </h5>
                    <div class="card-body">
                        <div class="row justify-content-center">
                           @if(count($visita_inmueble) > 0)
                                @foreach ($mailed_inmueble as $item )
                                    
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"> {{ $this->formatearFecha($item['visita']['fecha']) }}</h5>
                                            <p class="card-text">
                                                <strong>Address:</strong> {{ $item['inmueble']['direccion'] }} - {{ $item['inmueble']['localidad']; }} , {{ $item['inmueble']['cod_postal']; }}<br>
                                                <strong>Square meter:</strong> <?php echo $item['inmueble']['m2']; ?> m²<br>
                                                <strong>Bedrooms:</strong> {{ $item['inmueble']['habitaciones'] }}<br>
                                                <strong>Availability:</strong> {{$item['inmueble']['disponibilidad'] }} <br>
                                            </p>
                                            <a href="inmuebles?idinmueble={{ $item['inmueble']['id'] }}" class="btn btn-secondary" >See property</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                           @endif
                        </div>
                       

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="container mx-auto">
    <form wire:submit.prevent="">
        <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
        <div class="card mb-3">
            <h5 class="card-header">
                Editar Propietario
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
        <div class="row justify-content-center">
            <div class="col">
                <div class="card mb-3">
                    <h5 class="card-header">
                        Propiedades del propietario
                    </h5>
                    <div class="card-body">
                        <div class="row justify-content-center">
                           
                            @foreach ($inmuebles as $inmueble)
                                @php
                                    $imagen = null;
                                    $imagenes = json_decode($inmueble->galeria, true); // Agregamos true para obtener un array asociativo
                                @endphp
                                <div class="col-4">
                                    <div class="card" style="width: 18rem; min-height: 350px; display:grid; grid-template-rows: 200px 1fr; gap: 10px;">
                                        @if($imagenes != null && count($imagenes) > 0)
                                            @php($imagen = $imagenes[1])
                                            <img src="{{ $imagen }}" class="card-img-top mb-2" width="100%" height="200px" alt="Imagen del inmueble" style="object-fit: cover">
                                        @endif
                                        <div class="" style="display: grid; grid-template-rows: 1fr 1fr 1fr;">
                                            <h5 class="card-title text-center">{{ $inmueble->direccion }}</h5>
                                            @if($inmueble->disponibilidad == 'Venta')
                                                <small class="badge text-dark">{{ $inmueble->precio_venta }} €</small>
                                            @else
                                                <small class="badge text-dark">{{ $inmueble->alquiler_mes }} €/mes</small>
                                                <small class="badge text-dark">{{ $inmueble->alquiler_semana }} €/semana</small>
                                            @endif
                                            <a href="/admin/inmuebles?idinmueble={{ $inmueble->id }}" class="btn btn-primary" style="align-self: end">Ver</a>
                                        </div>
                                        <div class="@if($inmueble->disponibilidad == "Venta") bg-warning @else bg-success @endif p-1 rounded text-light"  style="position:absolute; top:10px; right:10px;  ">
                                            <small class="fw-bold">{{ $inmueble->disponibilidad }}</small>
                                        </div>
                                        <div class="bg-dark p-1 rounded text-light"  style="position:absolute; top:10px; left:10px;">
                                            <small class="fw-bold">{{ $inmueble->localidad }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
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

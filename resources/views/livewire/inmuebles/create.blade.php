<div class="container mx-auto">
    <form wire:submit.prevent="submit">
        <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
        <div class="row justify-content-center">
            
            <div class="col">
                <div class="card mb-3" style="max-width: 40rem">
                    <h5 class="card-header">
                        Property details
                    </h5>
                    <div class="card-body">
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="direccion" class="col-sm-3 col-form-label"> <strong>Address</strong></label>
                            <div class="col-sm-12">
                                <input type="text" wire:model="direccion" class="form-control" name="direccion"
                                    id="direccion" placeholder="Address">
                                @error('direccion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="localidad" class="col-sm-3 col-form-label"> <strong>Location</strong></label>
                            <div class="col-sm-12">
                                <textarea wire:model="localidad" rows=3 class="form-control" name="localidad" id="localidad"
                                    placeholder="Location"></textarea>
                                @error('localidad')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="cod_postal" class="col-sm-3 col-form-label"> <strong>Postal Code
                            </strong></label>
                            <div class="col-sm-12">
                                <input type="number" wire:model="cod_postal" class="form-control" name="cod_postal"
                                    id="cod_postal" placeholder="Postal Code">
                                @error('ubicacion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="cod_postal" class="col-sm-3 col-form-label"> <strong>Type of property
                            </strong></label>
                            <div class="col-sm-12">
                                <select wire:model="tipo_inmueble" class="form-control" name="tipo_inmueble" id="tipo_inmueble">
                                    <option value="">-- Choose a property type --</option>
                                    @foreach ($tipos as $tipo)
                                        <option value={{ $tipo->nombre }}>
                                            {{ $tipo->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tipo_inmueble')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="estado" class="col-sm-3 col-form-label"> <strong>Status</strong></label>
                            <div class="col-sm-12">
                                <select wire:model="estado" class="form-control" name="estado" id="estado">
                                    <option value="Disponible" selected>Available</option>
                                    <option value="Alquilado">Rented</option>
                                    <option value="Vendido">Sold</option>
                                </select>
                                @error('estado')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="estado" class="col-sm-3 col-form-label"> <strong>Description</strong></label>
                            <div class="col-sm-12">
                                <textarea wire:model="descripcion" rows=3 class="form-control" name="descripcion"
                                    id="descripcion" placeholder="Description"></textarea>
                                @error('descripcion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-3" style="max-width: 40rem">
                    <h5 class="card-header">
                        Monetary data
                    </h5>
                    <div class="card-body">
                        
                        
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="ibi" class="col-sm-3 col-form-label"> <strong>IBI</strong></label>
                            <div class="col-sm-12">
                                <input type="text" wire:model="ibi" class="form-control" name="ibi"
                                    id="ibi" placeholder="IBI del inmueble">
                                @error('ibi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="coste_basura" class="col-sm-3 col-form-label"> <strong>Garbage Cost</strong></label>
                            <div class="col-sm-12">
                                <input type="text" wire:model="coste_basura" class="form-control" name="coste_basura"
                                    id="coste_basura" placeholder="Garbage Cost">
                                @error('coste_basura')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="precio" class="col-sm-3 col-form-label"> <strong>Sale price</strong></label>
                            <div class="col-sm-12">
                                <input type="text" wire:model="precio_venta" class="form-control" name="precio"
                                    id="precio" placeholder="Price">
                                @error('precio_venta')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="precio" class="col-sm-4 col-form-label"> <strong>Daily rental price</strong></label>
                            <div class="col-sm-12">
                                <input type="text" wire:model="daily_rental_price" class="form-control" name="daily_rental_price"
                                    id="daily_rental_price" placeholder="Daily rental Price">
                                @error('daily_rental_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="precio" class="col-sm-4 col-form-label"> <strong>Weekly rental price</strong></label>
                            <div class="col-sm-12">
                                <input type="text" wire:model="alquiler_semana" class="form-control" name="precio"
                                    id="alquiler_semana" placeholder="Weekly rental price">
                                @error('alquiler_semana')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="precio" class="col-sm-4 col-form-label"> <strong>Monthly rental price</strong></label>
                            <div class="col-sm-12">
                                <input type="text" wire:model="alquiler_mes" class="form-control" name="precio"
                                    id="alquiler_mes" placeholder="Monthly rental price">
                                @error('alquiler_mes')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        

                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card mb-3" style="max-width: 40rem">
                    <h5 class="card-header">
                        Property characteristics
                    </h5>
                    <div class="card-body">
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="m2" class="col-sm-1 col-form-label">
                                <strong>M<sup>2</sup></strong></label>
                            <div class="col">
                                <input type="text" wire:model="m2" class="form-control" name="m2" id="m2"
                                    placeholder="m2">
                                @error('m2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <label for="m2_construidos" class="col-sm-3 col-form-label"
                                style="margin-right: -30px;"><strong>M<sup>2</sup> built
                                </strong></label>
                            <div class="col">
                                <input type="text" wire:model="m2_construidos" class="form-control"
                                    name="m2_construidos" id="m2_construidos"
                                    placeholder="m2 built">
                                @error('m2_construidos')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="habitaciones" class="col-sm-3 col-form-label">
                                <strong>Rooms</strong></label>
                            <div class="col-sm-12">
                                <input type="number" wire:model="habitaciones" class="form-control"
                                    name="habitaciones" id="habitaciones" placeholder="Rooms">
                                @error('habitaciones')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="dormitorios" class="col-sm-3 col-form-label"> <strong>Bedrooms</strong></label>
                            <div class="col-sm-12">
                                <input type="number" wire:model="dormitorios" class="form-control" name="dormitorios"
                                    id="dormitorios" placeholder="Bedrooms">
                                @error('dormitorios')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="banos" class="col-sm-3 col-form-label"> <strong>Bathrooms</strong></label>
                            <div class="col-sm-12">
                                <input type="number" wire:model="banos" class="form-control" name="banos"
                                    id="banos" placeholder="Bathrooms">
                                @error('banos')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="garaje" class="col-sm-3 col-form-label"> <strong>Garage</strong></label>
                            <div class="col-sm-12">
                                <select wire:model="garaje" class="form-control" name="garaje" id="garaje">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                @error('garaje')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="piscina" class="col-sm-3 col-form-label"> <strong>Pool</strong></label>
                            <div class="col-sm-12">
                                <select wire:model="piscina" class="form-control" name="piscina" id="piscina">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                @error('piscina')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="disponibilidad" class="col-sm-3 col-form-label">
                                <strong>Availability</strong></label>
                            <div x-data="" x-init="$('#select2-disponibilidad-create').select2();
                            $('#select2-disponibilidad-create').on('change', function(e) {
                                var data = $('#select2-disponibilidad-create').select2('val');
                                @this.set('disponibilidad', data);
                                console.log(data);
                            });">
                                <div class="col" wire:ignore>
                                    <select class="form-control" id="select2-disponibilidad-create">
                                        <option value="">-- Property availability --</option>
                                        <option value="Alquiler">Property for rent</option>
                                        <option value="Venta">Property for sale</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-3" style="max-width: 40rem;">
                    <h5 class="card-header">
                        Owner
                    </h5>
                    <div class="card-body">
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="propietario" class="col-sm-3 col-form-label">
                                <strong>Owner:</strong></label>
                            <div x-data="" x-init="$('#select2-vendedor-create').select2();
                            $('#select2-vendedor-create').on('change', function(e) {
                                var data = $('#select2-vendedor-create').select2('val');
                                @this.set('propietario_id', data);
                                console.log(data);
                            });">
                                <div class="col" wire:ignore>
                                    <select class="form-control" id="select2-vendedor-create">
                                        <option value="">-- Choose an owner --</option>
                                        @foreach ($propietarios as $propietario)
                                            <option value={{ $propietario->id }}>
                                                {{ $propietario->nombre }} - {{ $propietario->dni }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="nombre" class="col-sm-3 col-form-label"> <strong>Name</strong></label>
                            <div class="col-sm-12">
                                <input type="text" disabled wire:model="propietario_nombre" class="form-control"
                                    name="propietario_nombre" id="propietario_nombre" placeholder="Name">
                                @error('propietario_nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="propietario_apellidos" class="col-sm-3 col-form-label"> <strong>Surnames</strong></label>
                            <div class="col-sm-12">
                                <input type="text" disabled wire:model="propietario_apellidos" class="form-control"
                                    name="propietario_apellidos" id="propietario_apellidos" placeholder="Surnames">
                                @error('propietario_apellidos')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="titulo" class="col-sm-3 col-form-label"> <strong>DNI</strong></label>
                            <div class="col-sm-12">
                                <input type="text" disabled wire:model="propietario_dni" class="form-control"
                                    name="propietario_dni" id="propietario_dni" placeholder="DNI">
                                @error('propietario_dni')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="propietario_telefono" class="col-sm-3 col-form-label">
                                <strong>Telephone</strong></label>
                            <div class="col-sm-12">
                                <input type="text" disabled wire:model="propietario_telefono" class="form-control"
                                    name="propietario_telefono" id="propietario_telefono" placeholder="Telephone">
                                @error('propietario_telefono')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="propietario_correo" class="col-sm-3 col-form-label"> <strong>Email</strong></label>
                            <div class="col-sm-12">
                                <input type="text" disabled wire:model="propietario_correo" class="form-control"
                                    name="propietario_correo" id="propietario_correo" placeholder="Email">
                                @error('propietario_correo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col">
                <div class="card mb-3" style="max-width: 40rem">
                    <h5 class="card-header">
                        Add image to gallery
                    </h5>
                    <div class="card-body text-center">
                        @if (!empty($ruta_imagenes))
                            @if(strpos($this->ruta_imagenes, ',') !== false)
                                @php
                                    $ruta_imagenes = explode(',', $this->ruta_imagenes);
                                @endphp
                                <div class="d-flex gap-1">
                                    @foreach ($ruta_imagenes as $imagen)
                                        <img src="{{ $imagen }}" style="max-width: 100px; max-height: 100px; object-fit: cover;"
                                            class="self-center">
                                    @endforeach
                                </div>
                            @else

                                <img src="{{ $ruta_imagenes }}" style="max-width: 50%; max-height: 50%"
                                    class="self-center">
                            @endif
                        @endif

                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                    class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Select image
                                </a>
                            </span>
                            <input id="thumbnail" name="ruta_imagenes" wire:model="ruta_imagenes"
                                class="form-control" type="text">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;margin-bottom:5px;">
                        @if (!empty($ruta_imagenes))
                            <button class="btn btn-primary w-100 mt-3" wire:click.prevent="addGaleria">Add to gallery</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-3" style="max-width: 20rem">
                    <h5 class="card-header">
                        Gallery
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($galeriaArray as $imagenIndex => $imagen)
                                <div class="col-6 mb-5"><img src="{{ $imagen }}" width="100%"
                                        height="100%"> <button class="btn btn-sm btn-danger"
                                        wire:click.prevent="eliminarImagen('{{ $imagenIndex }}')">X</button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

        <script>
            
            $('#lfm').on('click', function() {
                var route_prefix = '/laravel-filemanager' || '';
                var type = $(this).data('type') || 'images';
                var target_input = document.getElementById('thumbnail');

                window.open(route_prefix + '?type=' + type || 'file', 'FileManager',
                    'width=900,height=600');
                window.SetUrl = function(items) {
                    var file_path = items.map(function(item) {
                        return item.url;
                    }).join(',');

                    // set the value of the desired input to image url
                    target_input.value = file_path;
                    target_input.dispatchEvent(new Event('input'));

                    // trigger change event
                    window.livewire.emit('fileSelected', file_path);
                };
                return false;
            });
        </script>
        <div class="mb-5 row d-flex align-items-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

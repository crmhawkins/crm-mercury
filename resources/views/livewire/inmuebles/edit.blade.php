<div class="container mx-auto">
    <form wire:submit.prevent="">
        <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card mb-3" style="max-width: 40rem">
                    <h5 class="card-header">
                        Datos del Inmueble
                    </h5>
                    <div class="card-body">
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="titulo" class="col-sm-3 col-form-label"> <strong>Dirección</strong></label>
                            <div class="col-sm-12">
                                <input type="text" wire:model="direccion" class="form-control" name="direccion"
                                    id="direccion" placeholder="direccion">
                                @error('direccion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="localidad" class="col-sm-3 col-form-label"> <strong>Localidad</strong></label>
                            <div class="col-sm-12">
                                <textarea wire:model="localidad" rows=3 class="form-control" name="localidad" id="localidad"
                                    placeholder="Localidad"></textarea>
                                @error('localidad')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="cod_postal" class="col-sm-3 col-form-label"> <strong>Código
                                    postal</strong></label>
                            <div class="col-sm-12">
                                <input type="number" wire:model="cod_postal" class="form-control" name="cod_postal"
                                    id="cod_postal" placeholder="Código postal del inmueble">
                                @error('ubicacion')
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
                        Datos monetarios
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
                            <label for="coste_basura" class="col-sm-3 col-form-label"> <strong>Coste Basura</strong></label>
                            <div class="col-sm-12">
                                <input type="text" wire:model="coste_basura" class="form-control" name="coste_basura"
                                    id="coste_basura" placeholder="IBI del inmueble">
                                @error('coste_basura')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="precio" class="col-sm-3 col-form-label"> <strong>Precio</strong></label>
                            <div class="col-sm-12">
                                <input type="text" wire:model="precio_venta" class="form-control" name="precio"
                                    id="precio" placeholder="Precio del inmueble">
                                @error('precio_venta')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="precio" class="col-sm-4 col-form-label"> <strong>Precio alquiler semana</strong></label>
                            <div class="col-sm-12">
                                <input type="text" wire:model="alquiler_semana" class="form-control" name="precio"
                                    id="alquiler_semana" placeholder="Alquiler a la semana">
                                @error('alquiler_semana')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row d-flex align-items-center">
                            <label for="precio" class="col-sm-4 col-form-label"> <strong>Precio alquiler mes</strong></label>
                            <div class="col-sm-12">
                                <input type="text" wire:model="alquiler_mes" class="form-control" name="precio"
                                    id="alquiler_mes" placeholder="Alquiler al mes">
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
                        Características del inmueble
                    </h5>
                    <div class="card-body">
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="m2" class="col-sm-1 col-form-label">
                                <strong>M<sup>2</sup></strong></label>
                            <div class="col">
                                <input type="text" wire:model="m2" class="form-control" name="m2" id="m2"
                                    placeholder="m2 del inmueble">
                                @error('m2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <label for="m2_construidos" class="col-sm-3 col-form-label"
                                style="margin-right: -30px;"><strong>M<sup>2</sup> construidos
                                </strong></label>
                            <div class="col">
                                <input type="text" wire:model="m2_construidos" class="form-control"
                                    name="m2_construidos" id="m2_construidos"
                                    placeholder="m2 construidos">
                                @error('m2_construidos')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="habitaciones" class="col-sm-3 col-form-label">
                                <strong>Habitaciones</strong></label>
                            <div class="col-sm-12">
                                <input type="number" wire:model="habitaciones" class="form-control"
                                    name="habitaciones" id="habitaciones" placeholder="Habitaciones del inmueble">
                                @error('habitaciones')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="dormitorios" class="col-sm-3 col-form-label"> <strong>Dormitorios</strong></label>
                            <div class="col-sm-12">
                                <input type="number" wire:model="dormitorios" class="form-control" name="dormitorios"
                                    id="dormitorios" placeholder="Dormitorios del inmueble">
                                @error('dormitorios')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="banos" class="col-sm-3 col-form-label"> <strong>Baños</strong></label>
                            <div class="col-sm-12">
                                <input type="number" wire:model="banos" class="form-control" name="banos"
                                    id="banos" placeholder="Baños del inmueble">
                                @error('banos')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="garaje" class="col-sm-3 col-form-label"> <strong>Garaje</strong></label>
                            <div class="col-sm-12">
                                <select wire:model="garaje" class="form-control" name="garaje" id="garaje">
                                    <option value="0">No</option>
                                    <option value="1">Sí</option>
                                </select>
                                @error('garaje')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="piscina" class="col-sm-3 col-form-label"> <strong>Piscina</strong></label>
                            <div class="col-sm-12">
                                <select wire:model="piscina" class="form-control" name="piscina" id="piscina">
                                    <option value="0">No</option>
                                    <option value="1">Sí</option>
                                </select>
                                @error('piscina')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="disponibilidad" class="col-sm-3 col-form-label">
                                <strong>Disponibilidad</strong></label>
                            <div>
                                <div class="col" >
                                    <select class="form-control" id="select2-disponibilidad-create" wire:model="disponibilidad">
                                        <option value="">-- Disponibilidad del inmueble --</option>
                                        <option value="Alquiler">Inmueble en alquiler</option>
                                        <option value="Venta">Inmueble en venta</option>
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
                        Propietario
                    </h5>
                    <div class="card-body">
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="propietario" class="col-sm-3 col-form-label">
                                <strong>Propietario:</strong></label>
                            <div>
                                <div class="col" wire:ignore>
                                    <select class="form-control" id="select2-vendedor-create" wire:model="propietario_id">
                                        <option value="">-- Elige un propietario --</option>
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
                            <label for="nombre" class="col-sm-3 col-form-label"> <strong>Nombre</strong></label>
                            <div class="col-sm-12">
                                <input type="text" disabled wire:model="propietario_nombre" class="form-control"
                                    name="propietario_nombre" id="propietario_nombre" placeholder="Nombre">
                                @error('propietario_nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="propietario_apellidos" class="col-sm-3 col-form-label"> <strong>Apellidos</strong></label>
                            <div class="col-sm-12">
                                <input type="text" disabled wire:model="propietario_apellidos" class="form-control"
                                    name="propietario_apellidos" id="propietario_apellidos" placeholder="Apellidos">
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
                                <strong>Teléfono</strong></label>
                            <div class="col-sm-12">
                                <input type="text" disabled wire:model="propietario_telefono" class="form-control"
                                    name="propietario_telefono" id="propietario_telefono" placeholder="Teléfono">
                                @error('propietario_telefono')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3 row d-flex align-items-center">
                            <label for="propietario_correo" class="col-sm-3 col-form-label"> <strong>Correo</strong></label>
                            <div class="col-sm-12">
                                <input type="text" disabled wire:model="propietario_correo" class="form-control"
                                    name="propietario_correo" id="propietario_correo" placeholder="Correo">
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
                        Añadir imagen a galería
                    </h5>
                    <div class="card-body">

                        @if (!empty($ruta_imagenes))
                            <img src="{{ $ruta_imagenes }}" style="max-width: 50%; max-height: 50%"
                                class="self-center">
                        @endif

                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                    class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Seleccionar imagen
                                </a>
                            </span>
                            <input id="thumbnail" name="ruta_imagenes" wire:model="ruta_imagenes"
                                class="form-control" type="text">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;margin-bottom:5px;">
                        @if (!empty($ruta_imagenes))
                            <button class="btn btn-primary" wire:click.prevent="addGaleria">Añadir a
                                galería</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-3" style="max-width: 20rem">
                    <h5 class="card-header">
                        Galería
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
        <div class="mb-3 row d-flex align-items-center gap-2">
            <button type="submit" class="btn btn-primary" wire:click="update()">Guardar</button>
            <button type="button" class="btn btn-danger" wire:click="destroy()">Eliminar</button>
        </div>
    </form>
</div>

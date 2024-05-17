<div class="container" style="max-width: max-content;">

    <form wire:submit.prevent="update">
        <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card mb-3">
                    <h5 class="card-header">
                        Datos del inmueble
                    </h5>
                    <div class="card-body">
                        <div class="row d-flex align-items-start">
                            <div class="col-6">
                                <h3>Datos básicos</h3>
                                </p>
                            </div>
                            <div class="col-6">
                                <h3>Datos de inmueble</h3>
                               
                            </div>
                            <div class="col-6">
                                <h3>Características de inmueble</h3>
                                <p><b>Habitaciones:</b> {{ $habitaciones }}<br>
                                    <b>Baños:</b> {{ $banos }}<br>
                                    <b>Disponibilidad:</b> {{ $disponibilidad }} <br>
                                     <br>
                                </p>
                            </div>
                            <div class="col-6">
                                <h3>Características de inmueble</h3>
                                <p><b>Propietario:</b>
                                    {{ $propietarios->where('id', $propietario_id)->first()->nombre }} 
                                    {{ $propietarios->where('id', $propietario_id)->first()->apellidos }}<br>
                                    <b>DNI:</b> {{ $propietarios->where('id', $propietario_id)->first()->dni }}<br>                                   
                                    <b>Teléfono:</b> {{ $propietarios->where('id', $propietario_id)->first()->telefono }}
                                    <br>
                                    <b>Correo:</b> {{ $propietarios->where('id', $propietario_id)->first()->correo }} <br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card mb-3">
                    <h5 class="card-header">
                        Galería
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($galeriaArray as $key => $imagen)
                                <div class="col-4">
                                    <div class="card">
                                        <img src="{{ $imagen }}" class="card-img-top" alt="Imagen del inmueble" width="100px" height="100px" style="object-fit: cover; width: 100%; height:150px;">
                                        <div class="card-body">
                                            @if (in_array($key, $imagenes_correo))
                                                <button type="button" class="btn btn-dark text-white"
                                                    id="check-{{ $key }}"
                                                    wire:click.prevent="deleteImagen({{ $key }})">X</button>
                                            @else
                                                <button type="button" class="btn btn-dark text-white"
                                                    id="check-{{ $key }}"
                                                    wire:click.prevent="addImagen({{ $key }})">Seleccionar
                                                    imagen</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <hr />

                        {{-- <h5>Seleccionar cliente</h5>
                        <div class="mb-3 row d-flex align-items-center">
                            <div x-data="" x-init="$('#select2-cliente-{{ $identificador }}').select2();
                            $('#select2-cliente-{{ $identificador }}').on('change', function(e) {
                                var data = $('#select2-cliente-{{ $identificador }}').select2('val');
                                @this.set('cliente_correo', data);
                                console.log(data);
                            });" wire:ignore>
                                <select class="form-control" id="select2-cliente-{{ $identificador }}">
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">
                                            {{ $cliente->nombre_completo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr />

                        <button type="button" class="btn btn-primary"
                            wire:click.prevent="enviarCorreoImagenes({{ $identificador }})"
                            id="enviarCorreoImagenes-{{ $identificador }}"
                            wire:key="btn-correo-imgs-{{ $identificador }}">Enviar
                            imágenes</button> --}}

                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            
            {{-- <div class="col-4">
                <div class="card mb-3">
                    <h5 class="card-header">
                        Contrato de arras
                    </h5>
                    <div class="card-body">
                        @livewire('inmuebles.contrato-create', ['inmueble_id' => $identificador], key(time() . $identificador))
                    </div>
                </div>
            </div> --}}
            <div class="col-6">
                <div class="card mb-3">
                    <h5 class="card-header">
                        Hojas de visita
                    </h5>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Crear
                                    nueva hoja de visita</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="true">Ver
                                    hojas ya creadas</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent" style="width: 100%;">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                @livewire('inmuebles.visita-create', ['inmueble_id' => $identificador], key(time() . 'inmueble-' . $identificador))

                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                @livewire('inmuebles.visita-index', ['inmueble_id' => $identificador], key(time() . 'inmueble-' . $identificador))
                            </div>
                        </div>
                    </div>
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
                </div>
            </div>
            <div class="col-6">
                <div class="card mb-3">
                    <h5 class="card-header">
                        Documentos
                    </h5>
                    <div class="card-body">
                        @livewire('inmuebles.documentos-create', ['inmueble_id' => $identificador], key(time() . $identificador))
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

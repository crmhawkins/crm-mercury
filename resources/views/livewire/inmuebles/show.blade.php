<div class="container" style="max-width: max-content;">
<style>
    #datos-inmueble {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1rem;
        justify-content: center;
    }
    form {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)) !important;
        gap: 1rem;
        justify-content: center;

    }
    .zoom {
        transition: transform .2s; /* Animation */
        width: 500px;
        height: 500px;
        margin: 0 auto;
        cursor: pointer; /* Add some hover effect */
    }

    .zoom:hover {
        z-index: 999;
        transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
</style>
    <form wire:submit.prevent="">
        <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card mb-3">
                    <h5 class="card-header">
                        Property details
                    </h5>
                    <div class="card-body">
                        @if($descripcion != null && $descripcion != '') 
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="mb-3 col-10">
                                    <p class="form-control">{{ $descripcion }}</p>
                                </div>  
                            </div>
                        @endif
                        
                        <div id="datos-inmueble" class="row ">
                            <div class="col-5 border rounded p-2">
                                <h6 class="fw-bold">Property details</h6>
                                <ul>
                                    <li><b>Reference:</b> {{ $reference_number }}</li>
                                    <li><b>Address:</b> {{ $direccion }}</li>
                                    <li><b>Location:</b> {{ $localidad }}</li>
                                    <li><b>Postal code:</b> {{ $cod_postal }}</li>
                                    <li><b>Availability:</b> {{ $disponibilidad }}</li>
                                    <li><b>Type of property:</b> {{ $tipo_inmueble }}</li>


                                </ul>
                            </div>
                            <div class="col-5 border rounded p-2">
                                <h6 class="fw-bold">Monetary data</h6>
                                <ul>
                                    <li><b>Ibi:</b> {{ $ibi }} €</li>
                                    <li><b>Garbage Cost:</b> {{ $coste_basura }} €</li>
                                    <li><b>Sale price:</b> {{ $precio_venta }} €</li>
                                    <li><b>Monthly rent:</b> {{ $alquiler_mes }} €</li>
                                    <li><b>Weekly Rental:</b> {{ $alquiler_semana }} €</li>
                                    <li><b>Daily Rental:</b> {{ $daily_rental_price }} €</li>

                                </ul>
                               
                            </div>
                            <div class="col-5 border rounded p-2">
                                <h6 class="fw-bold">Property characteristics</h6>
                                <ul>
                                    <li><b>Area:</b> {{ $m2 }} m<sup>2</sup></li>
                                    <li><b>Builded area:</b> {{ $m2_construidos }} m<sup>2</sup></li>
                                    <li><b>Rooms:</b> {{ $habitaciones }}</li>
                                    <li><b>Bedrooms:</b> {{ $dormitorios }}</li>
                                    <li><b>Bathrooms:</b> {{ $banos }}</li>
                                    
                                    <li><b>Garage:</b>@if($garaje === 0) No @else Sí @endif</li>
                                    <li><b>Pool:</b>@if($piscina === 0) No @else Sí @endif</li>
                                </ul>
                            </div>
                            <div class="col-5 border rounded p-2">
                                <h6 class="fw-bold underline">Owner</h6>
                                <ul>
                                    @if($propietario_id === null)
                                        <p>No owner assigned</p>
                                    @else
                                        <li><b>Name:</b> {{ $propietario_nombre }} {{ $propietario_apellidos }}</li>
                                        <li><b>DNI:</b> {{ $propietario_dni }}</li>
                                        <li><b>Telephone:</b> {{ $propietario_telefono }}</li>
                                        <li><b>Email:</b> {{ $propietario_correo }}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        Visiting sheets

                    </h5>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Add new visit sheet</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="true">View already created sheets</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent" style="width: 100%;">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                @livewire('inmuebles.visita-create', ['inmueble_id' => $identificador], key(rand() . 'inmueble-' . $identificador))

                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                @livewire('inmuebles.visita-index', ['inmueble_id' => $identificador], key(rand() . 'inmueble-' . $identificador))
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
            
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card mb-3">
                    <h5 class="card-header">
                        Gallery
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($galeriaArray as $key => $imagen)
                                <div class="col-4">
                                    <div class="card rounded">
                                        <img src="{{ $imagen }}" class="card-img-top rounded zoom" alt="Imagen del inmueble" width="100px" height="100px" style="object-fit: cover; width: 100%; height:150px;">
                                        {{-- <div class="card-body">
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
                                        </div> --}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <hr />

                        <h5>Select Customer</h5>
                        <div class="mb-3 row d-flex align-items-center">
                            <div x-data="" x-init="$('#select2-cliente-{{ $identificador }}').select2();
                            $('#select2-cliente-{{ $identificador }}').on('change', function(e) {
                                var data = $('#select2-cliente-{{ $identificador }}').select2('val');
                                var email = $('#select2-cliente-{{ $identificador }}').select2('data')[0].element.dataset.email;
                                @this.set('cliente_correo', email);

                                @this.set('cliente_id', data);


                                console.log(data);
                            });" wire:ignore>
                                <select class="form-control" id="select2-cliente-{{ $identificador }}">
                                    <option value="">Select Customer</option>
                                    @foreach ($clientes as $cliente)
                                        
                                        <option value="{{ $cliente->id }}" data-email="{{ $cliente->email }}">
                                            {{ $cliente->nombre . ' ' . $cliente->apellido}} - {{ $cliente->email }} @if($inmueblesRecibidos->where('cliente_id', $cliente->id)->where('inmueble_id', $identificador)->count() > 0) *already received* @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr />

                        <button type="button" class="btn btn-primary"
                            wire:click.prevent="enviarCorreoImagenes({{ $identificador }})"
                            id="enviarCorreoImagenes-{{ $identificador }}"
                            wire:key="btn-correo-imgs-{{ rand() }}">Send
                            Email</button>
                        <button type="button" class="btn btn-secondary" wire:click.prevent="registerMailed({{ $identificador }})">Just register</button>

                    </div>
                </div>
            </div>
            
            <div class="col-6">
                <div class="card mb-3">
                    <h5 class="card-header">
                        Documents
                    </h5>
                    <div class="card-body">
                        @livewire('inmuebles.documentos-create', ['inmueble_id' => $identificador], key(rand() . $identificador))
                    </div>
                </div>
                <div class="card mb-3">
                    <h5 class="card-header">
                        Create Window Card
                    </h5>
                    <div class="card-body">
                        <label for="title" >Widow Card Title</label>
                        <input type="text" placeholder="Rental opportunity..." wire:model="widowCardTitle" class="form-control mb-2 mt-2">
                        <a target="blank_" href="{{ route('inmuebles.generar', ['id' => $identificador , 'title' => $widowCardTitle ]) }}" class="btn btn-primary">Generate</a>
                        <a target="blank_" href="{{ route('inmuebles.generar2', ['id' => $identificador, 'withLogo' => 1 , 'title' => $widowCardTitle]) }}" class="btn btn-primary">Generate with logo</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

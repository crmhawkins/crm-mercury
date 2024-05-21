<div class="container-fluid" wire:key="index">
    <style>
        .swiper {
            width: 600px;
            height: 300px;
        }

        .accordion-button .collapsed {
            color: #a0a0a0;
        }

        .accordion-button {
            color: #333333;
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-2">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="fw-bold">Filtros de búsqueda</h5>
                    <div class="mb-3 row d-flex align-items-center">
                        <h6 class="fw-bold"> Ubicación </h6>
                        <input type="text" wire:model="ubicacion">
                    </div>
                    @if (is_array($opcionesPrecio) && !empty($opcionesPrecio))
                        <div class="mb-3 row d-flex align-items-center">
                            <h6 class="fw-bold"> Precio/venta </h6>

                            <div class="col-6">
                                <select wire:model="valor_venta_min" class="w-100">
                                    <option value="1">Mínimo</option>
                                    @foreach ($opcionesPrecio as $opcion)
                                        <option value="{{ $opcion }}">{{ $opcion }} €</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <select wire:model="valor_venta_max" class="w-100">
                                    @foreach ($opcionesPrecio as $opcion)
                                        <option value="{{ $opcion }}">{{ $opcion }} €</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if (is_array($opcionesTamano) && !empty($opcionesTamano))
                        <div class="mb-3 row d-flex align-items-center">
                            <h6 class="fw-bold"> Metros cuadrados</h6>
                            <div class="col-6">
                                <select wire:model="m2_min" class="w-100">
                                    <option value="1">Mínimo</option>
                                    @foreach ($opcionesTamano as $opcion)
                                        <option value="{{ $opcion }}">{{ $opcion }} m<sup>2</sup></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <select wire:model="m2_max" class="w-100">
                                    @foreach ($opcionesTamano as $opcion)
                                        <option value="{{ $opcion }}">{{ $opcion }} m<sup>2</sup></option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    <div class="mb-3 row d-flex align-items-center">
                        <h6 class="fw-bold"> Habitaciones </h6>
                        <label>
                            <input type="checkbox" wire:model="habitacionesSeleccionadas" value=0>
                            0 habitaciones (estudios)
                        </label>
                        <label>
                            <input type="checkbox" wire:model="habitacionesSeleccionadas" value=1>
                            1
                        </label>
                        <label>
                            <input type="checkbox" wire:model="habitacionesSeleccionadas" value=2>
                            2
                        </label>
                        <label>
                            <input type="checkbox" wire:model="habitacionesSeleccionadas" value=3>
                            3
                        </label>
                        <label>
                            <input type="checkbox" wire:model="habitacionesSeleccionadas" value=4>
                            4 habitaciones o más
                        </label>
                    </div>
                    <div class="mb-3 row d-flex align-items-center">
                        <h6 class="fw-bold"> Baños </h6>
                        <label>
                            <input type="checkbox" wire:model="banosSeleccionados" value=1>
                            1
                        </label>
                        <label>
                            <input type="checkbox" wire:model="banosSeleccionados" value=2>
                            2
                        </label>
                        <label>
                            <input type="checkbox" wire:model="banosSeleccionados" value=3>
                            3 baños o más
                        </label>
                    </div>
                    {{-- <div class="mb-3 row d-flex align-items-center">
                        <h6> Estado </h6>
                        <label>
                            <input type="checkbox" wire:model="estadoSeleccionados" value="Obra nueva">
                            Obra nueva
                        </label>
                        <label>
                            <input type="checkbox" wire:model="estadoSeleccionados" value="Buen estado">
                            Buen estado
                        </label>
                        <label>
                            <input type="checkbox" wire:model="estadoSeleccionados" value="A reformar">
                            A reformar
                        </label>
                    </div> --}}
                    <div class="mb-3 row d-flex align-items-center">
                        <h6 class="fw-bold"> Disponibilidad </h6>
                        <label>
                            <input type="checkbox" wire:model="disponibilidad_seleccionados" value="Alquiler">
                            En alquiler
                        </label>
                        <label>
                            <input type="checkbox" wire:model="disponibilidad_seleccionados" value="Venta">
                            A la venta
                        </label>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <div class="col-1"> &nbsp; </div>
        <div class="col">
            @if ($inmuebles->count() > 0)
                @foreach ($inmuebles as $inmueble)
                    <div class="card mb-3" style="width: 60rem;">
                        <div class="row g-0">
                            <div class="col-md-3">
                                <img src="{{ json_decode($inmueble->galeria, true)[1] }}" width="200px" height="270px"
                                    class="rounded-start" alt="..." style="object-fit: cover; width: 200px; height: 270px;">
                            </div>
                            <div class="col-md-9" style="position:relative; min-height: 270px;">
                                <div style="position: absolute; top:10px; right:10px;">
                                    <span class="badge bg-dark" ><i class="fa-solid fa-location-dot"></i> {{ $inmueble->localidad }} , {{ $inmueble->cod_postal }}</span>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title d-flex gap-1 align-items-center"><span class="fw-bold">{{ $inmueble->direccion }}</span> @if($inmueble->disponibilidad == "Alquiler")
                                                                                        <span class="badge badge-danger text-white bg-success" style="font-size: 0.9rem">Alquiler</span> 
                                                                                    @elseif($inmueble->disponibilidad == "Venta") 
                                                                                        <span class="badge badge-danger text-white bg-warning" style="font-size: 0.9rem">Venta</span> 
                                                                                    @endif
                                    </h4>
                                    <br>
                                <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center" style="width: 90%">
                                    <div>
                                        <h6 class="card-title" style="font-size: 1.2rem;">
                                            @if($inmueble->disponibilidad == "Alquiler")
                                                <span>{{ $inmueble->alquiler_mes }} €/mes</span> <br>
                                                <span>{{ $inmueble->alquiler_semana }} €/semana </span>
                                            @elseif($inmueble->disponibilidad == "Venta")
                                                {{ $inmueble->precio_venta }} €
                                            @endif
    
                                        </h6>
                                    </div>
                                    <div class="bg-light p-2 rounded" style="width: fit-content">
                                        <h5 class="card-title" style="font-size: 1rem; margin-bottom: 15px;">
                                            <i class="fa-solid fa-house"></i> {{ $inmueble->habitaciones }} hab. &nbsp; 
                                            <i class="fa-solid fa-bath"></i> {{ $inmueble->banos }} baños &nbsp; 
                                            <i class="fa-solid fa-bed"></i> {{ $inmueble->dormitorios }} dorm. &nbsp;
                                            <br>
                                            <br>
                                            @if(isset($inmueble->piscina) && $inmueble->piscina == 1)
                                            <i class="fa-solid fa-swimming-pool"></i> Piscina <i class="fa-solid fa-square-check text-success"></i>
                                            @endif
                                            @if(isset($inmueble->garaje) && $inmueble->garaje == 1)
                                            &nbsp; <i class="fa-solid fa-warehouse"></i> Garaje <i class="fa-solid fa-square-check text-success"></i>
                                            @endif
                                        </h5>
                                        <h6 class="card-title"><i class="fa-solid fa-ruler"></i>
                                                {{ $inmueble->m2 }}m<sup>2</sup> &nbsp; <i class="fa-solid fa-ruler"></i> {{ $inmueble->m2_construidos }} m<sup>2</sup> construidos  </h6>
                                    </div>
                                </div>
                                
                                    
                                        
                                    <p class="card-text">{{ $inmueble->descripcion }}</p>
                                    <div class="accordion-header row" id="heading{{ $inmueble->id }}" style="position:absolute; bottom:10px; width: 100%;">
                                        <div class="col-6">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $inmueble->id }}"
                                                aria-expanded="false" aria-controls="collapse{{ $inmueble->id }}"
                                                onclick="Livewire.emit('seleccionarProducto2', {{ $inmueble->id }});">
                                                <h4 class="fw-bold">Ver detalles</h4>
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <button type="button"
                                                 class="accordion-button collapsed text-end"
                                                            onclick="Livewire.emit('seleccionarProducto', {{ $inmueble->id }});">
                                                <h4 class="fw-bold">Editar</h4>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <br>
            @else
                No hay inmuebles que cumplan este criterio.
            @endif
        </div>
    </div>
</div>

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
        @media(max-width: 1356px){
            #filtros{
                width: 100%;
            }
            #filtros > div{
                width: 100%;
            }
            #filtros > div > div{
                width: 100%;
                display: grid;
                grid-template-columns: 1fr 1fr 1fr 1fr;
                gap: 30px;
                max-width: 100%;
                
            }
            #filtros > div > div > h5{
                display: none;
            }
            #filtros > div > div > div{
                border: #333333 1px solid;
                padding: 10px;
                border-radius: 5px;
                display: flex;
                flex-wrap: wrap; 
                margin-bottom: 0px !important;   
            }
            .invisible{
                display: none;
            }

        }
        @media(max-width:830px){
            .inmueble-caracteristicas{
                width: 100%;
                display: grid !important;
                grid-template-columns: 1fr;
                gap: 10px !important;
            }
        }
        @media(max-width:780px){
            .inmuebles{
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
            }

            .inmueble > div > div > img{
                width: 100% !important;
                height: 200px;
            }
            .inmueble > div > div:nth-child(2) >div{
                top: -85% !important;
            }
            .inmueble-caracteristicas{
                margin-bottom: 50px;
            }
        }

        @media(max-width:700px){
            .inmuebles{
                display: grid;
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .inmueble > div > div:nth-child(2) >div{
                top: -90% !important;
            }

            .inmueble-caracteristicas{
                width: 100%;
                display: grid !important;
                grid-template-columns: 1fr 1fr;
                gap: 10px !important;
                margin-bottom:50px; 
            }

        }
    </style>

    <div class="row justify-content-center">
        <div class="col-2" id="filtros">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="fw-bold">Search filters</h5>
                    <div class="mb-3 row d-flex align-items-center">
                        <h6 class="fw-bold"> Location </h6>
                        <input type="text" wire:model="localidad">
                    </div>
                    <div class="mb-3 row d-flex align-items-center">
                        <h6 class="fw-bold"> Postal code </h6>
                        <input type="text" wire:model="cod_postal">
                    </div>
                    @if (is_array($opcionesPrecio) && !empty($opcionesPrecio))
                        <div class="mb-3 row d-flex align-items-center">
                            <h6 class="fw-bold"> Sale price </h6>

                            <div class="col-6">
                                <select wire:model="valor_venta_min" class="w-100">
                                    <option value="1">Minimum</option>
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
                    @if (is_array($opcionesPrecioAlquilerMensual) && !empty($opcionesPrecioAlquilerMensual))
                        <div class="mb-3 row d-flex align-items-center">
                            <h6 class="fw-bold"> Rent/month </h6>

                            <div class="col-6">
                                <select wire:model="alquiler_mensual_min" class="w-100">
                                    <option value="1">Minimum</option>
                                    @foreach ($opcionesPrecioAlquilerMensual as $opcion)
                                        <option value="{{ $opcion }}">{{ $opcion }} €</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <select wire:model="alquiler_mensual_max" class="w-100">
                                    @foreach ($opcionesPrecioAlquilerMensual as $opcion)
                                        <option value="{{ $opcion }}">{{ $opcion }} €</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if (is_array($opcionesPrecioAlquilerSemana) && !empty($opcionesPrecioAlquilerSemana))
                        <div class="mb-3 row d-flex align-items-center">
                            <h6 class="fw-bold"> Rental/week</h6>

                            <div class="col-6">
                                <select wire:model="alquiler_semana_min" class="w-100">
                                    <option value="1">Minimum</option>
                                    @foreach ($opcionesPrecioAlquilerSemana as $opcion)
                                        <option value="{{ $opcion }}">{{ $opcion }} €</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <select wire:model="alquiler_semana_max" class="w-100">
                                    @foreach ($opcionesPrecioAlquilerSemana as $opcion)
                                        <option value="{{ $opcion }}">{{ $opcion }} €</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if (is_array($opcionesTamano) && !empty($opcionesTamano))
                        <div class="mb-3 row d-flex align-items-center">
                            <h6 class="fw-bold"> Square meter </h6>
                            <div class="col-6">
                                <select wire:model="m2_min" class="w-100">
                                    <option value="1">Minimum</option>
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
                        <h6 class="fw-bold"> Rooms </h6>
                        <label>
                            <input type="checkbox" wire:model="habitacionesSeleccionadas" value=0>
                            0 rooms
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
                            4 rooms or more
                        </label>
                    </div>
                    <div class="mb-3 row d-flex align-items-center">
                        <h6 class="fw-bold"> Bathrooms </h6>
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
                            3 bathrooms or more
                        </label>
                    </div>
                    <div class="mb-3 row d-flex align-items-center">
                        <h6 class="fw-bold"> Bedrooms </h6>
                        <label>
                            <input type="checkbox" wire:model="dormitoriosSeleccionados" value=1>
                            1
                        </label>
                        <label>
                            <input type="checkbox" wire:model="dormitoriosSeleccionados" value=2>
                            2
                        </label>
                        <label>
                            <input type="checkbox" wire:model="dormitoriosSeleccionados" value=3>
                            3 bedrooms or more
                        </label>
                    </div>
                    <div class="mb-3 row d-flex align-items-center">
                        <h6 class="fw-bold"> Status </h6>
                        <label>
                            <input type="checkbox" wire:model="estadoSeleccionados" value="Disponible">
                            Available
                        </label>
                        <label>
                            <input type="checkbox" wire:model="estadoSeleccionados" value="Vendido">
                            Sold
                        </label>
                        <label>
                            <input type="checkbox" wire:model="estadoSeleccionados" value="Alquilado">
                            Rented
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
                        <h6 class="fw-bold"> Availability </h6>
                        <label>
                            <input type="checkbox" wire:model="disponibilidad_seleccionados" value="Alquiler">
                            For rent
                        </label>
                        <label>
                            <input type="checkbox" wire:model="disponibilidad_seleccionados" value="Venta">
                            For sale
                        </label>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <div class="col-1 invisible"> &nbsp; </div>
        <div class="col inmuebles">
            @if ($inmuebles->count() > 0)
                @foreach ($inmuebles as $inmueble)
                    <div class="card mb-3 inmueble"  style="max-width: 60rem;">
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
                                                                                        <span class="badge badge-danger text-white bg-success" style="font-size: 0.9rem">Rent</span> 
                                                                                    @elseif($inmueble->disponibilidad == "Venta") 
                                                                                        <span class="badge badge-danger text-white bg-warning" style="font-size: 0.9rem">Sale</span> 
                                                                                    @endif
                                    </h4>
                                    <br>
                                <div  class="d-flex flex-wrap gap-2 justify-content-between align-items-center inmueble-caracteristicas" style="width: 90%">
                                    <div>
                                        <h6 class="card-title" style="font-size: 1.2rem;">
                                            @if($inmueble->disponibilidad == "Alquiler")
                                                <span>{{ $inmueble->alquiler_mes }} €/month</span> <br>
                                                <span>{{ $inmueble->alquiler_semana }} €/week </span>
                                            @elseif($inmueble->disponibilidad == "Venta")
                                                {{ $inmueble->precio_venta }} €
                                            @endif
    
                                        </h6>
                                    </div>
                                    <div class="bg-light p-2 rounded" style="width: fit-content">
                                        <h5 class="card-title" style="font-size: 1rem; margin-bottom: 15px;">
                                            <i class="fa-solid fa-house"></i> {{ $inmueble->habitaciones }} rooms &nbsp; 
                                            <i class="fa-solid fa-bath"></i> {{ $inmueble->banos }} bathrooms &nbsp; 
                                            <i class="fa-solid fa-bed"></i> {{ $inmueble->dormitorios }} bedrooms &nbsp;
                                            <br>
                                            <br>
                                            @if(isset($inmueble->piscina) && $inmueble->piscina == 1)
                                            <i class="fa-solid fa-swimming-pool"></i> Pool <i class="fa-solid fa-square-check text-success"></i>
                                            @endif
                                            @if(isset($inmueble->garaje) && $inmueble->garaje == 1)
                                            &nbsp; <i class="fa-solid fa-warehouse"></i> Garage <i class="fa-solid fa-square-check text-success"></i>
                                            @endif
                                        </h5>
                                        <h6 class="card-title"><i class="fa-solid fa-ruler"></i>
                                                {{ $inmueble->m2 }}m<sup>2</sup> &nbsp; <i class="fa-solid fa-ruler"></i> {{ $inmueble->m2_construidos }} m<sup>2</sup> built  </h6>
                                    </div>
                                </div>
                                
                                    
                                        
                                    <p class="card-text">{{ $inmueble->descripcion }}</p>
                                    <div class="accordion-header row" id="heading{{ $inmueble->id }}" style="position:absolute; bottom:10px; width: 100%;">
                                        <div class="col-6">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $inmueble->id }}"
                                                aria-expanded="false" aria-controls="collapse{{ $inmueble->id }}"
                                                onclick="Livewire.emit('seleccionarProducto2', {{ $inmueble->id }});">
                                                <h4 class="fw-bold">Show details</h4>
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <button type="button"
                                                 class="accordion-button collapsed text-end"
                                                            onclick="Livewire.emit('seleccionarProducto', {{ $inmueble->id }});">
                                                <h4 class="fw-bold">Edit</h4>
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
                There are no properties that meet this criterion.
            @endif
        </div>
    </div>
</div>

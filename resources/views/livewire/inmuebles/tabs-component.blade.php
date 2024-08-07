<div>
    @mobile
        @if ($inmueble != null)
            @if ($tab == 'tab1')
                <div style="border-bottom: 1px solid black !important;">
                    
                        <div class="row">
                            <div class="ms-auto col-6 d-grid gap-2">
                                <button type="button" class="btn btn-primary btn-block"
                                    wire:click="cambioTab('tab1')">Add</button>
                            </div>
                            <div class="ms-auto col-6 d-grid gap-2">
                                <button type="button" class="btn btn-outline-primary btn-block"
                                    wire:click="cambioTab('tab2')">Edit</button>
                            </div>
                        </div>
                        <br>
                    <div class="row">
                        <div class="ms-auto col-4 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab5')">See details</button>
                        </div>
                        <div class="ms-auto col-4 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab3')">Search</button>
                        </div>
                        {{-- <div class="ms-auto col-4 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab4')">Opciones</button>
                        </div> --}}
                    </div>
                    <br>
                </div>
                <br>

                @livewire('inmuebles.create', key('tab1'))
            @elseif ($tab == 'tab2')
                <div style="border-bottom: 1px solid black !important;">
                    
                        <div class="row">
                            <div class="ms-auto col-6 d-grid gap-2">
                                <button type="button" class="btn btn-outline-primary btn-block"
                                    wire:click="cambioTab('tab1')">Add</button>
                            </div>
                            <div class="ms-auto col-6 d-grid gap-2">
                                <button type="button" class="btn btn-primary btn-block"
                                    wire:click="cambioTab('tab2')">Edit</button>
                            </div>
                        </div>
                        <br>
                    <div class="row">
                        <div class="ms-auto col-4 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab5')">See details</button>
                        </div>
                        <div class="ms-auto col-4 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab3')">Search</button>
                        </div>
                        {{-- <div class="ms-auto col-4 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab4')">Opciones</button>
                        </div> --}}
                    </div>
                    <br>
                </div>
                <br>

                @livewire('inmuebles.edit', ['identificador' => $inmueble], key('tab2'))
            @elseif ($tab == 'tab3')
                <div style="border-bottom: 1px solid black !important;">
                   
                        <div class="row">
                            <div class="ms-auto col-6 d-grid gap-2">
                                <button type="button" class="btn btn-outline-primary btn-block"
                                    wire:click="cambioTab('tab1')">Add</button>
                            </div>
                            <div class="ms-auto col-6 d-grid gap-2">
                                <button type="button" class="btn btn-outline-primary btn-block"
                                    wire:click="cambioTab('tab2')">Edit</button>
                            </div>
                        </div>
                        <br>
                    <div class="row">
                        <div class="ms-auto col-4 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab5')">See details</button>
                        </div>
                        <div class="ms-auto col-4 d-grid gap-2">
                            <button type="button" class="btn btn-primary btn-block"
                                wire:click="cambioTab('tab3')">Search</button>
                        </div>
                        {{-- <div class="ms-auto col-4 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab4')">Opciones</button>
                        </div> --}}
                    </div>
                    <br>
                </div>
                <br>

                @livewire('inmuebles.index', key('tab3'))
            @elseif ($tab == 'tab4')
                <div style="border-bottom: 1px solid black !important;">
                   
                        <div class="row">
                            <div class="ms-auto col-6 d-grid gap-2">
                                <button type="button" class="btn btn-outline-primary btn-block"
                                    wire:click="cambioTab('tab1')">Add</button>
                            </div>
                            <div class="ms-auto col-6 d-grid gap-2">
                                <button type="button" class="btn btn-outline-primary btn-block"
                                    wire:click="cambioTab('tab2')">Edit</button>
                            </div>
                        </div>
                        <br>
                    <div class="row">
                        <div class="ms-auto col-4 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab5')">See details</button>
                        </div>
                        <div class="ms-auto col-4 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab3')">Search</button>
                        </div>
                        {{-- <div class="ms-auto col-4 d-grid gap-2">
                            <button type="button" class="btn btn-primary btn-block"
                                wire:click="cambioTab('tab4')">Opciones</button>
                        </div> --}}
                    </div>
                    <br>
                </div>
                <br>
            @elseif ($tab == 'tab5')
                <div style="border-bottom: 1px solid black !important;">
                    
                        <div class="row">
                            <div class="ms-auto col-6 d-grid gap-2">
                                <button type="button" class="btn btn-outline-primary btn-block"
                                    wire:click="cambioTab('tab1')">Add</button>
                            </div>
                            <div class="ms-auto col-6 d-grid gap-2">
                                <button type="button" class="btn btn-outline-primary btn-block"
                                    wire:click="cambioTab('tab2')">Edit</button>
                            </div>
                        </div>
                        <br>
                    <div class="row">
                        <div class="ms-auto col-4 d-grid gap-2">
                            <button type="button" class="btn btn-primary btn-block" wire:click="cambioTab('tab5')">Ver
                                detalles</button>
                        </div>
                        <div class="ms-auto col-4 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab3')">Search</button>
                        </div>
                        {{-- <div class="ms-auto col-4 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab4')">Opciones</button>
                        </div> --}}
                    </div>
                    <br>
                </div>
                <br>
                @livewire('inmuebles.show', ['identificador' => $inmueble], key('tab5'))
            @endif
        @else
            @if ($tab == 'tab1')
                <div style="border-bottom: 1px solid black !important;">
                   
                        <div class="row">
                            <div class="ms-auto col-6 d-grid gap-2">
                                <button type="button" class="btn btn-primary btn-block"
                                    wire:click="cambioTab('tab1')">Add</button>
                            </div>
                            <div class="ms-auto col-6 d-grid gap-2">
                                <button type="button" class="btn btn-outline-secondary btn-block"
                                    wire:click="cambioTab('tab2')">Edit</button>
                            </div>
                        </div>
                        <br>
                    <div class="row">
                        <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab3')">Search</button>
                        </div>
                        {{-- <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab4')">Opciones</button>
                        </div> --}}
                    </div>
                    <br>
                </div>
                <br>

                @livewire('inmuebles.create')
            @elseif ($tab == 'tab3')
                <div style="border-bottom: 1px solid black !important;">
                   
                        <div class="row">
                            <div class="ms-auto col-6 d-grid gap-2">
                                <button type="button" class="btn btn-outline-primary btn-block"
                                    wire:click="cambioTab('tab1')">Add</button>
                            </div>
                            <div class="ms-auto col-6 d-grid gap-2">
                                <button type="button" class="btn btn-outline-secondary btn-block"
                                    wire:click="cambioTab('tab2')">Edit</button>
                            </div>
                        </div>
                        <br>
                    <div class="row">
                        <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-primary btn-block"
                                wire:click="cambioTab('tab3')">Search</button>
                        </div>
                        {{-- <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab4')">Opciones</button>
                        </div> --}}
                    </div>
                    <br>
                </div>
                <br>

                @livewire('inmuebles.index')
            @elseif ($tab == 'tab4')
                <div style="border-bottom: 1px solid black !important;">
                    
                        <div class="row">
                            <div class="ms-auto col-6 d-grid gap-2">
                                <button type="button" class="btn btn-outline-primary btn-block"
                                    wire:click="cambioTab('tab1')">Add</button>
                            </div>
                            <div class="ms-auto col-6 d-grid gap-2">
                                <button type="button" class="btn btn-outline-secondary btn-block"
                                    wire:click="cambioTab('tab2')">Edit</button>
                            </div>
                        </div>
                        <br>
                    <div class="row">
                        <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab3')">Search</button>
                        </div>
                        {{-- <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-primary btn-block"
                                wire:click="cambioTab('tab4')">Opciones</button>
                        </div> --}}
                    </div>
                    <br>
                </div>
                <br>
                {{-- <div class="ms-auto col d-grid gap-2">
                    <a class="btn btn-primary btn-lg" href="{{ route('vendedores.index') }}"> Consultar y
                        Edit vendedores </a>
                    <a class="btn btn-primary btn-lg" href="{{ route('tipovivienda.index') }}"> Consultar y
                        Edit tipos de vivienda </a>
                    <a class="btn btn-primary btn-lg" href="{{ route('caracteristicas.index') }}"> Consultar y Edit
                        características de inmueble </a>
                </div> --}}
            @endif
        @endif
    @elsemobile
        @if ($inmueble != null)
            @if ($tab == 'tab1')
                <ul class="nav nav-tabs nav-fill">
                    
                        <li class="nav-item">
                            <button class="nav-link active" wire:click.prevent="cambioTab('tab1')">
                                <h3>Add</h3>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" wire:click.prevent="cambioTab('tab2')">
                                <h5>Edit</h5>
                            </button>
                        </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab5')">
                            <h5>See details</h5>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab3')">
                            <h5>Search</h5>
                        </button>
                    </li>
                    {{-- <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab4')">
                            <h5>Opciones</h5>
                        </button>
                    </li> --}}
                </ul>

                @livewire('inmuebles.create', key('tab1'))
            @elseif ($tab == 'tab2')
                <ul class="nav nav-tabs nav-fill">
                    
                        <li class="nav-item">
                            <button class="nav-link" wire:click.prevent="cambioTab('tab1')">
                                <h5>Add</h5>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link active" wire:click.prevent="cambioTab('tab2')">
                                <h3>Edit</h3>
                            </button>
                        </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab5')">
                            <h5>See details</h5>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab3')">
                            <h5>Search</h5>
                        </button>
                    </li>
                    {{-- <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab4')">
                            <h5>Opciones</h5>
                        </button>
                    </li> --}}
                </ul>
                <br>

                @livewire('inmuebles.edit', ['identificador' => $inmueble], key('tab2'))

                <br>
            @elseif ($tab == 'tab3')
                <ul class="nav nav-tabs nav-fill">
                    
                        <li class="nav-item">
                            <button class="nav-link" wire:click.prevent="cambioTab('tab1')">
                                <h5>Add</h5>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" wire:click.prevent="cambioTab('tab2')">
                                <h5>Edit</h5>
                            </button>
                        </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab5')">
                            <h5>See details</h5>
                        </button>
                    </li>
                    <li class="nav-item active">
                        <button class="nav-link active" wire:click.prevent="cambioTab('tab3')">
                            <h3>Search</h3>
                        </button>
                    </li>
                    {{-- <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab4')">
                            <h5>Opciones</h5>
                        </button>
                    </li> --}}
                </ul>
                <br>

                @livewire('inmuebles.index', key('tab3'))
            @elseif ($tab == 'tab4')
                <ul class="nav nav-tabs nav-fill">
                    
                        <li class="nav-item">
                            <button class="nav-link" wire:click.prevent="cambioTab('tab1')">
                                <h5>Add</h5>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" wire:click.prevent="cambioTab('tab2')">
                                <h5>Edit</h5>
                            </button>
                        </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab5')">
                            <h5>See details</h5>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab3')">
                            <h5>Search</h5>
                        </button>
                    </li>
                    {{-- <li class="nav-item">
                        <button class="nav-link active" wire:click.prevent="cambioTab('tab4')">
                            <h3>Opciones</h3>
                        </button>
                    </li> --}}
                </ul>
                <br>

                @livewire('inmuebles.index', key('tab3'))
            @elseif ($tab == 'tab5')
                <ul class="nav nav-tabs nav-fill">
                    
                        <li class="nav-item">
                            <button class="nav-link" wire:click.prevent="cambioTab('tab1')">
                                <h5>Add</h5>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" wire:click.prevent="cambioTab('tab2')">
                                <h5>Edit</h5>
                            </button>
                        </li>
                    <li class="nav-item">
                        <button class="nav-link active" wire:click.prevent="cambioTab('tab5')">
                            <h5>See details</h5>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab3')">
                            <h5>Search</h5>
                        </button>
                    </li>
                    {{-- <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab4')">
                            <h3>Opciones</h3>
                        </button>
                    </li> --}}
                </ul>
                <br>

                @livewire('inmuebles.show', ['identificador' => $inmueble], key('tab5'))
            @endif
        @else
            @if ($tab == 'tab1')
                <ul class="nav nav-tabs nav-fill">
                    
                        <li class="nav-item">
                            <button class="nav-link active" wire:click.prevent="cambioTab('tab1')">
                                <h3>Add</h3>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" wire:click.prevent="cambioTab('tab2')" disabled>
                                <h5>Edit</h5>
                            </button>
                        </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab5')" disabled>
                            <h5>See details</h5>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab3')">
                            <h5>Search</h5>
                        </button>
                    </li>
                    {{-- <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab4')">
                            <h5>Opciones</h5>
                        </button>
                    </li> --}}
                </ul>
                <br>

                @livewire('inmuebles.create', key('tab1'))
            @elseif ($tab == 'tab3')
                <ul class="nav nav-tabs nav-fill">
                   
                        <li class="nav-item">
                            <button class="nav-link" wire:click.prevent="cambioTab('tab1')">
                                <h5>Add</h5>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" wire:click.prevent="cambioTab('tab2')" disabled>
                                <h5>Edit</h5>
                            </button>
                        </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab5')" disabled>
                            <h5>See details</h5>
                        </button>
                    </li>
                    <li class="nav-item active">
                        <button class="nav-link active" wire:click.prevent="cambioTab('tab3')">
                            <h3>Search</h3>
                        </button>
                    </li>
                    {{-- <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab4')">
                            <h5>Opciones</h5>
                        </button>
                    </li> --}}
                </ul>
                <br>
                @livewire('inmuebles.index', key('tab3'))
            @elseif ($tab == 'tab4')
                <ul class="nav nav-tabs nav-fill">
                   
                        <li class="nav-item">
                            <button class="nav-link" wire:click.prevent="cambioTab('tab1')">
                                <h5>Add</h5>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" wire:click.prevent="cambioTab('tab2')" disabled>
                                <h5>Edit</h5>
                            </button>
                        </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab5')" disabled>
                            <h5>See details</h5>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab3')">
                            <h5>Search</h5>
                        </button>
                    </li>
                    {{-- <li class="nav-item">
                        <button class="nav-link active" wire:click.prevent="cambioTab('tab4')">
                            <h3>Opciones</h3>
                        </button>
                    </li> --}}
                </ul>
                <br>

                {{-- <div class="ms-auto col d-grid gap-2">
                    <a class="btn btn-primary btn-lg" href="{{ route('vendedores.index') }}"> Consultar y
                        editar vendedores </a>
                    <a class="btn btn-primary btn-lg" href="{{ route('tipovivienda.index') }}"> Consultar y
                        editar tipos de vivienda </a>
                    <a class="btn btn-primary btn-lg" href="{{ route('caracteristicas.index') }}"> Consultar y editar
                        características de inmueble </a>
                </div> --}}
            @endif
        @endif
    @endmobile

</div>

<div>
    @mobile
        @if ($tipo != null)
            @if ($tab == 'tab1')
                <div style="border-bottom: 1px solid black !important;">
                    @if (
                        (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === 1) ||
                            (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === null) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === 0) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === null))
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
                    @endif
                    <div class="row">
                        <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab3')">Search</button>
                        </div>
                        <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab4')">Options</button>
                        </div>
                    </div>
                    <br>
                </div>
                <br>

                @livewire('tipovivienda.create')
            @elseif ($tab == 'tab2')
                <div style="border-bottom: 1px solid black !important;">
                    @if (
                        (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === 1) ||
                            (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === null) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === 0) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === null))
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
                    @endif
                    <div class="row">
                        <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab3')">Search</button>
                        </div>
                        <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab4')">Options</button>
                        </div>
                    </div>
                    <br>
                </div>
                <br>

                @livewire('tipovivienda.edit', ['identificador' => $tipo], key('tab2'))
            @elseif ($tab == 'tab3')
                <div style="border-bottom: 1px solid black !important;">
                    @if (
                        (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === 1) ||
                            (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === null) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === 0) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === null))
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
                    @endif
                    <div class="row">
                        <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-primary btn-block"
                                wire:click="cambioTab('tab3')">Search</button>
                        </div>
                        <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab4')">Options</button>
                        </div>
                    </div>
                    <br>
                </div>
                <br>

                @livewire('tipovivienda.index')
            @elseif ($tab == 'tab4')
                <div style="border-bottom: 1px solid black !important;">
                    @if (
                        (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === 1) ||
                            (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === null) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === 0) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === null))
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
                    @endif
                    <div class="row">
                        <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab3')">Search</button>
                        </div>
                        <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-primary btn-block"
                                wire:click="cambioTab('tab4')">Options</button>
                        </div>
                    </div>
                    <br>
                </div>
                <br>
            @endif
        @else
            @if ($tab == 'tab1')
                <div style="border-bottom: 1px solid black !important;">
                    @if (
                        (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === 1) ||
                            (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === null) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === 0) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === null))
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
                    @endif
                    <div class="row">
                        <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab3')">Search</button>
                        </div>
                        <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab4')">Options</button>
                        </div>
                    </div>
                    <br>
                </div>
                <br>

                @livewire('tipovivienda.create')
            @elseif ($tab == 'tab3')
                <div style="border-bottom: 1px solid black !important;">
                    @if (
                        (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === 1) ||
                            (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === null) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === 0) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === null))
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
                    @endif
                    <div class="row">
                        <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-primary btn-block"
                                wire:click="cambioTab('tab3')">Search</button>
                        </div>
                        <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab4')">Options</button>
                        </div>
                    </div>
                    <br>
                </div>
                <br>

                @livewire('tipovivienda.index')
            @elseif ($tab == 'tab4')
                <div style="border-bottom: 1px solid black !important;">
                    @if (
                        (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === 1) ||
                            (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === null) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === 0) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === null))
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
                    @endif
                    <div class="row">
                        <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary btn-block"
                                wire:click="cambioTab('tab3')">Search</button>
                        </div>
                        <div class="ms-auto col-6 d-grid gap-2">
                            <button type="button" class="btn btn-primary btn-block"
                                wire:click="cambioTab('tab4')">Options</button>
                        </div>
                    </div>
                    <br>
                </div>
                <br>
                <div class="ms-auto col d-grid gap-2">
                    <a class="btn btn-primary btn-lg" href="{{ route('inmuebles.index') }}"> Volver a la sección de
                        inmuebles </a>
                </div>
            @endif
        @endif
    @elsemobile
        @if ($tipo != null)
            @if ($tab == 'tab1')
                <ul class="nav nav-tabs nav-fill">
                    @if (
                        (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === 1) ||
                            (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === null) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === 0) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === null))
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
                    @endif
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab3')">
                            <h5>Search</h5>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab4')">
                            <h5>Options</h5>
                        </button>
                    </li>
                </ul>

                @livewire('tipovivienda.create')
            @elseif ($tab == 'tab2')
                <ul class="nav nav-tabs nav-fill">
                    @if (
                        (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === 1) ||
                            (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === null) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === 0) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === null))
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
                    @endif
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab3')">
                            <h5>Search</h5>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab4')">
                            <h5>Options</h5>
                        </button>
                    </li>
                </ul>
                <br>

                @livewire('tipovivienda.edit', ['identificador' => $tipo], key('tab3'))

                <br>
            @elseif ($tab == 'tab3')
                <ul class="nav nav-tabs nav-fill">
                    @if (
                        (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === 1) ||
                            (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === null) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === 0) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === null))
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
                    @endif
                    <li class="nav-item active">
                        <button class="nav-link active" wire:click.prevent="cambioTab('tab3')">
                            <h3>Search</h3>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab4')">
                            <h5>Options</h5>
                        </button>
                    </li>
                </ul>
                <br>

                @livewire('tipovivienda.index')
            @elseif ($tab == 'tab4')
                <ul class="nav nav-tabs nav-fill">
                    @if (
                        (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === 1) ||
                            (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === null) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === 0) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === null))
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
                    @endif
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab3')">
                            <h5>Search</h5>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link active" wire:click.prevent="cambioTab('tab4')">
                            <h3>Options</h3>
                        </button>
                    </li>
                </ul>
                <br>

                @livewire('tipovivienda.index')
            @endif
        @else
            @if ($tab == 'tab1')
                <ul class="nav nav-tabs nav-fill">
                    @if (
                        (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === 1) ||
                            (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === null) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === 0) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === null))
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
                    @endif
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab3')">
                            <h5>Search</h5>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab4')">
                            <h5>Options</h5>
                        </button>
                    </li>
                </ul>
                <br>

                @livewire('tipovivienda.create')
            @elseif ($tab == 'tab3')
                <ul class="nav nav-tabs nav-fill">
                    @if (
                        (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === 1) ||
                            (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === null) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === 0) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === null))
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
                    @endif
                    <li class="nav-item active">
                        <button class="nav-link active" wire:click.prevent="cambioTab('tab3')">
                            <h3>Search</h3>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab4')">
                            <h5>Options</h5>
                        </button>
                    </li>
                </ul>
                <br>
                @livewire('tipovivienda.index')
            @elseif ($tab == 'tab4')
                <ul class="nav nav-tabs nav-fill">
                    @if (
                        (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === 1) ||
                            (Request::session()->get('inmobiliaria') == 'sayco' && Auth::user()->inmobiliaria === null) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === 0) ||
                            (Request::session()->get('inmobiliaria') == 'sancer' && Auth::user()->inmobiliaria === null))
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
                    @endif
                    <li class="nav-item">
                        <button class="nav-link" wire:click.prevent="cambioTab('tab3')">
                            <h5>Search</h5>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link active" wire:click.prevent="cambioTab('tab4')">
                            <h3>Options</h3>
                        </button>
                    </li>
                </ul>
                <br>
                <div class="ms-auto col d-grid gap-2">
                    <a class="btn btn-primary btn-lg" href="{{ route('inmuebles.index') }}"> Return to properties section </a>
                </div>
            @endif
        @endif
    @endmobile

</div>

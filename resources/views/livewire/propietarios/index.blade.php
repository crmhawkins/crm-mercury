<div class="container mx-auto">
    <div class="card mb-3">
        <h5 class="card-header">
            Lista de propietarios de vivienda
        </h5>
        <div class="card-body" x-data="{}" x-init="$nextTick(() => {
            $('#tablepropietario').DataTable({
                responsive: true,
                fixedHeader: true,
                searching: false,
                paging: false,
            });
        })">
            @if ($propietarios != null)
                <table class="table" id="tablepropietario">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th>Apellido</th>
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($propietarios as $propietario)
                            <tr>
                                <td>{{ $propietario->nombre }}</td>
                                <td>{{ $propietario->apellidos }}</td>

                                <td> <button type="button"
                                      class="btn btn-primary boton-producto" onclick="Livewire.emit('seleccionarProducto', {{ $propietario->id }});">Ver/Editar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

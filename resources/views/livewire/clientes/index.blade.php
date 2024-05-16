<div class="container mx-auto">
    <div class="card mb-3">
        <h5 class="card-header">
            Lista de clientes
        </h5>
        <div class="card-body" x-data="{}" x-init="$nextTick(() => {
            $('#tableCliente').DataTable({
                responsive: true,
                fixedHeader: true,
                searching: false,
                paging: false,
            });
        })">
            @if ($clientes != null)
                <table class="table" id="tableCliente">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Email</th>
                            <th scope="col">Búsqueda</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->apellido }}</td>
                                <td>{{ $cliente->dni }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td style="text-transform: capitalize">{{ $cliente->busqueda }}</td>
                                <td> <button type="button"
                                         class="btn btn-primary boton-producto" onclick="Livewire.emit('seleccionarProducto', {{ $cliente->id }});">Ver/Editar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

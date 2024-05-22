<div class="container mx-auto">
    <div class="card mb-3">
        <h5 class="card-header">
            Lista de usuarios 
        </h5>
        <div class="card-body" x-data="{}" x-init="$nextTick(() => {
            $('#tableVendedor').DataTable({
                responsive: true,
                fixedHeader: true,
                searching: false,
                paging: false,
            });
        })">
            @if ($vendedores != null)
                <table class="table" id="tableVendedor">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendedores as $vendedor)
                            <tr>
                                <td>{{ $vendedor->nombre_completo }}</td>
                                <td> <button type="button"
                                         class="btn btn-primary boton-producto"
                                        onclick="Livewire.emit('seleccionarProducto', {{ $vendedor->id }});">Ver/Editar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

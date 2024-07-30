<div class="container mx-auto">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Settings</h5>
        </div>
        <div class="card-body">
            <!-- Existing types of properties -->
            <div class="form-group">
                <label for="tipo">Types of properties</label>
                <select class="form-control" wire:model="selectedTipo">
                    @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Add new type of property -->
            <div class="form-group mt-4">
                <label for="nuevoTipo">Add new type of property</label>
                <input type="text" id="nuevoTipo" class="form-control" wire:model="nuevoTipoNombre" placeholder="Enter new type">
                <button class="btn btn-primary mt-2" wire:click="addTipo">Add</button>
            </div>

            <!-- List of existing types with delete option -->
            <div class="form-group mt-4">
                <label>Existing types</label>
                <ul class="list-group">
                    @foreach($tipos as $tipo)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $tipo->nombre }}
                            <button class="btn btn-danger btn-sm" wire:click="deleteTipo({{ $tipo->id }})">Delete</button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

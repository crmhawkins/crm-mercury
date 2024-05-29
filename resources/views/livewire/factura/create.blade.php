<div class="container mx-auto">
    <form wire:submit.prevent="submit">
        <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
        <div class="card mb-3">
            <h5 class="card-header">
                Add invoice data
            </h5>
            <div class="card-body">
                <div class="mb-3 row d-flex align-items-center">
                    <label for="cliente" class="col-sm-3 col-form-label"><h5>Customer:</h5></label>
                    <div x-data="" x-init="$('#select2-cliente-create').select2();
                    $('#select2-cliente-create').on('change', function(e) {
                        var data = $('#select2-cliente-create').select2('val');
                        @this.set('cliente', data);
                    });">
                        <div class="col" wire:ignore>
                            <select class="form-control" id="select2-cliente-create">
                                <option value="">-- Select Customer --</option>
                                @foreach ($clientes as $cliente)
                                    <option value={{ $cliente->id }}>{{ $cliente->nombre_completo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row d-flex align-items-center">
                    <label for="numero_factura" class="col-sm-3 col-form-label"><h5>Invoice number</h5></label>
                    <div class="col-sm-12">
                        <input type="number" wire:model="numero_factura" class="form-control" id="numero_factura"
                            placeholder="Invoice number">
                        @error('numero_factura')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row d-flex align-items-center">
                    <label for="fecha" class="col-sm-3 col-form-label"><h5>Invoice date</h5></label>
                    <div class="col-sm-6">
                        <input type="date" wire:model="fecha" class="form-control" id="fecha">
                        <input type="date" wire:model="fecha_vencimiento" class="form-control" id="fecha_vencimiento">
                        @error('fecha')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <h5> Artículos </h5>
                <hr />

                @foreach ($articulosArray as $index => $articulo)
                    <div class="mb-3 row d-flex align-items-center">
                        <div class="col-sm-5">
                            <label for="descripcion.{{ $index }}" class="form-label">Description</label>
                            <input type="text" wire:model="articulosArray.{{ $index }}.descripcion"
                                class="form-control" id="descripcion.{{ $index }}">
                        </div>
                        <div class="col-sm-3">
                            <label for="importe.{{ $index }}" class="form-label">Amount</label>
                            <input type="number" wire:model="articulosArray.{{ $index }}.importe"
                                class="form-control" id="importe.{{ $index }}">
                        </div>
                        <div class="col-sm-2">
                            <label for="impuesto.{{ $index }}" class="form-label">Tax</label>
                            <select wire:model="articulosArray.{{ $index }}.impuesto" class="form-control"
                                id="impuesto.{{ $index }}">
                                <option value="0">-- Without taxation --</option>
                                <option value="21">-- IVA normal --</option>
                                <option value="10">-- IVA reduced --</option>
                                <option value="4">-- IVA super reduced --</option>

                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-danger"
                                wire:click="removeArticulo({{ $index }})">Delete</button>
                        </div>
                    </div>
                @endforeach

                <div class="mb-3 row d-flex align-items-center">
                    <div class="col-sm-10">
                        <button type="button" class="btn btn-primary" wire:click="addArticulo">Add Article</button>
                    </div>
                </div>
                <hr />
                <div class="mb-3 row d-flex text-end">
                    <div class="col-10">
                        <h6>Subtotal:</h6>
                    </div>
                    <div class="col-2">
                        <h6>{{ $subtotal }} €</h6>
                    </div>
                </div>
                <div class="mb-3 row d-flex text-end">

                    <div class="col-10">

                        <h3>Total:</h3>
                    </div>
                    <div class="col-2">
                        <h3>{{ $total }} € </h3>
                    </div>

                </div>

                <div class="mb-3 row d-flex align-items-center">
                    <label for="condiciones" class="col-sm-4 col-form-label"><h5>Terms and method of payment
                    </h5></label>
                    <div class="col-sm-12">
                        <textarea wire:model="condiciones" class="form-control" id="condiciones" placeholder="Condiciones"></textarea>
                        @error('condiciones')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3 row d-flex align-items-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

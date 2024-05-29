<div class="card mb-3">
    <style>
        body {
            background-color: #fff;
        }
    </style>
    
    <div class="card-body">
        <h5>Select client</h5>
        <div class="mb-3 row d-flex align-items-center" wire:ignore>
            <div x-data="" x-init="$('#select2-cliente_firma-{{ $inmueble_id }}').select2();
            $('#select2-cliente_firma-{{ $inmueble_id }}').on('change', function(e) {
                var data = $('#select2-cliente_firma-{{ $inmueble_id }}').select2('val');
                @this.set('cliente_id', data);
                console.log(data);
            });" wire:ignore>
                <select class="form-control" id="select2-cliente_firma-{{ $inmueble_id }}" wire:model="cliente_id">
                    <option value="">-- Select client --</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">
                            {{ $cliente->nombre}} {{ $cliente->apellido }} - {{ $cliente->dni }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row d-flex align-items-center">
            <label for="fecha" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-10">
                <input type="date" wire:model="fecha" class="form-control" name="fecha" id="fecha"
                    placeholder="Date">
                @error('fecha')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <br>
            <div class="row text-center">
                <h5> Signature </h5>
                @if ($firma == null)
                    <div class="col">
                        <canvas id="signature-pad" class="signature-pad border" width="500" height="150"></canvas>
                    </div>
            </div>

            <button class="btn btn-primary" wire:click.debounce.150ms="saveSignature" id="btnFirma">Save
                signature</button>
        @else
            <div class="col">
                <img src='{{ asset($firma) }}'>
            </div>
        </div>
        <button class="btn btn-primary" wire:click.prevent="submit">Create visit sheet</button>
        @endif
    </div>
</div>
<script>
    $(document).ready(function() {

        const canvas = document.getElementById("signature-pad");
        const signaturePad = new SignaturePad(canvas);

        document.querySelector('#btnFirma').addEventListener('click', function() {
            if (signaturePad.isEmpty()) {
                alert("Por favor proporciona tu firma primero.");
            } else {
                var data = signaturePad.toDataURL();
                console.log(data);
                @this.set('signature', data)
            }
        });
    });
</script>
</div>

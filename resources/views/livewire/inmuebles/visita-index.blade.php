<div style="background-color: #fff">
    @php
        use App\Models\Clientes;
    @endphp
    <br>
    <div class="row justify-content-center">
        <div class="col">
    <h6>Property visit sheets</h6>
    <hr/>
    <ul class="d-flex flex-row flex-wrap gap-2 ">
        @foreach($hojas_visita as $hoja)

            <li class="border rounded d-flex flex-column p-2 justify-content-center gap-2 align-items-center" style="width: fit-content; list-style: none"> 
                <span class="fw-bold">{{Clientes::where('id', $hoja->cliente_id)->first()->nombre}} - {{ Clientes::where('id', $hoja->cliente_id)->first()->dni }}</span><span>{{substr($hoja->fecha, 0, 10)}}</span><a href="{{('../' . $hoja->ruta)}}" target="blank_" class="btn btn-primary"> View document </a>
            </li>
        @endforeach
    </ul>
</div>
</div>

</div>

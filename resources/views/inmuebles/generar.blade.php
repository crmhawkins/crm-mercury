<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: 'Roboto Condensed', sans-serif;
        }

        .full-width-image {
            width: 100%;
            height: auto; /* Mantiene la proporción de la imagen */
            max-height: 300px; /* Limita la altura máxima */
        }

        .dynamic-width-image {
            width: auto; /* Mantiene la proporción de la imagen */
            max-height: 300px; /* Limita la altura máxima */
            float: left;
        }

        .clear {
            clear: both;
        }

        .info-container {
            width: 100%;
            margin-top: 20px;
        }

        .info-table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
        }

        .info-row {
            display: table-row;
        }

        .info-item {
            display: table-cell;
            font-weight: bold;
            text-align: left;
            padding: 6px 0px;
        }

        .info-item:nth-child(2) {
            text-align: center;
        }

        .info-item:last-child {
            text-align: right;
        }

        .features-container {
            margin-top: 20px;
            width: 100%;
        }

        .feature-item {
            display: inline-block;
            border: 1px solid #000;
            text-align: center;
            box-sizing: border-box;
            padding: 5px 0px;
        }

        .feature-item.large {
            width: 24.2%;
        }

        .feature-item.small {
            margin-top: 5px;
            width: 49.2%;
        }

        .logo {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
            /* Espacio adicional arriba y abajo del logo */
        }
        .head-title{
            margin-bottom: 20px;
            margin-top: 20px;
        }
    </style>
</head>

<body class="bg-dark" style="background:black;">
    @if($logo != null)
    <div class="logo">
        <img src="{{ public_path('assets/logo.png') }}" alt="Logo de la empresa" style="width: 150px; background:white;">
    </div>
    @endif

    <div class="head-title">
        <h1 class="text-center m-0 p-0" style="text-align:center; margin:0px; padding:0px; color:white; font-size: 2.5rem"> @if($title != null) {{$title}}  @else  @if($inmueble->disponibilidad == 'Alquiler') RENTAL OPORTUNITY @else INVESTMENT OPORTUNITY  @endif @endif</h1>
    </div>
    <div class="">
        @if(count($galeria) > 0)
        <div style="max-height:300px; display:block; position:relative; width: 100%;">
            <img src="{{ public_path(reset($galeria)) }}" class="full-width-image" alt="Imagen del inmueble">
        </div>
        @else
        <p>There are no images available for this property.</p>
        @endif

        <div class="features-container">
            <table style="width:100%; font-size: 2rem; padding:20px;">
                <tr>
                    <td class=" text-white" style="color:white ; width: 100%;"><strong>REF:</strong> {{ $inmueble->reference_number }}</td>
                    <td class=" text-white" style="color:white; width:100%;"> <strong>PRICE:</strong>
                        @if($inmueble->disponibilidad == 'Venta')
                        {{ $inmueble->precio_venta }}
                        @else
                        @if($inmueble->daily_rental_price)
                        {{ $inmueble->daily_rental_price }}
                        @elseif($inmueble->alquiler_mes)
                        {{ $inmueble->alquiler_mes }}
                        @else
                        {{ $inmueble->alquiler_semana }}
                        @endif
                        @endif
                </tr>
                @if( $inmueble->m2_construidos)
                <tr>
                    <td class=" text-white" style="color:white ; width: 100%;"><strong>SIZE:</strong> {{ $inmueble->m2_construidos }}</td>
                    <td class=" text-white" style="color:white ; width: 100%;"></td>
                </tr>
                @endif
                @if( $inmueble->garaje)
                <tr>
                    <td class=" text-white" style="color:white ; width: 100%;"><strong>Garage:</strong> {{ $inmueble->garaje ? 'Yes' : 'No' }}</td>
                    <td class=" text-white" style="color:white ; width: 100%;"></td>
                </tr>
                @endif
                @if( $inmueble->piscina)
                <tr>
                    <td class=" text-white" style="color:white ; width: 100%;"><strong>Pool:</strong> {{ $inmueble->piscina ? 'Yes' : 'No' }}</td>
                    <td class=" text-white" style="color:white ; width: 100%;"></td>
                </tr>
                @endif
            </table>

        </div>
        <div style="margin-top: 10px; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; color:white">
            <p style="margin-top: 10px; color:white; padding: 20px;"> {{ $inmueble->descripcion }}</p>
        </div>
        @if(count($galeria) > 0)

            @php
            $imagenesMostradas = 0;
            @endphp

            @foreach($galeria as $key => $imagen)
                @if ($imagenesMostradas != 0 || $imagenesMostradas == 5)
                    <div style="max-height:300px; display:block; position:relative; width: 97%; padding: 10px;">
                        <img style="margin: 0 auto;" src="{{ public_path($imagen) }}" class="full-width-image" alt="Imagen del inmueble">
                    </div>
                @endif

                @php
                $imagenesMostradas++;
                @endphp

                @if ($imagenesMostradas >= 5)
                    @break
                @endif
            @endforeach
        @endif

    </div>
</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: 'Roboto Condensed', sans-serif;
        }

        .full-width-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .dynamic-width-image {
            height: 300px;
            object-fit: cover;
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
            padding:5px 0px; 
        }

        .feature-item.large {
            width: 24.2%;
        }

       

        .feature-item.small {
            margin-top:5px;
            width: 49.2%;
        }
        .logo {
            width: 100%;
            text-align: center;
            margin-bottom: 20px; /* Espacio adicional arriba y abajo del logo */
        }
     
    </style>
</head>

<body>
    @if($logo != null)
        <div class="logo">
            <img src="{{ public_path('assets/logo.png') }}" alt="Logo de la empresa" style="width: 150px;">
        </div>
    @endif
    <div class="head-title">
        <h1 class="text-center m-0 p-0" style="text-align:center; margin:0px; padding:0px;">{{ $inmueble->direccion }}</h1>
    </div>
    <div class="">
        <!-- Verificar si hay imágenes -->
        <div class="info-container">
            <table class="info-table">
                <tr class="info-row">
                    <td class="info-item"><span style="background: black; color:white; padding: 5px 10px;">{{ $inmueble->cod_postal }}</span></td>
                    <td class="info-item"><span style="background: black; color:white; padding: 5px 10px;">{{ $inmueble->localidad }}</span></td>
                    <td class="info-item" style="padding:0px;" ><span style="background: black; color:white; padding: 5px 10px;">
                        @if($inmueble->disponibilidad == 'Venta')
                            Sale
                        @elseif($inmueble->disponibilidad == 'Alquiler')
                            Rent
                        @else
                            Rent with option to buy
                        @endif
                    </span></td>
                </tr>
            </table>
        </div>
        @if(count($galeria) > 0)
            <!-- Si hay al menos una imagen -->
            <!-- Primera imagen, ocupa todo el ancho -->
            <div style="height:300px; display:block; position:relative; width: 100%;">
                <img src="{{ public_path($galeria[1]) }}" class="full-width-image" alt="Imagen del inmueble">
            </div>
            <!-- Espacio entre las imágenes -->
            <div style="margin-top:10px; display:block; position:relative; width:100%;">
                <!-- Calcular el ancho de cada imagen -->
                @php
                    $totalImages = count($galeria);
                    $maxImagesBelow = min(4, $totalImages - 1); // Máximo de 4 imágenes excluyendo la superior
                    $width = $maxImagesBelow > 0 ? (100 / $maxImagesBelow) . '%' : '0'; // Ancho de cada imagen en porcentaje
                @endphp
                <!-- Iterar sobre las imágenes restantes, limitando a 4 -->
                @foreach($galeria as $key => $imagen)
                    @if ($key != 1 && $key <= $maxImagesBelow + 1)
                        <img src="{{ public_path($imagen) }}" class="dynamic-width-image" alt="Imagen del inmueble" style="width: {{ $width }};">
                    @endif
                @endforeach
                <!-- Clear float -->
                <div class="clear"></div>
            </div>
        @else
            <!-- Si no hay imágenes, mostrar un mensaje -->
            <p>There are no images available for this property.</p>
        @endif

        <!-- Sección de características del inmueble -->
        <div class="features-container">
            <!-- Fila de 4 elementos -->
            <div class="feature-item large"><strong>Bedrooms:</strong> {{ $inmueble->dormitorios }}</div>
            <div class="feature-item large"><strong>Bathrooms:</strong> {{ $inmueble->banos }}</div>
            <div class="feature-item large"><strong>Garage:</strong> {{ $inmueble->garaje ? 'Yes' : 'No' }}</div>
            <div class="feature-item large"><strong>Pool:</strong> {{ $inmueble->piscina ? 'Yes' : 'No' }}</div>

            <!-- Fila de 2 elementos -->
            <div class="feature-item small"><strong>m<sup>2</sup> built:</strong> {{ $inmueble->m2_construidos }}</div>
            <div class="feature-item small"><strong>m<sup>2</sup>:</strong> {{ $inmueble->m2 }}</div>
        </div>
        <div style="margin-top: 10px; border-top: 2px solid blue;">
            @if($inmueble->disponibilidad == 'Venta')
                <p style="text-align:center;"><span style="font-size: 50px;">{{ $inmueble->precio_venta }} €</span></p>
            @else
                <p><strong>Monthly rental price:</strong> <span>{{ $inmueble->alquiler_mes }} €/month </span></p>
                <p><strong>Weekly rental price:</strong> {{ $inmueble->alquiler_semana }} €/week</p>
            @endif
        </div>
    </div>
</body>

</html>

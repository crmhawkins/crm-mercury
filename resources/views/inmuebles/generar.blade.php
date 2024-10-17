<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: 'Roboto Condensed', sans-serif;
        }

        .full-width-image {
            width: 100%;
            height: auto;
            max-height: 400px; /* Limita la altura máxima */
            margin-bottom: 20px;
        }

        .info-container {
            width: 100%;
            margin-bottom: 20px;
        }

        .info-container table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
        }

        .info-container td {
            vertical-align: top;
        }

        .info-container .left,
        .info-container .right {
            width: 50%;
            text-align: left; /* Cambié de 'start' a 'left' para compatibilidad con PDF */
            vertical-align: top;
        }

        .info-container strong {
            font-weight: bold;
        }

        .description {
            margin-top: 10px;
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            color: #333;
            padding: 20px;
            margin-bottom: 40px;
        }

        .gallery {
            margin-top: 20px;
        }

        .gallery img {
            width: 48%; /* Ajuste para dos imágenes por fila */
            height: 200px; /* Altura fija para mantener el cuadrado */
            margin-bottom: 10px;
            float: left; /* Hace que las imágenes se alineen lado a lado */
            margin-right: 4%; /* Espacio entre columnas */
            border: 1px solid #ddd;
            object-fit: cover; /* Asegura que la imagen se ajuste al tamaño sin distorsionarse */
        }

        /* Forzamos que la siguiente fila de imágenes comience en una nueva fila */
        

        .clear {
            clear: both;
        }

    </style>
</head>

<body>

    <!-- Imagen principal -->
    @if(count($galeria) > 0)
    <div>
        <!-- Mostrar siempre la primera imagen del array, sin importar el índice -->
        <img src="{{ public_path(reset($galeria)) }}" class="full-width-image" alt="Imagen principal del inmueble">
    </div>
    @endif

    <div>
        <p style="text-align: right; font-size: 1rem; margin-top: 20px; margin-bottom: 20px;">
            Ref: {{ $inmueble->reference_number }}
        </p>
    </div>

    <div class="info-container">
        <table>
            <tr>
                <td class="left" style="padding-right: 10px; border-right: 1px solid #ccc;">
                    @if($inmueble->disponibilidad == 'Alquiler')
                        @if($inmueble->alquiler_semana)
                            <strong>{{ $inmueble->alquiler_semana }}</strong>
                        @elseif($inmueble->alquiler_mes)
                            <strong>{{ $inmueble->alquiler_mes }} </strong>
                        @else   
                            <strong>{{ $inmueble->daily_rental_price ?? '-' }}</strong><br>
                        @endif
                    @else
                        <strong>{{ $inmueble->precio_venta ?? '-' }}</strong>
                    @endif
                    <strong>Location:</strong> {{ $inmueble->direccion }}, {{ $inmueble->localidad }}<br>
                    <strong>Property type:</strong> {{ $inmueble->tipo_inmueble }}<br>
                    <strong>Zone:</strong> {{ $inmueble->localidad }}
                </td>
                <td class="right" style="padding-left: 10px;">
                    <strong>Area:</strong> {{ $inmueble->m2 ?? '-' }} m²<br>
                    <strong>Built area:</strong> {{ $inmueble->m2_construidos ?? '-' }} m²<br>
                    <strong>Rooms:</strong> {{ $inmueble->habitaciones ?? '-' }}<br>
                    <strong>Bathrooms:</strong> {{ $inmueble->banos }}<br>
                </td>
            </tr>
        </table>
    </div>
    

    <!-- Descripción -->
    <div class="description">
        <strong style="width: 100%; text-align: center; display:block;">DESCRIPTION</strong>
        <p style="white-space: pre-wrap;">{{ $inmueble->descripcion }}</p>
    </div>

    <!-- Galería de fotos en dos columnas con tamaño uniforme -->
    @if(count($galeria) > 0)
    <div style="text-align: center;">
        <strong>PHOTO REPORT</strong>
    </div>

    <div class="gallery">
        @foreach($galeria as $imagen)
        <!-- Evitar mostrar la primera imagen nuevamente -->
        <img src="{{ public_path($imagen) }}" alt="Imagen del inmueble">    
        @if (($loop->iteration ) % 2 == 0) <!-- Limpiar después de cada dos imágenes -->
        <div class="clear"></div>
        @endif
        @endforeach
    </div>
    @else
    <p>No hay imágenes disponibles para esta propiedad.</p>
    @endif

</body>

</html>

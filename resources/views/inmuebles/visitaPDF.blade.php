<!DOCTYPE html>
<html>

<head>
    @php
        use App\Models\Caracteristicas;
    @endphp
    <title>Visiting Sheet</title>
    
    <style type="text/css">
        body {
            font-family: 'Roboto Condensed', sans-serif;
        }

        .m-0 {
            margin: 0px;
        }

        .p-0 {
            padding: 0px;
        }

        .pt-5 {
            padding-top: 5px;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .text-center {
            text-align: center !important;
        }

        .w-100 {
            width: 100%;
        }

        .w-50 {
            width: 50%;
        }

        .w-85 {
            width: 85%;
        }

        .w-15 {
            width: 15%;
        }

        .logo img {
            width: 200px;
            height: 60px;
        }

        .gray-color {
            color: #5D5D5D;
        }

        .text-bold {
            font-weight: bold;
        }

        .border {
            border: 1px solid black;
        }

        table tr,
        th,
        td {
            border: 1px solid #d2d2d2;
            border-collapse: collapse;
            padding: 7px 8px;
        }

        table tr th {
            background: #F4F4F4;
            font-size: 15px;
        }

        table tr td {
            font-size: 13px;
        }

        table {
            border-collapse: collapse;
        }

        .box-text p {
            line-height: 10px;
        }

        .float-left {
            float: left;
        }

        .total-part {
            font-size: 16px;
            line-height: 12px;
        }

        .total-right p {
            padding-right: 20px;
        }
    </style>
</head>

<body>
    <h1>Visiting Sheet</h1>

    <p>Date: {{ $datos['fecha'] }}</p>

    <h2>Customer information</h2>
    <table>
        <tr>
            <th>Full name</th>
            {{ var_dump($datos) }} 
            <td>{{ $datos['cliente']['nombre'] }} {{ $datos['cliente']['apellidos'] }}</td>
        </tr>
        <tr>
            <th>DNI</th>
            <td>{{ $datos['cliente']['dni'] }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $datos['cliente']['email'] }}</td>
        </tr>
        <tr>
            <th>Telephone</th>
            <td>{{ $datos['cliente']['telefono'] }}</td>
        </tr>
    </table>

    <h2>Property information</h2>
    <table>
        <tr>
            <th>Dirección</th>
            <td>{{ $datos['inmueble']['direccion'] }}</td>

            <th>localidad</th>
            <td>{{ $datos['inmueble']['localidad'] }}</td>
        </tr>
        <tr>
            <th>Cod. Postal</th>
            <td>{{ $datos['inmueble']['cod_postal'] }}</td>

            <th>Disponibilidad</th>
            <td>{{ $datos['inmueble']['disponibilidad'] }}</td>
        </tr>
        
        
        <!-- Añade más filas de tabla según sea necesario para mostrar la información del inmueble -->
    </table>

    <h2>Firma</h2>
    <img src="{{ public_path($datos['firma']) }}" alt="Client's signature">
</body>

</html>

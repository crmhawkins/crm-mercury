<?php

// URL de tu aplicación Laravel
$url = 'http://127.0.0.1:8000';

// Inicializar una nueva sesión cURL
$ch = curl_init($url);

// Configurar las opciones de cURL para una solicitud GET
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la solicitud cURL
$response = curl_exec($ch);

// Verificar si hubo algún error
if (curl_errno($ch)) {
    echo 'Error al realizar la solicitud: ' . curl_error($ch);
} else {
    // Obtener el token CSRF de la respuesta
    preg_match('/<meta name="csrf-token" content="(.*)">/', $response, $matches);
    $csrfToken = $matches[1];

    // Mostrar el token CSRF
    echo 'CSRF Token: ' . $csrfToken;
}

// Cerrar la sesión cURL
curl_close($ch);
?>

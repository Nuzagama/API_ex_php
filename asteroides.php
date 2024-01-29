<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astoroides</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astoroides</title>
</head>
<body>
<?php
    // Petición a la API URL
    $apiUrl = "https://api.nasa.gov/neo/rest/v1/neo";
    $apiKey = "VxGkxmBXxTKRyqvZDFaQYtaFb2p1B2urGIrkYBE8";
    // Se almacena el objeto de la función curl
    $curl = curl_init();
    // Establecemos la conexión con la API y le pasamos el parámetro
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, $apiKey . ":");
    $respuesta = curl_exec($curl);
    // Convertimos la respuesta a un Array de Objetos
    $array = json_decode($respuesta, true);
    //var_dump($array);


    ?>








</body>
</html>
</body>
</html>
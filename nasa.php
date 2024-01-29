<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NASA API</title>
</head>
<body>
<?php
    // Petición a la API URL
    $apiUrl = "https://api.nasa.gov/planetary/apod";
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

    $titulo = $array['title'];
    $copyright = $array['copyright'];
    $date = $array['date'];
    $explanation = $array['explanation'];
    $hdurl = $array['hdurl'];
    $media_type = $array['media_type'];
    $service_version = $array['service_version'];
    $url = $array['url'];
    ?>

    <h1>Datos de la NASA</h1>
    <p><?php echo $titulo ?></p>
    <img src="<?php echo $hdurl ?>">
    <p><?php echo $copyright; ?></p>
    <p><?php echo $date; ?></p>
    <p><?php echo $explanation; ?></p>
    <p><?php echo $service_version; ?></p>
    <p><?php echo $media_type; ?></p>
    <img src="<?php echo $url ?>">







</body>
</html>
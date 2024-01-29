<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perro Aleatorio</title>
</head>
<body>
<?php
    // Petición a la API URL
    $apiUrl = "https://dog.ceo/api/breeds/image/random";
    // Se almacena el objeto de la función curl
    $curl = curl_init();
    // Establecemos la conexión con la API y le pasamos el parámetro
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    // Convertimos la respuesta a un Array de Objetos
    $array = json_decode($respuesta, true);
    //var_dump($array);

    $image = $array['message'];
    ?>

    <p>Tu perrito aleatorio</p>
    <img src="<?php echo $image ?>">
</body>
</html>
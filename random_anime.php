<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Anime</title>
</head>
<body>
    <?php
    // Petición a la API URL
    $apiUrl = "https://api.jikan.moe/v4/random/anime";
    // Se almacena el objeto de la función curl
    $curl = curl_init();
    // Establecemos la conexión con la API y le pasamos el parámetro
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    // Convertimos la respuesta a un Array de Objetos
    $array = json_decode($respuesta, true);
    //var_dump($array);

    $anime = $array['data'];
    $titulo = $anime['title'];
    $imagen = $anime['images']['jpg']['image_url'];
    $episodes = $anime['episodes'];
    $duration = $anime['duration'];
    $rating = $anime['rating'];
    ?>

    <p><?php echo $titulo ?></p>
    <img src="<?php echo $imagen ?>">
    <p><?php echo 'Número de episodios: ' . $episodes; ?></p>
    <p><?php echo 'Duración: ' . $duration; ?></p>
    <p><?php echo 'Edad Recomendada: ' . $rating; ?></p>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Anime</title>
</head>
<body>

    <form action="" method="POST">
        <input type="text" name="titulo"><br><br>
        <select name="limit">
            <option value="">Sin límite</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br><br>
        <label type="text" name="min_score">Mín Score</label>
        <select name="min_score">
            <?php
            for($i = 1; $i < 11; $i++){
                echo '<option value='.$i.'>'.$i.'</option>';
            }
            ?>
        </select>
        <br><br>
        <label type="text" name="max_score">Max Score</label>
        <select name="max_score">
            <?php
            for($i = 10; $i > 0; $i--){
                echo '<option value='.$i.'>'.$i.'</option>';
            }
            ?>
        </select>
        <input type="submit" value="Buscar">
    </form>

    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Petición a la API URL
    $titulo = $_POST["titulo"];
    $limit = $_POST["limit"];
    $minScore = $_POST['min_score'];
    $maxScore = $_POST['max_score'];
    $titulo = preg_replace('/\s+/','+',$titulo);
    $apiUrl = "https://api.jikan.moe/v4/anime?q=$titulo&limit=$limit&min_score=$minScore&max_score=$maxScore";
    // Se almacena el objeto de la función curl
    $curl = curl_init();
    // Establecemos la conexión con la API y le pasamos el parámetro
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    // Convertimos la respuesta a un Array de Objetos
    $array = json_decode($respuesta, true);
    $animes = $array['data'];

    foreach($animes as $anime){?>
        <h1><?php echo $anime['title'] ?></h1>
        <p><a href="show_anime.php?id=<?php echo $anime['mal_id']?>">Ver detalles</a></p>
        <img src="<?php echo $anime['images']['jpg']['image_url']?>">
        <h1><?php echo $anime['score']?></h1>



    <?php   }



    }



    ?>


</body>
</html>
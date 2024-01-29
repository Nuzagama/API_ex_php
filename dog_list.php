<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perro Listado</title>
</head>
<body>

<form action="" method="POST">
        <label type="text" name="titulo">Seleccionar Raza</label>
        <select name="raza">
            <?php
            foreach($dogs as $dog){
                echo '<option value='. $dog .'>'.$dog.'</option>';
            }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Buscar">
    </form>

<?php
    // Petición a la API URL
    $apiUrl = "https://dog.ceo/api/breeds/list/all";
    // Se almacena el objeto de la función curl
    $curl = curl_init();
    // Establecemos la conexión con la API y le pasamos el parámetro
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    // Convertimos la respuesta a un Array de Objetos
    $array = json_decode($respuesta, true);
    $dogs = $array['message'];
    var_dump($dogs);
    ?>
</body>
</html>
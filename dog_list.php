<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perro Listado</title>
</head>
<body>

<?php
    // Petición a la API URL
    $apiUrl = "https://dog.ceo/api/breeds/list/all";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    // -> message accedemos a la propiedad del objeto
    $data = json_decode($respuesta)->message;

    $imagenAleatoria = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["raza"])) {
            $razaSeleccionada = $_POST["raza"];
            $dogRazaUrl = "https://dog.ceo/api/breed/$razaSeleccionada/images/random";

            curl_setopt($curl, CURLOPT_URL, $dogRazaUrl);
            $respuestaImagen = curl_exec($curl);
            $respuestaImagen = json_decode($respuestaImagen);
            $imagenAleatoria = $respuestaImagen->message;
        }
    }

    curl_close($curl);
?>

<form action="" method="POST">
    <label>Seleccionar Raza</label>
    <select name="raza">
        <?php
        if ($data) {
            foreach ($data as $raza => $subRazas) {
                if (empty($subRazas)) {
                    echo "<option value=\"$raza\">$raza</option>";
                } else {
                    foreach ($subRazas as $subRaza) {
                        echo "<option value=\"$raza/$subRaza\">$subRaza - $raza</option>";
                    }
                }
            }
        } else {
            echo "<option>Error al cargar razas</option>";
        }
        ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar">
</form>

<?php
    if ($imagenAleatoria != '') {
        echo "<img src=\"$imagenAleatoria\" alt=\"Imagen de perro\">";
    }
?>

</body>
</html>

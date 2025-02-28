<?php

// Definimos la URL de la API
const API_URL = "https://whenisthenextmcufilm.com/api";

$result = file_get_contents(API_URL); // Realiza una solicutud GET a la API
$data = json_decode($result,true); // Decodifica la respuesta JSON en un array
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Próxima película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
</head>
<body>
    <br><br>
    <div class="container movie-container">
        <img class="movie-image" src="<?= $data["poster_url"] ?>" alt="<?= $data["title"]?>" class="movie-image">
        <h2 class="mt-4"><?= $data["title"] ?> se estrena en <?= $data["days_until"]?> días</h2>
        <p class="fs5">Fecha de estreno <strong><?= $data["release_date"]?></strong></p>
        <p class="fs6 text-secondary">La siguiente es: <strong> <?= $data["following_production"]["title"]?></strong></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
require 'PokeAPI.php';
require 'Pokemon.php';

$apiClient = new ApiClient();
$data = $apiClient->getPokemon('ditto');

$pokemon = new Pokemon($data);
$info = $pokemon->getInfo();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'templates/head.php'; ?> 
</head>

<body>
    <?php include 'templates/body.php'; ?> 
</body>

</html>
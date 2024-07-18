<?php
require_once 'src/GameMaster.php';

$gameMaster = new GameMaster();
$gameMaster->lancerTout();
$resultats = $gameMaster->obtenirResultats();
$tauxReussite = $gameMaster->obtenirTauxReussite();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats des tirages</title>
</head>
<body>
<h1>Résultats des tirages</h1>
<h2>Résultats:</h2>
<pre><?php print_r($resultats); ?></pre>
<h2>Taux de réussite:</h2>
<pre><?php print_r($tauxReussite); ?></pre>
</body>
</html>

<?php
session_start();

# retourne une chaîne de caractères indiquant
# le résultat, où '$x' et '$y' sont les nombres
# dont il fallait deviner la valeur du produit
# et '$user' la valeur proposée par l'utilisateur
function resultat($x, $y, $user): string
{
    if ($x * $y == $user) {
        return "Bravo, vous avez raison, $x x $y = $user !";
    } else {
        $result = $x * $y;
        return "Faux : $x x $y = $result et non $user";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>TP 3 - Exo 1</title>
    <meta name="author" content="Marc Gaetano">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <link rel="stylesheet" href="../css/tp3.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>TP 3 - Exo 1</h1>
<hr>

<h2>Multiplication</h2>
<p>
    <?php
    echo resultat($_SESSION["x"], $_SESSION["y"], $_GET["utilisateur"]);
    ?>
</p>
<p>
    <a href="formulaire.php">Autre multiplication</a>
</p>
</body>
</html>

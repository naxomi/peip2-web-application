<?php

# retourne le code HTML (une chaîne de caractères)
# correspondant à un élément SELECT dont l'attribut
# 'name' vaut '$name' et contenant '$max' éléments
# OPTION
function select($name, $max)
{
    $output = sprintf("<select name=%s>", $name);

    for ($i = 1; $i <= 9; $i++) {
        $output .= sprintf("<option value = 0%s>%s</option>", $i, $i);
    }

    if ($max >= 10) {
        for ($i = 1; $i <= $max; $i++) {
            $output .= sprintf("<option value = %s>%s</option>", $i, $i);
        }
    }

    return $output . "</select>";
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>TP 1 - Exo 10</title>
    <meta name="author" content="Marc Gaetano">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <link rel="stylesheet" href="css/tp1.css">
</head>
<body>
<h1>TP 1 - Exo 10</h1>
<hr>
<form action="exo10.php" method="get">
    Jour :
    <?php
    echo select("jour", 31);
    ?>
    <br><br>
    Mois :
    <?php
    echo select("mois", 12);
    ?>
    <br><br>
    Année : <input type="text" name="annee"/>
    <br><br>
    <input type="submit" value="Envoyer"/>
</form>
</body>
</html>

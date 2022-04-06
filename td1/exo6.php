<?php

	# retourne le code HTML (une chaîne de caractères)
	# d'une table '$n'x'$n' représentant un échiquier
	# alternant cases blanches et noires
	function table($n) {
        $output = "<table class=\"exo7\"><tbody><tr>";

        for ($nb1 = 0; $nb1 < $n; $nb1++) {
            for ($nb2 = 0; $nb2 < $n; $nb2++) {
                if (($nb1 * ($n + 1) + $nb2) % 2 == 0) {
                    $color = "noir";
                }
                else {
                    $color = "blanc";
                }
                $output .= "<td class=\"{$color}\"></td>";
            }
            $output .= "</tr>";
            if ($nb1 != $n) {
                $output .= "<tr>";
            }
        }
        $output .= "</tbody></table>";
        return $output;
	}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>TP 1 - Exo 6</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 6</h1>
		<hr>
		<?php
		    $value = $_GET["taille"];
		    if ($value != null) {
		        echo "<h2>Échiquier {$value}x{$value}</h2>";
		        echo table($value);
		    }
		    else {
		        echo "<h2>Échiquier 8x8</h2>";
		        echo table(8);
		    }
		?>
	</body>
</html>
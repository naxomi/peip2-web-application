<?php

	# retourne le code HTML (une chaîne de caractères)
	# d'une table 10x10 contenant les 10 tables de
	# multiplication
	function table() {
	    $output = "<table class=\"exo6\"><tbody><tr>";

        for ($nb1 = 1; $nb1 <= 10; $nb1++) {
            for ($nb2 = 1; $nb2 <= 10; $nb2++) {
                $result = $nb1 * $nb2;
                $output .= "<td><strong>{$nb1}</strong> x {$nb2} = {$result}</td>";
            }
            $output .= "</tr>";
            if ($nb1 != 10) {
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
		<title>TP 1 - Exo 5</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 5</h1>
		<hr>
		<?php echo table()?>
	</body>
</html>

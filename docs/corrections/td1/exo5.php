<?php

	# retourne le code HTML (une chaîne de caractères)
	# d'une table 10x10 contenant les 10 tables de
	# multiplication
	function table() {
		$t = "<table class='exo6'>\n";
		for ( $ligne = 1; $ligne <= 10; $ligne++ ) {
			$t .= "  <tr>\n";
			for ( $colonne = 1; $colonne <= 10; $colonne++ ) {
				$t .= "    <td><strong>$ligne</strong> x $colonne = " . ($ligne * $colonne) . "</td>\n";
			}
			$t .= "  </tr>\n";
		}
		$t .= '</table>';
		return $t;
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
		<?php echo table(); ?>
	</body>
</html>

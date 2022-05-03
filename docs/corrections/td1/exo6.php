<?php

	# retourne le code HTML (une chaîne de caractères)
	# d'une table '$n'x'$n' représentant un échiquier
	# alternant cases blanches et noires
	function table($n) {
		$t = '<table class="exo7">';
      	for ( $row = 1; $row <= $n; $row++ ) {
      		$blanc = $row % 2 == 0;
          	$t .= "  <tr>\n";
          	for ( $col = 1; $col <= $n; $col++ ) {
          		if ( $blanc )
          			$class = "blanc";
				else
					$class = "noir";
				$blanc = ! $blanc;
          		$t .= "    <td class='$class'></td>\n";
          	}
          	echo "  </tr>\n";
		}
		$t .= '</table>';
		return $t;
	}

	if ( isset( $_GET[ "taille" ]) )
		$taille = $_GET[ "taille" ];
	else
		$taille = 8;

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
		<h2>Echiquier <?php echo "{$taille}x$taille" ?></h2>
		<?php echo table( $taille ); ?>
	</body>
</html>

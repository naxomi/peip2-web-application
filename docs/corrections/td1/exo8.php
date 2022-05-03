<?php

	# retourne un tableau à deux éléments [ C , N ] où :
	# - C est une chaîne de caractères de la forme
	#   "n1, n2, n3, n4, n5" où n1, n2,..., n5
	#   sont cinq nombres triés croissant tirés au hasard
	#   dans l'intervalle [1, 49]
	# - N un nombre tiré au hasard dans l'intervalle [1, 10]
	function loto() {
		$loto =  array();
		while ( count( $loto ) < 5 ) {
			$n = rand(1,49);
			if ( ! in_array($n,$loto) )
				$loto[] = $n;
		}
		sort($loto);
		return [ join(",",$loto) , rand(1,10) ];
	}

	$loto = loto();

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 1 - Exo 8</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>

	<body>
		<h1>TP 1 - Exo 8</h1>
		<hr>
		<h2>Loto Flash</h2>
		<p>
			Les cinq numéros : <?php echo $loto[0]; ?> - Le numéro chance : <?php echo $loto[1]; ?>
		</p>
		<p>
			<a class="bouton" href="exo8.php">Un autre Loto Flash</a>
		</p>
	</body>
</html>

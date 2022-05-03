<?php

	# retourne le nom du jour de la semaine
	# correspondant à '$week', le  numéro du
	# jour de la semaine (0 -> dimanche, 1 -> lundi, ...)
	function jour($week) {
		switch ( $week ) {
			case 0: $jour = "dimanche"; break;
			case 1: $jour = "lundi"; break;
			case 2: $jour = "mardi"; break;
			case 3: $jour = "mercredi"; break;
			case 4: $jour = "jeudi"; break;
			case 5: $jour = "vendredi"; break;
			default: $jour = "samedi"; break;
		}
		return $jour;
	}

	# retourne le nom du mois correspondant à '$month',
	# le  numéro du mois (1 -> janvier, 2 -> février, ...)
	function mois($month) {
		switch ( $month ) {
			case 1: $mois = "janvier"; break;
			case 2: $mois = "février"; break;
			case 3: $mois = "mars"; break;
			case 4: $mois = "avril"; break;
			case 5: $mois = "mai"; break;
			case 6: $mois = "juin"; break;
			case 7: $mois = "juillet"; break;
			case 8: $mois = "août"; break;
			case 9: $mois = "septembre"; break;
			case 10: $mois = "octobre"; break;
			case 11: $mois = "novembre"; break;
			default: $mois = "décembre"; break;
		}
		return $mois;
	}

	$day = date("j");
	$jour = jour(date("w"));
	$mois = mois(date("n"));
	$year = date("Y")	
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>TP 1 - Exo 2</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 2</h1>
		<hr>
		<h2>
			Nous sommes le <?php echo "$jour $day $mois $year"; ?>
		</h2>
	</body>
</html>

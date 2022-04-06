<?php
	# retourne le nom du jour de la semaine
	# correspondant à '$week', le  numéro du
	# jour de la semaine (0 -> dimanche, 1 -> lundi, ...)
	function jour($day_name_number) {
        $day_list = array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
        return $day_list[$day_name_number];
	}

	# retourne le nom du mois correspondant à '$month',
	# le  numéro du mois (1 -> janvier, 2 -> février, ...)
	function mois($month_number) {
        $month_list = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");
	    return $month_list[$month_number+1];
	}
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
            <?php
            $day_name = jour(date("w"));
            $day = date("d");
            $month = mois(date("m"));
            $year = date("Y");

            echo "Nous sommes le {$day_name} {$day} {$month} {$year}";
            ?>
		</h2>
	</body>
</html>

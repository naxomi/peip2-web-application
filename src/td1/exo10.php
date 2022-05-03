<?php
	# retourne le nom du jour de la semaine
	# correspondant à '$week', le  numéro du
	# jour de la semaine (0 -> dimanche, 1 -> lundi, ...)
	function jour($day_id) {
        $day_name_list = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"];
        return $day_name_list[$day_id];
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
		<h2>
            <?php
            $day_number = (string) $_GET["jour"];
            $month_number = (string) $_GET["mois"];
            $year = $_GET["annee"];

            $day_id = date('w', strtotime(sprintf("%s-%s-%s", $year, $month_number, $day_number)));
            $day_name = jour($day_id);

            echo sprintf("Le %s/%s/%s est un %s", $day_number, $month_number, $year, $day_name);

            ?>
        </h2>
	</body>
</html>

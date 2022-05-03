<?php

	function select($name,$max) {
		$r = "<select name='$name'>\n";
		for ( $i = 1; $i <= $max; $i++ ) {
			$r .= "  <option value='$i'>$i</option>\n";
		}
		$r .= "</select>\n";
		return $r;
	}
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
		<form action="exo10.php" method="get">
			Jour :
<?php
				echo select("jour",31);
?>
			<br><br>
			Mois : 
<?php
				echo select("mois",12);
?>
			<br><br>			
			Année : <input type="text" name="annee" />
			<br><br>
			<input type="submit" value="Envoyer" />
		</form>
	</body>
</html>

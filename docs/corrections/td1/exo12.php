<?php

	function formulaire($secret,$essais) {
		$r = "<form class='exo10' method='post'>\n";
		$r .= "  Votre proposition : <input type='text' name='proposition'>\n";
		$r .= "  <input type='hidden' name='essais' value='$essais'>\n";
		$r .= "  <input type='hidden' name='secret' value='$secret'>\n";
		$r .= "  <input type='submit' value='Vérifier'>\n";
		$r .= "</form>\n";
		return $r;
	}

	function resultat($secret,$essais,$proposition) {
		$r = "<h2>Vous proposez $proposition :</h2>\n";
		if ( $proposition == $secret) {
			$r .= "<h3>Bravo, vous avez trouvé en $essais essai(s) !</h3>\n";
		}
		else {
			if ( $proposition > $secret )
				$r .= "<h3>Trop grand, essayez encore...</h3>\n";
			else
				$r .= "<h3>Trop petit, essayez encore...</h3>\n";			
		}
		return $r;
	}

	function debut() {
		$secret = rand(1,100);
		$essais = 1;
		$r = "<h3>Je pense à un nombre compris entre 1 et 100... à vous de le deviner !</h3>\n";
		$r .= formulaire($secret,$essais);
		return $r;
	}

	function fin() {
		return '<a class="bouton" href="exo12.php">Autre partie</a>';
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
<?php
	if ( isset( $_POST[ "secret" ] ) ) {
		$secret = intval($_POST[ "secret" ]);
		$essais = intval($_POST[ "essais" ]);
		$proposition = intval($_POST[ "proposition" ]);
		echo resultat($secret,$essais,$proposition);
		if ( $proposition == $secret)
			echo fin();
		else
			echo formulaire($secret,$essais + 1);
	}
	else {
		echo debut();
	}
?>
	</body>
</html>

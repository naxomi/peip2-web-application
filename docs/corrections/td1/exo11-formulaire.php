<?php

	$x = rand(2,9);
	$y = rand(2,9);
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 1 - Exo 11</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 11</h1>
		<hr>
		<form action="exo11-action.php" method="get">
			<?php echo $x; ?> x <?php echo $y; ?> = <input type="text" name="utilisateur">
			<br><br>
			<input type="submit" value="Envoyer">
			<input type="hidden" name="nb1" value="<?php echo $x; ?>">
			<input type="hidden" name="nb2" value="<?php echo $y; ?>">
		</form>

	</body>
</html>

<?php

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
            <div>
                <?php
                $x = rand(2, 10);
                $y = rand(2, 10);
                $x_input = "<input type='hidden' name='x' value=$x>";
                $y_input = "<input type='hidden' name='y' value=$y>";
                $label = "<label>$x * $y = </label>";

                echo $x_input . $y_input . $label;
                ?>
                <input name="user" type="number" />
            </div>
		</form>
	</body>
</html>

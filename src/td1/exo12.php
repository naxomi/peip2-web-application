<?php
function output_from_guess($guess, $tries, $answer)
{
    echo "<h2>Vous proposez $guess :</h2>";

    if ($guess == $answer) {
        return "<h3>Bravo, vous avez trouvé en $tries essai(s) !</h3>";
    } else if ($guess < $answer) {
        return "<h3>Trop petit, essayez encore...</h3>";
    } else {
        return "<h3>Trop grand, essayez encore...</h3>";
    }
}

function guess_form($tries, $answer) {
    $tries++;
    $form = "
        <form class='exo10' method='get'>
            <input type='number' name='guess'>
            <input type='hidden' name='tries' value=$tries>
            <input type='hidden' name='answer' value=$answer>
            <input type='submit' value='Vérifier'>
        </form>
    ";
    return $form;
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>TP 1 - Exo 12</title>
    <meta name="author" content="Marc Gaetano">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <link rel="stylesheet" href="css/tp1.css">
</head>
<body>
<h1>TP 1 - Exo 12</h1>
<hr>
<?php
if (isset($_GET["guess"])) {

    echo output_from_guess($_GET["guess"], $_GET["tries"], $_GET["answer"]);

    if ($_GET["guess"] == $_GET["answer"]) {
        echo "<a class='bouton' href='exo12.php'>Autre partie</a>";
    }
    else {
        echo guess_form($_GET["tries"], $_GET["answer"]);
    }

} else {
    echo "<h3>Je pense à un nombre compris entre 1 et 100... à vous de le deviner !</h3>";
    echo guess_form(0, rand(1, 100));
}
?>
</body>
</html>

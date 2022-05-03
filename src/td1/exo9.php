<?php

# retourne la chaîne '$s' normalisée
# (toutes les lettres en minuscule sauf la première)
function normalize($string)
{
    return substr($string, 0, 1) . strtolower(substr($string, 1));
}

# Teste si les prénom et nom sont bien renseignés et
# retourne le tableau des messages d'erreurs
# (tableau vide s'il n'y a pas d'erreur)
function check_input()
{
    $errors = array();

    if ($_GET["civilite"] == null) {
        $errors[] = "Courtesy Title must be specified";
    }
    if ($_GET["nom"] == null) {
        $errors[] = "Surname must be specified";
    }
    if ($_GET["prenom"] == null) {
        $errors[] = "Lastname must be specified";
    }

    return $errors;
}

# retourne le code HTML (une chaîne de caractères)
# d'une liste "<ul><li>..</li>..</ul>", les
# éléments de liste contenant les erreurs
# contenues dans le tableau '$errors'
function display_errors($errors)
{
    $output = "<ul>";
    foreach ($errors as $element) {
        $output .= "<li>" . $element . "</li>";
    }
    $output .= "</ul>";

    return $output;
}

# retourne le code HTML (une chaîne de caractères)
# d'un heading "<h2>...</h2>" contenant le message
# de bienvenue en anglais
function display_welcome($day_period, $courtesy_title, $surname, $lastname)
{
    return sprintf("Good %s %s %s %s, welcome to Polytech!!", $day_period, $courtesy_title, $surname, $lastname);
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>TP 1 - Exo 9</title>
    <meta name="author" content="Marc Gaetano">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <link rel="stylesheet" href="css/tp1.css">
</head>
<body>
<h1>TP 1 - Exo 9</h1>
<hr>
<?php

$input_errors = check_input();
$valid_input = (count(check_input()) == 0);

if ($valid_input) {
    $courtesy_title = $_GET["civilite"];
    $lastname = normalize($_GET["nom"]);
    $surname = normalize($_GET["prenom"]);
    $hour = date("H");

    if ($hour >= 0 && $hour < 12) {
        $day_period = "morning";
    } else if ($hour >= 12 && $hour < 18) {
        $day_period = "afternoon";
    } else {
        $day_period = "evening";
    }
    echo display_welcome($day_period, $courtesy_title, $surname, $lastname);
} else {
    echo display_errors($input_errors);
}
?>
</body>
</html>

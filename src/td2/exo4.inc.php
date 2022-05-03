<?php

// remplit les tableaux '$day', '$month' et '$lang'
// à partir des informations contenues dans les fichiers
// '*.txt' contenus dans le répertoire '$folderpath'
function fillArrays($folderpath, &$day, &$month, &$lang)
{
    $file_names = array_slice(scandir($folderpath), 2);
    $i = 1;
    foreach ($file_names as $file_name) {
        $file_path = $folderpath .  "/" . $file_name;
        $file_content = file($file_path);
        $lang["lang$i"] = $file_content[0];
        $day["lang$i"] = explode(",", $file_content[1]);
        $month["lang$i"] = explode(",", $file_content[2]);
        $i++;
    }
}

// pour comprendre ce que cette fonction doit générer
// regardez le code source HTML du fichier exemple fourni
function makeRadio($keyval, $name)
{
    $output = "<div>";

    foreach ($keyval as $key => $lang) {
        $output .= "
				<fieldset>
					<input type='radio' name=$name value='$key'>
					$lang
				</fieldset>
			";
    }

    return $output . "</div>";
}

// retourne une chaîne de caractères qui donne
// la date dans la langue déterminée par le code '$langue'
function makeDate($langue, $jour, $mois)
{
    $output = JOUR[$langue][$jour];
    $output .= " " . date("d");
    $output .= " " . MOIS[$langue][$mois];
    $output .= " " . date("Y");

    return $output;
}

$LANGUE = [];
$JOUR = [];
$MOIS = [];

fillArrays("exo4", $JOUR, $MOIS, $LANGUE);

define("LANGUE", $LANGUE);
define("JOUR", $JOUR);
define("MOIS", $MOIS);
?>

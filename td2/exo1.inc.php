<?php

const JOUR = [
    "lang1" => ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"],
    "lang2" => ["Domenica", "Lunedì", "Martedì", "Mercoledì", "Giovedì", "Venerdì", "Sabato"],
    "lang3" => ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
];

const MOIS = [
    "lang1" => ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
    "lang2" => ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"],
    "lang3" => ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
];

const LANGUE = ["lang1" => "français", "lang2" => "italien", "lang3" => "anglais"];

// pour comprendre ce que cette fonction doit générer
// regardez le code source HTML du fichier exemple fourni
function makeRadio($keyval, $name)
{
    $output = "<div>";

    foreach ($keyval as $key => $lang) {
        $output .= "
				<fieldset>
					<input type='radio' name='langue' value='$key'>
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

?>

<?php

// pour comprendre ce que cette fonction doit générer
// regardez le code source HTML du fichier exemple fourni
function makeRadio($info, $name)
{
    $output = "<div>";

    foreach ($info as $key => $country_info) {
        $output .= "
				<fieldset>
					<input type='radio' name='codepays' value='$key'>
					$country_info[0]
				</fieldset>
			";
    }

    return $output . "</div>";
}

// retourne le nom du pays de clef '$key'
// '$key' est la clef dp nt la valeur est
// l'information dans le tableau associatif '$info'
function getCountryName($key, $info)
{
    return $info[$key][0];
}

// retourne le nom de la capitale de clef '$key'
// '$key' est la clef dp nt la valeur est
// l'information dans le tableau associatif '$info'
function getCapitalName($key, $info)
{
    return $info[$key][2];
}

// retourne l'élément HTML IMG qui est l'image
// du pays de clef '$key'
// '$key' est la clef dp nt la valeur est
// l'information dans le tableau associatif '$info'
function getCountryImage($key, $info)
{
    $name = getCountryName($key, $info);
    return sprintf("<img class='exo2-3' src=exo2-3/%s alt=$name title=$name>", $info[$key][1]);
}

// retourne l'élément HTML IMG qui est l'image
// de la capitale de clef '$key'
// '$key' est la clef dp nt la valeur est
// l'information dans le tableau associatif '$info'
function getCapitalImage($key, $info)
{
    $name = getCapitalName($key, $info);
    return sprintf("<img class='exo2-3' src=exo2-3/%s alt=$name title='$name'>", $info[$key][3]);
}

$INFO = [];
//// ici on doit remplir le tableau $INFO à partir des données contenues dans le fichier 'exo2-3/data.csv'
$countries_infos = file("exo2-3/data.csv");
$i = 1;
foreach ($countries_infos as $country_info) {
    $INFO["pays$i"] = explode(",", $country_info);
    $i++;
}

define("INFO", $INFO);
?>

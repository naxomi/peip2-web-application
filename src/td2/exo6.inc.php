<?php

// retourne une chaîne de caractères identique
// à '$nom' mais avec tous les caractères en
// minuscule et avec la première lettre en majuscule
function normalize($nom)
{
    $nom = (string)$nom;
    return strtoupper(substr($nom, 0, 1)) . strtolower(substr($nom, 1));
}

// lit le fichier '$student_file' et retourne un tableau
// associatif de la forme [ ID => [ PRENOM , NOM ], ... ]
// où ID est l'identifiant, PRENOM le prénom et
// NOM le nom de l'étudiant
function student_array($student_file)
{
    $output = [];
    $students_data_array = file($student_file);
    foreach ($students_data_array as $student_data) {
        $list_student_data = explode(";", $student_data);
        $output[$list_student_data[0]] = array_slice($list_student_data, 1);
    }
    return $output;
}

// lit le fichier '$score_file' et retourne un tableau
// associatif de la forme [ ID => [ NOTE1, NOTE2, NOTE3 ], ... ]
// où ID est l'identifiant, et NOTE1, NOTE2 et NOTE3 les trois
// notes obtenues par l'étudiant
function score_array($score_file)
{
    $output = [];
    $students_scores_array = file($score_file);
    foreach ($students_scores_array as $student_scores) {
        $list_student_scores = explode(";", $student_scores);
        $output[$list_student_scores[0]] = array_slice($list_student_scores, 1);
    }
    return $output;
}

// retourne la moyenne des valeurs
// contenues dans le tableau '$tabnotes'
function average($tabnotes)
{
    $average = array_sum($tabnotes) / sizeof($tabnotes);
    return number_format($average, 2);
}

// retourne le TR adéquat qui contient successivement dans
// les sept TD successifs l'identifiant, le prénom, le nom,
// les trois notes, la moyenne de ces notes et le lien
// pour pouvoir modifier les informations de l'étudiant
function student_score($id, $student_data, $student_score)
{
    $output = "<tr><td>$id</td>";

    $first_name = normalize($student_data[0]);
    $last_name = normalize($student_data[1]);
    $average_score = average($student_score);

    $output .= "<td>$first_name</td>";
    $output .= "<td>$last_name</td>";
    $output .= "<td>{$student_score[0]}</td>";
    $output .= "<td>{$student_score[1]}</td>";
    $output .= "<td>{$student_score[2]}</td>";
    $output .= "<td>$average_score</td>";
    $output .= "<td><a href='exo6-mod-formulaire.php?id=$id'>Modifier</a></td>\n";

    return $output . "</tr>";
}

// retourne les TR adéquats qui contiennent successivement
// les informations des étudiants sélectionnés suivant la
// valeur de '$name' :
// - si '$name' est le prénom de l'étudiant, l'étudiant est sélectionné
// - si '$name' est le nom de l'étudiant, l'étudiant est sélectionné
// - si '$name' est la chaîne vide, l'étudiant est sélectionné
function table_content($name, $students, $scores)
{
    $output = "";

    $students_data = student_array($students);
    $scores_data = score_array($scores);

    foreach ($students_data as $id => $info) {
        if ($name == "" || $name == $info[0] || $name == trim($info[1])) {
            $output .= student_score($id, $info, $scores_data[$id]);
        }
    }

    return $output;
}

// retourne le contenu de l'élément HTML FORM
// pour comprendre ce que cette fonction doit générer
// regardez le code source HTML du fichier exemple fourni
function form_content($id, $students_file, $scores_file)
{
    $students = student_array($students_file);
    $scores = score_array($scores_file);

    $info = $students[$id];

    $firstname = $info[0];
    $lastname = $info[1];
    $output = "<tr>";
    $output .= "<td>$id</td>";
    $output .= "<td><input type='text' name='prenom' value='$firstname'></td>";
    $output .= "<td><input type='text' name='nom' value='$lastname'></td>";

    $score = $scores[$id];
    for ($i = 0; $i < 3; $i++) {
        $output .= "<td><input type='number' step='0.01' name='note" . ($i + 1) . "' value='" . floatval($score[$i]) . "'></td>";
    }
    $average = round(average($score), 2);
    $output .= "<td>$average</td>";
    $output .= "<td><input type='submit' name='submit' value='Valider'></td>";
    $output .= "<td style='display:none;'><input type='hidden' name='id' value='$id'></td>";
    $output .= "</tr>";

    return $output;
}

// sauve le tableau associatif '$array' dans le
// fichier '$file' au format CSV. Le tableau est de
// la forme [ ID => INFO ] où INFO est un tableau de
// valeurs (associatif ou pas)
function save_array($array, $file)
{
    $output = "";
    foreach ($array as $id => $info) {
        $output .= $id . ";" . implode(";", $info) . "\n";
    }
    file_put_contents($file, $output);
}

// modifie le contenu du tableau '$students' en associant les
// valeurs '$firstnme' et '$lastname' aux clefs 'prenom' et 'nom'
// pour la clef '$id'
function update_student_array(&$students, $id, $firstname, $lastname)
{
    $students[$id][0] = $firstname;
    $students[$id][1] = $lastname;
}

// modifie le contenu du tableau '$scores' en associant les
// valeurs '$score1', '$score2' et '$score3' à la clef '$id'
function update_score_array(&$scores, $id, $score1, $score2, $score3)
{
    $scores[$id] = [$score1, $score2, $score3];
}

const STUDENT_FILE = "exo5-6/students.csv";
const SCORE_FILE = "exo5-6/scores.csv";

?>

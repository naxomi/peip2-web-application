<?php

// retourne une chaîne de caractères identique
// à '$nom' mais avec tous les caractères en
// minuscule et avec la première lettre en majuscule
function normalize($nom): string
{
    $nom = (string)$nom;
    return strtoupper(substr($nom, 0, 1)) . strtolower(substr($nom, 1));;
}

// lit le fichier '$student_file' et retourne un tableau
// associatif de la forme [ ID => [ PRENOM , NOM ], ... ]
// où ID est l'identifiant, PRENOM le prénom et
// NOM le nom de l'étudiant
function student_array($student_file): array
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
function score_array($score_file): array
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
function average($tabnotes): float
{
    $average = array_sum($tabnotes) / sizeof($tabnotes);
    return number_format($average, 2);
}

// retourne le TR adéquat qui contient successivement dans
// les sept TD successifs l'identifiant, le prénom, le nom,
// les trois notes et la moyenne de ces notes
function student_score($id, $student_data, $student_score): string
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

    return $output . "</tr>";
}

// retourne les TR adéquats qui contiennent successivement
// les informations des étudiants sélectionnés suivant la
// valeur de '$name' :
// - si '$name' est le prénom de l'étudiant, l'étudiant est sélectionné
// - si '$name' est le nom de l'étudiant, l'étudiant est sélectionné
// - si '$name' est la chaîne vide, l'étudiant est sélectionné
function table_content($name, $students, $scores): string
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

const STUDENT_FILE = "exo5-6/students.csv";
const SCORE_FILE = "exo5-6/scores.csv";

?>

<?php

function check_password($login, $password): bool
{
    $login_data = array();
    $file_data = file("users.csv");
    foreach ($file_data as $user_data) {
        $user_data_list = explode(",", $user_data);
        $login_data[$user_data_list[0]] = $user_data_list[1];
    }
    if (strcmp($password, trim($login_data[$login])) == 0) {
        return true;
    }
    return false;
}

session_start();
// à compléter
// Dans cette partie, on teste le login et le mot de passe :
// - on teste si le login proposé existe bien
// - on teste si le mot de passe correspond
// En cas de succès, on redirige l'utilisateur vers page1.php
// En cas d'échec, on redirige l'utilisateur vers la page de login

if (isset($_POST["login"]) && isset($_POST["password"])) {
    $_SESSION["login"] = $_POST["login"];
    $_SESSION["password"] = $_POST["password"];

    $login = $_SESSION["login"];
    $password = $_SESSION["password"];
    if (check_password($login, $password)) {
        header("Location: page1.php");
    } else {
        header("Location: signin.php");
    }
} else {
    header("Location: signin.php");
}
exit();

<?php
session_start();
// à compléter
// Dans cette partie, on teste le login et le mot de passe :
// - on teste si le login proposé existe bien
// - on teste si le mot de passe correspond
// En cas de succès :
// - si le paramètre "goto" existe, on redirige l'utilisateur vers le script
//   qui est la valeur de ce paramètre
// - sinon on redirige l'utilisateur vers "page1.php"
// En cas d'échec, on redirige l'utilisateur vers la page de login


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

if (isset($_POST["login"]) && isset($_POST["password"])) {
    $_SESSION["login"] = $_POST["login"];

    $login = $_SESSION["login"];
    $password = hash("md5", $_POST["password"]);
    if (check_password($login, $password)) {
        if (isset($_GET["goto"])) {
            header("Location: {$_GET["goto"]}");
        } else {
            header("Location: page1.php");
        }
    } else {
        session_unset();
        session_regenerate_id();
        session_destroy();
        header("Location: signin.php?badlogin=true");
    }
} else {
    session_unset();
    session_regenerate_id();
    session_destroy();
    header("Location: signin.php?badlogin=true");
}
exit();

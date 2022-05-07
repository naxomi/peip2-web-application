<?php
session_start();
// à compléter
// dans cette partie, on détruit la session
// et on redirige l'utilisateur vers la page de login
session_unset();
session_regenerate_id();
session_destroy();
header("Location: signin.php");
exit();
?>

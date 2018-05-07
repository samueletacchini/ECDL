<?php

session_start();

if (isset($_REQUEST["email"])) {

    require_once('ConnessioneDb.php');
    $db = new ConnessioneDb();
    //trim toglie gli spazi bianchi doppi o tripli ed evita problemi di SQL INJECTION
    $email = $db->real_escape_string($_REQUEST["email"]);
    $pwd = $db->real_escape_string($_REQUEST["password"]);
    //controlla correttezza username e pwd
    $sql = "select * from user where email='$email'and password='$pwd'";
    $result = $db->query($sql);
    if ($result->num_rows == 0) {

        $_SESSION['err'] = "0";

        header("Location: index.php");
    } else {
        $riga = $result->fetch_array();
        $_SESSION['user'] = $riga['email'];
        $result->close();
        $_SESSION['err'] = "1";
    }
}

if (isset($_SESSION['user']) && isset($_REQUEST['exit'])) {
    session_destroy();
}
header("Location: index.php");
?>
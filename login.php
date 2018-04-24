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
        echo '<div class = "modal fade" id = "myModal" role = "dialog">';
        echo '<div class = "modal-dialog">';
        echo '<div class = "modal-content">';
        echo '<div class = "modal-header">';
        echo '<button type = "button" class = "close" data-dismiss = "modal">&times;';
        echo '</button>';
        echo '<h4 class = "modal-title">Modal Header</h4>';
        echo '</div>';
        echo '<div class = "modal-body">';
        echo '<p>Some text in the modal.</p>';
        echo '</div>';
        echo '<div class = "modal-footer">';
        echo '<button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } else {
        $riga = $result->fetch_array();
        $_SESSION['user'] = $riga['email'];
        $result->close();
    }
}

if (isset($_SESSION['user']) && isset($_REQUEST['exit'])) {
    session_destroy();
}

header("Location: index.php");
?>
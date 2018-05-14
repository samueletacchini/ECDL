<?php

require_once('ConnessioneDb.php');
$db = new ConnessioneDb();

if (isset($_REQUEST['data']) && isset($_REQUEST['ora_da']) && isset($_REQUEST['ora_a'])) {
    $query = "INSERT INTO `sessioni`(`data`, `ora_da`, `ora_a`) VALUES ('{$_REQUEST['data']}', '{$_REQUEST['ora_da']}', '{$_REQUEST['ora_a']}')";
    $ris = $db->query($query);
} elseif (isset($_REQUEST['elimina'])) {
    $id = $_REQUEST['elimina'];
    $query = "DELETE FROM `sessioni` WHERE `ID` = $id";
    $ris = $db->query($query);
}

header("Location: portale.php");

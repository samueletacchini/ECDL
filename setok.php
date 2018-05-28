<?php

if (isset($_REQUEST["pid"])) {
    require_once('ConnessioneDb.php');
    $db = new ConnessioneDb();
    $eh = 'UPDATE `file` SET `ok`= 1 WHERE `id` = ' . $_REQUEST["pid"];
    $ris = $db->query($eh);
}
header("Location: prenportale.php");
?>
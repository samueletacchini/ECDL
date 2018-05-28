<?php

require_once('ConnessioneDb.php');
$db = new ConnessioneDb();
if (isset($_REQUEST["pid"])) {

    $eh = 'UPDATE `file` SET `ok`= 1 WHERE `id` = ' . $_REQUEST["pid"];
} else if (isset($_REQUEST["rid"])) {
    $eh = 'UPDATE `file` SET `ok`= 0 WHERE `id` = ' . $_REQUEST["rid"];
}
$ris = $db->query($eh);

header("Location: prenportale.php");
?>
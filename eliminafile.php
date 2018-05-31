<?php

if (isset($_REQUEST['ID'])) {
    require_once('ConnessioneDb.php');

    $pid = $_REQUEST['ID'];
    $db = new ConnessioneDb();
    $sql = "DELETE FROM file WHERE ID=$pid";

    $ris = $db->query($sql);
}
header("Location: index.php");
?>

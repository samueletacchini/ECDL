<?php

if(isset($_REQUEST['elimina'])){
    echo "gogo";
    require_once ('ConnessioneDb.php');
    
    $pid = $_REQUEST['elimina'];
    $db = new ConnessioneDb();
    $sql = "DELETE FROM prenotazione WHERE ID=$pid";
    
    $ris = $db->query($sql);
    
    header("Location: index.php");
}
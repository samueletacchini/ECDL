<?php

session_start();
if (isset($_REQUEST['recupera'])) {
    
    $rec = $_REQUEST['recupera'];
    
    require_once 'connessioneDb.php';
    $db = new ConnessioneDb();
    
    $password = $_REQUEST['password'];
    $email = $_REQUEST['email'];
    

    $sql = 'UPDATE user SET $password = password WHERE $email = email';
    
    $ris = $db->query($sql);
    
    header("Loaction: index.php");
}
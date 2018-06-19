<?php

if (isset($_REQUEST['fid'])) {
// connect to the database 
    require_once('ConnessioneDb.php');
    $db = new ConnessioneDb();

// query the server for the picture 
    $fid = $_REQUEST['fid'];
    $query = "SELECT * FROM file WHERE id = '$fid'";
    $result = $db->query($query);
    $gigi = $result->fetch_array();

// define results into variables 
    $name = $gigi["nome"];
    //$size = $gigi["dimensione"];
    $type = $gigi["estensione"];
    $content = $gigi["file"];


    $estensione = explode("/", $type)[0];
    // give our picture the proper headers...otherwise our page will be confused 
    header("Content-Disposition: attachment; filename=$name");
    //header("Content-length: $size");
    header("Content-type:$type");
    
    echo $content;
} else {
    echo"No file ID given...";
}
?>
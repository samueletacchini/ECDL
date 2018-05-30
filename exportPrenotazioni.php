<?php

require_once 'ConnessioneDb.php';
$sql = $_REQUEST["query"];
$db = new ConnessioneDb();
$ris = $db->query($sql);
header('Content-type: text/xml');

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: inline; filename=export.xls");
    
echo"<table border='1'>";
while ($row = $ris->fetch_array()) {
    echo"<tr>";

    echo"<td>{$row['ID']}</td>";
    echo"<td>{$row['nome']}</td>";
    echo"<td>{$row['cognome']}</td>";
    echo"<td>{$row['esami']}</td>";
    echo"<td>{$row['data']}</td>";

    echo"</tr>";
}
echo"</table>";
?>
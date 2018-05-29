<?php

require_once 'ConnessioneDb.php';
$sql = $_REQUEST["query"];
$db = new ConnessioneDb();
$ris = $db->query($sql);
header('Content-type: text/xml');

//$xml = new XMLWriter();
////$xml = new XMLWriter();
//
//$xml->openURI("php://output");
//$xml->startDocument();
//$xml->setIndent(true);
//
//$xml->startElement('prenotazioni');
//
//while ($row = $ris->fetch_array()) {
//    $xml->startElement("prenotazione");
//    {
//        $xml->startElement("ID");
//        //$xml->writeAttribute('ID', $row['ID']);
//        $xml->writeRaw($row['ID']);
//        $xml->endElement();
//
//        $xml->startElement("nome");
//        $xml->writeRaw($row['nome']);
//        $xml->endElement();
//
//        $xml->startElement("cognome");
//        $xml->writeRaw($row['cognome']);
//        $xml->endElement();
//
//        $xml->startElement("esami");
//        $xml->writeRaw($row['esami']);
//        $xml->endElement();
//
//        $xml->startElement("data");
//        $xml->writeRaw($row['data']);
//        $xml->endElement();
//    }
//    $xml->endElement();
//}
//
//$xml->endElement();
//
//$xml->flush();
// nome del file che creeremo
$filename = "export.xls";
// specifichiamo il Content-Type
header("Content-Type: application/vnd.ms-excel");
// specifichiamo la risorsa
header("Content-Disposition: inline; filename=$filename");

while ($row = $ris->fetch_array()) {
    
}
echo"<table border='1'>";
echo"<tr>";
echo"<td>Lunedì</td>";
echo"<td>Martedì</td>";
echo"<td>Mercoledì</td>";
echo"<td>Giovedì</td>";
echo"<td>Venerdì</td>";
echo"</tr>";
echo"<tr>";
echo"<td>10.30</td>";
echo"<td>9.30</td>";
echo"<td>9.45</td>";
echo"<td>9.30</td>";
echo"<td>11.00</td>";
echo"</tr>";
echo"</table>";
?>
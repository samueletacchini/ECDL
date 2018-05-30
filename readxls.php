<?php

//require_once 'ConnessioneDb.php';
//$db = new ConnessioneDb();
//
//$file = "prova.xls";
//$handle = fopen($file, "r");
//while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
//    echo $nick_name = $filesop[0];
//
//    echo $data = $filesop[1];
//    echo $data = $filesop[2];
//    echo $data = $filesop[3];
//    echo $data = $filesop[4];
//    echo $data = $filesop[5];
//    echo $data = $filesop[6];
//    echo $data = $filesop[7];
//    echo $ora_a = $filesop[8];
//    echo $ora_da = $filesop[9];
//
//
////    $sql = "INSERT INTO `sessioni`(`ora_da`, `ora_a`, `data`) VALUES ('$ora_da', '$ora_a', '$data')";
////    $ris = $db->query($sql);
//}
//
//if ($ris) {
//    echo "You database has imported successfully";
//} else {
//    echo "Sorry! There is some problem.";
//}


require('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
require('spreadsheet-reader-master/SpreadsheetReader.php');
require_once 'ConnessioneDb.php';
$db = new ConnessioneDb();

$uploadFilePath = 'prova.xls';

$Reader = new SpreadsheetReader($uploadFilePath);

$totalSheet = count($Reader->sheets());


echo "You have total " . $totalSheet . " sheets" . $html = "<table border='1'>";
$html .= "<tr><th>Data</th><th>ora_da</th><th>ora_a</th></tr>";
$prima = true;

/* For Loop for all sheets */
for ($i = 0; $i < $totalSheet; $i++) {


    $Reader->ChangeSheet($i);


    foreach ($Reader as $Row) {
        $html .= "<tr>";
        $data = isset($Row[1]) ? $Row[1] : '';
        $ora_da = isset($Row[8]) ? $Row[8] : '';
        $ora_a = isset($Row[9]) ? $Row[9] : '';
        $date = explode("/", $data);
        $data = $date[2] . "-" . $date[1] . "-" . $date[0];
        $html .= "<td>" . $data . "</td>";
        $html .= "<td>" . $ora_da . "</td>";
        $html .= "<td>" . $ora_a . "</td>";
        $html .= "</tr>";

        if ($prima) {
            $prima = FALSE;
        } else {
            $sql = "INSERT INTO `sessioni`(`ora_da`, `ora_a`, `data`) VALUES ('$ora_da', '$ora_a', '$data')";
            $ris = $db->query($sql);
        }
    }
}

echo "<br />Data Inserted in dababase";

$html .= "</table>";
echo $html;
?>
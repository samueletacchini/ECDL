<?php

require('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
require('spreadsheet-reader-master/SpreadsheetReader.php');
require_once 'ConnessioneDb.php';
$db = new ConnessioneDb();

echo "la";

if (isset($_REQUEST['carica'])) {
    echo "la";


    $uploadFilePath = 'uploads/' . basename($_FILES['xls']['name']);
    move_uploaded_file($_FILES['xls']['tmp_name'], $uploadFilePath);


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
   // echo $html;
 
    header("Location: prenportale.php");
    
}
?>
<?php

if (isset($_REQUEST['elimina'])) {
    echo "gogo";
    require_once ('ConnessioneDb.php');

    $pid = $_REQUEST['elimina'];
    $db = new ConnessioneDb();
    $sql = "DELETE FROM prenotazione WHERE ID=$pid";

    $ris = $db->query($sql);

    header("Location: index.php");
} elseif (isset($_REQUEST['sessione']) && isset($_REQUEST['codiceFiscale'])) {

    

    echo "eheh<br><br>";
    $sessione = $_REQUEST['sessione'];
    $esami = "";
    $a = 0;
    for ($i = 1; $i <= 7; $i++) {
        if (isset($_REQUEST["$i"])) {
            $esami[$a] = $i;
            $a++;
        }
    }
    $codicefiscale = $_REQUEST['codiceFiscale'];

    require_once('ConnessioneDb.php');
    $db = new ConnessioneDb();
    $sql = "INSERT INTO `prenotazione`(`ID_codice_fiscale`, `esami`, `ID_sessione`, `pagato`) VALUES ('$codicefiscale','$esami' ,'$sessione',0)";
    $ris = $db->query($sql);
}

//header("Location: index.php");

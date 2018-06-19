<?php

if (isset($_REQUEST['elimina'])) {
    require_once('ConnessioneDb.php');

    $pid = $_REQUEST['elimina'];
    $db = new ConnessioneDb();
    $sql = "DELETE FROM prenotazione WHERE ID=$pid";

    $ris = $db->query($sql);

    //header("Location: index.php");
} elseif (isset($_REQUEST['sessione']) && isset($_REQUEST['codiceFiscale'])) {

    if (isset($_REQUEST['update'])) {
        $esami = "update";
    } else {


        $esami = "oppo";
        $a = 0;
        for ($i = 1; $i <= 7; $i++)
            if (isset($_REQUEST["$i"])) {
                $esami[$a] = $i;
                $a++;
            }
    }
    $codicefiscale = $_REQUEST['codiceFiscale'];
    $sessione = $_REQUEST['sessione'];

    require_once('ConnessioneDb.php');
    $db = new ConnessioneDb();
    $sql = "INSERT INTO `prenotazione`(`ID_codice_fiscale`, `esami`, `ID_sessione`) VALUES ('$codicefiscale','$esami' ,'$sessione')";
    $ris = $db->query($sql);
}

header("Location: index.php");

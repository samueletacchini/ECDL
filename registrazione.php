<?php

session_start();
require_once('ConnessioneDb.php');
$db = new ConnessioneDb();
$pnascita = "default";
$civico = "111";
$titolo = "titolo di studio";
if (isset($_REQUEST['codiceFiscale']) && !isset($_REQUEST['sessione'])) {

    echo "<br>" . $password = $_REQUEST['password'];

    echo "<br>" . $codicefiscale = $_REQUEST['codiceFiscale'];

    echo "<br>" . $sesso = $_REQUEST['sesso'];

    echo "<br>" . $cognome = $_REQUEST['cognome'];

    echo "<br>" . $nome = $_REQUEST['nome'];

    echo "<br>" . $giorno = $_REQUEST['giorno'];

    echo "<br>" . $mese = $_REQUEST['mese'];

    echo "<br>" . $anno = $_REQUEST['anno'];

    echo "<br>" . $statocivile = $_REQUEST['statocivile'];

    echo "<br>" . $lnascita = $_REQUEST['lnascita'];

    // $pnascita = $_REQUEST['$pnascita'];

    echo "<br>" . $indirizzo = $_REQUEST['indirizzo'];

    //$civico = $_REQUEST['civico'];

    echo "<br>" . $stato = $_REQUEST['stato'];

    echo "<br>" . $citta = $_REQUEST['citta'];

    echo "<br>" . $cap = $_REQUEST['cap'];

    //echo "<br>" .  $titolo = $_REQUEST['titolo'];

    echo "<br>" . $provincia = $_REQUEST['provincia'];

    echo "<br>" . $telefono = $_REQUEST['telefonoCasa'];

    echo "<br>" . $cellulare = $_REQUEST['cellulare'];

    echo "<br>" . $mail = $_REQUEST['mail'];

    echo "<br>" . $occupazione = $_REQUEST['occupazione'];

    echo "<br>" . $tipo = $_REQUEST['optradio'];
    if ($tipo == "studenti") {
        $scuola = $_REQUEST['scuola'];

        $classe = $_REQUEST['classe'];

        $specializzazione = $_REQUEST['specializzazione'];

        $tipo = "studente: " . $classe . " " . $specializzazione . ", " . $scuola;
    }
    $datenow = date("y-m-d");
    $birthdate = "$anno-$mese-$giorno";
    echo $query = "INSERT INTO `user`(`password`, `rilasciata`, `codice_fiscale`, `sesso`, `cognome`, `nome`, `data_nascita`, `comune_nascita`,`provincia_nascita`, `stato_civile`, `indirizzo`, `civico`, `stato`, `citta`, `cap`, `provincia`, `email`, `cellulare`, `telefono`, `occupazione`,`titolo_studio`, `pagato`, `tipo`)"
    . "  VALUES ('$password', '$datenow', '$codicefiscale', '$sesso', '$cognome', '$nome', '$birthdate', '$lnascita', '$pnascita', '$statocivile', '$indirizzo', '$civico', '$stato', '$citta', '$cap', '$provincia', '$mail', '$cellulare', '$telefono', '$occupazione', '$titolo', 0, '$tipo')";

    $ris = $db->query($query);
} elseif (isset($_REQUEST['sessione'])) {

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
    $sql = "INSERT INTO `prenotazione`(`ID_codice_fiscale`, `esami`, `ID_sessione`, `pagato`) VALUES ('$codicefiscale','$esami','$sessione',0)";
    $ris = $db->query($sql);
} elseif (isset($_REQUEST['upload'])) {

    $prenotazioni = "";
    $tipo = "";
    if (isset($_REQUEST['prenotazioni'])) {
        $prenotazioni = $_REQUEST['prenotazioni'];
        echo "Prenotazioniii : $prenotazioni<br><br>";
    }
    if (isset($_REQUEST['pdfskillcard'])) {
        $pdfskillcard = $_REQUEST['pdfskillcard'];
        $tipo .= "pdfskillcard, ";
        echo 'pdfskillcard <br><br>';
    }
    if (isset($_REQUEST['pdfprenotazione'])) {
        $pdfprenotazione = $_REQUEST['pdfprenotazione'];
        $tipo .= "pdfprenotazione, ";
        echo 'pdfprenotazione <br><br>';
    }
    if (isset($_REQUEST['pdfaica'])) {
        $pdfaica = $_REQUEST['pdfaica'];
        $tipo .= "pdfaica, ";
        echo 'pdfaica <br><br>';
    }
    if (isset($_REQUEST['bollettinoskillcard'])) {
        $bollettinoskillcard = $_REQUEST['bollettinoskillcard'];
        $tipo .= "bollettinoskillcard, ";
        echo 'bollettinoskillcard <br><br>';
    }
    if (isset($_REQUEST['bollettinoprenotazione'])) {
        $bollettinoprenotazione = $_REQUEST['bollettinoprenotazione'];
        $tipo .= "bollettinoprenotazione, ";
        echo 'bollettinoprenotazione <br><br>';
    }

    $imagename = $_FILES["pdfs"]["name"];
    $imagetmp = addslashes(file_get_contents($_FILES['pdfs']['tmp_name']));



    $tipo = substr($tipo, 0, -2);
    echo $tipo;
    require_once('ConnessioneDb.php');
    $db = new ConnessioneDb();
    if ($prenotazioni != NULL) {
        $sql = "INSERT INTO `file`(`tipo`, `ID_user`, `ID_prenotazione`, `file`) VALUES ('$tipo',(select user.codice_fiscale FROM user WHERE user.email = '{$_SESSION['user']}'),$prenotazioni,'$imagetmp')";
    } else {
        $sql = "INSERT INTO `file`(`tipo`, `ID_user`, `file`) VALUES ('$tipo',(select user.codice_fiscale FROM user WHERE user.email = '{$_SESSION['user']}'),'$imagetmp')";
    }
    $ris = $db->query($sql);
}


//header("Location: index.php");
?>




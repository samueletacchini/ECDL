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
} elseif (isset($_REQUEST['carica'])) {
    //var_dump($_REQUEST['pdfs']);
    $prenotazioni = "";
    $tipo = "";

    if (isset($_REQUEST['pdfskillcard'])) {
        $pdfskillcard = $_REQUEST['pdfskillcard'];
        $tipo .= "pdfskillcard, ";
        ////////////////////echo 'pdfskillcard <br><br>';
    }
    if (isset($_REQUEST['pdfprenotazione'])) {
        $pdfprenotazione = $_REQUEST['pdfprenotazione'];
        $tipo .= "pdfprenotazione, ";
        ////////////////////echo 'pdfprenotazione <br><br>';
    }
    if (isset($_REQUEST['pdfaica'])) {
        $pdfaica = $_REQUEST['pdfaica'];
        $tipo .= "pdfaica, ";
        //////////////////echo 'pdfaica <br><br>';
    }
    if (isset($_REQUEST['bollettinoskillcard'])) {
        $bollettinoskillcard = $_REQUEST['bollettinoskillcard'];
        $tipo .= "bollettinoskillcard, ";
        ////////////////////echo 'bollettinoskillcard <br><br>';
    }
    if (isset($_REQUEST['bollettinoprenotazione'])) {
        $bollettinoprenotazione = $_REQUEST['bollettinoprenotazione'];
        $tipo .= "bollettinoprenotazione, ";
        ////////////////////echo 'bollettinoprenotazione <br><br>';
    }
    if (isset($_REQUEST['prenot azioni'])) {
        $prenotazioni = $_REQUEST['prenotazioni'];
        ////////////////////echo "Prenotazioniii : $prenotazioni<br><br>";
    }

    $name = $_FILES["pdfs"]["name"];
    $size = $_FILES["pdfs"]["size"];
    $type = $_FILES["pdfs"]["type"];
    $tmp_name = $_FILES['pdfs']['tmp_name'];


// get the width & height of the file (we don't need the other stuff) 
    list($width, $height, $typeb, $attr) = getimagesize($tmp_name);



// if width is over 600 px or height is over 500 px, kill it    
// help me 
//    if ($width > 600 || $height > 500) {
//        echo $name . "'s dimensions exceed the 600x500 pixel limit.";
//        echo " <a href='form.html'>Click here</a> to try again. ";
//        die();
//    }
// if the mime type is anything other than what we specify below, kill it     
    if (!(
            $type == 'image/jpeg' ||
            $type == 'image/png' ||
            $type == 'image/gif' ||
            $type == 'application/pdf'
            )) {
        echo $type . " is not an acceptable format.";
        die();
    }

// if the file size is larger than 1MB, kill it 
    if ($size > '10000000') {
        echo $name . " is over 1MB. Please make it smaller.";
        die();
    }

// if your server has magic quotes turned off, add slashes manually 
    if (!get_magic_quotes_gpc()) {
        $name = addslashes($name);
    }

// open up the file and extract the data/content from it 
    $extract = fopen($tmp_name, 'r');
    $content = fread($extract, $size);
    $content = addslashes($content);
    fclose($extract);

    $tipo = substr($tipo, 0, -2);
    
    require_once('ConnessioneDb.php');
    $db = new ConnessioneDb();
    if ($prenotazioni != NULL) {
        $sql = "INSERT INTO `file`(`tipo`, `ID_user`, `ID_prenotazione`, `nome`, `estensione`, `dimensione`, `file`) VALUES ('$tipo',(select user.codice_fiscale FROM user WHERE user.email = '{$_SESSION['user']}'),'$prenotazioni','$name','$type',$size,'$content')";
    } else {
        $sql = "INSERT INTO `file`(`tipo`, `ID_user`, `nome`, `estensione`, `dimensione`, `file`) VALUES ('$tipo',(select user.codice_fiscale FROM user WHERE user.email = '{$_SESSION['user']}'),'$name','$type',$size,'$content')";
    }
    $ris = $db->query($sql);

   


   


// we still have to close the original IF statement. If there was nothing posted, kill the page. 
} else {
    die("No uploaded file present");
}



//header("Location: index.php");
?>




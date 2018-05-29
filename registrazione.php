<?php

session_start();
require_once('ConnessioneDb.php');
$db = new ConnessioneDb();

if (isset($_REQUEST['codiceFiscale']) && !isset($_REQUEST['sessione'])) {

    $password = $_REQUEST['password'];
    $password2 = $_REQUEST['password2'];
    if ($password == $password2) {
        $codicefiscale = $_REQUEST['codiceFiscale'];

        $sesso = $_REQUEST['sesso'];

        $cognome = $_REQUEST['cognome'];

        $nome = $_REQUEST['nome'];

        $giorno = $_REQUEST['giorno'];

        $mese = $_REQUEST['mese'];

        $anno = $_REQUEST['anno'];

        $statocivile = $_REQUEST['statocivile'];

        $lnascita = $_REQUEST['lnascita'];

        $pnascita = $_REQUEST['$pnascita'];

        $indirizzo = $_REQUEST['indirizzo'];

        $civico = $_REQUEST['civico'];

        $stato = $_REQUEST['stato'];

        $citta = $_REQUEST['citta'];

        $cap = $_REQUEST['cap'];

        $titolo = $_REQUEST['titolo'];

        $provincia = $_REQUEST['provincia'];

        $telefono = $_REQUEST['telefonoCasa'];

        $cellulare = $_REQUEST['cellulare'];

        $mail = $_REQUEST['mail'];

        $occupazione = $_REQUEST['occupazione'];

        $tipo = $_REQUEST['optradio'];
        if ($tipo == "studenti") {
            $scuola = $_REQUEST['scuola'];

            $classe = $_REQUEST['classe'];

            $specializzazione = $_REQUEST['specializzazione'];

            $tipo = "studente: " . $classe . " " . $specializzazione . ", " . $scuola;
        }
        $datenow = date("y-m-d");
        $birthdate = "$anno-$mese-$giorno";
        $query = "INSERT INTO `user`(`password`, `rilasciata`, `codice_fiscale`, `sesso`, `cognome`, `nome`, `data_nascita`, `comune_nascita`,`provincia_nascita`, `stato_civile`, `indirizzo`, `civico`, `stato`, `citta`, `cap`, `provincia`, `email`, `cellulare`, `telefono`, `occupazione`,`titolo_studio`, `pagato`, `tipo`)"
                . "  VALUES ('$password', '$datenow', '$codicefiscale', '$sesso', '$cognome', '$nome', '$birthdate', '$lnascita', '$pnascita', '$statocivile', '$indirizzo', '$civico', '$stato', '$citta', '$cap', '$provincia', '$mail', '$cellulare', '$telefono', '$occupazione', '$titolo', 0, '$tipo')";

        $ris = $db->query($query);
    }else{
        
    }
}

header("Location: index.php");
?>



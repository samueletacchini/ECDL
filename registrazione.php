<?php

require_once('ConnessioneDb.php');
$db = new ConnessioneDb();

if (isset($_REQUEST['codiceFiscale'])) {
     $codicefiscale = $_REQUEST['codiceFiscale'];
    
     $sesso = $_REQUEST['sesso'];

     $cognome = $_REQUEST['cognome'];

     $nome = $_REQUEST['nome'];

     $giorno = $_REQUEST['giorno'];

     $mese = $_REQUEST['mese'];

     $anno = $_REQUEST['anno'];

     $statocivile = $_REQUEST['statocivile'];

     $lnascita = $_REQUEST['lnascita'];

     $indirizzo = $_REQUEST['indirizzo'];

     $stato = $_REQUEST['stato'];

     $citta = $_REQUEST['citta'];

     $cap = $_REQUEST['cap'];

     $provincia = $_REQUEST['provincia'];

     $telefono = $_REQUEST['telefonoCasa'];

     $cellulare = $_REQUEST['cellulare'];

     $mail = $_REQUEST['mail'];

     $occupazione = $_REQUEST['occupazione'];

    $optradio = $_REQUEST['optradio'];
    if ($optradio == "studenti") {
         $scuola = $_REQUEST['scuola'];
    
         $classe = $_REQUEST['classe'];
    
         $specializzazione = $_REQUEST['specializzazione'];
    
    }
    $datenow = date("y-m-d");
    $birthdate = "$anno-$mese-$giorno";
    $query = "INSERT INTO `user`(`skill_card`, `password`, `rilasciata`, `codice_fiscale`, `sesso`, `cognome`, `nome`, `data_nascita`, `luogo_nascita`, `stato_civile`, `indirizzo`, `stato`, `citta`, `cap`, `provincia`, `email`, `cellulare`, `telefono`, `occupazione`, `pagato`) "
            . " VALUES ('default', 'admin', '$datenow', '$codicefiscale', '$sesso', '$cognome', '$nome', '$birthdate', '$lnascita', '$statocivile', '$indirizzo', '$stato', '$citta', '$cap', '$provincia', '$mail', '$cellulare', '$telefono', '$occupazione', 0)";
    $ris = $db->query($query);
}
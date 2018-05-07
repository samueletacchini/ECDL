<?php

use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require('fpdf17/fpdf.php');
require_once("ConnessioneDb.php");
$db = new ConnessioneDb();
$datenow = date("d/m/y");




if (isset($_REQUEST["id"])) {
    if (isset($_REQUEST["idprenota"])) {
        $id = $_REQUEST["id"];
        $idprenotazione = $_REQUEST["idprenota"];
    } else {
        $id = $_REQUEST["id"];
    }



    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 11);



    $query = "SELECT * FROM `user` WHERE `email` = '$id'";
    $ris = $db->query($query);

    $riga = $ris->fetch_array();
    if ($riga["email"] != "") {

        $skillcard = $riga['skill_card'];
        $codicefiscale = $riga['codice_fiscale'];
        $sesso = $riga['sesso'];
        $cognome = $riga['cognome'];
        $nome = $riga['nome'];
        $data = $riga['data_nascita'];
        $lnascita = $riga['comune_nascita'];
        $statocivile = $riga['stato_civile'];
        $indirizzo = $riga['indirizzo'];
        $stato = $riga['stato'];
        $citta = $riga['citta'];
        $cap = $riga['cap'];
        $provincia = $riga['provincia'];
        $telefono = $riga['telefono'];
        $cellulare = $riga['cellulare'];
        $mail = $riga['email'];
        $occupazione = $riga['occupazione'];
        $tipo = $riga['tipo'];


        $scolarita = $riga['titolo_studio'];
        $civico = $riga['civico'];
        $pnascita = $riga['provincia_nascita'];


        if (substr($tipo, 0, 8) == "studente") {
            $classe = substr($tipo, 10, 2);
            $specializzazione = substr(explode(',', "$tipo")[0], 13);
            $scuola = explode(',', $tipo)[1];
            $tipo = substr($tipo, 0, 8);
        }
    } else {
        echo "UTENTE NON TROVATO!";
    }
    $pdf->Image('pdf/aica.jpg', 0, 0, 210, 297);

    //n skill card
    $pdf->SetXY(126, 77);
    $pdf->Write(0, "$skillcard");
    //codice fiscale
    $pdf->SetXY(35, 77);
    $pdf->Write(0, "$codicefiscale");
    //cognome
    $pdf->SetXY(29, 63);
    $pdf->Write(0, "$cognome");
    //data di nascita
    $pdf->SetXY(140, 70);
    $pdf->Write(0, "$data");
    //nome
    $pdf->SetXY(113, 63);
    $pdf->Write(0, "$nome");
    //luogo di nascita
    $pdf->SetXY(29, 70);
    $pdf->Write(0, "$lnascita");
    //provincia nascita
    $pdf->SetXY(119, 70);
    $pdf->Write(0, "$pnascita");
    //indirizzo
    $pdf->SetXY(29, 90);
    $pdf->Write(0, "$indirizzo");
    //cap
    $pdf->SetXY(170, 90);
    $pdf->Write(0, "$cap");
    //provincia
    $pdf->SetXY(160, 83.5);
    $pdf->Write(0, "$provincia");
    //città
    $pdf->SetXY(50, 83.5);
    $pdf->Write(0, "$citta");
    //civico
    $pdf->SetXY(146, 90);
    $pdf->Write(0, "$civico");
    //tel
    $pdf->SetXY(25, 103.5);
    $pdf->Write(0, "$telefono");
    //email
    $pdf->SetXY(25, 97);
    $pdf->Write(0, "$mail");
    //cellulare
    $pdf->SetXY(111, 103.5);
    $pdf->Write(0, "$cellulare");
    //email seconda
    $pdf->SetXY(26, 179);
    $pdf->Write(0, "$mail");
    //nome e gognome
    $pdf->SetXY(45, 174);
    $pdf->Write(0, "$cognome $nome");

    //Titolo di studio
    switch ($scolarita) {
        case "scuola dell'obbligo":
            //scuola dell'obbligo
            $pdf->SetXY(21.7, 123.7);
            $pdf->Write(0, "x");
            break;
        case "diplomato":
            //diplomato
            $pdf->SetXY(21.7, 128.4);
            $pdf->Write(0, "x");
            break;
        case "laureato":
            //laureato
            $pdf->SetXY(21.7, 132.7);
            $pdf->Write(0, "x");
            break;
        default:
            //Non dichiarato
            $pdf->SetXY(21.7, 137.5);
            $pdf->Write(0, "x");
    }

    //Occupazione
    switch ($occupazione) {
        case "studente scuola primaria":
            //scuola dell'obbligo
            $pdf->SetXY(84.1, 123.7);
            $pdf->Write(0, "x");
            break;
        case "studente scuola secondaria primo grado":
            //diplomato
            $pdf->SetXY(84.1, 128.4);
            $pdf->Write(0, "x");
            break;
        case "studente scuola secondaria secondo grado":
            //laureato
            $pdf->SetXY(84.1, 133, 1);
            $pdf->Write(0, "x");
            break;
        case "studente universitario":
            //laureato
            $pdf->SetXY(84.1, 137.5);
            $pdf->Write(0, "x");
            break;
        case "lavoratore dipendente":
            //laureato
            $pdf->SetXY(84.1, 141.9);
            $pdf->Write(0, "x");
            break;
        case "lavoratore autonomo":
            //laureato
            $pdf->SetXY(84.1, 146.3);
            $pdf->Write(0, "x");
            break;
        case "pensionato":
            //laureato
            $pdf->SetXY(84.1, 150.9);
            $pdf->Write(0, "x");
            break;
        case "casalinga":
            //laureato
            $pdf->SetXY(84.1, 155.2);
            $pdf->Write(0, "x");
            break;
        case "in cerca di occupazione":
            //laureato
            $pdf->SetXY(84.1, 159.7);
            $pdf->Write(0, "x");
            break;
    }
    //aggiungo la seconda pagine
    $addPage = $pdf->AddPage();
    $pdf->Image('pdf/aica2.jpg', 0, 0, 210, 297);


    //modena DATA
    $pdf->SetXY(25, 129);
    $pdf->Write(0, $datenow);

    //Acconsento
    $pdf->SetXY(34.8, 166);
    $pdf->Write(0, "x");
    //Acconsento
    $pdf->SetXY(34.8, 183.1);
    $pdf->Write(0, "x");
    $consento = false;
    if ($consento) {
        //Acconsento
        $pdf->SetXY(34.8, 202);
        $pdf->Write(0, "x");
    } else {
        //NON Acconsento
        $pdf->SetXY(97.2, 202);
        $pdf->Write(0, "x");
    }

    //modena DATA
    $pdf->SetXY(25, 231);
    $pdf->Write(0, $datenow);

    //aggiungo la seconda pagine
    $addPage = $pdf->AddPage();
    $pdf->Image('pdf/aica3.jpg', 0, 0, 210, 297);


    $pdf->Output('aica.pdf', 'D');
} else {
    echo "effettuare la richieste fornendo un id e un tipo di PDF";
}
?>


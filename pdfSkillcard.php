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
        $civico = $riga['civico'];
        $scolarita = $riga['titolo_studio'];


        $occupazione = $riga['occupazione'];
        $tipo = $riga['tipo'];

//                    $scolarita = $riga['scolarita'];
//                    $civico = $riga['civico'];

        if (substr($tipo, 0, 8) == "studente") {
            $classe = substr($tipo, 10, 2);
            $specializzazione = substr(explode(',', "$tipo")[0], 13);
            $scuola = explode(',', $tipo)[1];
            $tipo = substr($tipo, 0, 8);
        }
    } else {
        echo "UTENTE NON TROVATO!";
    }
    $pdf->Image('pdf/skillcard.png', 0, 0, 210, 297);
    //n skill card
    $pdf->SetXY(39, 58);
    $pdf->Write(0, "$skillcard");
    //rilasciata il
    $pdf->SetXY(98, 57.5);
    $pdf->Write(0, "$datenow");
    //codice fiscale
    $pdf->SetXY(42, 69);
    $pdf->Write(0, "$codicefiscale");
    //sesso
    $pdf->SetXY(140, 69);
    $pdf->Write(0, "$sesso");
    //cognome
    $pdf->SetXY(42, 77);
    $pdf->Write(0, "$cognome");
    //data di nascita
    $pdf->SetXY(140, 77.5);
    $pdf->Write(0, "$data");
    //nome
    $pdf->SetXY(42, 86);
    $pdf->Write(0, "$nome");
    //luogo di nascita
    $pdf->SetXY(140, 86);
    $pdf->Write(0, "$lnascita");
    //stato civile
    $pdf->SetXY(128, 94.5);
    $pdf->Write(0, "$statocivile");
    //indirizzo
    $pdf->SetXY(42, 103);
    $pdf->Write(0, "$indirizzo $civico");
    //cap
    $pdf->SetXY(158, 103);
    $pdf->Write(0, "$cap");
    //provincia
    $pdf->SetXY(42, 111.5);
    $pdf->Write(0, "$provincia");
    //città
    $pdf->SetXY(97, 111.5);
    $pdf->Write(0, "$citta");
    //stato
    $pdf->SetXY(158, 111.5);
    $pdf->Write(0, "$stato");
    //tel
    $pdf->SetXY(39, 120);
    $pdf->Write(0, "$telefono");
    //email
    $pdf->SetXY(97, 120);
    $pdf->Write(0, "$mail");
    //cellulare
    $pdf->SetXY(97, 128.5);
    $pdf->Write(0, "$cellulare");
    //scolarita
    $pdf->SetXY(41.5, 145.7);
    $pdf->Write(0, "$scolarita");
    //occupazione
    $pdf->SetXY(140, 145.5);
    $pdf->Write(0, "$occupazione");


    switch ($tipo) {
        case "studente":
            //scuola e classe
            $pdf->SetXY(97, 154.2);
            $pdf->Write(0, "$classe $specializzazione, $scuola");

            //studenti
            $pdf->SetXY(38.2, 172);
            $pdf->Write(0, "x");
            break;
        case "docenti":
            //docenti
            $pdf->SetXY(38.2, 172);
            $pdf->Write(0, "x");
            break;
        case "personale":
            //personale e corpi militari
            $pdf->SetXY(38.2, 172);
            $pdf->Write(0, "x");
            break;
        default :
            //esterni
            $pdf->SetXY(38.2, 193.7);
            $pdf->Write(0, "x");
    }
    //modena DATA
    $pdf->SetXY(39, 215);
    $pdf->Write(0, $datenow);

    $pdf->Output('skillcard.pdf', 'D');
} else {
    echo "effettuare la richieste fornendo un id e un tipo di PDF";
}
?>


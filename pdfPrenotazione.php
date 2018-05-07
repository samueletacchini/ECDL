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


    $query = "SELECT user.*, prenotazione.esami, sessioni.data, sessioni.ora_da, sessioni.ora_a FROM `user`JOIN prenotazione ON prenotazione.ID_codice_fiscale = user.codice_fiscale JOIN sessioni ON sessioni.ID = prenotazione.ID_sessione WHERE user.email = '$id' && prenotazione.ID = $idprenotazione";
    $ris = $db->query($query);

    $riga = $ris->fetch_array();
    if ($riga["codice_fiscale"] != "") {

        //data da user
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
        if (substr($tipo, 0, 8) == "studente") {
            $classe = substr($tipo, 10, 2);
            $specializzazione = substr(explode(',', "$tipo")[0], 13);
            $scuola = explode(',', $tipo)[1];
            $tipo = substr($tipo, 0, 8);
        }

        //data da prenotazione
        $esami = $riga['esami'];
        $tipo = $riga['tipo'];

        //data da sessioni
        $dataesame = $riga['data'];
        $ora_da = $riga['ora_da'];
        $ora_a = $riga['ora_a'];
    } else {
        echo "PRENOTAZIONE NON TROVATO!";
    }





    $pdf->Image('pdf/prenotazione full.png', 0, 0, 210, 297);

    //n skill card
    $pdf->SetXY(48.5, 68);
    $pdf->Write(0, "$skillcard");

    //cognome
    $pdf->SetXY(124.5, 77);
    $pdf->Write(0, "$cognome");

    //data di nascita
    $pdf->SetXY(48.5, 86);
    $pdf->Write(0, "$data");

    //nome
    $pdf->SetXY(48.5, 77);
    $pdf->Write(0, "$nome");

    //luogo di nascita
    $pdf->SetXY(124.5, 86);
    $pdf->Write(0, "$lnascita");

    //indirizzo
    $pdf->SetXY(48.5, 95.3);
    $pdf->Write(0, "$indirizzo");

    //cap
    $pdf->SetXY(125, 104);
    $pdf->Write(0, "$cap");

    //provincia
    $pdf->SetXY(160, 104);
    $pdf->Write(0, "$provincia");

    //città
    $pdf->SetXY(48.5, 104.5);
    $pdf->Write(0, "$citta");

    //tel
    $pdf->SetXY(48.5, 113.5);
    $pdf->Write(0, "$telefono");

    //email
    $pdf->SetXY(125, 113.5);
    $pdf->Write(0, "$mail");




    switch (substr($tipo, 0, 8)) {
        case "studente":

            //studente
            $pdf->SetXY(48.7, 136.5);
            $pdf->Write(0, "X");

            //scuola
            $pdf->SetXY(76, 136.5);
            $pdf->Write(0, "$scuola");

            //classe
            $pdf->SetXY(77, 142);
            $pdf->Write(0, "$classe");

            //specializzazione
            $pdf->SetXY(124.5, 142);
            $pdf->Write(0, "$specializzazione");
            break;
        case "docenti":
            //docenti
            $pdf->SetXY(48.7, 127.5);
            $pdf->Write(0, "X");
            break;
        case "personale":
            //personale e corpi militari
            $pdf->SetXY(178, 127.5);
            $pdf->Write(0, "X");
            break;
        default :
            //esterni
            $pdf->SetXY(48.7, 151.5);
            $pdf->Write(0, "X");
    }

    //data esami
    $pdf->SetXY(77, 219);
    $pdf->Write(0, "$dataesame, dalle $ora_da alle $ora_a");


    //esami da prenotare
    for ($i = 0; $i < strlen($esami); $i++) {
        $esami[$i] = $esami[$i] - 1;

        $pdf->SetXY(48.7, (165.5 + ($esami[$i] * 7.1)));
        $pdf->Write(0, "X");
    }

    //modena DATA
    $pdf->SetXY(49, 266);
    $pdf->Write(0, $datenow);

    $pdf->Output('prenotazione.pdf', 'D');

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 11);
} else {
    echo "effettuare la richieste fornendo un id e un tipo di PDF";
}
?>


<?php

use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require('fpdf17/fpdf.php');
require_once("ConnessioneDb.php");
$db = new ConnessioneDb();
$id = "tccsml0257blew99";

if (isset($_REQUEST["id"]) && isset($_REQUEST["type"])) {
    $id = $_REQUEST["id"];
    $type = $_REQUEST["type"];
}

//FIX ME like this just fot testing purposes
$tipo = "studente";
$datenow = date("d/m/y");

$query = "SELECT * FROM `user` WHERE `codice_fiscale` = '$id'";
$ris = $db->query($query);

$riga = $ris->fetch_array();
if ($riga["codice_fiscale"] != "") {

    $skillcard = $riga['skill_card'];
    $codicefiscale = $riga['codice_fiscale'];
    $sesso = $riga['sesso'];
    $cognome = $riga['cognome'];
    $nome = $riga['nome'];
    $data = $riga['data_nascita'];
    $lnascita = $riga['luogo_nascita'];
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
        $scuola = substr($tipo, 10);
        $tipo = substr($tipo, 0, 8);
    }



    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 11);

    switch ($type) {
        case "skillcard":
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
            $pdf->Write(0, "$indirizzo");
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
            $pdf->Write(0, "?????????");
//occupazione
            $pdf->SetXY(140, 145.5);
            $pdf->Write(0, "$occupazione");


            switch ($tipo) {
                case "studente":

                    //scuola e classe
                    $pdf->SetXY(97, 154.2);
                    $pdf->Write(0, "$scuola");

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
            break;

        case "prenotazione": {
                $pdf->Image('pdf/prenotazione full.png', 0, 0, 210, 297);

                //n skill card
                $pdf->SetXY(48.5, 68);
                $pdf->Write(0, "98993");

//cognome
                $pdf->SetXY(124.5, 77);
                $pdf->Write(0, "cognome");

//data di nascita
                $pdf->SetXY(48.5, 86);
                $pdf->Write(0, "data di nascita");

//nome
                $pdf->SetXY(48.5, 77);
                $pdf->Write(0, "nome");

//luogo di nascita
                $pdf->SetXY(124.5, 86);
                $pdf->Write(0, "luogo di nascita");

//indirizzo
                $pdf->SetXY(48.5, 95.3);
                $pdf->Write(0, "indirizzo");

//cap
                $pdf->SetXY(125, 104);
                $pdf->Write(0, "cap");

//provincia
                $pdf->SetXY(160, 104);
                $pdf->Write(0, "provincia");

//città
                $pdf->SetXY(48.5, 104.5);
                $pdf->Write(0, "citta");

//tel
                $pdf->SetXY(48.5, 113.5);
                $pdf->Write(0, "tel");

//email
                $pdf->SetXY(125, 113.5);
                $pdf->Write(0, "email");


                switch ($tipo) {
                    case "studente":
                        //studente
                        $pdf->SetXY(48.7, 136.5);
                        $pdf->Write(0, "X");

                        //scuola
                        $pdf->SetXY(77, 136.5);
                        $pdf->Write(0, "scuola");

                        //classe
                        $pdf->SetXY(77, 142);
                        $pdf->Write(0, "classe");

                        //specializzazione
                        $pdf->SetXY(124.5, 142);
                        $pdf->Write(0, "specializzazione");
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

                $prova = "6351";

                //esami da prenotare
                for ($i = 0; $i < strlen($prova); $i++) {
                    $prova[$i] = $prova[$i] - 1;

                    $pdf->SetXY(48.7, (165.5 + ($prova[$i] * 7.1)));
                    $pdf->Write(0, "X");
                }

                //modena DATA
                $pdf->SetXY(49, 266);
                $pdf->Write(0, $datenow);
            }
            break;
    }

//$pdf->Output("D", "nomefile.pdf");
    $pdf->Output();
} else {
    echo "CODICE FISCALE NON TROVATO!";
}
?>


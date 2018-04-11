<!DOCTYPE html>
<!--T
o change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">

    </head>
    <body>
        <div>
            <a href='skillCard.php?a=0'>skillcard NUOVO </a>
            <br><a href='skillCard.php?a=1'>HO GIA skillcard</a>
            <br><a href='prenotazione.php'> prenotazione NON precompilata esame </a>
            <br><a href='login.php'> login </a>

        </div>
        <div>
            <br><form method="post" action="pdf.php">
                Cerca PDF skillcard per CF: <br><input value="tccsml0257blew99" required type="text" name="id">
                <input type="hidden" name="type" value="skillcard">
                <br><input type="submit" value="CERCA Skillcard">
            </form>
        </div>
        <div>
            <br><form method="post" action="pdf.php">
                Cerca PDF prenotazione per CF: <br><input value="tccsml0257blew99" required type="text" name="id">
                <br>e per ID prenotazione: <br><input required type="number" name="idprenota">
                <input type="hidden" name="type" value="prenotazione">
                <br><input type="submit" value="CERCA">
            </form>
        </div>
        <div>
            <br><form method="post" action="prenotazione.php">
                Cerca Prenotazione compilata in base al CF: <br><input value="tccsml0257blew99" required type="text" name="id">
                <br><input type="submit" value="Compilami">
            </form>
        </div>


        <p>
            <?php
//
//        require_once("ConnessioneDb.php");
//        $db = new ConnessioneDb();
//
//        //skillcard
//        if (isset($_REQUEST['codiceFiscale'])) {
//             //             $codicefiscale = $_REQUEST['codiceFiscale'];
//             //             $sesso = $_REQUEST['sesso'];
//             //             $cognome = $_REQUEST['cognome'];
//             //             $nome = $_REQUEST['nome'];
//             //             $giorno = $_REQUEST['giorno'];
//             //             $mese = $_REQUEST['mese'];
//             //             $anno = $_REQUEST['anno'];
//             //             $statocivile = $_REQUEST['statoCivile'];
//             //             $lnascita = $_REQUEST['lnascita'];
//             //             $indirizzo = $_REQUEST['indirizzo'];
//             //             $stato = $_REQUEST['stato'];
//             //             $citta = $_REQUEST['citta'];
//             //             $cap = $_REQUEST['cap'];
//             //             $provincia = $_REQUEST['provincia'];
//             //             $telefono = $_REQUEST['telefonoCasa'];
//             //             $cellulare = $_REQUEST['cellulare'];
//             //             $mail = $_REQUEST['mail'];
//             //             $occupazione = $_REQUEST['occupazione'];
//             //            $optradio = $_REQUEST['optradio'];
//            //            if ($optradio == "studenti") {
//                 $scuola = $_REQUEST['scuola'];
//                 //                 $classe = $_REQUEST['classe'];
//                 //                 $specializzazione = $_REQUEST['specializzazione'];
//                 //            }
//            $indirizzo = "";
//            $birthdate = "$anno-$mese-$giorno";
//            $query = "INSERT INTO `user`(`skill_card`, `password`, `rilasciata`, `codice_fiscale`, `sesso`, `cognome`, `nome`, `data_nascita`, `luogo_nascita`, `stato_civile`, `indirizzo`, `stato`, `citta`, `cap`, `provincia`, `email`, `cellulare`, `telefono`, `occupazione`, `pagato`) "
//                    . " VALUES ('default', 'admin', '$datenow', '$codicefiscale', '$sesso', '$cognome', '$nome', '$birthdate', '$lnascita', '$statocivile', '$indirizzo', '$stato', '$citta', '$cap', '$provincia', '$mail', '$cellulare', '$telefono', '$occupazione', 0)";
//            $ris = $db->query($query);
//        }
//
//
////       $ris = $db->query("select * from user");
////         "<table border><tr><th>ID</th><th>Descrizione</th><tr>";
////        while ($riga = $ris->fetch_array()) {
////             "<tr><td>{$riga["codice_fiscale"]}</td>";
////             '<td>' . $riga["sesso"] . '</td>';
////            // "<td>{$riga["sconto"]}</td>";
////             "</tr>";
////        }
////         "</table>";
//        
            ?>
        </p>
    </body>
</html>

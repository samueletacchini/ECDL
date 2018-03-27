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
        <?php
        
        echo "<a href='prenotazione.php'> Prenotazione skillcard </a>";
        echo "<br><a href='prenotazione.php'> Registrazione </a>";
        require_once("ConnessioneDb.php");
        $db = new ConnessioneDb();

        //skillcard
        if (isset($_REQUEST['codiceFiscale'])) {
            echo $codicefiscale = $_REQUEST['codiceFiscale'];
            echo "<br>";
            echo $sesso = $_REQUEST['sesso'];
            echo "<br>";
            echo $cognome = $_REQUEST['cognome'];
            echo "<br>";
            echo $nome = $_REQUEST['nome'];
            echo "<br>";
            echo $giorno = $_REQUEST['giorno'];
            echo "<br>";
            echo $mese = $_REQUEST['mese'];
            echo "<br>";
            echo $anno = $_REQUEST['anno'];
            echo "<br>";
            echo $statocivile = $_REQUEST['statoCivile'];
            echo "<br>";
            echo $lnascita = $_REQUEST['lnascita'];
            echo "<br>";
            echo $indirizzo = $_REQUEST['indirizzo'];
            echo "<br>";
            echo $stato = $_REQUEST['stato'];
            echo "<br>";
            echo $citta = $_REQUEST['citta'];
            echo "<br>";
            echo $cap = $_REQUEST['cap'];
            echo "<br>";
            echo $provincia = $_REQUEST['provincia'];
            echo "<br>";
            echo $telefono = $_REQUEST['telefonoCasa'];
            echo "<br>";
            echo $cellulare = $_REQUEST['cellulare'];
            echo "<br>";
            echo $mail = $_REQUEST['mail'];
            echo "<br>";
            echo $occupazione = $_REQUEST['occupazione'];
            echo "<br>";
            $optradio = $_REQUEST['optradio'];
            "<br>";
            if ($optradio == "studenti") {
                echo $scuola = $_REQUEST['scuola'];
                echo "<br>";
                echo $classe = $_REQUEST['classe'];
                echo "<br>";
                echo $specializzazione = $_REQUEST['specializzazione'];
                echo "<br>";
            }
        }

        $indirizzo = "";
        $birthdate = "$anno-$mese-$giorno";
        $query = "INSERT INTO `user`(`skill_card`, `password`, `rilasciata`, `codice_fiscale`, `sesso`, `cognome`, `nome`, `data_nascita`, `luogo_nascita`, `stato_civile`, `indirizzo`, `stato`, `citta`, `cap`, `provincia`, `email`, `cellulare`, `telefono`, `occupazione`, `pagato`) "
                . " VALUES ('default', 'admin', '$datenow', '$codicefiscale', '$sesso', '$cognome', '$nome', '$birthdate', '$lnascita', '$statocivile', '$indirizzo', '$stato', '$citta', '$cap', '$provincia', '$mail', '$cellulare', '$telefono', '$occupazione', 0)";

        $ris = $db->query($query);
       $ris = $db->query("select * from user");
        echo "<table border><tr><th>ID</th><th>Descrizione</th><tr>";
        while ($riga = $ris->fetch_array()) {
            echo "<tr><td>{$riga["codice_fiscale"]}</td>";
            echo '<td>' . $riga["sesso"] . '</td>';
            //echo "<td>{$riga["sconto"]}</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>

    </body>
</html>

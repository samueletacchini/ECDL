<!DOCTYPE html>
<!--T
o change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        echo "<a href='prenotazione.php'> Prenotazione skillcard </a>";
        echo "<br><a href='prenotazione.php'> Registrazione </a>";
        require_once("ConnessioneDb.php");
        $db = new ConnessioneDb();
        
        //skillcard
        if (isset($_REQUEST['nskill'])){
            echo $nskill = $_REQUEST['nskill'];
            echo $codfiscale = $_REQUEST['codfiscale'];
            echo $cognome = $_REQUEST['cognome'];
            echo $nome = $_REQUEST['nome'];
            echo $giorno = $_REQUEST['giorno'];
            echo $mese = $_REQUEST['mese'];
            echo $anno = $_REQUEST['anno'];
            echo $lnascita = $_REQUEST['lnascita'];
            echo $indirizzo = $_REQUEST['indirizzo'];
            echo $citta = $_REQUEST['citta'];
            echo $cap = $_REQUEST['cap'];
            echo $provincia = $_REQUEST['provincia'];
            echo $telefono = $_REQUEST['telefono'];
            echo $mail = $_REQUEST['mail'];
            echo $studente = $_REQUEST['studente'];
            echo $scuola = $_REQUEST['scuola'];
            echo $classe = $_REQUEST['classe'];
            echo $specializzazione = $_REQUEST['specializzazione'];
            
            
            $rilasciatadate = "$anno-$mese-$giorno";
            $query = "INSERT INTO `user`(`skill_card`, `rilasciata`, `codice_fiscale`, `sesso`, `cognome`, `nome`, `data_nascita`, `luogo_nascita`, `stato_civile`, `indirizzo`, `email`, `cellulare`, `telefono`, `occupazione`, `pagato`, `date_insert`) "
                   //. "VALUES ($nskill, $rilasciatadate, $codfiscale, , , , , , , , , , , , , ");
            ;
            
            
            
            
        }
        
        
        
        
        ?>
    </body>
</html>

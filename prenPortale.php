<html>
    <head>
        <?php
        session_start();
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="css/PrenotazioneRegistrazione.css">
        <link rel="stylesheet" href="file.js">
    </head>
    <style>

        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }
        .custom-file-input::before {
            content: 'Carica';
            display: inline-block;
            background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
            border: 1px solid #999;
            border-radius: 3px;
            padding: 5px 8px;
            outline: none;
            white-space: nowrap;
            -webkit-user-select: none;
            cursor: pointer;
            text-shadow: 1px 1px #fff;
            font-weight: 700;
            font-size: 10pt;
        }
        .custom-file-input:hover::before {
            border-color: black;
        }
        .custom-file-input:active::before {
            background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
        }

        upload{
            height:50% + 100px;
        }
        #barraPortale{
            background:DodgerBlue;
            border-radius:5px;
            border:0px;
        }
        .container-fluid{ 
            border-style:solid; 
            border-color:#CCCCCC; 
            border-width:1px; 
            border-radius:5px 5px 5px 5px;
            color:black;   
        }
        #foot{
            width: 100%;
        }
        p {
            display: block;
            color:gray;
            -webkit-margin-before: 1em;
            -webkit-margin-after: 1em;
            -webkit-margin-start: 0px;
            -webkit-margin-end: 0px;
        }
        #bar{
            color:white;
        }
        .testimonial-group > .row {
            overflow-x: auto;
            margin-left:0.2%;
            width:20%;
            min-width:100%;
        }
        .testimonial-group > .row {
            overflow-y: auto;
            height:94.3%;
        }
    </style>
    <body>
        <div class="jumbotron text-center">
            <h1 align="center"> Portale Amministratore</h1>
            <p id="bar">
                <span class="glyphicon glyphicon-phone"></span>
                0592917000 -
                <span class="glyphicon glyphicon-envelope"></span>
                ecdl@istitutocorni.it
            </p>
        </div>
        <div class='col-md-8'>
            <div class="container-fluid" style="background-color:Dodgerblue;">             
                <form action="prenPortale.php" method="post">
                    <div class="form-group col-md-3" style="margin-top:1.5%;">
                        <select name="colonna" class="form-control" required>
                            <option value="nome" selected> nome</option>    
                            <option value="cognome" > cognome</option>    
                            <option value="esami"> moduli </option>
                            <option value="data"> data sessione </option>
                        </select>
                    </div>
                    <div class="form-group col-md-3" style="margin-top:1.5%;">    
                        <input name="cerca" type="text" class="form-control" placeholder="cerca">
                    </div>
                    <div class="form-group col-md-3" style="margin-top:1.7%;">
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </div>


                </form>
                <form method='post' action='prenPortale.php'>
                    <input name='tartaruga' type='hidden' value='1'>
                    <input type='submit' value='Reset' class='btn btn-default col-md-3'>
                </form>
            </div>

            <div class="panel panel-default">
                <div class="form-group">
                    <h3 align='center'>Utenti vari</h3>
                </div>
                <div class="panel-body testimonial-group">
                    <div class="row text-center col-md-12">
                        <?php
                        require_once('ConnessioneDb.php');
                        $db = new ConnessioneDb();

                        if (isset($_REQUEST["tartaruga"]) || (!isset($_SESSION["cerca"]) && !isset($_SESSION["cosa"]))) {
                            $_SESSION["cerca"] = "prenotazione.ID";
                            $_SESSION["cosa"] = "%";
                        }

                        if (isset($_REQUEST['salva'])) {
                            $query = "UPDATE `prenotazione` SET ";

                            if (isset($_REQUEST["ID"])) {
                                $query .= 'ID = "' . $_REQUEST['ID'] . '", ';
                            }
                            if (isset($_REQUEST["ID_codice_fiscale"])) {
                                $query .= 'ID_codice_fiscale = "' . $_REQUEST['ID_codice_fiscale'] . '", ';
                            }
                            if (isset($_REQUEST["esami"])) {
                                $query .= 'esami = "' . $_REQUEST['esami'] . '", ';
                            }
                            if (isset($_REQUEST["ID_sessione"])) {
                                $query .= 'ID_sessione = "' . $_REQUEST['ID_sessione'] . '", ';
                            }


                            $query = substr($query, 0, -2);

                            $query .= " WHERE ID = '{$_REQUEST['salva']}'";
                            $ris = $db->query($query);
                        }





                        if (isset($_REQUEST['colonna']) && isset($_REQUEST['cerca'])) {
                            $_SESSION["cerca"] = $_REQUEST['colonna'];
                            $_SESSION["cosa"] = $_REQUEST['cerca'];
                        } else {
                            if ($_SESSION["cerca"] == "ID" && $_SESSION["cosa"] == "%" && !isset($_REQUEST["ordina"])) {
                                $_SESSION["cerca"] = "ID";
                                $_SESSION["cosa"] = "%";
                            }
                        }

                        if (isset($_REQUEST["ordina"])) {

                            if ($_REQUEST["ordina"] == "nome" || $_REQUEST["ordina"] == "cognome") {
                                $_SESSION["ordina"] = "user." . $_REQUEST["ordina"];
                            } else if ($_REQUEST["ordina"] == "data") {
                                $_SESSION["ordina"] = "sessioni." . $_REQUEST["ordina"];
                            } else {
                                $_SESSION["ordina"] = "prenotazione." . $_REQUEST["ordina"];
                            }
                        } else {
                            if (!isset($_REQUEST["modifica"])) {
                                $_SESSION['ordina'] = "prenotazione.ID";
                            }
                        }

                        if (isset($_REQUEST["pren"])) {
                            $idpren = $_REQUEST["pren"];
                        } else {
                            $idpren = "%";
                        }

                        $_SESSION["query"] = "SELECT prenotazione.ID, user.nome, user.cognome, prenotazione.esami, sessioni.data FROM `prenotazione`  JOIN user ON user.codice_fiscale = prenotazione.ID_codice_fiscale JOIN sessioni ON sessioni.ID = prenotazione.ID_sessione WHERE cast(prenotazione.ID_sessione as char(15)) LIKE '{$idpren}' AND {$_SESSION['cerca']} LIKE '%{$_SESSION['cosa']}%' GROUP BY prenotazione.ID ORDER BY {$_SESSION["ordina"]}";
                        echo "<br><br>";
                        $ris = $db->query($_SESSION["query"]);
                        $righe = mysqli_num_rows($ris);

                        if ($righe > 0) {

                            echo '<table class=" table table-bordered"> <tr>';
                            echo '<th></th>';
//                            echo "<th>Righe totali : {$righe} </th>";
//                            if (explode(".", $_SESSION["ordina"])[1] == "ID") {
//                                echo '<th><form method="post" action="prenPortale.php"> <input value="ID" type="hidden" name="ordina"> <input type="submit" value="ID" class="btn btn-info btn-lg" style="background-color:lightblue;"> </form></th>';
//                            } else {
//                                echo '<th><form method="post" action="prenPortale.php"> <input value="ID" type="hidden" name="ordina"> <input type="submit" value="ID" class="btn btn-info btn-lg" style="background-color:blue;"> </form></th>';
//                            } 

                            if (explode(".", $_SESSION["ordina"])[1] == "nome") {
                                echo '<th><form method="post" action="prenPortale.php"> <input value="nome" type="hidden" name="ordina"> <input type="submit" value="Nome" class="btn btn-info btn-lg" style="background-color:blue;"> </form></th>';
                            } else {
                                echo '<th><form method="post" action="prenPortale.php"> <input value="nome" type="hidden" name="ordina"> <input type="submit" value="Nome" class="btn btn-info btn-lg" style="background-color:Dodgerblue;"> </form></th>';
                            }
                            if (explode(".", $_SESSION["ordina"])[1] == "cognome") {
                                echo '<th><form method="post" action="prenPortale.php"> <input value="cognome" type="hidden" name="ordina"> <input type="submit" value="Cognome" class="btn btn-info btn-lg" style="background-color:blue;"> </form></th>';
                            } else {
                                echo '<th><form method="post" action="prenPortale.php"> <input value="cognome" type="hidden" name="ordina"> <input type="submit" value="Cognome" class="btn btn-info btn-lg" style="background-color:Dodgerblue;"> </form></th>';
                            }
                            if (explode(".", $_SESSION["ordina"])[1] == "esami") {
                                echo '<th><form method="post" action="prenPortale.php"> <input value="esami" type="hidden" name="ordina"> <input type="submit" value="Moduli" class="btn btn-info btn-lg" style="background-color:blue;"> </form></th>';
                            } else {
                                echo '<th><form method="post" action="prenPortale.php"> <input value="esami" type="hidden" name="ordina"> <input type="submit" value="Moduli" class="btn btn-info btn-lg" style="background-color:Dodgerblue;"> </form></th>';
                            }
                            if (explode(".", $_SESSION["ordina"])[1] == "data") {
                                echo '<th><form method="post" action="prenPortale.php"> <input value="data" type="hidden" name="ordina"> <input type="submit" value="Data" class="btn btn-info btn-lg" style="background-color:blue;"> </form></th>';
                            } else {
                                echo '<th><form method="post" action="prenPortale.php"> <input value="data" type="hidden" name="ordina"> <input type="submit" value="Data" class="btn btn-info btn-lg" style="background-color:Dodgerblue;"> </form></th>';
                            }

                            echo '<th> <div class="btn btn-info btn-lg disabled" style="background-color:Dodgerblue;">Bollettino</div></th>';


                            echo '<th> <div class="btn btn-info btn-lg disabled" style="background-color:Dodgerblue;">Pdf</div></th>';

                            echo "</tr>";
                        } else {
                            echo 'la ricerca non ha restituito nessun risultato';
                        }
                        while ($riga = $ris->fetch_array()) {
                            if (isset($_REQUEST['modifica'])) {
                                if ($_REQUEST['modifica'] == $riga['ID']) {
                                    $modifica = true;
                                    echo '<form method="post" action="prenPortale.php">';
                                } else {
                                    $modifica = false;
                                }
                            } else {
                                $modifica = false;
                            }

                            echo "<tr>";
                            if ($modifica == true) {

                                echo "<tr><td> <input type='submit' value='Salva' class='btn btn-info btn-lg' style='color:white;'></td>";
                            } else {
                                echo '<td><form method="post" action="prenPortale.php"> <input  value="' . $riga['ID'] . '" type="hidden" name="modifica"> <input type="submit" value="Modifica" class="btn btn-info" style=" color:white;"> </td>';
                            }



//                            if ($modifica == true) {
//                                echo "<td> <input name='ID' type='text' value='" . $riga['ID'] . "' ></td>";
//                            } else {
//                                echo "<td> " . $riga['ID'] . "</td>";
//                            }

                            if ($modifica == true) {
                                echo "<td><input class='form-control' name='nome' type='text' value='" . $riga['nome'] . "'></td>";
                            } else {
                                echo "<td>" . $riga['nome'] . "</td>";
                            }
                            if ($modifica == true) {
                                echo "<td><input class='form-control' name='cognome' type='text' value='" . $riga['cognome'] . "'></td>";
                            } else {
                                echo "<td>" . $riga['cognome'] . "</td>";
                            }

                            if ($modifica == true) {
                                echo "<td> <input class='form-control' name='esami' type='text' value='" . $riga['esami'] . "'></td>";
                            } else {
                                echo "<td>" . $riga['esami'] . "</td>";
                            }

                            if ($modifica == true) {
                                echo "<td> <input class='form-control' name='data' type='text' value='" . $riga['data'] . "'></td>";
                            } else {
                                echo "<td>" . $riga['data'] . "</td>";
                            }
//
//                        if ($modifica == true) {
//                            echo "<td> <input name='tipo' type='text' value='" . $riga['tipo'] . "'></td>";
//                        } else {
//                            echo "<td>" . $riga['tipo'] . "</td>";
//                        }
//
//                        if ($modifica == true) {
//                            echo "<td> <input name='tipo2' type='text' value='" . $riga['tipo'] . "'></td>";
//                        } else {
//                            echo "<td>" . $riga['tipo2'] . "</td>";
//                        }


                            $query2 = "SELECT id, tipo, ok, ID_prenotazione FROM `file` WHERE `ID_prenotazione` = {$riga['ID']}";
                            $ris2 = $db->query($query2);

                            $pren = 0;
                            $boll = 0;
                            for ($o = 0; $o < 2; $o++) {
                                $riga2 = $ris2->fetch_array();
                                $tipi = explode(", ", $riga2['tipo']);
                                for ($p = 0; $p < 2; $p++) {
                                    if (isset($tipi[$p])) {

                                        if ($tipi[$p] == "bollettinoprenotazione") {
                                            $id = $riga2['id'];
                                            if ($riga2['ok'] == 1) {
                                                $boll = 2;
                                            } else {
                                                $boll = 1;
                                            }
                                        }
                                        if ($tipi[$p] == "pdfprenotazione") {
                                            $id = $riga2['id'];
                                            if ($riga2['ok'] == 1) {
                                                $pren = 2;
                                            } else {
                                                $pren = 1;
                                            }
                                        }
                                    }
                                }
                            }

                            if ($boll == 1) {

                                echo "<td><span style='color:#ffcc00; font-size:150%;' class='glyphicon glyphicon-exclamation-sign' title='Da approvare'></span> <a href='getfile.php?fid={$id}'>  <span style='color:#737373; font-size:150%;' class='glyphicon glyphicon-save-file' title='Scarica' ></span></a> <a href='setok.php?pid=" . $id . "'><span style='color:#33cc33; font-size:150%;'   class='glyphicon glyphicon-thumbs-up'></span></a></td>";
                            } else if ($boll == 2) {
                                echo "<td><span style='color:#33cc33; font-size:120%;' class='glyphicon glyphicon-ok-sign' title='Completo'></span><a href='getfile.php?fid={$id}'>  <span style='color:#737373; font-size:150%;' class='glyphicon glyphicon-save-file' title='Scarica' ></span></a></span> <a href='setok.php?rid=" . $id . "'><span style='color:#c60101; font-size:150%;'   class='glyphicon glyphicon-thumbs-down'></span></a> </td>";
                            } else {
                                echo '<td><span style="color:#ff0000; font-size:150%;" class="glyphicon glyphicon-remove-sign" title="Vuoto"></span>  </td>';
                            }
                            //glyphicon glyphicon-remove-sign
                            if ($pren == 1) {
                                echo "<td><span style='color:#ffcc00; font-size:150%;' class='glyphicon glyphicon-exclamation-sign' title='Da approvare'></span><a href='getfile.php?fid={$id}'>  <span style='color:#737373; font-size:150%;' class='glyphicon glyphicon-save-file' title='Scarica' ></span></a><a href='setok.php?pid=" . $id . "'><span style='color:#33cc33; font-size:150%;'   class='glyphicon glyphicon-thumbs-up'></span></a></td>";
                            } else if ($pren == 2) {
                                echo "<td><span style='color:#33cc33; font-size:150%;' class='glyphicon glyphicon-ok-sign' title='Completo'></span> <a href='getfile.php?fid={$id}'>  <span style='color:#737373; font-size:150%;' class='glyphicon glyphicon-save-file' title='Scarica' ></span></a> <a href='setok.php?rid=" . $id . "'><span style='color:#c60101; font-size:150%;'   class='glyphicon glyphicon-thumbs-down'></span></a></td>";
                            } else {
                                echo "<td><span style='color:#ff0000; font-size:150%;' class='glyphicon glyphicon-remove-sign' title='Vuoto'></span> </td>";
                            }




                            echo " </form></tr> ";
                            if ($modifica) {
                                echo '</form>';
                                $modifica = false;
                            }
                        }
                        echo '</table>';

                        echo '<a download href="exportPrenotazioni.php?query=' . $_SESSION["query"] . '"> <div class="btn btn-info btn-lg" style="background-color:Dodgerblue;">Esporta</div> </a>';
//
//                        echo ' <form action="exportPrenotazioni.php" method="post">';
//                        echo '<input type="hidden" name="query" value="' . $_SESSION["query"] . '">';
//                        echo '<input type="submit" value="export" class="btn btn-info" style="background-color:Dodgerblue;">';
//                        echo "</form>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-4'>

            <div class="panel panel-default"  id="link">
                <div class="form-group">
                    <h3 align='center'>Prossime date Esami</h3>
                </div>
                <div class="panel-body" >
                    <table class="table table-bordered">
                        <tr><td style="color:gray">Data</td><td style="color:gray">Dalle</td><td style="color:gray">Alle</td><td style="color:gray">Elimina</td><td style="color:gray"  >Alle</td></tr>

                        <?php
                        $eh = "SELECT * FROM `sessioni` ORDER BY `data`";
                        $ris = $db->query($eh);
                        $datenow = date("Y-m-d");
                        while ($riga = $ris->fetch_array()) {
                            if ($riga["data"] >= $datenow) {
                                echo "<tr><td>{$riga["data"]}</td>";
                                echo "<td>{$riga["ora_da"]}</td>";
                                echo "<td>{$riga["ora_a"]}</td>";

                                echo "<td><a href='inserisciSessione.php?elimina={$riga["ID"]}' id='modal' name='modal'><span   style='color:#737373' class='glyphicon glyphicon-trash'></span></td>";

                                echo '<td> <form action="prenPortale.php" method="post">';
                                echo '<input type="hidden" name="pren" value="' . $riga["ID"] . '">';
                                echo '<input type="submit" value="visualizza" class="btn btn-info" style="background-color:Dodgerblue;">';
                                echo "</td> </form> </tr>";
                            }
                        }
                        echo "</table>";
                        ?>
                    </table>

                    <div id="sesione" class="form-group col-md-12"> 
                        <button  type="button" onclick="printInsert()" class="btn btn-info col-md-12 btn-lg" style="background-color:Dodgerblue;">Nuova Sessione</button>
                    </div>
                    <br>
                    <div class="form-group col-md-12"  id="upload" > 
                        <button  type="button" onclick="uploadsomething()" class="btn btn-info col-md-12 btn-lg" style="background-color:Dodgerblue;">Carica qualcosa</button>
                        <?php
                        if (isset($_REQUEST["sessioni"])) {
                            echo $_REQUEST["sessioni"];
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script>

            function printInsert() {
                var html = '<form action="inserisciSessione.php" method="post"><div class="panel panel-default col-md-12"><div class="form-row col-md-4"><label  class="form-check-label" for="defaultCheck7" style="color:gray">Data </label><input type="text" name="data" value="" class="form-control" required></div><div class="form-row col-md-4"><label  class="form-check-label" for="defaultCheck7" style="color:gray"> Dalle </label><input type="text" name="ora_da" value="" class="form-control" required></div><div class="form-row col-md-4"><label  class="form-check-label" for="defaultCheck7" style="color:gray"> Alle </label><div class="form-row"><input type="text" name="ora_a" value="" class="form-control" required></div></div><div class="form-group col-md-12"></div><div class="form-row col-md-12"><input type="submit" value="Inserisci" class="btn btn-info col-md-12" style="background-color:Dodgerblue;"><div class="form-group col-md-12"></div></div></form>';

                document.getElementById("sesione").innerHTML = html;
            }
            function uploadsomething() {
                var html = '<form name="carica" action="readxls.php" method="post" enctype="multipart/form-data"><div class="panel panel-default col-md-12"><p align="center">Carica qualcosa</p><input accept=".xls" name="xls" type="file" class="custom-file-input" required><br><input type="submit" name="carica" value="Carica" class="btn btn-info btn-lg" style="background-color:Dodgerblue;"><div class="form-group col-md-12></div></div></form>';

                document.getElementById("upload").innerHTML = html;
            }

        </script>

        <div class="col-md-12">                                 
            <footer class="container text-center" id="foot" >                                         
                <p>                            
                    <br/><strong>IIS F.CORNI - LICEO E TECNICO</strong>                              
                    <br/>                    Sede centrale: L.go A. Moro 25 Tel 059/400700 Fax 059/243391                              
                    <br/>                        Succursale: Via Leonardo da Vinci 300 Tel 059/2917000 Fax 059/344709                              
                    <br/>                    ecdl@istitutocorni.it - http://www.istitutocorni.gov.it                                          
                </p>                                 
            </footer>     
        </div>
    </body>
</html>
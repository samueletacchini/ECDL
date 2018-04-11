<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="css/PrenotazioneRegistrazione.css">
        <link rel="stylesheet" href="file.js">
    </head>
    <body>
        <div class="jumbotron text-center">
            <h1 align="center"> Prenotazione Degli Esami </h1>
            <p>
                <span class="glyphicon glyphicon-phone"></span>
                0592917000 -
                <span class="glyphicon glyphicon-envelope"></span>
                ecdl@istitutocorni.it
            </p>
        </div>

        <?php
        require_once("ConnessioneDb.php");
        $db = new ConnessioneDb();
        $datenow = date("d/m/y");
        $pre = false;
        if (isset($_REQUEST["id"])) {

            $pre = true;
            $id = $_REQUEST["id"];
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

                $gigi = explode('-', $data);
                $anno = $gigi[0];
                $mese = $gigi[1];
                $giorno = $gigi[2];
                
                if (substr($tipo, 0, 8) == "studente") {
                    $scuola = substr($tipo, 10);
                    $tipo = substr($tipo, 0, 8);
                }
            } else {
                echo "UTENTE NON TROVATO!";
            }
        } else {
            echo "dovresti fornire un ID!";
        }
        ?>




        <div class="container-fluid bg-grey">
            <form name="casellaTesto" method="get" class="was-validated">
                <h2 align="center"> Modulo Di Prenotazione</h2>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="card">Skill Card N.</label>
                        <input 
                        <?php
                        if ($pre) {
                            echo "value='$skillcard'";
                        }
                        ?> name="nskill" type="text" class="form-control" id="card" placeholder="Numero SkillCard" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">                       
                        <label for="cognome">Cognome</label>
                        <input <?php
                        if ($pre) {
                            echo "value='$cognome'";
                        }
                        ?>  name="cognome" type="text" class="form-control" id="cognome" placeholder="Cognome" required>                      
                    </div>         
                    <div class="form-group col-md-6">                   
                        <label for="nome">Nome</label>
                        <input <?php
                        if ($pre) {
                            echo "value='$nome'";
                        }
                        ?>  name="nome" type="text" class="form-control" id="nome" placeholder="Nome" required>
                    </div>
                </div>

                <label for="data" class="col-md-12">Data Di Nascita</label>
                <div class="form-row">
                    <div class="form-group col-md-4"> 
                        <select value="<?php
                        if ($pre) {
                            echo "value='$giorno'";
                        }
                        ?> " name="giorno" class="form-control" id="day">
                            <option disabled selected>Giorno</option>
                            <?php
                            for ($day = 1; $day <= 31; $day++)
                                echo "<option value = '" . $day . "'>" . $day . "</option>";
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <select <?php
                        if ($pre) {
                            echo "value='$mese'";
                        }
                        ?>   name='mese' class="form-control" id="mounth">
                            <option value='' disabled selected>Mese</option>
                            <option value='1'>Gennaio</option>
                            <option value='2'>Febbraio</option>
                            <option value='3'>Marzo</option>
                            <option value='4'>Aprile</option>
                            <option value='5'>Maggio</option>
                            <option value='6'>Giugno</option>
                            <option value='7'>Luglio</option>
                            <option value='8'>Agosto</option>
                            <option value='9'>Settebre</option>
                            <option value='10'>Ottobre</option>
                            <option value='11'>Novembre</option>
                            <option value='12'>Dicembre</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <select <?php
                        if ($pre) {
                            echo "value='$anno'";
                        }
                        ?>  name='anno' class="form-control" id="year">
                            <option disabled selected>Anno</option>
                            <?php
                            for ($year = Date('Y'); $year >= 1900; $year--)
                                echo"<option value = '" . $year . "'>" . $year . "</option>";
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="luogo">Luogo Di Nascita</label>
                        <input
                        <?php
                        if ($pre) {
                            echo "value='$lnascita'";
                        }
                        ?>  name="lnascita" type="text" class="form-control" id="luogo" placeholder="Luogo" required>
                    </div>
                    <div class="form-group col-md-8">                   
                        <label for="card">Indirizzo</label>
                        <input <?php
                        if ($pre) {
                            echo "value='$indirizzo'";
                        }
                        ?> name="indirizzo" type="text" class="form-control" id="indirizzo" placeholder="Indirizzo" required>                 
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="city">Citta'</label>
                        <input <?php
                        if ($pre) {
                            echo "value='$citta'";
                        }
                        ?>  name="citta" type="text" class="form-control" id="city" placeholder="Citta'" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cap">CAP</label>
                        <input <?php
                        if ($pre) {
                            echo "value='$cap'";
                        }
                        ?>  name="cap" type="number" class="form-control" id="cap" placeholder="CAP" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="provincia">Provincia</label>
                        <input <?php
                        if ($pre) {
                            echo "value='$provincia'";
                        }
                        ?>  name="provincia" type="text" class="form-control" id="provincia" placeholder="Provincia" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="telefono">Telefono</label>
                        <input <?php
                        if ($pre) {
                            echo "value='$telefono'";
                        }
                        ?>  name="telefono" type="number" class="form-control" id="telefono" placeholder="Telefono" required>                      
                    </div>         
                    <div class="form-group col-md-8">                   
                        <label for="mail">Indirizzo E-Mail</label>
                        <input <?php
                        if ($pre) {
                            echo "value='$mail'";
                        }
                        ?>  name="mail" type="text" class="form-control" id="mail" placeholder="E-Mail" required>
                    </div>
                </div>

                <h3 align="center">TIPOLOGIE DI CANDIDATI :</h3>

                <br><div class="checkbox-inline">
                    <div class="form-group">
                        <label><input onclick="cancella()" type="radio" name="optradio" id="radioDocenti"> Docenti ATA: </label>
                    </div>
                    <div class="form-group">
                        <label><input  onclick="cancella()" type="radio" name="optradio" id="radioPersonale"> Personale Corpi Militari ed Enti Ministeriali convenzionati: </label>
                    </div>
                    <div class="form-group">
                        <label><input  onclick="myFunction()"  type="radio" name="optradio" id="radioStudente"> Studente sup. :
                            <p id="clicco"></p>
                            <script>
                                var html = "<br><div class='form-row'>" +
                                        " <div class='col-md-4'>" +
                                        " <label for='scuola'>Scuola</label>" +
                                        " <input name='scuola' type='text' class='form-control' id='scuola'>" +
                                        "</div>" +
                                        "<div class='col-md-2'>" +
                                        " <label for='classe'>Classe</label>" +
                                        " <input name='classe' type='text' class='form-control' id='classe'>" +
                                        "</div>" +
                                        "<div class='col-md-6'>" +
                                        "<label for='specializzazione'>Specializzazione</label>" +
                                        "<input name='specializzazione' type='text' class='form-control' id='specializzazione'>" +
                                        "</div>" +
                                        "</div>";
                                function myFunction() {
                                    document.getElementById("clicco").innerHTML = html;
                                }
                                function cancella() {
                                    document.getElementById("clicco").innerHTML = "";
                                }
                            </script>
                    </div>
                    <div class="form-group">
                        <label><input  onclick="cancella()"  type="radio" name="optradioEsterni" id="radioEsterno"> Esterni</label>
                    </div>
                </div>


                <br><h3 align="center">Barrare con una SPUNTA uno o più moduli per i quali si vuole sostenere l' esame :</h3>

                <br><div class="checkbox-inline col-md-offset-5">
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label name='1' class="form-check-label" for="defaultCheck1">
                            Modulo 1: Computer Essentials
                        </label>
                    </div>
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                        <label name='2' class="form-check-label" for="defaultCheck2">
                            Modulo 2: Online Essentials
                        </label>
                    </div>
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                        <label name='3' class="form-check-label" for="defaultCheck3">
                            Modulo 3: Word Processing
                        </label>
                    </div>
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                        <label name='4' class="form-check-label" for="defaultCheck4">
                            Modulo 4: Spreadsheets
                        </label>
                    </div>
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                        <label name='5' class="form-check-label" for="defaultCheck5">
                            Modulo 5: IT Security
                        </label>
                    </div>
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck6">
                        <label name='6' class="form-check-label" for="defaultCheck6">
                            Modulo 6: Presentation
                        </label>
                    </div>
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck7">
                        <label name='7' class="form-check-label" for="defaultCheck7">
                            Modulo 7: Online Collaboration
                        </label>
                    </div>
                </div>

                <br><h3 align="center">Data Prenotazione Esame :</h3>

                <table class="table table-bordered">
                    <thead>
                        <tr><td> Data </td><td> Ora</td></tr>
                        <tr><td><input name='d1' type="checkbox" name="data1" class="form-check-input" value="modulo1"/> Giovedì 22 Marzo 2018</td><td> 17:00 - 19:30 </td></tr>
                        <tr><td><input name='d2' type="checkbox" name="data2" class="form-check-input" value="modulo2"/> Giovedì 19 Aprile 2018</td><td> 15:00 - 17:30</td></tr>
                        <tr><td><input name='d3' type="checkbox" name="data3" class="form-check-input" value="modulo3"/> Giovedì 24 Maggio 2018 </td><td>    17:00 - 19:30</td></tr>
                    </thead>
                </table>
                </table>

                <center><input type="submit" value="Prenota" class="btn btn-info btn-lg"></center>

            </form>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="bootstrap-table.js"></script>
        </div>
    </body>
</html>



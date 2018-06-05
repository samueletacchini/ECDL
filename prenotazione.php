<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="css/PrenotazioneRegistrazione.css">
        <link rel="stylesheet" href="file.js">
    </head>
    <style>
        .container-fluid{ 
            border-style:solid; 
            border-color:#CCCCCC; 
            border-width:1px; 
            border-radius:4px 4px 4px 4px;
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
    </style>
    <body>
        <div class="jumbotron text-center">
            <h1 align="center"> Prenotazione Degli Esami </h1>
            <p id="bar">
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
                $civico = $riga['civico'];
                $gigi = explode('-', $data);
                $anno = $gigi[0];
                $mese = $gigi[1];
                $giorno = $gigi[2];
                if (substr($tipo, 0, 8) == "studente") {
                    $classe = substr($tipo, 10, 2);
                    $specializzazione = substr(explode(',', "$tipo")[0], 13);
                    $scuola = explode(',', $tipo)[1];
                    $tipo = "studente";
                }
            } else {
                echo "UTENTE NON TROVATO!";
            }
        } else {
            echo "";
        }
        ?>
        <div>
            <?php
            if (isset($_REQUEST["sid"])) {
                echo "dlouishdfòosajdnfpoòsadjfnapoòdfjnaòdofjnaldjfn";
            }
            ?>
            <div class="col-md-2"></div>
            <div class="container-fluid bg-grey col-md-8">
                <form name="casellaTesto" method="post" class="was-validated" action="eliminaPrenotazione.php">

                    <input type="hidden" name="codiceFiscale" value="<?php
                    if ($pre) {
                        echo $codicefiscale;
                    }
                    ?> ">
                    <h2 align="center"> Modulo Di Prenotazione</h2>
                    

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group col-md-6">                       
                                <label for="cognome">Cognome</label>
                                <input <?php
                                if ($pre) {
                                    echo "value='$cognome'";
                                }
                                ?>  name="cognome" disabled type="text" class="form-control" id="cognome" placeholder="Cognome" required>                      
                            </div>         
                            <div class="form-group col-md-6">                   
                                <label for="nome">Nome</label>
                                <input <?php
                                if ($pre) {
                                    echo "value='$nome'";
                                }
                                ?>  name="nome" disabled type="text" class="form-control" id="nome" placeholder="Nome" required>
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <label for="data" class="col-md-12">Data Di Nascita</label>
                            <div class="form-group col-md-3">
                                <select disabled name="giorno" class="form-control" id="day" >
                                    <option disabled selected>GG</option>
                                    <?php
                                    for ($day = 1; $day <= 31; $day++) {
                                        if ($giorno == $day) {
                                            echo "<option selected value = '" . $day . "'>" . $day . "</option>";
                                        } else {
                                            echo "< option value = '" . $day . "'>" . $day . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <select disabled name='mese' class="form-control" id="mounth">
                                    <option  value='' disabled selected>MM</option>
                                    <option <?php
                                    if ($pre == true) {
                                        if ($mese == "1") {
                                            echo " selected ";
                                        }
                                    }
                                    ?> value='1'>Gennaio</option>
                                    <option <?php
                                    if ($pre == true) {
                                        if ($mese == "2") {
                                            echo " selected ";
                                        }
                                    }
                                    ?> value='2'>Febbraio</option>
                                    <option <?php
                                    if ($pre == true) {
                                        if ($mese == "3") {
                                            echo " selected ";
                                        }
                                    }
                                    ?> value='3'>Marzo</option>
                                    <option <?php
                                    if ($pre == true) {
                                        if ($mese == "4") {
                                            echo " selected ";
                                        }
                                    }
                                    ?> value='4'>Aprile</option>
                                    <option <?php
                                    if ($pre == true) {
                                        if ($mese == "5") {
                                            echo " selected ";
                                        }
                                    }
                                    ?> value='5'>Maggio</option>
                                    <option <?php
                                    if ($pre == true) {
                                        if ($mese == "6") {
                                            echo " selected ";
                                        }
                                    }
                                    ?> value='6'>Giugno</option>
                                    <option <?php
                                    if ($pre == true) {
                                        if ($mese == "7") {
                                            echo " selected ";
                                        }
                                    }
                                    ?> value='7'>Luglio</option>
                                    <option <?php
                                    if ($pre == true) {
                                        if ($mese == "8") {
                                            echo " selected ";
                                        }
                                    }
                                    ?> value='8'>Agosto</option>
                                    <option <?php
                                    if ($pre == true) {
                                        if ($mese == "9") {
                                            echo " selected ";
                                        }
                                    }
                                    ?> value='9'>Settebre</option>
                                    <option <?php
                                    if ($pre == true) {
                                        if ($mese == "10") {
                                            echo " selected ";
                                        }
                                    }
                                    ?> value='10'>Ottobre</option>
                                    <option <?php
                                    if ($pre == true) {
                                        if ($mese == "11") {
                                            echo " selected ";
                                        }
                                    }
                                    ?> value='11'>Novembre</option>
                                    <option <?php
                                    if ($pre == true) {
                                        if ($mese == "12") {
                                            echo " selected ";
                                        }
                                    }
                                    ?> value='12'>Dicembre</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <select disabled name='anno' class="form-control" id="year">
                                    <option disabled selected>YY</option>
                                    <?php
                                    for ($year = Date('Y'); $year >= 1900; $year--) {
                                        if ($anno == $year) {
                                            echo"<option selected value = '" . $year . "'>" . $year . "</option>";
                                        } else {
                                            echo"<option value = '" . $year . "'>" . $year . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-3">
                                <label for="luogo">Luogo Di Nascita</label>
                                <input
                                <?php
                                if ($pre) {
                                    echo "value='$lnascita'";
                                }
                                ?>  name="lnascita" disabled type="text" class="form-control" id="luogo" placeholder="Luogo" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="city">Comune Di Residenza</label>
                                <input <?php
                                if ($pre) {
                                    echo "value='$citta'";
                                }
                                ?>  name="citta" disabled type="text" class="form-control" id="city" placeholder="Comune Di Residenza" required>
                            </div>
                            <div class="form-group col-md-4">                   
                                <label for="card">Indirizzo</label>
                                <input <?php
                                if ($pre) {
                                    echo "value='$indirizzo'";
                                }
                                ?> name="indirizzo" disabled type="text" class="form-control" id="indirizzo" placeholder="Indirizzo" required>                 
                            </div>
                            <div class="form-group col-md-2">                   
                                <label for="nCivico">N.Civico</label>
                                <input <?php
                                if ($pre) {
                                    echo "value='$civico'";
                                }
                                ?> name="civico" disabled type="text" class="form-control" id="nCivico" placeholder="N.Civico" required>                 
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-2">
                                <label for="provincia">Provincia</label>
                                <input <?php
                                if ($pre) {
                                    echo "value='$provincia'";
                                }
                                ?>  name="provincia" disabled type="text" class="form-control" id="provincia" placeholder="Provincia" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="telefono">Telefono</label>
                                <input <?php
                                if ($pre) {
                                    echo "value='$telefono'";
                                }
                                ?>  name="telefono" disabled type="number" class="form-control" id="telefono" placeholder="Telefono" required>                      
                            </div>         
                            <div class="form-group col-md-5">                   
                                <label for="mail">Indirizzo E-Mail</label>
                                <input <?php
                                if ($pre) {
                                    echo "value='$mail'";
                                }
                                ?>  name="mail" disabled type="text" class="form-control" id="mail" placeholder="E-Mail" required>
                            </div>
                        </div>
                    </div>
                    <h3 align="center">TIPOLOGIE DI CANDIDATI:</h3>

                    <br><div class="checkbox-inline">
                        <div class="form-group">
                            <label><input <?php
                                if ($pre == true) {
                                    if ($tipo == "docenti") {
                                        echo " checked ";
                                    }
                                }
                                ?> onclick="cancella()" disabled type="radio" name="optradio" id="radioDocenti"> Docenti ATA: </label>
                        </div>
                        <div class="form-group">
                            <label><input <?php
                                if ($pre == true) {
                                    if ($tipo == "personale") {
                                        echo " checked ";
                                    }
                                }
                                ?> onclick="cancella()" disabled type="radio" name="optradio" id="radioPersonale"> Personale Corpi Militari ed Enti Ministeriali convenzionati: </label>
                        </div>
                        <div class="form-group">
                            <label><input <?php
                                if ($pre == true) {
                                    if ($tipo == "studente") {
                                        echo " checked ";
                                    }
                                }
                                ?> onclick="myFunction()" disabled type="radio" name="optradio" id="radioStudente"> Studente sup. :
                                <div id="clicco"><?php
                                    if ($pre == true) {
                                        if ($tipo == "studente") {
                                            echo " <br><div class='form-row'> <div class='col-md-4'> <label for='scuola'>Scuola</label> <input disabled value='$scuola' name='scuola' type='text' class='form-control' id='scuola'> </div> <div class='col-md-2'> <label for='classe'>Classe</label> <input disabled  value='$classe' name='classe' type='text' class='form-control' id='classe'> </div> <div class='col-md-6'> <label for='specializzazione'>Specializzazione</label> <input disabled  value='$specializzazione' name='specializzazione' type='text' class='form-control' id='specializzazione'> </div> </div>";
                                        }
                                    }
                                    ?></div>
                        </div>
                        <div class="form-group">
                            <label><input <?php
                                if ($pre == true) {
                                    if ($tipo == "esterni") {
                                        echo " checked ";
                                    }
                                }
                                ?> onclick="cancella()" disabled  type="radio" name="optradio" id="radioEsterno"> Esterni</label>
                        </div>
                    </div>


                    <br><h3 align="center">Barrare con una SPUNTA uno o più moduli per i quali si vuole sostenere l'esame:</h3>

                    <br><div class="checkbox-inline col-md-offset-5">
                        <div class="form-group">
                            <input name='1' class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
                            <label  class="form-check-label" for="defaultCheck1">
                                Modulo 1: Computer Essentials
                            </label>
                        </div>
                        <div class="form-group">
                            <input name='2'  class="form-check-input" type="checkbox" value="1" id="defaultCheck2">
                            <label  class="form-check-label" for="defaultCheck2">
                                Modulo 2: Online Essentials
                            </label>
                        </div>
                        <div class="form-group">
                            <input  name='3'  class="form-check-input" type="checkbox" value="1" id="defaultCheck3">
                            <label  class="form-check-label" for="defaultCheck3">
                                Modulo 3: Word Processing
                            </label>
                        </div>
                        <div class="form-group">
                            <input name='4'  class="form-check-input" type="checkbox" value="1" id="defaultCheck4">
                            <label  class="form-check-label" for="defaultCheck4">
                                Modulo 4: Spreadsheets
                            </label>
                        </div>
                        <div class="form-group">
                            <input name='5'  class="form-check-input" type="checkbox" value="1" id="defaultCheck5">
                            <label  class="form-check-label" for="defaultCheck5">
                                Modulo 5: IT Security
                            </label>
                        </div>
                        <div class="form-group">
                            <input name='6'  class="form-check-input" type="checkbox" value="1" id="defaultCheck6">
                            <label  class="form-check-label" for="defaultCheck6">
                                Modulo 6: Presentation
                            </label>
                        </div>
                        <div class="form-group">
                            <input name='7'  class="form-check-input" type="checkbox" value="1" id="defaultCheck7">
                            <label  class="form-check-label" for="defaultCheck7">
                                Modulo 7: Online Collaboration
                            </label>
                        </div>
                    </div>

                    <br><h3 align="center">Data Prenotazione Esame:</h3>

                    <table class="table table-bordered">
                        <thead>
                            <tr><td> Data </td><td> Ora</td></tr>

                            <?php
                            require_once('ConnessioneDb.php');
                            $db = new ConnessioneDb();
                            $sql = "SELECT * FROM `sessioni` ORDER BY `data`";
                            $ris = $db->query($sql);
                            $datenow = date("Y-m-d");
                            while ($riga = $ris->fetch_array()) {
                                if ($riga["data"] > $datenow) {
                                    echo '<tr><td><input type="radio" required  name="sessione" class="form-check-input" value="' . $riga["ID"] . '"/> ' . $riga["data"] . '</td><td> ' . $riga["ora_da"] . ' - ' . $riga["ora_a"] . ' </td></tr>';
                                }
                            }
                            echo "</table>";
                            ?>
                        </thead>
                    </table>

                    <center><input type="submit" value="Prenota" class="btn btn-info btn-lg"></center>

                </form>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="bootstrap-table.js"></script>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="col-md-12">
            <footer class="container text-center" id="foot" >
                <p><br/><strong>IIS F.CORNI - LICEO E TECNICO</strong> <br/>
                    Sede centrale: L.go A. Moro 25 Tel 059/400700 Fax 059/243391 <br/>   
                    Succursale: Via Leonardo da Vinci 300 Tel 059/2917000 Fax 059/344709 <br/>
                    ecdl@istitutocorni.it - http://www.istitutocorni.gov.it
                </p>
            </footer>
        </div>  
    </body>
</html>
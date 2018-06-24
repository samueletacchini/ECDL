<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="css/PrenotazioneRegistrazione.css">
    </head>
    <style>

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
    </style>
    <body>

        <div class="jumbotron text-center">
            <h1 align="center"> Registrazione </h1>

            <p id="bar">
                <span class="glyphicon glyphicon-phone"></span>
                0592917000 -
                <span class="glyphicon glyphicon-envelope"></span>
                ecdl@istitutocorni.it
            </p>
        </div>
        <div>
            <div class="col-md-2"></div>
            <div class="container-fluid bg-grey col-md-8">
                <h2 align="center"> Modulo</h2>
                <form name="casellaTesto" method="get" class="was-validated" role="form" action="/ecdl/registrazione.php">
                    <div class="form-row">
                        <div class="col-md-12">

                            <?php
                            if (isset($_REQUEST["a"])) {
                                $a = $_REQUEST["a"];
                                if ($a == "0") {
                                    //NUOVA SKILLCARD
                                    echo '<div class="form-group col-md-6">
                        <label  for="codeFiscale">Codice Fiscale <b id="cf"></b></label>
                        <input name="codiceFiscale" type="text" class="form-control" id="codiceFiscale" placeholder="Codice Fiscale" required>
                    </div>';
                                } else {
                                    //SKILLCARD ESISTENTE
                                    echo '<div class="form-group col-md-3">
                        <label for="card">Skill Card N.</label>
                        <input name="nskill" type="numero" class="form-control" id="skillCard" placeholder="Numero SkillCard" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="codeFiscale">Codice Fiscale<b id="cf"></b></label>
                        <input name="codiceFiscale" type="text" class="form-control" id="codiceFiscale" placeholder="Codice Fiscale" required>
                    </div>';
                                }
                            } else {
                                //NUOVA SKILLCARD
                                echo '<div class="form-group col-md-6">
                        <label  for="codeFiscale">Codice Fiscale<b id="cf"></b></label>
                        <input onchange="controllaCF()" name="codiceFiscale" type="text" class="form-control" id="codiceFiscale" placeholder="Codice Fiscale" required>
                    </div>';
                            }
                            ?>
                            <div class="form-group col-md-3">                       
                                <label for="cognome">Cognome</label>
                                <input name="cognome" type="text" class="form-control" id="cognome" placeholder="Cognome" required>                      
                            </div>         
                            <div class="form-group col-md-3">                   
                                <label for="nome">Nome</label>
                                <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome" required>
                            </div>
                        </div>
                    </div>               
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group col-md-6">
                                <label for="sesso">Sesso</label>
                                <select name="sesso" class="form-control" required>
                                    <option value=" " disabled selected>Sesso</option>
                                    <option value="maschio" > M </option>
                                    <option value="femmina"> F </option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label align="left"> Stato Civile </label>
                                <select name="statocivile" class="form-control" required>
                                    <option value="" disabled selected>Stato Civile</option>
                                    <option value="single"> Single</option>
                                    <option value="coniug"> Coniugato/a</option>
                                    <option value="vedov"> Vedovo/a</option>
                                    <option value="separat"> Separato/a</option>
                                    <option value="divorziat"> Divorziato/a</option>
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <label for="data" class="col-md-12">Data Di Nascita</label>
                            <div class="form-group col-md-3"> 
                                <select name="giorno" class="form-control" id="day">
                                    <option value=" " disabled selected>GG</option>
                                    <?php
                                    for ($day = 1; $day <= 31; $day++)
                                        echo "<option value = '" . $day . "'>" . $day . "</option>";
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <select name='mese' class="form-control" id="mounth">
                                    <option value='' disabled selected>MM</option>
                                    <option value='1'>Gennaio</option>
                                    <option value='2'>Febbraio</option>
                                    <option value='3'>Marzo</option>
                                    <option value='4'>Aprile</option>
                                    <option value='5'>Maggio</option>
                                    <option value='6'>Giugno</option>
                                    <option value='7'>Luglio</option>
                                    <option value='8'>Agosto</option>
                                    <option value='9'>Settembre</option>
                                    <option value='10'>Ottobre</option>
                                    <option value='11'>Novembre</option>
                                    <option value='12'>Dicembre</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <select name='anno' class="form-control" id="year">
                                    <option disabled selected>YY</option>
                                    <?php
                                    for ($year = Date('Y'); $year >= 1900; $year--)
                                        echo"<option value = '" . $year . "'>" . $year . "</option>";
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-3">
                                <label for="luogo">Comune Di Nascita</label>
                                <input name="lnascita" type="text" class="form-control" id="luogo" placeholder="Comune Di Nascita" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="city">Comune Di Residenza</label>
                                <input name="citta" type="text" class="form-control" id="city" placeholder="Comune Di Residenza" required>
                            </div>
                            <div class="form-group col-md-4">                   
                                <label for="indirizzo">Indirizzo</label>
                                <input name="indirizzo" type="text" class="form-control" id="indirizzo" placeholder="Indirizzo" required>                 
                            </div>
                            <div class="form-group col-md-2">                   
                                <label for="nCivico">N.Civico</label>
                                <input name="civico" type="text" class="form-control" id="nCivico" placeholder="N.Civico" required>                 
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-3">
                                <label for="cap">CAP</label>
                                <input name="cap" type="numero" class="form-control" id="cap" placeholder="CAP" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="$pnascita">Provincia</label>
                                <input name="provincia" type="text" class="form-control" id="provincia" placeholder="Provincia" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="stato">Stato</label>
                                <input name="stato" type="text" class="form-control" id="stato" placeholder="Stato" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="pnascita">Provincia di nascita</label>
                                <input name="pnascita" type="text" class="form-control" id="pnascita" placeholder="Provincia di nascita" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-3">
                                <label for="telefonoCasa">Telefono</label>
                                <input name="telefonoCasa" type="numero" class="form-control" id="telefono" placeholder="Telefono" required>                      
                            </div>        
                            <div class="form-group col-md-3">
                                <label for="cellulare">Cellulare</label>
                                <input name="cellulare" type="numero" class="form-control" id="cellulare" placeholder="Cellulare" required>                      
                            </div> 
                            <div class="form-group col-md-3">
                                <label for="scolaro">Titolo Di Studio</label>
                                <select name="titolo" class="form-control" required>
                                    <option value="" disabled selected>Titolo Di Studio</option>
                                    <option value="sObbligo"> Scuola Dell'Obbligo</option>
                                    <option value="diplomato"> Diplomato</option>
                                    <option value="laureato"> Laureato</option>
                                    <option value="nDichiarato"> Non Dichiarato</option>
                                </select>                      
                            </div>
                            <div class="form-group col-md-3">
                                <label for="occupazione">Occupazione</label>
                                <select name="occupazione" class="form-control" required>
                                    <option value="" disabled selected>Occupazione</option>
                                    <option value="sPrimaria"> Studente Scuola Primaria</option>    
                                    <option value="sScuolasUno"> Studente Scuola Secondaria 1°</option>
                                    <option value="sScuolaDue"> Studente Scuola Secondaria 2°</option>
                                    <option value="sUniversitario"> Studente Universitario</option>
                                    <option value="lDipendente"> Lavoratore Dipendente</option>
                                    <option value="lAutonomo"> Lavoratore Autonomo</option>
                                    <option value="Pensionato"> Pensionato</option>
                                    <option value="casalingo"> Casalingo/a</option>
                                    <option value="cerca"> In Cerca Di Occupazione</option>
                                </select>                       
                            </div>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group col-md-6">                   
                                <label for="mail">Indirizzo E-Mail <b id="em"></b></label>
                                <input name="mail" type="text" class="form-control" id="mail" placeholder="E-Mail" required>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group col-md-6 ">
                                    <label for="inputPassword" class="control-label">Password</label>       
                                    <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  name="password" type="password" data-minlength="6" class="form-control" id="password" placeholder="Password" required>                               
                                </div>

                                <div class="form-group col-md-6">
                                    <label  for="inputPassword" class="control-label">Conferma Password</label>       
                                    <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  name="password2" type="password" data-minlength="6" class="form-control" id="password2" placeholder="Password" required>
                                </div> 

                                <center><p id='message'></p></center>

                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <h3 align="center">TIPOLOGIE DI CANDIDATI:</h3>

                            <br><div class="checkbox-inline">
                                <div class="form-group">
                                    <label><input value="docenti" onclick="cancella()" type="radio" name="optradio" id="radioDocenti"> Docenti ATA: </label>
                                </div>
                                <div class="form-group">
                                    <label><input value="personale" onclick="cancella()" type="radio" name="optradio" id="radioPersonale"> Personale Corpi Militari ed Enti Ministeriali convenzionati: </label>
                                </div>
                                <div class="form-group">
                                    <label><input value="esterni" onclick="cancella()" type="radio" name="optradio" id="radioesterni"> Esterni </label>
                                </div>
                                <div class="form-group">
                                    <label><input value="studenti" onclick="myFunction()"  type="radio" name="optradio" id="radioStudente"> Studente sup. :
                                        <p id="clicco"></p>


                                </div>
                            </div> 
                        </div>
                        <div class="form-group col-md-6">
                            <p style="color:black;">La password deve contenere:</p>
                            <p style="color:red;" id="lettera">una lettera <b>minuscola <span  class="glyphicon glyphicon-remove"></span></b></p>
                            <p style="color:red;" id="maiuscola">una lettera <b>maiuscola <span class="glyphicon glyphicon-remove"></span></b></p>
                            <p style="color:red;" id="numero">un <b>numero <span class="glyphicon glyphicon-remove"></span></b></p>
                            <p style="color:red;" id="caratteri">almeno <b>8 caratteri <span class="glyphicon glyphicon-remove"></span></b></p>
                        </div>

                    </div>

                    <div class="form-group col-md-12">
                        <center><input type="submit"   id="submit" value="registrati" class="btn btn-info btn-lg"></center>
                    </div>
                </form>
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
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <script>



                                        $('#password').on('keyup', function () {
                                            var lowerCaseLetters = /[a-z]/g;
                                            var x = $('#password').val();

                                            if (x.search(lowerCaseLetters) == -1) {
                                                //nun va bene
                                                $('#lettera').html('una lettera <b>minuscola <span class="glyphicon glyphicon-remove"></span></b>').css('color', 'red');
                                                document.getElementById('submit').disabled = true;

                                            } else {
                                                //va bene
                                                $('#lettera').html('una lettera <b>minuscola <span  class="glyphicon glyphicon-ok"></span></b>').css('color', 'green');
                                                document.getElementById('submit').disabled = false;

                                            }

                                            var upperCaseLetters = /[A-Z]/g;

                                            if (x.search(upperCaseLetters) == -1) {
                                                //nun va bene
                                                $('#maiuscola').html('una lettera <b>maiuscola <span class="glyphicon glyphicon-remove"></span></b>').css('color', 'red');
                                                document.getElementById('submit').disabled = true;

                                            } else {
                                                //va bene
                                                $('#maiuscola').html('una lettera <b>maiuscola <span  class="glyphicon glyphicon-ok"></span></b>').css('color', 'green');
                                                document.getElementById('submit').disabled = false;

                                            }


                                            var numeri = /[0-9]/g;

                                            if (x.search(numeri) == -1) {
                                                //nun va bene
                                                $('#numero').html('un <b>numero <span class="glyphicon glyphicon-remove"></span></b>').css('color', 'red');
                                                document.getElementById('submit').disabled = true;

                                            } else {
                                                //va bene
                                                $('#numero').html('un <b>numero <span class="glyphicon glyphicon-ok"></span></b>').css('color', 'green');
                                                document.getElementById('submit').disabled = false;

                                            }


                                            if (x.length >= 8) {
                                                //nun va bene
                                                $('#caratteri').html('almeno <b>8 caratteri <span class="glyphicon glyphicon-ok"></span></b>').css('color', 'green');
                                                document.getElementById('submit').disabled = true;

                                            } else {
                                                //va bene
                                                $('#caratteri').html('almeno <b>8 caratteri <span class="glyphicon glyphicon-remove"></span></b>').css('color', 'red');
                                                document.getElementById('submit').disabled = false;

                                            }

                                        });





                                        $('#mail').on('keyup', function () {

                                            // Definisco un pattern per il confronto
                                            var emailpattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-]{2,})+\.)+([a-zA-Z0-9]{2,})+$/;
                                            // creo una variabile per richiamare con facilità il nostro campo di input
                                            var mail = $('#mail').val();
                                            // var CodiceFiscale = document.getElementById("codiceFiscale");

                                            // utilizzo il metodo search per verificare che il valore inserito nel campo
                                            // di input rispetti la stringa di verifica (pattern)
                                            if (mail.search(emailpattern) == -1)
                                            {
                                                // In caso di errore stampo un avviso e pulisco il campo...
                                                //alert("Il valore inserito non è un codice fiscale!");
                                                document.getElementById('submit').disabled = true;
                                                $('#em').html('<span class="glyphicon glyphicon-remove"></span>').css('color', 'red');
                                                //CodiceFiscale.value = "";
                                                mail.focus();
                                            } else {
                                                // ...in caso contrario stampo un avviso di successo!
                                                // alert("Il codice fiscale è corretto!");
                                                $('#em').html('<span class="glyphicon glyphicon-ok"></span> ').css('color', 'green');
                                                document.getElementById('submit').disabled = false;
                                            }
                                        });

                                        $('#codiceFiscale').on('keyup', function () {

                                            // Definisco un pattern per il confronto
                                            var pattern = /^[a-zA-Z]{6}[0-9]{2}[a-zA-Z][0-9]{2}[a-zA-Z][0-9]{3}[a-zA-Z]$/;
                                            // creo una variabile per richiamare con facilità il nostro campo di input
                                            var CodiceFiscale = $('#codiceFiscale').val();
                                            // var CodiceFiscale = document.getElementById("codiceFiscale");

                                            // utilizzo il metodo search per verificare che il valore inserito nel campo
                                            // di input rispetti la stringa di verifica (pattern)
                                            if (CodiceFiscale.search(pattern) == -1)
                                            {
                                                // In caso di errore stampo un avviso e pulisco il campo...
                                                //alert("Il valore inserito non è un codice fiscale!");
                                                document.getElementById('submit').disabled = true;
                                                $('#cf').html('<span class="glyphicon glyphicon-remove"></span>').css('color', 'red');
                                                //CodiceFiscale.value = "";
                                                CodiceFiscale.focus();
                                            } else {
                                                // ...in caso contrario stampo un avviso di successo!
                                                // alert("Il codice fiscale è corretto!");
                                                $('#cf').html('<span class="glyphicon glyphicon-ok"></span> ').css('color', 'green');
                                                document.getElementById('submit').disabled = false;
                                            }
                                        });

                                        $('#password, #password2').on('keyup', function () {
                                            if ($('#password').val() != "") {
                                                if ($('#password').val() == $('#password2').val()) {

                                                    document.getElementById('submit').disabled = false;
                                                    $('#message').html('').css('color', 'green');
                                                } else {
                                                    $('#message').html('Le password non corrispondono').css('color', 'red');
                                                    document.getElementById('submit').disabled = true;
                                                }
                                            }
                                        });
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
                </html>

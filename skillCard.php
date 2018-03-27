<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="file.css">
        <link rel="stylesheet" href="file.js">
    </head>
    <body>


        <h2 align="center"> PRENOTAZIONE SKILL CARD </h2>   

        <div class="container">
            <form name=”casellaTesto” method=”get” class="was-validated" action="/ecdl/index.php">

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="codeFiscale">Codice Fiscale</label>
                        <input name="codiceFiscale" type="text" class="form-control" id="codeFiscale" placeholder="Codice Fiscale" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="sesso">Sesso</label>
                        <select name="sesso" class="form-control" required>
                            <option value=" " disabled selected>Sesso</option>
                            <option value="maschio" > M </option>
                            <option value="femmina"> F </option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">                       
                        <label for="cognome">Cognome</label>
                        <input name="cognome" type="text" class="form-control" id="cognome" placeholder="Cognome" required>                      
                    </div>         
                    <div class="form-group col-md-6">                   
                        <label for="nome">Nome</label>
                        <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome" required>
                    </div>
                </div>

                <label for="data" class="col-md-12">Data Di Nascita</label>
                <div class="form-row">
                    <div class="form-group col-md-4"> 
                        <select name="giorno" class="form-control" id="day">
                            <option value=" " disabled selected>Giorno</option>
                            <?php
                            for ($day = 1; $day <= 31; $day++)
                                echo "<option value = '" . $day . "'>" . $day . "</option>";
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <select name='mese' class="form-control" id="mounth">
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
                        <select name='anno' class="form-control" id="year">
                            <option disabled selected>Anno</option>
                            <?php
                            for ($year = Date('Y'); $year >= 1900; $year--)
                                echo"<option value = '" . $year . "'>" . $year . "</option>";
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="statoCivile">Stato Civile</label>
                        <input name="statoCivile" type="text" class="form-control" id="statoCivile" placeholder="Stato Civile" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="luogo">Luogo Di Nascita</label>
                        <input name="lnascita" type="text" class="form-control" id="luogo" placeholder="Luogo" required>
                    </div>
                    <div class="form-group col-md-5">                   
                        <label for="card">Indirizzo</label>
                        <input name="indirizzo" type="text" class="form-control" id="indirizzo" placeholder="Indirizzo" required>                 
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="state">Stato</label>
                        <input name="stato" type="text" class="form-control" id="city" placeholder="Stato" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="city">Città</label>
                        <input name="citta" type="text" class="form-control" id="city" placeholder="Città" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cap">CAP</label>
                        <input name="cap" type="text" class="form-control" id="cap" placeholder="CAP" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="provincia">Provincia</label>
                        <input name="provincia" type="text" class="form-control" id="provincia" placeholder="Provincia" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="telefonoCasa">Telefono</label>
                        <input name="telefonoCasa" type="text" class="form-control" id="telefono" placeholder="Telefono" required>                      
                    </div>        
                    <div class="form-group col-md-3">
                        <label for="cellulare">Cellulare</label>
                        <input name="cellulare" type="text" class="form-control" id="telefono" placeholder="Cellulare" required>                      
                    </div> 
                    <div class="form-group col-md-6">                   
                        <label for="mail">Indirizzo E-Mail</label>
                        <input name="mail" type="text" class="form-control" id="mail" placeholder="E-Mail" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="scolarita">Scolarità</label>
                        <input name="scolarita" type="text" class="form-control" id="scolarita" placeholder="Scolarità" required>                      
                    </div> 
                    <div class="form-group col-md-6">
                        <label for="occupazione">Occupazione</label>
                        <input name="occupazione" type="text" class="form-control" id="occupazione" placeholder="Occupazione" required>                      
                    </div> 
                </div>
                    
                <h3 align="center">TIPOLOGIE DI CANDIDATI :</h3>

                <br><div class="checkbox-inline">
                    <div class="form-group">
                        <label><input value="docenti" onclick="cancella()" type="radio" name="optradio" id="radioDocenti"> Docenti ATA: </label>
                    </div>
                    <div class="form-group">
                        <label><input value="personale" onclick="cancella()" type="radio" name="optradio" id="radioPersonale"> Personale Corpi Militari ed Enti Ministeriali convenzionati: </label>
                    </div>
                    <div class="form-group">
                        <label><input value="studenti" onclick="myFunction()"  type="radio" name="optradio" id="radioStudente"> Studente sup. :
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
                        <label><input value="esterni" onclick="cancella()"  type="radio" name="optradio" id="radioEsterno"> Esterni</label>
                    </div>
                </div>
                
                <h3>Note: </h3>
                <label>1) Scolarità: Scuola dell'obbligo, Scuola media superiore, Studente universitario, Laurea.</label>
                <label>2) Occupazione: Studente, Lavoratore autonomo, Lavoratore dipendente, Pensionato, In cerca di occupazione.</label>

                <br><br><center><input type="submit" value="registrati" class="btn btn-info btn-lg"></center>

            </form>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="bootstrap-table.js"></script>
        </div>
    </body>
</html>


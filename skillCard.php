<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    </head>
    <body>


        <h2 align="center"> SKILL CARD </h2>   

        <div class="container">
            <form name=”casellaTesto” method=”post” class="was-validated">

                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="code">Codice Fiscale</label>
                        <input type="text" class="form-control" id="code" placeholder="">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="sesso">Sesso</label>
                        <select class="form-control" id="sesso">
                            <option disabled-selected>Sesso</option>
                            <option value="maschio"> M </option>
                            <option value="femmina"> F </option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">                       
                        <label for="cognome">Cognome</label>
                        <input type="text" class="form-control" id="cognome" placeholder="" required>                      
                    </div>         
                    <div class="form-group col-md-6">                   
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" placeholder="">
                    </div>
                </div>

                <label for="data" class="col-md-12">Data Di Nascita</label>
                <div class="form-row">
                    <div class="form-group col-md-4"> 
                        <select class="form-control" id="day">
                            <option disabled selected>Giorno</option>
                            <?php
                            for ($day = 1; $day <= 31; $day++)
                                echo "<option value = '" . $day . "'>" . $day . "</option>";
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <select name='month' class="form-control" id="mounth">
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
                        <select class="form-control" id="year">
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
                        <input type="text" class="form-control" id="luogo" placeholder="">
                    </div>
                    <div class="form-group col-md-5">                   
                        <label for="card">Indirizzo</label>
                        <input type="text" class="form-control" id="indirizzo" placeholder="">                 
                    </div>
                    <div class="form-group col-md-3">                   
                        <label for="statoCivile">Stato Civile</label>
                        <input type="text" class="form-control" id="statoCivile" placeholder="">                 
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="city">Città</label>
                        <input type="text" class="form-control" id="city">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cap">CAP</label>
                        <input type="text" class="form-control" id="cap">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="provincia">Provincia</label>
                        <input type="text" class="form-control" id="provincia">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="stato">Stato</label>
                        <input type="text" class="form-control" id="stato">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" placeholder="">                      
                    </div>         
                    <div class="form-group col-md-8">                   
                        <label for="mail">Indirizzo E-Mail</label>
                        <input type="text" class="form-control" id="mail" placeholder="">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="scuola">Scolarità (1)</label>
                        <input type="text" class="form-control" id="scuola" placeholder="">                      
                    </div>         
                    <div class="form-group col-md-6">                   
                        <label for="occupazione">Occupazione (2)</label>
                        <input type="text" class="form-control" id="occupazione" placeholder="">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="frequentazione">Scuola e classe frequentata</label>
                        <input type="text" class="form-control" id="frequentazione" placeholder="">  
                    </div>
                </div>

                <br><h2 align="center"> Scegli Un Seguente Campo :</h2>

                <br><div class="checkbox-inline col-md-offset-4">
                    <div class="form-">
                        <label><input onclick="cancella()" type="radio" name="optradio" id="radioPrimo"> Per gli studenti delle superiori, docenti, personale ata</label>
                    </div>
                    <div class="form-group">
                        <label><input onclick="cancella()" type="radio" name="optradio" id="radioSecondo"> Per i candidati esterni</label>
                    </div>
                            
                    <center><a href="index.php" class="btn btn-info btn-lg" role="button">Registarti</a></center>
                </div>
                
                <br><br><br><h2>Note :</h2>
                <p>1) Scolarità: Scuola dell'obbligo, Scuola media superiore, Studente universitario, Laurea.</p>
                <p>2) Occupazione: Studente, Lavoratore autonomo, Lavoratore dipendente, Pensionato, In cerca di occupazione.</p>
            </form>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="bootstrap-table.js"></script>
        </div>
    </body>
</html>


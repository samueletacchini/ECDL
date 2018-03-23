<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    </head>
    <body>


        <h2 align="center"> PRENOTAZIONE ESAME </h2>   

        <div class="container">
            <form name=”casellaTesto” method=”post” class="was-validated">

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="card">Skill Card N.</label>
                        <input type="text" class="form-control" id="card" placeholder="">
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
                    <div class="form-group col-md-8">                   
                        <label for="card">Indirizzo</label>
                        <input type="text" class="form-control" id="indirizzo" placeholder="">                 
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="city">Città</label>
                        <input type="text" class="form-control" id="city">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cap">CAP</label>
                        <input type="text" class="form-control" id="cap">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="provincia">Provincia</label>
                        <input type="text" class="form-control" id="provincia">
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

                <h3 align="center">TIPOLOGIE DI CANDIDATI :</h3>

                <br><div class="checkbox-inline">
                    <div class="form-group">
                        <label><input onclick="cancella()" type="radio" name="optradio" id="radioDocenti"> Docenti ATA: </label>
                    </div>
                    <div class="form-group">
                        <label><input onclick="cancella()" type="radio" name="optradio" id="radioPersonale"> Personale Corpi Militari ed Enti Ministeriali convenzionati: </label>
                    </div>
                    <div class="form-group">
                        <label><input onclick="myFunction()"  type="radio" name="optradio" id="radioStudente"> Studente sup. :
                            <p id="clicco"></p>
                        <script>
                            var html = "<br><div class='form-row'>" +
                                    " <div class='col-md-4'>" +
                                    " <label for='scuola'>Scuola</label>" +
                                    " <input type='text' class='form-control' id='scuola'>" +
                                    "</div>" +
                                    "<div class='col-md-2'>" +
                                    " <label for='classe'>Classe</label>" +
                                    " <input type='text' class='form-control' id='classe'>" +
                                    "</div>" +
                                    "<div class='col-md-6'>" +
                                    "<label for='specializzazione'>Specializzazione</label>" +
                                    "<input type='text' class='form-control' id='specializzazione'>" +
                                    "</div>" +
                                    "</div>";
                            function myFunction() {
                                document.getElementById("clicco").innerHTML = html;
                            }function cancella() {
                                document.getElementById("clicco").innerHTML = "";
                            }
                        </script>
                    </div>
                    <div class="form-group">
                        <label><input onclick="cancella()"  type="radio" name="optradio" id="radioEsterno"> Esterni</label>
                    </div>
                </div>


                <br><h3 align="center">Barrare con una SPUNTA uno o più moduli per i quali si vuole sostenere l' esame :</h3>

                <br><div class="checkbox-inline col-md-offset-5">
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Modulo 1: Computer Essentials
                        </label>
                    </div>
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                            Modulo 2: Online Essentials
                        </label>
                    </div>
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                        <label class="form-check-label" for="defaultCheck3">
                            Modulo 3: Word Processing
                        </label>
                    </div>
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                        <label class="form-check-label" for="defaultCheck4">
                            Modulo 4: Spreadsheets
                        </label>
                    </div>
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                        <label class="form-check-label" for="defaultCheck5">
                            Modulo 5: IT Security
                        </label>
                    </div>
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck6">
                        <label class="form-check-label" for="defaultCheck6">
                            Modulo 6: Presentation
                        </label>
                    </div>
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck7">
                        <label class="form-check-label" for="defaultCheck7">
                            Modulo 7: Online Collaboration
                        </label>
                    </div>
                </div>

                <br><h3 align="center">Data Prenotazione Esame :</h3>

                <table class="table table-bordered">
                    <thead>
                        <tr><td> Data </td><td> Ora</td></tr>
                        <tr><td><input type="checkbox" name="data1" class="form-check-input" value="modulo1"/> Giovedì 22 Marzo 2018</td><td> 17:00 - 19:30 </td></tr>
                        <tr><td><input type="checkbox" name="data2" class="form-check-input" value="modulo2"/> Giovedì 19 Aprile 2018</td><td> 15:00 - 17:30</td></tr>
                        <tr><td><input type="checkbox" name="data3" class="form-check-input" value="modulo3"/> Giovedì 24 Maggio 2018 </td><td>    17:00 - 19:30</td></tr>
                    </thead>
                </table>
                </table>

                <center><a href="index.php" class="btn btn-info btn-lg" role="button">Prenota</a></center>
                
            </form>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="bootstrap-table.js"></script>
        </div>
    </body>
</html>



<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="css/PrenotazioneRegistrazione.css">
        <link rel="stylesheet" href="file.js">
    </head>
    <style>
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
            <nav class="navbar navbar-inverse" id="barraPortale">
                <div class="container-fluid">                          
                    <ul class="nav navbar-nav text-right">
                        <li><a href="#" style='color:white'>Home</a></li>
                        <li><a href="#" style='color:white'>Assegna SkillCard</a></li>
                        <li><a href="#" style='color:white'>Page 2</a></li>
                        <li><a href="#" style='color:white'>Page 3</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </nav>
            <div class="panel panel-default">
                <div class="panel">
                    <h3 align='center'>Utenti vari</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered"> 
                        <?php
                        require_once('ConnessioneDb.php');
                        $db = new ConnessioneDb();

                        for ($i = 0; $i <= 22; $i++) {
                            $set[$i] = "a";
                        }
                        if (isset($_REQUEST["skill_card"])) {
                            $set[0] = $_REQUEST['skill_card'];
                            echo '"AçSJDNAçSOD';
                        }
                        if (isset($_REQUEST["rilasciata"])) {
                            $set[1] = $_REQUEST['rilasciata'];
                        }
                        if (isset($_REQUEST["codice_fiscale"])) {
                            $set[2] = $_REQUEST['codice_fiscale'];
                        }
                        if (isset($_REQUEST["sesso"])) {
                            $set[3] = $_REQUEST['sesso'];
                        }
                        if (isset($_REQUEST["cognome"])) {
                            $set[4] = $_REQUEST['cognome'];
                        }
                        if (isset($_REQUEST["nome"])) {
                            $set[5] = $_REQUEST['nome'];
                        }
                        if (isset($_REQUEST["data_nascita"])) {
                            $set[6] = $_REQUEST['data_nascita'];
                        }
                        if (isset($_REQUEST["comune_nascita"])) {
                            $set[7] = $_REQUEST['comune_nascita'];
                        }
                        if (isset($_REQUEST["provincia_nascita"])) {
                            $set[8] = $_REQUEST['provincia_nascita'];
                        }
                        if (isset($_REQUEST["stato_civile"])) {
                            $set[9] = $_REQUEST['stato_civile'];
                        }
                        if (isset($_REQUEST["indirizzo"])) {
                            $set[10] = $_REQUEST['indirizzo'];
                        }
                        if (isset($_REQUEST["civico"])) {
                            $set[11] = $_REQUEST['civico'];
                        }
                        if (isset($_REQUEST["stato"])) {
                            $set[12] = $_REQUEST['stato'];
                        }
                        if (isset($_REQUEST["citta"])) {
                            $set[13] = $_REQUEST['citta'];
                        }
                        if (isset($_REQUEST["cap"])) {
                            $set[14] = $_REQUEST['cap'];
                        }
                        if (isset($_REQUEST["provincia"])) {
                            $set[15] = $_REQUEST['provincia'];
                        }
                        if (isset($_REQUEST["email"])) {
                            $set[16] = $_REQUEST['email'];
                        }
                        if (isset($_REQUEST["telefono"])) {
                            $set[17] = $_REQUEST['telefono'];
                        }
                        if (isset($_REQUEST["cellulare"])) {
                            $set[18] = $_REQUEST['cellulare'];
                        }
                        if (isset($_REQUEST["occupazione"])) {
                            $set[19] = $_REQUEST['occupazione'];
                        }
                        if (isset($_REQUEST["titolo_studio"])) {
                            $set[20] = $_REQUEST['titolo_studio'];
                        }
                        if (isset($_REQUEST["pagato"])) {
                            $set[21] = $_REQUEST['pagato'];
                        }
                        if (isset($_REQUEST["tipo"])) {
                            $set[22] = $_REQUEST['tipo'];
                        }


                        $sql = "SELECT * FROM `user`";
                        $ris = $db->query($sql);
                        echo '<tr><th>DATA</th><th>Dalle</th><th>alle</th><th>Moduli</th><tr>';
                        while ($riga = $ris->fetch_array()) {

                            echo "<tr><td>" . $riga["skill_card"] . "</td>";
                            if ($set[0] != "a") {
                                echo "<td>" . $skillcard = $riga['skill_card'] . "</td>";
                            }
                            if ($set[1] != "a") {
                                echo "<td>" . $drilasciata = $riga['rilasciata'] . "</td>";
                            }
                            if ($set[2] != "a") {
                                echo "<td>" . $codicefiscale = $riga['codice_fiscale'] . "</td>";
                            }
                            if ($set[3] != "a") {
                                echo "<td>" . $sesso = $riga['sesso'] . "</td>";
                            }
                            if ($set[4] != "a") {
                                echo "<td>" . $cognome = $riga['cognome'] . "</td>";
                            }
                            if ($set[5] != "a") {
                                echo "<td>" . $nome = $riga['nome'] . "</td>";
                            }
                            if ($set[6] != "a") {
                                echo "<td>" . $dnascita = $riga['data_nascita'] . "</td>";
                            }
                            if ($set[7] != "a") {
                                echo "<td>" . $cnascita = $riga['comune_nascita'] . "</td>";
                            }
                            if ($set[8] != "a") {
                                echo "<td>" . $pnascita = $riga['provincia_nascita'] . "</td>";
                            }
                            if ($set[9] != "a") {
                                echo "<td>" . $statocivile = $riga['stato_civile'] . "</td>";
                            }
                            if ($set[10] != "a") {
                                echo "<td>" . $indirizzo = $riga['indirizzo'] . "</td>";
                            }
                            if ($set[11] != "a") {
                                echo "<td>" . $civico = $riga['civico'] . "</td>";
                            }
                            if ($set[12] != "a") {
                                echo "<td>" . $stato = $riga['stato'] . "</td>";
                            }
                            if ($set[13] != "a") {
                                echo "<td>" . $citta = $riga['citta'] . "</td>";
                            }
                            if ($set[14] != "a") {
                                echo "<td>" . $cap = $riga['cap'] . "</td>";
                            }
                            if ($set[15] != "a") {
                                echo "<td>" . $provincia = $riga['provincia'] . "</td>";
                            }
                            if ($set[16] != "a") {
                                echo "<td>" . $mail = $riga['email'] . "</td>";
                            }
                            if ($set[17] != "a") {
                                echo "<td>" . $telefono = $riga['telefono'] . "</td>";
                            }
                            if ($set[18] != "a") {
                                echo "<td>" . $cellulare = $riga['cellulare'] . "</td>";
                            }
                            if ($set[19] != "a") {
                                echo "<td>" . $occupazione = $riga['occupazione'] . "</td>";
                            }
                            if ($set[20] != "a") {
                                echo "<td>" . $titolo = $riga['titolo_studio'] . "</td>";
                            }
                            if ($set[21] != "a") {
                                echo "<td>" . $pagato = $riga['pagato'] . "</td>";
                            }
                            if ($set[22] != "a") {
                                echo "<td>" . $tipo = $riga['tipo'] . "</td>";
                            }



                            echo "</tr>";
                        }
                        echo "</table>";
                        ?>


                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-4'>
            <div class="panel panel-default">
                <div class="panel">
                </div>
                <form name=”visualizza” method="post" class="was-validated" action="/ecdl/portale.php">
                    <div class="panel-body">
                        <div class="checkbox-inline col-md-4">
                            <div class="form-group">
                                <input name="skill_card"  class="form-check-input" type="checkbox" value="1" >
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    skill_card
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="rilasciata" class="form-check-input" type="checkbox" value="1" id="pdfprenotazione">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    rilasciata
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="codice_fiscale"  class="form-check-input" type="checkbox" value="1" id="pdfaica">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    codice_fiscale
                                </label>
                            </div>   
                            <div class="form-group">
                                <input name="sesso" class="form-check-input" type="checkbox" value="1" id="pdfupdate">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    sesso
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="cognome" class="form-check-input" type="checkbox" value="1" id="bollettinoskillcard">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    cognome
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="nome" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    nome
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="data_nascita" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    data_nascita
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="comune_nascita" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?>	     >
                                    comune_nascita
                                </label>
                            </div>
                            </form>
                        </div>
                        <div class="checkbox-inline col-md-4">
                            <div class="form-group">
                                <input name="provincia_nascita"  class="form-check-input" type="checkbox" value="1" >
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?>  >
                                    provincia_nascita  
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="stato_civile" class="form-check-input" type="checkbox" value="1" id="pdfprenotazione">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?>
                                        >
                                    stato_civile
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="indirizzo"  class="form-check-input" type="checkbox" value="1" id="pdfaica">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    indirizzo
                                </label>
                            </div>   
                            <div class="form-group">
                                <input name="civico" class="form-check-input" type="checkbox" value="1" id="pdfupdate">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    civico
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="stato" class="form-check-input" type="checkbox" value="1" id="bollettinoskillcard">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    stato
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="citta" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    citta
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="cap" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    cap
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="provincia" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    provincia
                                </label>
                            </div>
                        </div>
                        <div class="checkbox-inline col-md-3">
                            <div class="form-group">
                                <input name="email"  class="form-check-input" type="checkbox" value="1" >
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    email
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="cellulare" class="form-check-input" type="checkbox" value="1" id="pdfprenotazione">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    cellulare
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="telefono"  class="form-check-input" type="checkbox" value="1" id="pdfaica">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    telefono
                                </label>
                            </div>   
                            <div class="form-group">
                                <input name="occupazione" class="form-check-input" type="checkbox" value="1" id="pdfupdate">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    occupazione
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="titolo_studio" class="form-check-input" type="checkbox" value="1" id="bollettinoskillcard">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    titolo_studio
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="pagato" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    pagato                                    
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="tipo" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                                <label  class="form-check-label" for="defaultCheck7" <?php
                                if ($set[0] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                    tipo                                    
                                </label>
                            </div>

                            <div class="form-group">
                                <input name="ok" class="form-check-input" type="submit" value="conferma" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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




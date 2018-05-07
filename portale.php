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
                        $sql = "SELECT * FROM `user`";
                        $ris = $db->query($sql);
                        while ($riga = $ris->fetch_array()) {
                            echo "<tr><td>{$riga["email"]}</td>";
                            echo "<td>{$riga["skill_card"]}</td>";
                            echo "<td>{$riga["nome"]}</td>";
                            // echo "<td>  prenota </td>";
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
                                <label  class="form-check-label" for="defaultCheck7">
                                    skillcard
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="rilasciata" class="form-check-input" type="checkbox" value="1" id="pdfprenotazione">
                                <label  class="form-check-label" for="defaultCheck7">
                                    rilasciata
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="codice_fiscale"  class="form-check-input" type="checkbox" value="1" id="pdfaica">
                                <label  class="form-check-label" for="defaultCheck7">
                                    codicefiscale
                                </label>
                            </div>   
                            <div class="form-group">
                                <input name="sesso" class="form-check-input" type="checkbox" value="1" id="pdfupdate">
                                <label  class="form-check-label" for="defaultCheck7">
                                    sesso
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="cognome" class="form-check-input" type="checkbox" value="1" id="bollettinoskillcard">
                                <label  class="form-check-label" for="defaultCheck7">
                                    cognome
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="nome" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                                <label  class="form-check-label" for="defaultCheck7">
                                    nome    
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="data_nascita" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                                <label  class="form-check-label" for="defaultCheck7">
                                    data di nascita
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="comune_nascita" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                                <label  class="form-check-label" for="defaultCheck7">
                                    comune di nascita	    
                                </label>
                            </div>
                            </form>
                        </div>
                        <div class="checkbox-inline col-md-4">
                            <div class="form-group">
                                <input name="provincia_nascita"  class="form-check-input" type="checkbox" value="1" >
                                <label  class="form-check-label" for="defaultCheck7">
                                    provincia nascita	
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="stato_civile" class="form-check-input" type="checkbox" value="1" id="pdfprenotazione">
                                <label  class="form-check-label" for="defaultCheck7">
                                    stato civile
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="indirizzo"  class="form-check-input" type="checkbox" value="1" id="pdfaica">
                                <label  class="form-check-label" for="defaultCheck7">
                                    indirizzo 
                                </label>
                            </div>   
                            <div class="form-group">
                                <input name="civico" class="form-check-input" type="checkbox" value="1" id="pdfupdate">
                                <label  class="form-check-label" for="defaultCheck7">
                                    civico  
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="stato" class="form-check-input" type="checkbox" value="1" id="bollettinoskillcard">
                                <label  class="form-check-label" for="defaultCheck7">
                                    stato
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="citta" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                                <label  class="form-check-label" for="defaultCheck7">
                                    citta
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="cap" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                                <label  class="form-check-label" for="defaultCheck7">
                                    cap    
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="provincia" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                                <label  class="form-check-label" for="defaultCheck7">
                                    provincia    
                                </label>
                            </div>
                        </div>
                        <div class="checkbox-inline col-md-3">
                            <div class="form-group">
                                <input name="email"  class="form-check-input" type="checkbox" value="1" >
                                <label  class="form-check-label" for="defaultCheck7">
                                    email 
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="cellulare" class="form-check-input" type="checkbox" value="1" id="pdfprenotazione">
                                <label  class="form-check-label" for="defaultCheck7">
                                    cellulare 
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="telefono"  class="form-check-input" type="checkbox" value="1" id="pdfaica">
                                <label  class="form-check-label" for="defaultCheck7">
                                    telefono
                                </label>
                            </div>   
                            <div class="form-group">
                                <input name="occupazione" class="form-check-input" type="checkbox" value="1" id="pdfupdate">
                                <label  class="form-check-label" for="defaultCheck7">
                                    occupazione  
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="titolo_studio" class="form-check-input" type="checkbox" value="1" id="bollettinoskillcard">
                                <label  class="form-check-label" for="defaultCheck7">
                                    titolo di studio
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="pagato" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                                <label  class="form-check-label" for="defaultCheck7">
                                    pagato
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="tipo" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                                <label  class="form-check-label" for="defaultCheck7">
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




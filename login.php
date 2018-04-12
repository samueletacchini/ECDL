<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/PrenotazioneRegistrazione.css">
        <link rel="stylesheet" href="file.js">
    </head>
    <style>
        #registrazione{
            background-color:DodgerBlue;
            border-radius:5px 5px 5px 5px;
            height:150px;
        }
        #registrazione1{
            height:75px;
        }
        .btn-lg {
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.33;
            border-radius: 6px;
            width: 175px;
            background-color: DodgerBlue;
        }
    </style>
    <body>
        <div class="jumbotron text-center">
            <h1 align="center"> ECDL</h1>
            <p>
                <span class="glyphicon glyphicon-phone"></span>
                0592917000 -
                <span class="glyphicon glyphicon-envelope"></span>
                ecdl@istitutocorni.it
            </p>
        </div>
        <div class="col-md-8">
            <div>
                <div class="panel panel-default">
                    <div class="panel">
                        <h3 align='center'>Registrazione</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group col-md-3">
                            <button type="button" class="btn btn-info btn-lg">Info</button>
                        </div>
                        <div class="form-group col-md-3">
                            <button type="button" class="btn btn-info btn-lg">Info</button>
                        </div>
                        <div class="form-group col-md-3">
                            <button type="button" class="btn btn-info btn-lg">Info</button>
                        </div>
                        <div class="form-group col-md-3">
                            <button type="button" class="btn btn-info btn-lg">Info</button>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="panel panel-default">
                        <div class="panel">
                            <h3 align='center'>Lorem Ipsum</h3>
                        </div>
                        <div class="panel-body">
                            <p>Cos’è Lorem Ipsum?</p>
                                <br><p>
                                Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. 
                                Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo, 
                                quando un anonimo tipografo prese una cassetta di caratteri e li assemblò per preparare un 
                                testo campione. È sopravvissuto non solo a più di cinque secoli, ma anche al passaggio alla 
                                videoimpaginazione, pervenendoci sostanzialmente inalterato. Fu reso popolare, negli anni ’60, 
                                con la diffusione dei fogli di caratteri trasferibili “Letraset”, che contenevano passaggi del 
                                Lorem Ipsum, e più recentemente da software di impaginazione come Aldus PageMaker, che includeva 
                                versioni del Lorem Ipsum.
                                </p>
                                <br><p>Perchè lo utilizziamo?</p>
                                <br><p>È universalmente riconosciuto che un lettore che osserva il layout di una pagina viene distratto 
                                dal contenuto testuale se questo è leggibile. Lo scopo dell’utilizzo del Lorem Ipsum è che offre 
                                una normale distribuzione delle lettere (al contrario di quanto avviene se si utilizzano brevi 
                                frasi ripetute, ad esempio “testo qui”), apparendo come un normale blocco di testo leggibile. 
                                Molti software di impaginazione e di web design utilizzano Lorem Ipsum come testo modello. 
                                Molte versioni del testo sono state prodotte negli anni, a volte casualmente, a volte di
                                proposito (ad esempio inserendo passaggi ironici).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel">
                    <h3 align='center'>Login</h3>
                </div>
                <div class="panel-body">
                    <form name=”casellaTesto” method=”get” class="was-validated" action="/ecdl/login.php">
                        <div class="form-group">
                            <label> E-Mail</label>
                            <input name="email" type="text" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Password </label>
                            <input name="password" type="password" id="password" class="form-control" required>
                        </div>
                        <?php
                        if (isset($_REQUEST["email"])) {


                            require_once('ConnessioneDb.php');
                            $db = new ConnessioneDb();
                            //trim toglie gli spazi bianchi doppi o tripli ed evita problemi di SQL INJECTION
                            $email = $db->real_escape_string($_REQUEST["email"]);
                            $pwd = $db->real_escape_string($_REQUEST["password"]);
                            //controlla correttezza username e pwd
                            $sql = "select * from user where email='$email'and password='$pwd'";
                            $result = $db->query($sql);
                            if ($result->num_rows == 0) {
                                echo("<center><br><p><font color='red'>E-Mail o Password Errati!</font></p></center>");
                            } else {
                                $riga = $result->fetch_array();
                                $_SESSION['utente'] = $riga[''];
                                $result->close();
                                //richiama la pagina index.php
                                header("location: index.php");
                            }
                        }
                        ?>
                        <center><br><button type="submit" class="btn btn-info btn-lg" value="accedi"> Accedi </button></center>

                </div>
            </div>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap-table.js"></script>

</div>
</body>
</html>
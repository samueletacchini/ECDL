<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/PrenotazioneRegistrazione.css">
        <link rel="stylesheet" href="file.js">
    </head>
    <body>
        <div class="jumbotron text-center">
            <h1 align="center"> Login</h1>
            <p>
                <span class="glyphicon glyphicon-phone"></span>
                0592917000 -
                <span class="glyphicon glyphicon-envelope"></span>
                ecdl@istitutocorni.it
            </p>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default">
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
                                echo("<center><br><p><font color='red'>E-Mail o Password Errati!4'0</font></p></center>");
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
                        <center><br><label> Non Sei Registrato ? Fallo <a href="skillCard.php"> ora</a></center>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap-table.js"></script>

</div>
</body>
</html>
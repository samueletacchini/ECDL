<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="file.js">
        <style>
            body{
                background-color:DodgerBlue;
                max-width: auto;
                overflow: hidden;
                }
            .form-container {
                min-width: 500px;
                margin-top: 13%;
                margin-left: auto;
                margin-right: auto;
                width: 500px;
                border-radius:80px 5px 80px 5px;
                padding: 10px;
                background-color:white;
            }
            .form-row{
                width: 200px;
                margin-left:124px;
                min-width: 150px;
            }
        </style>
    </head>
    <body>


        <div class="form-container">
            <h2 align="center"> LOGIN ECDL</h2>  
            <form name=”casellaTesto” method=”get” class="was-validated" action="/ecdl/login.php">
                <div class="container">
                    <div class="form-row ">
                        <label> E-Mail</label>
                        <input name="email" type="text" id="email" class="form-control" required>
                    </div>
                    <div class="form-row ">
                        <label> Password </label>
                        <input name="password" type="password" id="password" class="form-control" required>
                    </div>
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
                        echo("<center><label>E-Mail o Password errati</label></center>");
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
                <center><label> Non Sei Registrato ? Fallo <a href="skillCard.php"> ora</a></center>
            </form>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="bootstrap-table.js"></script>

        </div>
    </body>
</html>
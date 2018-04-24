<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/PrenotazioneRegistrazione.css">
        <link rel="stylesheet" href="file.js">
        <meta name="viewport" content="width=device-width,initial-sclae=1.0">
    </head>
    <style>
        .panel{
            margin-bottom:2%;
        }
        #registrazione{
            background-color:DodgerBlue;
            border-radius:5px 5px 5px 5px;
            height:150px;
            min-width:150px;
        }
        #registrazione1{
            height:75px;
        }
        .btn-lg {
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.33;
            border-radius: 6px;
            width: 100%;
            background-color: DodgerBlue;
        }
        #link{
            height:30% + 100px;
        }#link2{
            height:50% + 100px;
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
            <h1 align="center"> ECDL</h1>
            <p id="bar">
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
                    <div id="buttons" class="panel-body">
                        <div class="form-group col-md-3">
                            <form action="prenotazione.php" method="post">
                                <?php
                                if (isset($_SESSION['user'])) {
                                    echo '<input type="hidden" name="id" value="' . $_SESSION['user'] . '">';
                                    echo '<input type="submit" value="Prenota esame" class="btn btn-info btn-lg">';
                                }
                                ?>
                            </form>
                        </div>
                        <div class="form-group col-md-3">

                            <?php
                            //sono loggato
                            if (isset($_SESSION['user'])) {

                                require_once('ConnessioneDb.php');
                                $db = new ConnessioneDb();
                                $sql = 'SELECT ID FROM `prenotazione` WHERE `ID_codice_fiscale` = (SELECT codice_fiscale FROM user WHERE email = "' . $_SESSION['user'] . '")';
                                $result = $db->query($sql);
                                $gigi = $result->fetch_array();
                                $idpren = $gigi['ID'];

                                echo '<form method="post" action="pdf.php">
                                        <input value="' . $_SESSION['user'] . '"  type="hidden" name="id">
                                        <input value="' . $idpren . '" type="hidden" name="idprenota">
                                        <input type="hidden" name="type" value="prenotazione">
                                        <input type="submit" value="PDF prenotazione" class="btn btn-info btn-lg">
                                    </form>';
                            } else {
                                echo '
                                    <form action="skillCard.php" method="post">
                                <input type="hidden" name="a" value="1">
                                <input type="submit" value="Registrati" class="btn btn-info btn-lg">
                            </form>';
                            }
                            ?>

                        </div>
                        <div class="form-group col-md-3" id="prenota">

                            <?php
                            if (isset($_SESSION['user'])) {
                                echo '<form action="pdf.php" method="post">
                                      <input type="hidden" name="type" value="skillcard">
                                      <input type="hidden" name="id" value="' . $_SESSION['user'] . '">
                                      <input type="submit" value="PDF Skillcard" class="btn btn-info btn-lg">
                                      </form>';
                            } else {
                                echo '<form action="skillCard.php" method="post">
                                <input type="hidden" name="a" value="0">
                                <input type="submit" value="Nuova Skillcard" class="btn btn-info btn-lg">
                            </form>';
                            }
                            ?>

                        </div>
                        <div class="form-group col-md-3">
                            <?php
                            if (isset($_SESSION['user'])) {
                                echo '<form action="pdf.php" method="post">
                                      <input type="hidden" name="type" value="aica">
                                      <input type="hidden" name="id" value="' . $_SESSION['user'] . '">
                                      <input type="submit" value="PDF AICA" class="btn btn-info btn-lg">
                                      </form>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="panel panel-default">
                        <div class="panel">
                            <h3 align='center'>Lorem Ipsum</h3>
                        </div>
                        <div class="panel-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ante felis, imperdiet ac placerat at, tincidunt ac nibh. Aliquam erat volutpat. Phasellus venenatis gravida justo, ac accumsan nibh pretium ac. In blandit dictum libero, non faucibus lectus malesuada sit amet. Sed ultrices est nec euismod vehicula. Fusce scelerisque molestie felis, in suscipit risus viverra in. Duis eget porttitor lorem. Donec imperdiet magna sit amet enim vehicula efficitur.
                            <br><br>
                            Fusce et vehicula nisl. Curabitur ut vehicula ante, at imperdiet quam. Nam quis dolor neque. Proin metus lorem, finibus a odio sed, viverra lobortis quam. Phasellus quis hendrerit dui. Maecenas rhoncus accumsan ligula, posuere sagittis enim dignissim vel. In iaculis laoreet justo et placerat. Morbi vitae pretium mi. Maecenas cursus, neque viverra placerat pulvinar, ante arcu pretium nisi, vestibulum pretium erat odio eget leo. Nam placerat molestie elit ac elementum. Suspendisse molestie id eros non malesuada. Donec lobortis viverra velit eu sodales. Phasellus hendrerit malesuada sapien sit amet tincidunt. Ut tempor bibendum rutrum. Proin in ultrices nunc.
                            <br><br>
                            Praesent aliquet laoreet nisl aliquam faucibus. Quisque rutrum luctus tortor, quis facilisis leo egestas ut. Nam varius nisi ac cursus tempor. Ut eget rhoncus justo. Morbi non libero ut lectus molestie volutpat. Nunc id metus et lorem mollis vestibulum. Ut id posuere nisi, a pretium ex. Maecenas egestas ipsum nec massa cursus rutrum. Donec ligula ante, dictum ut dictum nec, semper non metus. Aliquam ut sem quis ex finibus posuere. Mauris scelerisque nec metus ac mattis. Nam auctor, felis ut consequat cursus, est metus faucibus risus, non tincidunt purus diam vitae lorem.
                            <br><br>
                            Phasellus ac fringilla nibh, ac porttitor tortor. Sed tellus lectus, sodales a bibendum ac, aliquet nec elit. In molestie sollicitudin est, a finibus quam porttitor volutpat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam dui sapien, accumsan a sapien quis, feugiat tempor tortor. Vivamus tristique enim ac lorem ultricies consequat. Mauris imperdiet sollicitudin sem, nec pulvinar elit sagittis quis. Duis eu ligula eu est pharetra mollis. Maecenas porttitor mauris at ipsum tempus posuere. Phasellus porttitor ornare volutpat. Proin vel tristique ligula.
                            <br><br>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div>
                <div class="panel panel-default">
                    <div class="panel">
                        <?php
                        require_once('ConnessioneDb.php');
                        $db = new ConnessioneDb();

                        if (isset($_SESSION['user'])) {
                            $sql = "select * from user where email='" . $_SESSION['user'] . "'";
                            $result = $db->query($sql);
                            $user = $result->fetch_array();
                            echo "<h2 align='center'><font color='#585858'>" . $user['nome'] . " " . $user['cognome'] . "</font></h2>";
                        } else {
                            echo "<h3 align='center'>Login</h3>";
                        }
                        ?>
                    </div>
                    <div id="login" class="panel-body">

                        <?php
                        if (isset($_SESSION['user'])) {

                            echo "<table class='table table-bordered'><thead><tr><th>DATA</th><th>Dalle</th><th>alle</th><th>Moduli</th><tr>";

                            require_once('ConnessioneDb.php');
                            $db = new ConnessioneDb();
                            $sql = "select * from user where email='" . $_SESSION['user'] . "'";
                            $result = $db->query($sql);
                            $user = $result->fetch_array();

                            $sql = "SELECT sessioni.*, prenotazione.esami FROM sessioni JOIN `prenotazione` ON prenotazione.ID_sessione = sessioni.ID JOIN user ON user.codice_fiscale = prenotazione.ID_codice_fiscale WHERE user.email = '" . $_SESSION['user'] . "'";
                            $ris2 = $db->query($sql);

                            echo "<b><font color='#585858'>Esami prenotati:</font></b>";
                            while ($riga2 = $ris2->fetch_array()) {
                                echo "<tr><td>{$riga2["data"]}</td>";
                                echo "<td>{$riga2["ora_da"]}</td>";
                                echo "<td>{$riga2["ora_a"]}</td> <td> ";
                                for ($i = 0; $i < strlen($riga2["esami"]); $i++) {
                                    echo" " . $riga2["esami"][$i] . " ";
                                }
                                echo "</td></tr>";
                            }
                            echo "</table>";
                            echo '<form action="login.php" method="post">
                                     <input type="hidden" name="exit" value="1">
                                     <input type="submit" value="Logout" class="btn btn-info btn-lg">
                                  </form>';
                        } else {
                            if (isset($_SESSION['err']) && $_SESSION['err'] == '0') {
                                $_SESSION['err'] = null;
                                
                                echo 'PASSWORD ERRATA';
                            }
                            echo ' <form name=”casellaTesto” method="post" class="was-validated" action="/ecdl/login.php">
                            <div class="form-group">
                                <label> E-Mail</label>
                                <input name="email" type="text" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label> Password </label>
                                <input name="password" type="password" id="password" class="form-control" required>
                            </div>';
                            echo '<center><br><button type="submit" class="btn btn-info btn-lg" value="accedi"> Accedi </button></center>';
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div>
                <div class="panel panel-default"  id="link">
                    <div class="panel">
                        <h3 align='center'>Prossime date Esami</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr><th>DATA</th><th>Dalle</th><th>alle</th><tr>
<?php
require_once('ConnessioneDb.php');
$db = new ConnessioneDb();
$sql = "SELECT * FROM `sessioni`";
$ris = $db->query($sql);

while ($riga = $ris->fetch_array()) {
    echo "<tr><td>{$riga["data"]}</td>";
    echo "<td>{$riga["ora_da"]}</td>";
    echo "<td>{$riga["ora_a"]}</td>";
    echo "</tr>";
}
echo "</table>";
?>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

<?php
if (isset($_SESSION['user'])) {
    echo '<div class="panel panel-default"  id="link2">
                <div class="panel">
                    <h3 align="center">carica File</h3>
                </div>
                <div class="panel-body">
                    selezionare il/i tipi di file che si è caricato
                    <form name="carica" action="registrazione.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input name="pdfskillcard"  class="form-check-input" type="checkbox" value="1" id="https://github.com/samueletacchini/ECDLcard">
                            <label  class="form-check-label" for="defaultCheck7">
                                pdf skillcard
                            </label>
                        </div>                            
                        <div class="form-group">
                            <input name="pdfprenotazione" onclick="myFunction()" class="form-check-input" type="checkbox" value="1" id="pdfprenotazione">
                            <label  class="form-check-label" for="defaultCheck7">
                                pdf prenotazione
                            </label>
                        </div>                            
                        <div class="form-group">
                            <input name="pdfaica"  class="form-check-input" type="checkbox" value="1" id="pdfaica">
                            <label  class="form-check-label" for="defaultCheck7">
                                pdf aica
                            </label>
                        </div>                            
                        <div class="form-group">
                            <input name="bollettinoskillcard" class="form-check-input" type="checkbox" value="1" id="bollettinoskillcard">
                            <label  class="form-check-label" for="defaultCheck7">
                                bollettino skillcard
                            </label>
                        </div>                            
                        <div class="form-group">
                            <input name="bollettinoprenotazione" onclick="myFunction()" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                            <label  class="form-check-label" for="defaultCheck7">
                                bollettino prenotazione 
                            </label>
                        </div>                            

                        Select image to upload:
                        <input type="file" name="pdfs">
                        <input type="hidden" name="upload" value="1">
                        <br>
                        <input type="submit" value="Upload">

                        <div id="clicco">eheheh</div>
                        
                    </form>';
}
?>



        </div>
    </div>

    <script>
        function updateDiv()
        {
            document.getElementById("buttons").innerHTML = document.getElementById("buttons").innerHTML;
            document.getElementById("login").innerHTML = document.getElementById("login").innerHTML;
        }

        src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"
        src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        type = "text/javascript" src = "bootstrap-table.js"




    </script>
<?php
if (isset($_SESSION['user'])) {
    require_once('ConnessioneDb.php');
    $db = new ConnessioneDb();
    $sql = "SELECT *, prenotazione.ID AS 'ip'  FROM `prenotazione`  JOIN sessioni ON sessioni.ID = prenotazione.ID_sessione WHERE `ID_codice_fiscale` = (SELECT codice_fiscale FROM user WHERE email = '{$_SESSION['user']}')";
    $ris = $db->query($sql);
    $reggia = "";
    while ($riga = $ris->fetch_array()) {
        $esami = "";
        for ($i = 0; $i < strlen($riga["esami"]); $i++) {
            $esami .= ' ' . $riga["esami"][$i] . ' ';
        }
        $reggia .= '<option value="' . $riga["ip"] . '">' . $riga["data"] . ' dalle ' . $riga["ora_da"] . ' alle' . $riga["ora_a"] . ' Moduli prenotati: ' . $esami . '</option>';
//        $reggia .= $riga["data"];
//        $reggia .= ' dalle ' . $riga["ora_da"];
//        $reggia .= ' alle' . $riga["ora_a"];
//        $reggia .= ' Moduli prenotati: ';
//        $reggia .= $riga["esami"];
//        for ($i = 0; $i < strlen($riga["esami"]); $i++) {
//            $reggia .= ' ' . $riga["esami"][$i] . ' ';
//        }
//        $reggia .= '</option>';
    }
}
?>

    <script>


                var html = '<br><div class="form-row"><div class="col-md-10"><label for="scuola">Selezione per quale prenotazione</label><select name="prenotazioni" class="form-control" id="prenotazioni"> ' + '<?php echo $reggia; ?>' + '</select></div></div>';
        function myFunction() {
            document.getElementById("clicco").innerHTML = html;
        }

        function cancella() {
            document.getElementById("clicco").innerHTML = "";
        }
    </script>
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

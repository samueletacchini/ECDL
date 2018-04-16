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
            height:302.5px;
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
                        <h3 align='center'>Lorem ipsum</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group col-md-3">
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
                                echo '<form action="skillCard.php" method="post">
                                <input type="hidden" name="a" value="1">
                                <input type="submit" value="Registrati" class="btn btn-info btn-lg">
                            </form>';
                            }
                            ?>

                        </div>
                        <div class="form-group col-md-3" id="prenota">
                            <form action="prenotazione.php" method="post">
                                <?php
                                if (isset($_SESSION['user'])) {
                                    echo '<input type="hidden" name="id" value="' . $_SESSION['user'] . '">';
                                    echo '<input type="submit" value="Prenota esame" class="btn btn-info btn-lg">';
                                } else {
                                    echo '<input type="submit" value="prenota esame" class="btn btn-info btn-lg">';
                                }
                                ?>

                            </form>
                        </div>
                        <div class="form-group col-md-3">
                            <?php
                            if (isset($_SESSION['user'])) {
                                echo '<form action="pdf.php" method="post">
                                      <input type="hidden" name="type" value="aica">
                                      <input type="hidden" name="id" value="' . $_SESSION['user'] . '">
                                      <input type="submit" value="PDF AICA" class="btn btn-info btn-lg">
                                      </form>';
                            } else {
                                echo '<input type="submit" value="Sono inutile" class="btn btn-info btn-lg">';
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

                            Fusce et vehicula nisl. Curabitur ut vehicula ante, at imperdiet quam. Nam quis dolor neque. Proin metus lorem, finibus a odio sed, viverra lobortis quam. Phasellus quis hendrerit dui. Maecenas rhoncus accumsan ligula, posuere sagittis enim dignissim vel. In iaculis laoreet justo et placerat. Morbi vitae pretium mi. Maecenas cursus, neque viverra placerat pulvinar, ante arcu pretium nisi, vestibulum pretium erat odio eget leo. Nam placerat molestie elit ac elementum. Suspendisse molestie id eros non malesuada. Donec lobortis viverra velit eu sodales. Phasellus hendrerit malesuada sapien sit amet tincidunt. Ut tempor bibendum rutrum. Proin in ultrices nunc.

                            Praesent aliquet laoreet nisl aliquam faucibus. Quisque rutrum luctus tortor, quis facilisis leo egestas ut. Nam varius nisi ac cursus tempor. Ut eget rhoncus justo. Morbi non libero ut lectus molestie volutpat. Nunc id metus et lorem mollis vestibulum. Ut id posuere nisi, a pretium ex. Maecenas egestas ipsum nec massa cursus rutrum. Donec ligula ante, dictum ut dictum nec, semper non metus. Aliquam ut sem quis ex finibus posuere. Mauris scelerisque nec metus ac mattis. Nam auctor, felis ut consequat cursus, est metus faucibus risus, non tincidunt purus diam vitae lorem.

                            Phasellus ac fringilla nibh, ac porttitor tortor. Sed tellus lectus, sodales a bibendum ac, aliquet nec elit. In molestie sollicitudin est, a finibus quam porttitor volutpat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam dui sapien, accumsan a sapien quis, feugiat tempor tortor. Vivamus tristique enim ac lorem ultricies consequat. Mauris imperdiet sollicitudin sem, nec pulvinar elit sagittis quis. Duis eu ligula eu est pharetra mollis. Maecenas porttitor mauris at ipsum tempus posuere. Phasellus porttitor ornare volutpat. Proin vel tristique ligula.

                            Mauris faucibus augue vitae orci pharetra, in egestas nisl dictum. Mauris ut porta lectus, a rhoncus ipsum. Nullam commodo quis dolor sed imperdiet. Aenean tincidunt ultrices nisl, a semper neque accumsan eu. Donec ut elit vehicula, consectetur augue nec, faucibus enim. Sed feugiat orci sed ligula imperdiet fringilla. Fusce tempus iaculis odio non sagittis. Donec eu facilisis risus. Nullam turpis massa, pulvinar vitae neque vel, laoreet posuere eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse finibus blandit porttitor. In in tincidunt risus, eu ullamcorper massa. Sed consectetur turpis lorem, eu pellentesque purus tempus vitae. Nunc non leo erat.

                            In hac habitasse platea dictumst. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec pulvinar nibh. Vivamus tempor, lacus venenatis consequat posuere, ipsum ligula blandit justo, sed bibendum libero lacus non lorem. Suspendisse finibus elementum convallis. Phasellus sed tortor est. Praesent tincidunt id turpis ut maximus. Vestibulum in arcu id sapien iaculis tempus. Curabitur accumsan est a purus pretium mattis. Proin porta magna at massa malesuada commodo eu id lorem. Morbi posuere egestas porttitor. Nunc eleifend tristique semper. Cras diam odio, fringilla non massa vitae, pulvinar faucibus massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla facilisi. Aenean sit amet dui dolor.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div>
                <div class="panel panel-default">
                    <div class="panel">
                        <h3 align='center'>Login</h3>
                    </div>
                    <div class="panel-body">
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
                                $_SESSION['user'] = $riga['email'];
                                $result->close();
                                //richiama la pagina index.php
                                // header("location: index.php");
                            }
                        }



                        if (isset($_SESSION['user']) && isset($_REQUEST['exit'])) {
                            session_destroy();
                        }

                        if (isset($_SESSION['user'])) {
                            require_once('ConnessioneDb.php');
                            $db = new ConnessioneDb();
                            $sql = "select * from user where email='" . $_SESSION['user'] . "'";
                            $result = $db->query($sql);
                            $user = $result->fetch_array();

                            echo "<p> Logged User : " . $user['email'] . "</p>";
                            echo "<p> Skillcard number: " . $user['skill_card'] . "</p>";
                            echo "<p> Quali altre info?: " . "??????" . "</p>";


                            echo '<form action="login.php" method="post">
                            <input type="hidden" name="exit" value="1">
                            <input type="submit" value="Logout" class="btn btn-info btn-lg">
                        </form> ';
                        } else {
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
                        <h3 align='center'>Metti i tuoi link Sergio</h3>
                    </div>
                    <div class="panel-body">
                        In hac habitasse platea dictumst. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec pulvinar nibh. Vivamus tempor, lacus venenatis consequat posuere, ipsum ligula blandit justo, sed bibendum libero lacus non lorem. Suspendisse finibus elementum convallis. Phasellus sed tortor est. Praesent tincidunt id turpis ut maximus. Vestibulum in arcu id sapien iaculis tempus. Curabitur accumsan est a purus pretium mattis. Proin porta magna at massa malesuada commodo eu id lorem. Morbi posuere egestas porttitor.

                    </div>
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
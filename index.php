<?php
session_start();
?>
<html>
    <head>
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/PrenotazioneRegistrazione.css">
        <link rel="stylesheet" href="file.js">
        <meta name="viewport" content="width=device-width,initial-sclae=1.0">

    </head>

    <style>
        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }
        .custom-file-input::before {
            content: 'Carica';
            display: inline-block;
            background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
            border: 1px solid #999;
            border-radius: 3px;
            padding: 5px 8px;
            outline: none;
            white-space: nowrap;
            -webkit-user-select: none;
            cursor: pointer;
            text-shadow: 1px 1px #fff;
            font-weight: 700;
            font-size: 10pt;
        }
        .custom-file-input:hover::before {
            border-color: black;
        }
        .custom-file-input:active::before {
            background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
        }



        #my_file {
            display: none;
        }
        #get_file {
            background: #f9f9f9;
            border: 1px solid #88c;
            padding: 10px;
            border-radius: 5px;
            margin: 10px;
            cursor: pointer;
        }
        #customfileupload
        {
            display: inline;
            background-color: #fff;
            font-size: 14px;
            padding: 10px 30px 10px 10px;
            width: 250px;
            border: 1px solid #999;
            box-shadow: inset 1px 1px 5px #ccc;
            -webkit-box-shadow: inset 1px 1px 5px #ccc;
            -moz-box-shadow: inset 0px 0px 4px #ccc;
            -ms-box-shadow: inset 0px 0px 4px #ccc;
            -o-box-shadow: inset 0px 0px 4px #ccc;
            z-index: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
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

            <div class="panel panel-default">
                <div class="form-group">
                    <h3 align='center'>PDF</h3>
                </div>
                <div id="buttons" class="panel-body">



                    <?php
                    //sono loggato
                    if (isset($_SESSION['user'])) {
                        require_once('ConnessioneDb.php');
                        $db = new ConnessioneDb();
                        $sql = 'SELECT ID FROM `prenotazione` WHERE `ID_codice_fiscale` = (SELECT codice_fiscale FROM user WHERE email = "' . $_SESSION['user'] . '")';
                        $result = $db->query($sql);
                        $gigi = $result->fetch_array();
                        $idpren = $gigi['ID'];
                        echo '<div class="form-group col-md-4" id="prenota"><form method="post" action="pdfUpdate.php">
                                        <input value="' . $_SESSION['user'] . '"  type="hidden" name="id">
                                        <input value="' . $idpren . '" type="hidden" name="idprenota">
                                        <input type="submit" value="PDF Update" class="btn btn-info btn-lg">
                                    </form></div>';
                    } else {
                        echo '<div class="col-md-3"></div>';
                    }
                    ?>




                    <?php
//sono loggato
                    if (!isset($_SESSION['user'])) {
                        echo '
                                    <div class="form-group col-md-3"><form action="skillCard.php" method="post">
                                <input type="hidden" name="a" value="1">
                                <input type="submit" value="Registrazione" class="btn btn-info btn-lg">
                            </form></div>';
                    }
                    ?>



                    <?php
                    if (isset($_SESSION['user'])) {
                        echo '<div class="form-group col-md-4" id="prenota"><form action="pdfSkillcard.php" method="post">
                                      <input type="hidden" name="id" value="' . $_SESSION['user'] . '">
                                      <input type="submit" value="PDF Skillcard" class="btn btn-info btn-lg">
                                      </form></div>';
                    } else {
                        echo '<div class="col-md-3"><form action="skillCard.php" method="post">
                                <input type="hidden" name="a" value="0">
                                <input type="submit" value="Nuova Skillcard" class="btn btn-info btn-lg">
                            </form></div>';
                    }
                    ?>


                    <div class="form-group col-md-4">
                        <?php
                        if (isset($_SESSION['user'])) {
                            echo '<form action="pdfAica.php" method="post">
                                      <input type="hidden" name="id" value="' . $_SESSION['user'] . '">
                                      <input type="submit" value="PDF AICA" class="btn btn-info btn-lg">
                                      </form>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_SESSION['user'])) {

                require_once('ConnessioneDb.php');
                $db = new ConnessioneDb();
                $sql = "SELECT file.tipo FROM `file` JOIN user ON user.codice_fiscale = file.ID_user WHERE user.email = '{$_SESSION["user"]}'";
                $ris = $db->query($sql);
                $pdf = false;
                $boll = false;
                while ($riga = $ris->fetch_array()) {
                    $tipi = explode(", ", $riga["tipo"]);
                    for ($i = 0; $i < count($tipi); $i++) {
                        if ($tipi[$i] == "pdfskillcard") {
                            $pdf = true;
                        }
                        if ($tipi[$i] == "bollettinoskillcard") {
                            $boll = true;
                        }
                    }
                }
                if ($boll == false || $pdf == false) {

                    echo'<div class = "panel panel-default col-md-12">
                <div class = "form-group">
                <h3 align = "center"> Avviso </h3>
                </div>
                <div class = "panel-body">';
                    if (!$boll) {
                        echo "<span style='color:#ffcc00; font-size:150%;' class='glyphicon glyphicon-exclamation-sign'></span><b style='color:gray;'>  Devi caricare il BOLLETTINO.</b><br><br>";
                    }
                    if (!$pdf) {
                        echo"<span style='color:#ffcc00; font-size:150%;' class='glyphicon glyphicon-exclamation-sign'></span><b style='color:gray;'>  Devi caricare il PDF.</b><br><br>";
                    }
                    echo '</div></div>';
                }


                echo '<div class = "panel panel-default col-md-12">
                <div class = "form-group">
                <h3 align = "center">Istruzioni</h3>
                </div>
                <div class = "panel-body" >
                  <div>
                  <b style="color:gray; font-size:125%;"> PDF : </b>
                   <p style="color:gray"> - PDF Update</p>
                   <p style="color:gray"> - PDF SkillCard</p>
                   <p style="color:gray"> - PDF Aica</p>
                  </div>
                  <div style="margin-top:5%">
                   <b style="color:gray; font-size:125%;"> Tabella User : </b>
                   <p style="color:gray"> - Tabella riassuntiva delle prenotazioni a gli esami.</p>
                   <p style="color:gray"> - Nella voce "Bolletino" :</p>
                   <ul>
                   <li style="color:gray">
                   <p style="color:gray">Se contrassegnato da <span style="color:#ff0000; font-size:150%;" class="glyphicon glyphicon-remove-sign"></span>  il PDF del <b>Bollettino</b> non è presente.</p>
                   </li>
                   <li style="color:gray">
                   <p style="color:gray">Se contrassegnato da <span style="color:#ffcc00; font-size:150%;" class="glyphicon glyphicon-exclamation-sign"></span>  il PDF del <b>Bollettino</b> è presente, ma ancora da approvare.</p>
                   </li>
                   <li style="color:gray">
                   <p style="color:gray">Se contrassegnato da <span style="color:#33cc33; font-size:150%;" class="glyphicon glyphicon-ok-sign"></span>  il PDF del <b>Bollettino</b> è stato approvato.</p>
                   </li>
                   </ul>
                   <p style="color:gray"> - Nella voce "Pdf" :</p>
                   <ul>
                   <li style="color:gray">
                   <p style="color:gray">Se contrassegnato da <span style="color:#ff0000; font-size:150%;" class="glyphicon glyphicon-remove-sign"></span>  il PDF della <b>Prenotazione</b> non è presente.</p>
                   </li>
                   <li style="color:gray">
                   <p style="color:gray">Se contrassegnato da <span style="color:#ffcc00; font-size:150%;" class="glyphicon glyphicon-exclamation-sign"></span>  il PDF della <b>Prenotazione</b> è presente, ma ancora da approvare.</p>
                   </li>
                   <li style="color:gray">
                   <p style="color:gray">Se contrassegnato da <span style="color:#33cc33; font-size:150%;" class="glyphicon glyphicon-ok-sign"></span>  il PDF della <b>Penotazione</b> è stato approvato.</p>
                   </li>
                   </ul>
                  </div>
                  
                  <div style="margin-top:5%">
                  <b style="color:gray; font-size:125%;"> Prossime date esami: </b>
                   <p style="color:gray"> - Illustrazione delle eventuali date future disponibili per la prenotazione di un esame</l>.</p>
                   </div>
                  <div style="margin-top:5%">
                  <b style="color:gray; font-size:125%;"> Carica file: </b>
                   <p style="color:gray"> - Pannello destinato al caricamneto del PDF <b>"Bollettino"</b> e il PDF della <b>"Prenotazione"</b>.</p>
                   </div>
                </div>
                </div>';
            } else {
                echo '<div class="panel panel-default col-md-12">
                <div class="form-group">
                    <h3 align="center">Istruzioni</h3>
                </div>
                <div class="panel-body" >
                <ul>
                    <p style="color:gray"> - Se non hai una SkillCard assegnata, richiedila subito cliccando su <b style="color:red">Nuova Skill Card</b>.</p>
                    <p style="color:gray"> - Se hai una SkillCard assegnata, compila il modulo di <b style="color:red">Registrazione</b>.</p>
                </ul>
                </div>
            </div>';
            }
            ?>
        </div>
        <div class="col-md-4">
            <div>
                <div class="panel panel-default">
                    <div class="form-group">
                        <?php
                        require_once('ConnessioneDb.php');
                        $db = new ConnessioneDb();
                        if (isset($_SESSION['user'])) {
                            $sql = "select * from user where email = '" . $_SESSION['user'] . "'";
                            $result = $db->query($sql);
                            $user = $result->fetch_array();
                            echo "<h2 align = 'center'><font color = '#585858'>" . $user['nome'] . " " . $user['cognome'] . "</font></h2>";
                        } else {
                            echo "<h3 align = 'center'>Login</h3>";
                        }
                        ?>
                    </div>
                    <div id="login" class="panel-body">

                        <?php
                        if (isset($_SESSION['user'])) {
                            require_once('ConnessioneDb.php');
                            $db = new ConnessioneDb();

                            $query = "SELECT prenotazione.ID, user.nome, user.cognome, prenotazione.esami, sessioni.data FROM `prenotazione` JOIN user ON user.codice_fiscale = prenotazione.ID_codice_fiscale JOIN sessioni ON sessioni.ID = prenotazione.ID_sessione WHERE user.email = '{$_SESSION['user']}' GROUP BY prenotazione.ID ORDER BY prenotazione.ID";
                            echo "<br><br>";
                            $ris = $db->query($query);
                            $righe = mysqli_num_rows($ris);

                            if ($righe > 0) {

                                echo '<table class=" table table-bordered"> <tr>';

                                echo '<th><div style="color:gray">Data</div></th>';
                                echo '<th><div style="color:gray">Moduli</div></th>';
                                echo '<th><div style="color:gray">Bollettino</div></th>';
                                echo '<th><div style="color:gray">Pdf</div></th>';


                                echo "</tr>";
                            } else {
                                echo 'la ricerca non ha restituito nessun risultato';
                            }
                            while ($riga = $ris->fetch_array()) {
                                echo "<td>" . $riga['data'] . "</td>";
                                echo "<td>" . $riga['esami'] . "</td>";


                                $query2 = "SELECT id, tipo, ok, ID_prenotazione FROM `file` WHERE `ID_prenotazione` = {$riga['ID']}";
                                $ris2 = $db->query($query2);

                                $pren = 0;
                                $boll = 0;
                                for ($o = 0; $o < 2; $o++) {
                                    $riga2 = $ris2->fetch_array();
                                    $tipi = explode(", ", $riga2['tipo']);
                                    for ($p = 0; $p < 2; $p++) {
                                        if (isset($tipi[$p])) {

                                            if ($tipi[$p] == "bollettinoprenotazione") {
                                                $id = $riga2['id'];
                                                if ($riga2['ok'] == 1) {
                                                    $boll = 2;
                                                } else {
                                                    $boll = 1;
                                                }
                                            }
                                            if ($tipi[$p] == "pdfprenotazione") {
                                                $id = $riga2['id'];
                                                if ($riga2['ok'] == 1) {
                                                    $pren = 2;
                                                } else {
                                                    $pren = 1;
                                                }
                                            }
                                        }
                                    }
                                }

                                if ($boll == 1) {
                                    echo "<td><span style='color:#ffcc00; font-size:150%;' class='glyphicon glyphicon-exclamation-sign' title='Da approvare'></span> <a href='getfile.php?fid={$id}'>  <span style='color:#737373; font-size:150%;' class='glyphicon glyphicon-save-file' title='Scarica' ></span></a> </td>";
                                } else if ($boll == 2) {
                                    echo "<td><span style='color:#33cc33; font-size:150%;' class='glyphicon glyphicon-ok-sign' title='Completo'></span><a href='getfile.php?fid={$id}'>  <span style='color:#737373; font-size:150%;' class='glyphicon glyphicon-save-file' title='Scarica' ></span></a></span>></td>";
                                } else {
                                    $form = '<form method="post" action="pdfPrenotazione.php">
                                        <input value="' . $_SESSION['user'] . '"  type="hidden" name="id">
                                        <input value="' . $riga['ID'] . '" type="hidden" name="idprenota">
                                        <input type="submit" value="scarica" class="glyphicon glyphicon-save">
                                    </form>';
                                    echo "<td><span style='color:#ff0000; font-size:150%;' class='glyphicon glyphicon-remove-sign' title='nessun file'></span> </td>";
                                }
                                if ($pren == 1) {
                                    echo "<td><span style='color:#ffcc00; font-size:150%;' class='glyphicon glyphicon-exclamation-sign' title='Da approvare'></span><a href='getfile.php?fid={$id}'>  <span style='color:#737373; font-size:150%;' class='glyphicon glyphicon-save-file' title='Scarica' ></span></a> </td>";
                                } else if ($pren == 2) {
                                    echo "<td><span style='color:#33cc33; font-size:150%;' class='glyphicon glyphicon-ok-sign' title='Completo'></span> <a href='getfile.php?fid={$id}'>  <span style='color:#737373; font-size:150%;' class='glyphicon glyphicon-save-file' title='Scarica' ></span></a> <a href='eliminafile.php?ID={$id}'></td>";
                                } else {
                                    echo "<td><span style='color:#ff0000; font-size:150%;' class='glyphicon glyphicon-remove-sign' title='nessun file'></span> $form</td>";
                                }


                                echo " </form></tr> ";
                            }
                            echo '</table>';

                            echo '<form action="login.php" method="post">
                                     <input type="hidden" name="exit" value="1">
                                     <input type="submit" value="Logout" class="btn btn-info btn-lg">
                                  </form>';
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
                            echo "<p href = 'recupera.php'><p align = 'right' style = 'color:grey'>Recupera Password</p></p>";
                            if (isset($_SESSION['err']) && $_SESSION['err'] == '0') {
                                $_SESSION['err'] = null;
                                echo '<p style="color:#B40404" align="center"> E-mail o Password Errati</p>';
                            }
                            echo '<center><br><button type="submit" class="btn btn-info btn-lg" value="accedi" data-toggle="modal" data-target="#myModal"> Accedi </button></center>';
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div>
                <div class="panel panel-default"  id="link">
                    <div class="form-group">
                        <h3 align='center'>Prossime date Esami</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr><td style="color:gray">Data</td><td style="color:gray">Dalle</td><td style="color:gray">Alle</td></tr>
                            <?php
                            require_once('ConnessioneDb.php');
                            $db = new ConnessioneDb();
                            $sql = "SELECT * FROM `sessioni` ORDER BY `data`";
                            $ris = $db->query($sql);

                            $datenow = date("Y-m-d");

                            while ($riga = $ris->fetch_array()) {
                                if ($riga["data"] > $datenow) {
                                    echo "<tr><td>{$riga["data"]}</td>";
                                    echo "<td>{$riga["ora_da"]}</td>";
                                    echo "<td>{$riga["ora_a"]}</td>";
                                    // echo "<td>  prenota </td>";
                                    echo "</tr>";
                                }
                            }
                            echo "</table>";
                            ?>
                        </table>

                        <form action="prenotazione.php" method="post">
                            <?php
                            if (isset($_SESSION['user'])) {
                                echo '<input type="hidden" name="id" value="' . $_SESSION['user'] . '">';
                                echo '<input type="submit" value="Prenota esame" class="btn btn-info btn-lg">';
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            if (!isset($_SESSION['user'])) {
                echo '<div class="panel panel-default" style="height:20% width:5%;"><iframe style="max-width:100%;min-width:100%;" height="400" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2838.5097460187676!2d10.88803611520416!3d44.64793607909977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477fef95e7474705%3A0xe65e79e7b059ecb4!2sIstituto+di+Istruzione+Superiore+F.Corni%2C+sede+Vinci!5e0!3m2!1sit!2sit!4v1525778801134" frameborder="0" style="border:0" allowfullscreen></iframe></div>';
            }
            ?>
            <?php
            if (isset($_SESSION['user'])) {
                echo '<div class="panel panel-default"  id="link2">
                <div class="form-group">
                    <h3 align="center">Carica File</h3>
                </div>
                <div class="panel-body">
                    <p align="center" style="color:grey">Selezionare il/i tipi di file che si è caricato:<p>
                    <form name="carica" action="caricaFile.php" method="post" enctype="multipart/form-data">
                        <div class="checkbox-inline col-md-offset-4">
                        <div class="form-group">
                            <input name="pdfskillcard"  class="form-check-input" type="checkbox" value="1" >
                            <label  class="form-check-label" for="defaultCheck7">
                                Pdf skillcard
                            </label>
                        </div>                            
                                                    
                        <div class="form-group">
                            <input name="pdfaica"  class="form-check-input" type="checkbox" value="1" id="pdfaica">
                            <label  class="form-check-label" for="defaultCheck7">
                                Pdf aica
                            </label>
                        </div>   
                        <div class="form-group">
                            <input name="pdfupdate" onchange="myFunction()" class="form-check-input" type="checkbox" value="1" id="pdfupdate">
                            <label  class="form-check-label" for="defaultCheck7">
                                Pdf update 
                            </label>
                        </div>
                        <div class="form-group">
                            <input name="bollettinoskillcard" class="form-check-input" type="checkbox" value="1" id="bollettinoskillcard">
                            <label  class="form-check-label" for="defaultCheck7">
                                Bollettino skillcard
                            </label>
                        </div>                            
                        <div class="form-group">
                            <input name="bollettinoprenotazione" onchange="myFunction()" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                            <label  class="form-check-label" for="defaultCheck7">
                                Bollettino prenotazione 
                            </label>
                        </div>  
                          
                        </div>                           
                        
                        
                        <p align="center">Seleziona i file da caricare:</p>
                        <input accept="image/*" name="pdfs" type="file" class="custom-file-input" required>
                        <br>
                        <input type="submit" name="carica" value="Carica" class="btn btn-info btn-lg">
                        <div id="clicco"></div>


                        
                        
                        </form> 
                        </div>
                        
                        </div>
                        ';
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
    <script>
                document.getElementById('get_file').onclick = function () {
            document.getElementById('my_file').click();
        };
        $('input[type=file]').change(function (e) {
            $('#customfileupload').html($(this).val());
        });
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
            $reggia .= '<option value="' . $riga["ip"] . '">' . $riga["data"] . ' dalle ' . $riga["ora_da"] . ' alle ' . $riga["ora_a"] . ' Moduli prenotati: ' . $esami . '</option>';
        }
    }
    ?>

    <script>
        var html = '<br><div class="form-row"><div class="col-md-10"><label for="scuola">Seleziona per quale prenotazione</label><select name="prenotazioni" class="form-control" id="prenotazioni"> ' + '<?php echo $reggia; ?>' + '</select></div></div>';
        function myFunction() {
            if (document.getElementById("pdfprenotazione").checked == false && document.getElementById("pdfupdate").checked == false && document.getElementById("bollettinoprenotazione").checked == false) {
                document.getElementById("clicco").innerHTML = "";
            } else {
                document.getElementById("clicco").innerHTML = html;
            }


        }
        function cancella() {
            document.getElementById("clicco").innerHTML = "";
        }
    </script>
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

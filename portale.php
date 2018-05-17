<html>
    <head>
        <?php
        session_start();
        ?>
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
            <div class="container-fluid" style="background-color:Dodgerblue;">             
                <form action="portale.php" method="post">
                    <div class="form-group col-md-3" style="margin-top:1.5%;">
                        <select name="colonna" class="form-control" required>
                            <option value="skill_card" selected> skill_card</option>    
                            <option value="rilasciata"> rilasciata</option>
                            <option value="codice_fiscale"> codice_fiscale</option>
                            <option value="sesso">sesso </option>
                            <option value="cognome">cognome </option>
                            <option value="nome"> nome</option>
                            <option value="data_nascita"> data_nascita</option>
                            <option value="comune_nascita"> comune_nascita</option>
                            <option value="provincia_nascita"> provincia_nascita </option>
                            <option value="stato_civile"> stato_civile </option>
                            <option value="indirizzo"> indirizzo </option>
                            <option value="civico"> civico </option>
                            <option value="stato"> stato </option>
                            <option value="citta"> citta </option>
                            <option value="cap"> cap </option>
                            <option value="provincia"> provincia </option>
                            <option value="email"> email </option>
                            <option value="cellulare"> cellulare </option>
                            <option value="telefono"> telefono </option>
                            <option value="occupazione"> occupazione </option>
                            <option value="titolo_studio"> titolo_studio </option>
                            <option value="pagato"> pagato </option>
                            <option value="tipo"> tipo </option>
                        </select>
                    </div>
                    <div class="form-group col-md-3" style="margin-top:1.5%;">    
                        <input name="cerca" type="text" class="form-control" placeholder="cerca">
                    </div>
                    <div class="form-group col-md-3" style="margin-top:1.7%;">
                        <button type="submit" class="btn btn-default">cerca</button>
                    </div>


                </form>
                <form method='post' action='portale.php'>
                    <input name='tartaruga' type='hidden' value='1'>
                    <input type='submit' value='Reset' class='btn btn-default'>
                </form>
            </div>

            <div class="panel panel-default">
                <div class="panel">
                    <h3 align='center'>Utenti vari</h3>
                </div>
                <div class="panel-body">

                    <?php
                    require_once('ConnessioneDb.php');
                    $db = new ConnessioneDb();

                    if (isset($_REQUEST["tartaruga"])) {
                        $_SESSION["cerca"] = "codice_fiscale";
                        $_SESSION["cosa"] = "%";
                    }

                    if (isset($_REQUEST["seleziona"])) {
                        if ($_SESSION['selezione'] == "bho" || $_SESSION['selezione'] == "nessuno") {
                            $_SESSION['selezione'] = "tutti";
                            $tn = true;
                        } else {
                            $tn = false;
                            for ($i = 0; $i <= 22; $i++) {
                                $_SESSION["s$i"] = "a";
                            }
                            $_SESSION['selezione'] = "nessuno";
                        }
                    } else {
                        $_SESSION['selezione'] = "bho";
                        $tn = false;
                    }



                    if (isset($_REQUEST['salva'])) {
                        $query = "UPDATE `user` SET ";

                        if (isset($_REQUEST["skill_card"])) {
                            $query .= 'skill_card = "' . $_REQUEST['skill_card'] . '", ';
                        }
                        if (isset($_REQUEST["rilasciata"])) {
                            $query .= 'rilasciata = "' . $_REQUEST['rilasciata'] . '", ';
                        }
                        if (isset($_REQUEST["codice_fiscale"])) {
                            $query .= 'codice_fiscale = "' . $_REQUEST['codice_fiscale'] . '", ';
                        }
                        if (isset($_REQUEST["sesso"])) {
                            $query .= 'sesso = "' . $_REQUEST['sesso'] . '", ';
                        }
                        if (isset($_REQUEST["cognome"])) {
                            $query .= 'cognome = "' . $_REQUEST['cognome'] . '", ';
                        }
                        if (isset($_REQUEST["nome"])) {
                            $query .= 'nome = "' . $_REQUEST['nome'] . '", ';
                        }
                        if (isset($_REQUEST["data_nascita"])) {
                            $query .= 'data_nascita = "' . $_REQUEST['data_nascita'] . '", ';
                        }
                        if (isset($_REQUEST["comune_nascita"])) {
                            $query .= 'comune_nascita = "' . $_REQUEST['comune_nascita'] . '", ';
                        }
                        if (isset($_REQUEST["provincia_nascita"])) {
                            $query .= 'provincia_nascita = "' . $_REQUEST['provincia_nascita'] . '", ';
                        }
                        if (isset($_REQUEST["stato_civile"])) {
                            $query .= 'stato_civile = "' . $_REQUEST['stato_civile'] . '", ';
                        }
                        if (isset($_REQUEST["indirizzo"])) {
                            $query .= 'indirizzo = "' . $_REQUEST['indirizzo'] . '", ';
                        }
                        if (isset($_REQUEST["civico"])) {
                            $query .= 'civico = "' . $_REQUEST['civico'] . '", ';
                        }
                        if (isset($_REQUEST["stato"])) {
                            $query .= 'stato = "' . $_REQUEST['stato'] . '", ';
                        }
                        if (isset($_REQUEST["citta"])) {
                            $query .= 'citta = "' . $_REQUEST['citta'] . '", ';
                        }
                        if (isset($_REQUEST["cap"])) {
                            $query .= 'cap = "' . $_REQUEST['cap'] . '", ';
                        }
                        if (isset($_REQUEST["provincia"])) {
                            $query .= 'provincia = "' . $_REQUEST['provincia'] . '", ';
                        }
                        if (isset($_REQUEST["email"])) {
                            $query .= 'email = "' . $_REQUEST['email'] . '", ';
                        }
                        if (isset($_REQUEST["telefono"])) {
                            $query .= 'telefono = "' . $_REQUEST['telefono'] . '", ';
                        }
                        if (isset($_REQUEST["cellulare"])) {
                            $query .= 'cellulare = "' . $_REQUEST['cellulare'] . '", ';
                        }
                        if (isset($_REQUEST["occupazione"])) {
                            $query .= 'occupazione = "' . $_REQUEST['occupazione'] . '", ';
                        }
                        if (isset($_REQUEST["titolo_studio"])) {
                            $query .= 'titolo_studio = "' . $_REQUEST['titolo_studio'] . '", ';
                        }
                        if (isset($_REQUEST["pagato"])) {
                            $query .= 'pagato = "' . $_REQUEST['pagato'] . '", ';
                        }
                        if (isset($_REQUEST["tipo"])) {
                            $query .= 'tipo = "' . $_REQUEST['tipo'] . '", ';
                        }

                        $query = substr($query, 0, -2);

                        $query .= " WHERE codice_fiscale = '{$_REQUEST['salva']}'";
                        $ris = $db->query($query);
                    }





                    if (isset($_REQUEST['colonna']) && isset($_REQUEST['cerca'])) {
                        $_SESSION["cerca"] = $_REQUEST['colonna'];
                        $_SESSION["cosa"] = $_REQUEST['cerca'];
                    } else {
                        if ($_SESSION["cerca"] == "codice_fiscale" && $_SESSION["cosa"] == "%" && !isset($_REQUEST["ordina"])) {
                            $_SESSION["cerca"] = "codice_fiscale";
                            $_SESSION["cosa"] = "%";
                        }
                    }

                    if (isset($_REQUEST["ordina"])) {
                        $_SESSION["ordina"] = $_REQUEST["ordina"];
                    } else {
                        $_SESSION['ordina'] = "skill_card";
                    }

                    if (isset($_REQUEST["pren"])) {
                        $idpren = $_REQUEST["pren"];
                    } else {
                        $idpren = "%";
                    }


                    echo $_SESSION["query"] = "SELECT `user`.* FROM `user` inner JOIN prenotazione WHERE cast(prenotazione.ID_sessione as char(15)) LIKE '{$idpren}' AND `{$_SESSION['cerca']}` LIKE '%{$_SESSION['cosa']}%' GROUP BY user.codice_fiscale ORDER BY {$_SESSION["ordina"]}";


                    //   $_SESSION["query"] = "SELECT * FROM `user` ORDER BY {$_SESSION["ordina"]}";

                    if (!isset($_SESSION["s0"])) {
                        for ($i = 0; $i <= 22; $i++) {
                            $_SESSION["s$i"] = "a";
                        }
                    }


                    if (isset($_REQUEST["skill_card"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s0"] = 'skill_card';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s0"] = 'a';
                    }
                    if (isset($_REQUEST["rilasciata"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s1"] = 'rilasciata';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s1"] = 'a';
                    }
                    if (isset($_REQUEST["codice_fiscale"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s2"] = 'codice_fiscale';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s2"] = 'a';
                    }
                    if (isset($_REQUEST["sesso"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s3"] = 'sesso';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s3"] = 'a';
                    }
                    if (isset($_REQUEST["cognome"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s4"] = 'cognome';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s4"] = 'a';
                    }
                    if (isset($_REQUEST["nome"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s5"] = 'nome';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s5"] = 'a';
                    }
                    if (isset($_REQUEST["data_nascita"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s6"] = 'data_nascita';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s6"] = 'a';
                    }
                    if (isset($_REQUEST["comune_nascita"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s7"] = 'comune_nascita';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s7"] = 'a';
                    }
                    if (isset($_REQUEST["provincia_nascita"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s8"] = 'provincia_nascita';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s8"] = 'a';
                    }
                    if (isset($_REQUEST["stato_civile"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s9"] = 'stato_civile';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s9"] = 'a';
                    }
                    if (isset($_REQUEST["indirizzo"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s10"] = 'indirizzo';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s10"] = 'a';
                    }
                    if (isset($_REQUEST["civico"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s11"] = 'civico';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s11"] = 'a';
                    }
                    if (isset($_REQUEST["stato"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s12"] = 'stato';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s12"] = 'a';
                    }
                    if (isset($_REQUEST["citta"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s13"] = 'citta';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s13"] = 'a';
                    }
                    if (isset($_REQUEST["cap"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s14"] = 'cap';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s14"] = 'a';
                    }
                    if (isset($_REQUEST["provincia"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s15"] = 'provincia';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s15"] = 'a';
                    }
                    if (isset($_REQUEST["email"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s16"] = 'email';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s16"] = 'a';
                    }
                    if (isset($_REQUEST["telefono"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s17"] = 'telefono';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s17"] = 'a';
                    }
                    if (isset($_REQUEST["cellulare"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s18"] = 'cellulare';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s18"] = 'a';
                    }
                    if (isset($_REQUEST["occupazione"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s19"] = 'occupazione';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s19"] = 'a';
                    }
                    if (isset($_REQUEST["titolo_studio"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s20"] = 'titolo_studio';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s20"] = 'a';
                    }
                    if (isset($_REQUEST["pagato"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s21"] = 'pagato';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s21"] = 'a';
                    }
                    if (isset($_REQUEST["tipo"]) || $tn == true) {
                        $_SESSION['selezione'] = "bho";
                        $_SESSION["s22"] = 'tipo';
                    } elseif (isset($_REQUEST["tipi"])) {
                        $_SESSION["s22"] = 'a';
                    }


                    $ris = $db->query($_SESSION["query"]);
                    $righe = mysqli_num_rows($ris);
                    echo '<table class=" table table-bordered"> <tr>';
                    for ($c = 0; $c <= 22; $c++) {
                        if ($_SESSION["s$c"] != "a") {
                            if ($_SESSION["ordina"] == $_SESSION["s$c"]) {
                                echo '<th ><form method="post" action="portale.php"> <input value="' . $_SESSION["s$c"] . '" type="hidden" name="ordina"> <input type="submit" value="' . $_SESSION["s$c"] . '" class="btn btn-info btn-lg" style="background-color:blue;"> </form></th>';
                            } else {
                                echo '<th><form method="post" action="portale.php"> <input value="' . $_SESSION["s$c"] . '" type="hidden" name="ordina"> <input type="submit" value="' . $_SESSION["s$c"] . '" class="btn btn-info btn-lg" style="background-color:Dodgerblue;"> </form></th>';
                            }
                        }
                    }
                    if ($_SESSION['selezione'] == "bho") {

                        echo "<th>Righe totali : {$righe} </th>";
                        echo "</tr>";
                    }

                    while ($riga = $ris->fetch_array()) {
                        if ($_SESSION['selezione'] == "bho") {
                            if (isset($_REQUEST['modifica'])) {
                                if ($_REQUEST['modifica'] == $riga['codice_fiscale']) {
                                    $modifica = true;
                                    echo '<form method="post" action="portale.php">';
                                } else {
                                    $modifica = false;
                                }
                            } else {
                                $modifica = false;
                            }

                            if ($_SESSION["s0"] != "a") {
                                if ($modifica == true) {
                                    echo "<tr><td> <input name='skill_card' type='text' value='" . $riga['skill_card'] . "' ></td>";
                                } else {
                                    echo "<tr><td> " . $riga['skill_card'] . "</td>";
                                }
                            }
                            if ($_SESSION["s1"] != "a") {
                                $la = explode("-", $riga['rilasciata']);
                                $al = $la[2] . "-" . $la[1] . "-" . $la[0];
                                if ($modifica == true) {
                                    echo "<td><input name='codice_fiscale' type='text' value='" . $al . "'></td>";
                                } else {
                                    echo "<td>" . $al . "</td>";
                                }
                            }
                            if ($_SESSION["s2"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='codice_fiscale' type='text' value='" . $riga['codice_fiscale'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['codice_fiscale'] . "</td>";
                                }
                            }
                            if ($_SESSION["s3"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='sesso' type='text' value='" . $riga['sesso'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['sesso'] . "</td>";
                                }
                            }
                            if ($_SESSION["s4"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='cognome' type='text' value='" . $riga['cognome'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['cognome'] . "</td>";
                                }
                            }
                            if ($_SESSION["s5"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='nome' type='text' value='" . $riga['nome'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['nome'] . "</td>";
                                }
                            }
                            if ($_SESSION["s6"] != "a") {
                                $la = explode("-", $riga['data_nascita']);
                                $al = $la[2] . "-" . $la[1] . "-" . $la[0];
                                if ($modifica == true) {
                                    echo "<td><input name='codice_fiscale' type='text' value='" . $al . "'></td>";
                                } else {
                                    echo "<td>" . $al . "</td>";
                                }
                            }
                            if ($_SESSION["s7"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='comune_nascita' type='text' value='" . $riga['comune_nascita'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['comune_nascita'] . "</td>";
                                }
                            }
                            if ($_SESSION["s8"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='provincia_nascita' type='text' value='" . $riga['provincia_nascita'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['provincia_nascita'] . "</td>";
                                }
                            }
                            if ($_SESSION["s9"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='stato_civile' type='text' value='" . $riga['stato_civile'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['stato_civile'] . "</td>";
                                }
                            }
                            if ($_SESSION["s10"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='indirizzo' type='text' value='" . $riga['indirizzo'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['indirizzo'] . "</td>";
                                }
                            }
                            if ($_SESSION["s11"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='civico' type='text' value='" . $riga['civico'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['civico'] . "</td>";
                                }
                            }
                            if ($_SESSION["s12"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='stato' type='text' value='" . $riga['stato'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['stato'] . "</td>";
                                }
                            }
                            if ($_SESSION["s13"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='citta' type='text' value='" . $riga['citta'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['citta'] . "</td>";
                                }
                            }
                            if ($_SESSION["s14"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='cap' type='text' value='" . $riga['cap'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['cap'] . "</td>";
                                }
                            }
                            if ($_SESSION["s15"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='provincia' type='text' value='" . $riga['provincia'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['provincia'] . "</td>";
                                }
                            }
                            if ($_SESSION["s16"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='email' type='text' value='" . $riga['email'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['email'] . "</td>";
                                }
                            }
                            if ($_SESSION["s17"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='telefono' type='text' value='" . $riga['telefono'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['telefono'] . "</td>";
                                }
                            }
                            if ($_SESSION["s18"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='cellulare' type='text' value='" . $riga['cellulare'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['cellulare'] . "</td>";
                                }
                            }
                            if ($_SESSION["s19"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='occupazione' type='text' value='" . $riga['occupazione'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['occupazione'] . "</td>";
                                }
                            }
                            if ($_SESSION["s20"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='titolo_studio' type='text' value='" . $riga['titolo_studio'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['titolo_studio'] . "</td>";
                                }
                            }
                            if ($_SESSION["s21"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='pagato' type='text' value='" . $riga['pagato'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['pagato'] . "</td>";
                                }
                            }
                            if ($_SESSION["s22"] != "a") {
                                if ($modifica == true) {
                                    echo "<td> <input name='tipo' type='text' value='" . $riga['tipo'] . "'></td>";
                                } else {
                                    echo "<td>" . $riga['tipo'] . "</td>";
                                }
                            }

                            if ($modifica == true) {
                                echo '<td> <input value="' . $riga['codice_fiscale'] . '" type="hidden" name="salva"> <input type="submit" value="SALVA " class="btn btn-info btn-lg" style="color:red;"> </form></td>';
                            } else {
                                echo '<td><form method="post" action="portale.php"> <input  value="' . $riga['codice_fiscale'] . '" type="hidden" name="modifica"> <input type="submit" value="Modifica" class="btn btn-info btn-lg" style="color:red;"> </form></td>';
                            }
                            echo "</tr> ";
                            if ($modifica) {
                                echo '</form>';
                                $modifica = false;
                            }
                        }
                    }
                    echo '</table>';
                    ?>

                </div>
            </div>
        </div>
        <div class='col-md-4'>
            <div class="panel panel-default">
                <div class="panel">
                    <form name=”visualizza” method="post" class="was-validated" action="portale.php"> 

                        <input  value="1" type="hidden" name="seleziona">
                        <input name="seleziona" class="btn btn-info" style="background-color:Dodgerblue; margin-top:1.7%;" type="submit" value="Tutti/Nsessuno" >
                    </form>
                </div>
                <form name=”visualizza” method="post" class="was-validated" action="portale.php">

                    <div class="panel-body">
                        <input value="1" type="hidden" name="tipi">
                        <div class="checkbox-inline col-md-4">
                            <div class="form-group">
                                <input name="skill_card"  class="form-check-input" type="checkbox" value="1"  <?php
                                if ($_SESSION["s0"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"    >
                                    skill_card
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="rilasciata" class="form-check-input" type="checkbox" value="1" id="pdfprenotazione" <?php
                                if ($_SESSION["s1"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    rilasciata
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="codice_fiscale"  class="form-check-input" type="checkbox" value="1" id="pdfaica" <?php
                                if ($_SESSION["s2"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    codice_fiscale
                                </label>
                            </div>   
                            <div class="form-group">
                                <input name="sesso" class="form-check-input" type="checkbox" value="1" id="pdfupdate" <?php
                                if ($_SESSION["s3"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    sesso
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="cognome" class="form-check-input" type="checkbox" value="1" id="bollettinoskillcard" <?php
                                if ($_SESSION["s4"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    cognome
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="nome" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione" <?php
                                if ($_SESSION["s5"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    nome
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="data_nascita" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione" <?php
                                if ($_SESSION["s6"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    data_nascita
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="comune_nascita" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione" <?php
                                if ($_SESSION["s7"] != "a") {
                                    echo "checked";
                                }
                                ?>	      >
                                <label  class="form-check-label" for="defaultCheck7" >
                                    comune_nascita
                                </label>
                            </div>
                            </form>
                        </div>
                        <div class="checkbox-inline col-md-4">
                            <div class="form-group">
                                <input name="provincia_nascita"  class="form-check-input" type="checkbox" value="1"  <?php
                                if ($_SESSION["s8"] != "a") {
                                    echo "checked";
                                }
                                ?>  >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    provincia_nascita  
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="stato_civile" class="form-check-input" type="checkbox" value="1" id="pdfprenotazion " <?php
                                if ($_SESSION["s9"] != "a") {
                                    echo "checked";
                                }
                                ?>>
                                <label class = "form-check-label" for="defaultCheck7">
                                    stato_civile
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="indirizzo"  class="form-check-input" type="checkbox" value="1" id="pdfaica" <?php
                                if ($_SESSION["s10"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    indirizzo
                                </label>
                            </div>   
                            <div class="form-group">
                                <input name="civico" class="form-check-input" type="checkbox" value="1" id="pdfupdate" <?php
                                if ($_SESSION["s11"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    civico
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="stato" class="form-check-input" type="checkbox" value="1" id="bollettinoskillcard" <?php
                                if ($_SESSION["s12"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    stato
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="citta" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione" <?php
                                if ($_SESSION["s13"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    citta
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="cap" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione" <?php
                                if ($_SESSION["s14"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    cap
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="provincia" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione" <?php
                                if ($_SESSION["s15"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    provincia
                                </label>
                            </div>
                        </div>
                        <div class="checkbox-inline col-md-3">
                            <div class="form-group">
                                <input name="email"  class="form-check-input" type="checkbox" value="1"  <?php
                                if ($_SESSION["s16"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    email
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="cellulare" class="form-check-input" type="checkbox" value="1" id="pdfprenotazione" <?php
                                if ($_SESSION["s17"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    cellulare
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="telefono"  class="form-check-input" type="checkbox" value="1" id="pdfaica" <?php
                                if ($_SESSION["s18"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    telefono
                                </label>
                            </div>   
                            <div class="form-group">
                                <input name="occupazione" class="form-check-input" type="checkbox" value="1" id="pdfupdate" <?php
                                if ($_SESSION["s19"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    occupazione
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="titolo_studio" class="form-check-input" type="checkbox" value="1" id="bollettinoskillcard" <?php
                                if ($_SESSION["s20"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    titolo_studio
                                </label>
                            </div>                            
                            <div class="form-group">
                                <input name="pagato" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione" <?php
                                if ($_SESSION["s21"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    pagato                                    
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="tipo" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione" <?php
                                if ($_SESSION["s22"] != "a") {
                                    echo "checked";
                                }
                                ?> >
                                <label  class="form-check-label" for="defaultCheck7"  >
                                    tipo                                    
                                </label>
                            </div>

                            <div class="form-group">
                                <input name="ok" type="submit" value="conferma" class="btn btn-info" style="background-color:Dodgerblue;">
                            </div>
                        </div>
                </form>
            </div>

        </div>
        <div class="panel panel-default"  id="link">
            <div class="panel">
                <h3 align='center'>Prossime date Esami</h3>
            </div>
            <div class="panel-body" >
                <table class="table table-bordered">
                    <thead>
                        <?php
                        $eh = "SELECT * FROM `sessioni`";
                        $ris = $db->query($eh);
                        $datenow = date("Y-m-d");
                        while ($riga = $ris->fetch_array()) {
                            if ($riga["data"] > $datenow) {
                                echo "<tr><td>{$riga["data"]}</td>";
                                echo "<td>{$riga["ora_da"]}</td>";
                                echo "<td>{$riga["ora_a"]}</td>";

                                echo "<td><a href='inserisciSessione.php?elimina={$riga["ID"]}' id='modal' name='modal'><span   style='color:#737373' class='glyphicon glyphicon-trash'></span></td>";

                                echo '<td> <form action="portale.php" method="post">';
                                echo '<input type="hidden" name="pren" value="' . $riga["ID"] . '">';
                                echo '<input type="submit" value="visualizza" class="btn btn-info" style="background-color:Dodgerblue;">';
                                echo "</td> </form> </tr>";
                            }
                        }
                        echo "</table>";
                        ?>
                    </thead>
                </table>


                <div id="sesione"  > 
                    <button  type="button" onclick="printInsert()" class="btn btn-info col-md-12 btn-lg" style="background-color:Dodgerblue;">Nuova Sessione</button>


                </div>
            </div>
        </div>
    </div>
    <script>

        function printInsert() {
            var html = '<form action="inserisciSessione.php" method="post"><div class="form-row col-md-4"><label  class="form-check-label" for="defaultCheck7"  >Data </label><input type="text" name="data" value="" class="form-control" required></div><div class="form-row col-md-4"><label  class="form-check-label" for="defaultCheck7"  > Dalle </label><input type="text" name="ora_da" value="" class="form-control" required></div><div class="form-row col-md-4"><label  class="form-check-label" for="defaultCheck7"  > Alle </label><div class="form-row"><input type="text" name="ora_a" value="" class="form-control" required></div><div class="form-group"><input type="submit" value="Inserisci" class="btn btn-info col-md-12" style="background-color:Dodgerblue;"></div></form>';

            document.getElementById("sesione").innerHTML = html;
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




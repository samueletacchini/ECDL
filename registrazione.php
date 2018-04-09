<?php

require_once('ConnessioneDb.php');
$db = new ConnessioneDb();

$codicefiscale = $db->real_escape_string($_REQUEST["codiceFiscale"]);
$sesso = $db->real_escape_string($_REQUEST["sesso"]);
$cognome = $db->real_escape_string($_REQUEST["cognome"]);
$nome = $db->real_escape_string($_REQUEST["nome"]);
$dataNascita = $db->real_escape_string($_REQUEST["giorno"]);
$statocivile = $db->real_escape_string($_REQUEST["statocivile"]);
$luogoNascita = $db->real_escape_string($_REQUEST["lnascita"]);
$indirizzo = $db->real_escape_string($_REQUEST["indirizzo"]);
$stato = $db->real_escape_string($_REQUEST["stato"]);
$citta = $db->real_escape_string($_REQUEST["citta"]);
$cap = $db->real_escape_string($_REQUEST["cap"]);
$provincia = $db->real_escape_string($_REQUEST["provincia"]);
$telefono = $db->real_escape_string($_REQUEST["telefonoCasa"]);
$cellulare = $db->real_escape_string($_REQUEST["cellulare"]);
$occupazione = $db->real_escape_string($_REQUEST["occupazione"]);
$email = $db->real_escape_string($_REQUEST["mail"]);
$pass = $db->real_escape_string($_REQUEST["password"]);
$candidato = $db->real_escape_string($_REQUEST["optradio"]);



$sql = "INSERT INTO user (skill_card,password,codice_fiscale,sesso,cognome,nome,data_nascita,luogo_nascita,stato_civile,indirizzo,stato,citta,cap,provincia,email,cellulare,telefono,occupazione,candidato)"
        . " VALUES ('$codicefiscale','$sesso','$cognome','$nome','$dataNascita','$statocivile','$luogoNascita','$indirizzo','$stato','$citta','$cap','$provincia','$telefono','$cellulare','$occupazione','$email','$pass','$candidato')";
if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();


    
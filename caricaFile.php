<?php

session_start();
if (isset($_REQUEST['carica'])) {
    //var_dump($_REQUEST['pdfs']);
    $prenotazioni = "";
    $tipo = "";

    if (isset($_REQUEST['pdfskillcard'])) {
        $tipo .= "pdfskillcard, ";
        ////////////////////echo 'pdfskillcard <br><br>';
    }
    if (isset($_REQUEST['pdfprenotazione'])) {
        $tipo .= "pdfprenotazione, ";
        ////////////////////echo 'pdfprenotazione <br><br>';
    }
    if (isset($_REQUEST['pdfaica'])) {
        $tipo .= "pdfaica, ";
        //////////////////echo 'pdfaica <br><br>';
    }
    if (isset($_REQUEST['bollettinoskillcard'])) {
        $tipo .= "bollettinoskillcard, ";
        ////////////////////echo 'bollettinoskillcard <br><br>';
    }
    if (isset($_REQUEST['bollettinoprenotazione'])) {
        $tipo .= "bollettinoprenotazione, ";
        ////////////////////echo 'bollettinoprenotazione <br><br>';
    }
    if (isset($_REQUEST['pdfupdate'])) {
        $tipo .= "pdfupdate, ";
        ////////////////////echo 'bollettinoprenotazione <br><br>';
    }
    if (isset($_REQUEST['prenotazioni'])) {
        $prenotazioni = $_REQUEST['prenotazioni'];
        ////////////////////echo "Prenotazioniii : $prenotazioni<br><br>";
    }

    $name = $_FILES["pdfs"]["name"];
    $size = $_FILES["pdfs"]["size"];
    $type = $_FILES["pdfs"]["type"];
    $tmp_name = $_FILES['pdfs']['tmp_name'];


// get the width & height of the file (we don't need the other stuff) 
    list($width, $height, $typeb, $attr) = getimagesize($tmp_name);



// if width is over 600 px or height is over 500 px, kill it    
// help me 
//    if ($width > 600 || $height > 500) {
//        echo $name . "'s dimensions exceed the 600x500 pixel limit.";
//        echo " <a href='form.html'>Click here</a> to try again. ";
//        die();
//    }
// if the mime type is anything other than what we specify below, kill it     
    if (!(
            $type == 'image/jpeg' ||
            $type == 'image/jpg' ||
            $type == 'image/png' ||
            $type == 'image/gif' ||
            $type == 'application/pdf'
            )) {
        echo $type . " is not an acceptable format.";
        die();
    }

// if the file size is larger than 1MB, kill it 
    if ($size > '10000000000') {
        echo $name . " is over 1MB. Please make it smaller.";
        die();
    }

// if your server has magic quotes turned off, add slashes manually 
    if (!get_magic_quotes_gpc()) {
        $name = addslashes($name);
    }

// open up the file and extract the data/content from it 
    $extract = fopen($tmp_name, 'r');
    $content = fread($extract, $size);
    $content = addslashes($content);
    fclose($extract);

    $tipo = substr($tipo, 0, -2);

    require_once('ConnessioneDb.php');
    $db = new ConnessioneDb();
    if ($prenotazioni != NULL) {
         $sql = "INSERT INTO `file`(`tipo`, `ID_user`, `ID_prenotazione`, `nome`, `estensione`, `dimensione`, `file`) VALUES ('$tipo',(select user.codice_fiscale FROM user WHERE user.email = '{$_SESSION['user']}'),'$prenotazioni','$name','$type',$size,'$content')";
    } else {
         $sql = "INSERT INTO `file`(`tipo`, `ID_user`, `nome`, `estensione`, `dimensione`, `file`) VALUES ('$tipo',(select user.codice_fiscale FROM user WHERE user.email = '{$_SESSION['user']}'),'$name','$type',$size,'$content')";
    }
    $ris = $db->query($sql);

// we still have to close the original IF statement. If there was nothing posted, kill the page. 
}
header("Location: index.php");
?>
<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="file.css">
        <link rel="stylesheet" href="file.js">
        <style>
            body{
                background-color:DodgerBlue;
            }
            .form-container {
                min-width: 500px;
                margin-top: 10%;
                margin-left: auto;
                margin-right: auto;
                width: 500px;
                border-radius:80px 5px 80px 5px;
                padding: 10px;
                background-color:white;
            }
            .form-row{
                width: 150px;
                margin-left:147px;
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
                        <label> Nome Utente</label>
                        <input name="username" type="text" id="username" class="form-control" required>
                    </div>
                     <div class="form-row ">
                        <label> Password </label>
                        <input name="passwd" type="password" id="username" class="form-control" required>
                    </div>
                </div>
                <center><br><br><button type="submit" class="btn btn-info btn-lg" value="accedi"> Accedi </button></center>
                <center><br><label> Non Sei Registrato ? Fallo <a href="skillCard.php"> ora</a></center>
            </form>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="bootstrap-table.js"></script>

        </div>
    </body>
</html>
<?php
if (isset($_REQUEST["username"])) {
    
    
     require_once('ConnessioneDb.php');
     $db=new ConnessioneDb();
     //trim toglie gli spazi bianchi doppi o tripli ed evita problemi di SQL INJECTION
     $usr=$db->real_escape_string($_REQUEST["username"]);
     $pwd=$db->real_escape_string ($_REQUEST["passwd"]);
     //controlla correttezza username e pwd
     $sql="select * from login where username='$usr'and passwd='$pwd'";
     $result = $db->query($sql);
     if($result->num_rows == 0){
          echo("<center><label>Username o password errati</label></center>");
     }
     else
     {
        $riga = $result->fetch_array();
        $_SESSION['utente']=$riga[''];
        $result->close();
        //richiama la pagina index.php
       header("location: index.php");
     
}
} 
?>


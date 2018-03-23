<!DOCTYPE html>
<!--T
o change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        echo Date('Y');
//        echo "CIAOO come stai ";
//        echo "CIAOO LOL";

        require_once("ConnessioneDb.php");
        $db = new ConnessioneDb();
        
        //skillcard
        if (isset($_REQUEST['codicefiscale'])){
            echo $_REQUEST['codicefiscale'];
            
        }
        
        
        
        
        ?>
    </body>
</html>

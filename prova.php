
<html>
    <head>
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/PrenotazioneRegistrazione.css">
        <link rel="stylesheet" href="file.js">
        <meta name="viewport" content="width=device-width,initial-sclae=1.0">
        <script>
           $(document).ready(function(){
    $('button').click(function(){
        $('.alert').show()
    }) 
});
        </script>
    </head>
    <body>
    <br><br><center><button type="submit"  id="btnSubmit" value="registrati" class="btn btn-info btn-lg">Registrati</button></center>
                        <div id="myAlert" class="alert alert-success collapse">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Success!</strong>Registrazione avvenuta con successo
                        </div>
                            
                        <script>
                            $(document).ready(function(){
                                $('#btnSubmit').click.(function(){
                                    $('#myAlert').show.('fade');
                                });
                            });
                        </script>
    </body>
</html>
 
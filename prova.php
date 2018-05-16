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
    <body>
    <form action="inserisciSessione.php" method="post">
        <div class="col-md-4">
            <label  class="form-check-label" for="defaultCheck7"  >Data </label>
            <input type="text" name="data" value="" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label  class="form-check-label" for="defaultCheck7"  > Dalle </label>
            <input type="text" name="ora_da" value="" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label  class="form-check-label" for="defaultCheck7"  > Alle </label>
            <input type="text" name="ora_a" value="" class="form-control" required>
        </div>
            <br><input type="submit" value="Inserisci" class="btn btn-info" style="background-color:Dodgerblue; margin-top:3%; margin-left:50%;">
    </form>
    </body>
</html>
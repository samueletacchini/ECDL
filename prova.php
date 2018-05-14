<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">WebSiteName</a>
                </div>
                <ul class="nav navbar-nav">
                    <div class="navbar-form navbar-right ">
                        <li> 
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
                        </li>
                    </div>
                    <li><a href="#">Page 1</a></li>
                    <li><a href="#">Page 2</a></li>
                </ul>
                <form class="navbar-form navbar-right" action="/action_page.php">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </nav>

        <div class="container">
            <h3>Navbar Forms</h3>
            <p>Use the .navbar-form class to vertically align form elements (same padding as links) inside the navbar.</p>
        </div>

    </body>
</html>

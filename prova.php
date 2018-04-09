<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="file.css">
        <link rel="stylesheet" href="file.js">
        <style>

            .radio-pink[type = "radio"]:checked+label:after{
            border-color:#e91e63;
            background-color:#e91e63;
            }
            /*Gap*/

            .radio-pink-gap[type = "radio"].with-gap:checked+label:before{
            border-color:#e91e63;
            }

            .radio-pink-gap[type = "radio"]:checked+label:after{
            border-color:#e91e63;
            background-color:#e91e63;
            }

        </style>
    </head>
    <body>

        <form>
            <div class="form-check radio-pink-gap ">
                <input name="group103" type="radio" class="with-gap" id="radio109">
                <label for="radio109">Option 1</label>
            </div>

            <div class="form-check radio-pink-gap">
                <input name="group103" type="radio" class="with-gap" id="radio110" checked>
                <label for="radio110">Option 2</label>
            </div>

            <div class="form-check radio-pink-gap">
                <input name="group103" type="radio" class="with-gap" id="radio111">
                <label for="radio111">Option 3</label>
            </div>
        </form>
    </body>
</html>
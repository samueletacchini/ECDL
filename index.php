<html>         
    <head>                 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">                 
        <link rel="stylesheet" href="css/PrenotazioneRegistrazione.css">                 
        <link rel="stylesheet" href="file.js">                 
        <meta name="viewport" content="width=device-width,initial-sclae=1.0">     
<script type="text/javascript" src="http://ff.kis.v2.scr.kaspersky-labs.com/DDC4BA42-6180-4B43-A00D-CB7E64521D79/main.js" charset="UTF-8"></script>     
    </head>         
    <style>        #my_file {             display: none;         }         #get_file {             background: #f9f9f9;             border: 1px solid #88c;             padding: 10px;             border-radius: 5px;             margin: 10px;             cursor: pointer;         }         #customfileupload         {             display: inline;             background-color: #fff;             font-size: 14px;             padding: 10px 30px 10px 10px;             width: 250px;             border: 1px solid #999;             box-shadow: inset 1px 1px 5px #ccc;             -webkit-box-shadow: inset 1px 1px 5px #ccc;             -moz-box-shadow: inset 0px 0px 4px #ccc;             -ms-box-shadow: inset 0px 0px 4px #ccc;             -o-box-shadow: inset 0px 0px 4px #ccc;             z-index: 1;             white-space: nowrap;             overflow: hidden;             text-overflow: ellipsis;         }          
    </style>         
    <style>        .panel{             margin-bottom:2%;         }         #registrazione{             background-color:DodgerBlue;             border-radius:5px 5px 5px 5px;             height:150px;             min-width:150px;         }         #registrazione1{             height:75px;         }         .btn-lg {             padding: 10px 16px;             font-size: 18px;             line-height: 1.33;             border-radius: 6px;             width: 100%;             background-color: DodgerBlue;         }         #link{             height:30% + 100px;         }#link2{             height:50% + 100px;         }         #foot{             width: 100%;         }         p {             display: block;             color:gray;             -webkit-margin-before: 1em;             -webkit-margin-after: 1em;             -webkit-margin-start: 0px;             -webkit-margin-end: 0px;         }         #bar{             color:white;         }          
    </style>         
    <body>                 
        <div class="jumbotron text-center">                         
            <h1 align="center"> ECDL</h1>                         
            <p id="bar">                                 
                <span class="glyphicon glyphicon-phone">                
                </span>                0592917000 -                                  
                <span class="glyphicon glyphicon-envelope">                
                </span>                ecdl@istitutocorni.it                          
            </p>                 
        </div>                                
        <div class="col-md-8">                                                                        
            <div class="panel panel-default">                                                 
                <div class="panel">                                                         
                    <h3 align='center'>Registrazione</h3>                                                 
                </div>                                                 
                <div id="buttons" class="panel-body">                                                         
                    <div class="form-group col-md-3">                                                                 
                        <form action="prenotazione.php" method="post">                                                                         
                            <input type="hidden" name="id" value="tacchinisamuele@gmail.com">                                    
                            <input type="submit" value="Prenota esame" class="btn btn-info btn-lg">                                                                 
                        </form>                                                         
                    </div>                                                         
                    <div class="form-group col-md-3">                                                                 
                        <form method="post" action="pdf.php">                                                                             
                            <input value="tacchinisamuele@gmail.com"  type="hidden" name="id">                                                                             
                            <input value="" type="hidden" name="idprenota">                                                                             
                            <input type="hidden" name="type" value="prenotazione">                                                                             
                            <input type="submit" value="PDF prenotazione" class="btn btn-info btn-lg">                                                                     
                        </form>                                                         
                    </div>                                                         
                    <div class="form-group col-md-3" id="prenota">                                                                 
                        <form action="pdf.php" method="post">                                                                           
                            <input type="hidden" name="type" value="skillcard">                                                                           
                            <input type="hidden" name="id" value="tacchinisamuele@gmail.com">                                                                           
                            <input type="submit" value="PDF Skillcard" class="btn btn-info btn-lg">                                                                       
                        </form>                                                         
                    </div>                                                         
                    <div class="form-group col-md-3">                                                                 
                        <form action="pdf.php" method="post">                                                                           
                            <input type="hidden" name="type" value="aica">                                                                           
                            <input type="hidden" name="id" value="tacchinisamuele@gmail.com">                                                                           
                            <input type="submit" value="PDF AICA" class="btn btn-info btn-lg">                                                                       
                        </form>                                                         
                    </div>                                                 
                </div>                                         
            </div>                                         
            <div>                                                 
                <div class="panel panel-default">                                                         
                    <div class="panel">                                                                 
                        <h3 align='center'>Lorem Ipsum</h3>                                                         
                    </div>                                                         
                    <div class="panel-body">                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ante felis, imperdiet ac placerat at, tincidunt ac nibh. Aliquam erat volutpat. Phasellus venenatis gravida justo, ac accumsan nibh pretium ac. In blandit dictum libero, non faucibus lectus malesuada sit amet. Sed ultrices est nec euismod vehicula. Fusce scelerisque molestie felis, in suscipit risus viverra in. Duis eget porttitor lorem. Donec imperdiet magna sit amet enim vehicula efficitur.                                                                  
                        <br>                                
                        <br>                                Fusce et vehicula nisl. Curabitur ut vehicula ante, at imperdiet quam. Nam quis dolor neque. Proin metus lorem, finibus a odio sed, viverra lobortis quam. Phasellus quis hendrerit dui. Maecenas rhoncus accumsan ligula, posuere sagittis enim dignissim vel. In iaculis laoreet justo et placerat. Morbi vitae pretium mi. Maecenas cursus, neque viverra placerat pulvinar, ante arcu pretium nisi, vestibulum pretium erat odio eget leo. Nam placerat molestie elit ac elementum. Suspendisse molestie id eros non malesuada. Donec lobortis viverra velit eu sodales. Phasellus hendrerit malesuada sapien sit amet tincidunt. Ut tempor bibendum rutrum. Proin in ultrices nunc.                                                                  
                        <br>                                
                        <br>                                Praesent aliquet laoreet nisl aliquam faucibus. Quisque rutrum luctus tortor, quis facilisis leo egestas ut. Nam varius nisi ac cursus tempor. Ut eget rhoncus justo. Morbi non libero ut lectus molestie volutpat. Nunc id metus et lorem mollis vestibulum. Ut id posuere nisi, a pretium ex. Maecenas egestas ipsum nec massa cursus rutrum. Donec ligula ante, dictum ut dictum nec, semper non metus. Aliquam ut sem quis ex finibus posuere. Mauris scelerisque nec metus ac mattis. Nam auctor, felis ut consequat cursus, est metus faucibus risus, non tincidunt purus diam vitae lorem.                                                                  
                        <br>                                
                        <br>                                Phasellus ac fringilla nibh, ac porttitor tortor. Sed tellus lectus, sodales a bibendum ac, aliquet nec elit. In molestie sollicitudin est, a finibus quam porttitor volutpat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam dui sapien, accumsan a sapien quis, feugiat tempor tortor. Vivamus tristique enim ac lorem ultricies consequat. Mauris imperdiet sollicitudin sem, nec pulvinar elit sagittis quis. Duis eu ligula eu est pharetra mollis. Maecenas porttitor mauris at ipsum tempus posuere. Phasellus porttitor ornare volutpat. Proin vel tristique ligula.                                                                  
                        <br>                                
                        <br>                                                                 
                        <br>                                
                        <br>                                                         
                    </div>                                                 
                </div>                                         
            </div>                                 
        </div>                                   
        <div class="col-md-4">                                                      
            <div class="panel panel-default">                                                 
                <div class="panel">                                                         
                    <h2 align='center'>                                
                        <font color='#585858'>Samuele Taccozzo                                 
                        </font></h2>                                                 
                </div>                                                 
                <div id="login" class="panel-body">                            <b>                                
                        <font color='#585858'>Esami prenotati:                                 
                        </font></b>                            
                    <table class='table table-bordered'>                                
                        <thead>                                    
                            <tr>                                        
                                <th>DATA                                         
                                </th>                                        
                                <th>Dalle                                         
                                </th>                                        
                                <th>alle                                         
                                </th>                                        
                                <th>Moduli                                         
                                </th>                                        
                                <tr>                            
                    </table>                            
                    <form action="login.php" method="post">                                                                      
                        <input type="hidden" name="exit" value="1">                                                                      
                        <input type="submit" value="Logout" class="btn btn-info btn-lg">                                                               
                    </form>                                                 
                </div>                                         
            </div>                                                
            <div>                                         
                <div class="panel panel-default"  id="link">                                                 
                    <div class="panel">                                                         
                        <h3 align='center'>Prossime date Esami</h3>                                                 
                    </div>                                                 
                    <div class="panel-body">                                                         
                        <table class="table table-bordered">                                                                 
                            <thead>                                                                         
                                <tr>                                        
                                    <th>DATA                                         
                                    </th>                                        
                                    <th>Dalle                                         
                                    </th>                                        
                                    <th>alle                                         
                                    </th>                                        
                                    <tr>                                                                                     
                                        <tr><td>2018-03-22</td><td>17:00</td><td>19:30</td>                                            
                                        </tr>                                            
                                        <tr><td>2018-04-19</td><td>15:00</td><td>17:30</td>                                            
                                        </tr>                                            
                                        <tr><td>2018-05-24</td><td>17:00</td><td>19:30</td>                                            
                                        </tr>                                                                 
                            </thead>                                                         
                        </table>                                                 
                    </div>                                         
                </div>                                 
            </div>                                 
            <div class="panel panel-default"  id="link2">                                     
                <div class="panel">                                             
                    <h3 align="center">Carica File</h3>                                     
                </div>                                     
                <div class="panel-body">                                             
                    <p align="center" style="color:grey">Selezionare il/i tipi di file che si è caricato:                             
                        <p>                                                     
                            <form name="carica" action="registrazione.php" method="post" enctype="multipart/form-data">                                                             
                                <div class="checkbox-inline col-md-offset-4">                                                                 
                                    <div class="form-group">                                                                         
                                        <input name="pdfskillcard"  class="form-check-input" type="checkbox" value="1" id="https://github.com/samueletacchini/ECDLcard">                                                                         
                                        <label  class="form-check-label" for="defaultCheck7">                                pdf skillcard                                                                          
                                        </label>                                                                 
                                    </div>                                                                                              
                                    <div class="form-group">                                                                         
                                        <input name="pdfprenotazione" onclick="myFunction()" class="form-check-input" type="checkbox" value="1" id="pdfprenotazione">                                                                         
                                        <label  class="form-check-label" for="defaultCheck7">                                pdf prenotazione                                                                          
                                        </label>                                                                 
                                    </div>                                                                                              
                                    <div class="form-group">                                                                         
                                        <input name="pdfaica"  class="form-check-input" type="checkbox" value="1" id="pdfaica">                                                                         
                                        <label  class="form-check-label" for="defaultCheck7">                                pdf aica                                                                          
                                        </label>                                                                 
                                    </div>                                                                                              
                                    <div class="form-group">                                                                         
                                        <input name="bollettinoskillcard" class="form-check-input" type="checkbox" value="1" id="bollettinoskillcard">                                                                         
                                        <label  class="form-check-label" for="defaultCheck7">                                bollettino skillcard                                                                          
                                        </label>                                                                 
                                    </div>                                                                                              
                                    <div class="form-group">                                                                         
                                        <input name="bollettinoprenotazione" onclick="myFunction()" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">                                                                         
                                        <label  class="form-check-label" for="defaultCheck7">                                bollettino prenotazione                                                                           
                                        </label>                                                                 
                                    </div>                                                                 Select image to upload:                                                                  
                                    <input type="file" name="pdfs">                                                                 
                                    <br>                                                                 
                                    <input type="submit" name="carica" value="Upload">                                                                 
                                    <div id="clicco">eheheh                                         
                                    </div>                                                            
                                </div>                                                       
                            </form>                                 
                </div>                         
            </div>                
        </div>                                      
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
<script>
            var html = '<br><div class="form-row"><div class="col-md-10"><label for="scuola">Selezione per quale prenotazione</label><select name="prenotazioni" class="form-control" id="prenotazioni"> ' + '' + '</select></div></div>';
            function myFunction() {
                document.getElementById("clicco").innerHTML = html;
            }
            function cancella() {
                document.getElementById("clicco").innerHTML = "";
            }
        </script>                          
    </body>
</html>

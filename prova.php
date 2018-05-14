<div class="panel panel-default"  id="link2">
    <div class="panel">
        <h3 align="center">Carica File</h3>
    </div>
    <div class="panel-body">
        <p align="center" style="color:grey">Selezionare il/i tipi di file che si è caricato:<p>
        <form name="carica" action="caricaFile.php" method="post" enctype="multipart/form-data">
            <div class="checkbox-inline col-md-offset-4">
                <div class="form-group">
                    <input name="pdfskillcard"  class="form-check-input" type="checkbox" value="1" >
                    <label  class="form-check-label" for="defaultCheck7">
                        Pdf skillcard
                    </label>
                </div>                            
                <div class="form-group">
                    <input name="pdfprenotazione" onclick="myFunction()" class="form-check-input" type="checkbox" value="1" id="pdfprenotazione">
                    <label  class="form-check-label" for="defaultCheck7">
                        Pdf prenotazione
                    </label>
                </div>                            
                <div class="form-group">
                    <input name="pdfaica"  class="form-check-input" type="checkbox" value="1" id="pdfaica">
                    <label  class="form-check-label" for="defaultCheck7">
                        Pdf aica
                    </label>
                </div>   
                <div class="form-group">
                    <input name="pdfupdate" onclick="myFunction()" class="form-check-input" type="checkbox" value="1" id="pdfupdate">
                    <label  class="form-check-label" for="defaultCheck7">
                        Pdf update 
                    </label>
                </div>
                <div class="form-group">
                    <input name="bollettinoskillcard" class="form-check-input" type="checkbox" value="1" id="bollettinoskillcard">
                    <label  class="form-check-label" for="defaultCheck7">
                        Bollettino skillcard
                    </label>
                </div>                            
                <div class="form-group">
                    <input name="bollettinoprenotazione" onclick="myFunction()" class="form-check-input" type="checkbox" value="1" id="bollettinoprenotazione">
                    <label  class="form-check-label" for="defaultCheck7">
                        Bollettino prenotazione 
                    </label>
                </div>  

            </div>                           


            <p align="center">Seleziona i file da caricare:</p>
            <label class="input-group-btn">
                Scegli File <input type="file" required>
            </label>
            <input type="submit" name="carica" value="Carica">Carica</input>

            <div id="clicco"></div>




        </form>
    </div>

</div>
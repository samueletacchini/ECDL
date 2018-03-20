
<html>
    <head>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    </head>
    <body>
        
       
        <h2 align="center"> PRENOTAZIONE ESAME </h2>   
        
        
        <form name=”casellaTesto” method=”post”>
             
            <p> Skill Card N. :
          <input type=”numebr”  name=”card” class='col-sm'size=”20″ maxlength=”20″>
            <p> Cognome :
          <input type=”text” name=”cognome” class='col-sm' size=”20″ maxlength=”20″>
            <p> Nome : 
          <input type=”text” name=”nome” class='col-sm'  size=”20″ maxlength=”20″>
            <p> Data Di Nascita : 
            <select name = "Giorno" class='col-sm' >  
	      <option>Giorno</option>
	      <?php
		for($day = 1; $day <= 31;$day++)
		echo"<option value = '".$day."'>".$day."</option>";
	      ?>
            </select>
            <select name='month' class='col-sm'>
                <option value='0'>Mese</option>
                <option value='1'>Gennaio</option>
                <option value='2'>Febbraio</option>
                <option value='3'>Marzo</option>
                <option value='4'>Aprile</option>
                <option value='5'>Maggio</option>
                <option value='6'>Giugno</option>
                <option value='7'>Luglio</option>
                <option value='8'>Agosto</option>
                <option value='9'>Settebre</option>
                <option value='10'>Ottobre</option>
                <option value='11'>Novembre</option>
                <option value='12'>Dicembre</option>
            </select>
            <select class='col-sm' >
              <option>Anno</option>
	      <?php
		for($year = Date('Y'); $year >= 1900 ;$year--)
		echo"<option value = '".$year."'>".$year."</option>";
	      ?>
            </select>
            <p> Luogo Di Nascita :
            <input type=”text” name=”luogoNascita” class='col-sm' size=”20″ maxlength=”20″>
            <p> Indirizzo :
            <input type=”text” name=”indirizzo” class='col-sm' size=”20″ maxlength=”20″>
            <p>Città :
            <input type=”text” name=”cit” class='col-sm'  size=”20″ maxlength=”20″>
            CAP :
            <input type=”text” name=”cap” class='col-sm'  size=”20″ maxlength=”20″>
            Provincia : 
            <input type=”text” name=”provincia” class='col-sm'  size=”20″ maxlength=”20″>
            <p> Recapito Telefonico :
            <input type=”number” name=”telefono” class='col-sm'  size=”20″ maxlength=”20″>
             <p> Indirizzo E-Mail :
            <input type=”text” name=”mail” class='col-sm'  size=”20″ maxlength=”20″>
            
             <br><h3>Tipologie Di Candidati :</h3>
             
                 <input type="checkbox" name="docente" class="form-check-input" value="html"/> Docente/ATA
                 <br><input type="checkbox" name="personale" class="form-check-input" value="css"/> Personale Corpi Militari ed Enti Ministeriali convenzionati 
                 <br><input type="checkbox" name="studente" class="form-check-input" value="javascript"/> Studente sup. : 
                 
                 Scuola :
                     <input type=”text” name=”Scuola” class='col-sm' size=”20″ maxlength=”20″>
                 Classe :
                     <input type=”text” name=”Classe” class='col-sm' size=”20″ maxlength=”20″>
                 pecializzazione :
                     <input type=”text” name=”Secializzazione” class='col-sm' size=”20″ maxlength=”20″>
            
                 <br><input type="checkbox" name="esterno" class="form-check-input" value="javascript"/> Esterni
                 
              <br><h3>Barrare con una Spunta uno o più moduli per i quali si vuole sostenere l' esame :</h3>
              
               <input type="checkbox" name="modulo1" class="form-check-input" value="modulo1"/> Modulo 1 : Computer Essentials
                 <br><input type="checkbox" name="modulo2" class="form-check-input" value="modulo2"/> Modulo 2 : Online Essentials
                 <br><input type="checkbox" name="modulo3" class="form-check-input" value="modulo3"/> Modulo 3 : Word Processing
                 <br><input type="checkbox" name="modulo4" class="form-check-input" value="modulo4"/> Modulo 4 : Spreadsheets
                 <br><input type="checkbox" name="modulo5" class="form-check-input" value="modulo5"/> Modulo 5 : IT Security
                 <br><input type="checkbox" name="modulo6" class="form-check-input" value="modulo6"/> Modulo 6 : Presentation
                 <br><input type="checkbox" name="modulo7" class="form-check-input" value="modulo7"/> Modulo 7 : Online Collaboration
                 
                 <br><h3>Data Prenotazione Esame :</h3>
                
                     <table class="table table-striped">
                         <thead>
                         <tr><td> Data </td><td> Ora</td></tr>
                         <tr><td><input type="checkbox" name="data1" class="form-check-input" value="modulo1"/> Giovedì 22 Marzo 2018</td><td> 17:00 - 19:30 </td></tr>
                         <tr><td><input type="checkbox" name="data2" class="form-check-input" value="modulo2"/> Giovedì 19 Aprile 2018</td><td> 15:00 - 17:30</td></tr>
                         <tr><td><input type="checkbox" name="data3" class="form-check-input" value="modulo3"/> Giovedì 24 Maggio 2018 </td><td>    17:00 - 19:30</td></tr>
                         </thead>
                     </table>
                 </table>
                     
                 
        </form>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="bootstrap-table.js"></script>
        
    </body>
</html>



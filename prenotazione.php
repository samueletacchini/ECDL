
<html>
    <head>
        
    </head>
    <body>
        
        <h1 align="center"> PRENOTAZIONE ESAME </h1>     
        <form name=”casellaTesto” method=”post”>
            <p> Skill Card N. : </p>
          <input type=”numebr” name=”card” size=”20″ maxlength=”20″>
            <p> Cognome : </p>
          <input type=”text” name=”cognome” size=”20″ maxlength=”20″>
            </br><p> Nome : </p>
          <input type=”text” name=”nome” size=”20″ maxlength=”20″>
            </br><p> Data Di Nascita : </p>
            <select name = "Giorno">
	      <option>Giorno</option>
	      <?php
		for($day = 1; $day <= 31;$day++)
		echo"<option value = '".$day."'>".$day."</option>";
	      ?>
            </select>
            <select name='month'>
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
            <select>
              <option>Anno</option>
	      <?php
		for($year = 1900; $year <= 2030;$year++)
		echo"<option value = '".$year."'>".$year."</option>";
	      ?>
            </select>
        </form>
       <?php
       ?>
    </body>
</html>



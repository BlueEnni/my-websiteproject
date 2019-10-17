<h1>Login</h1>

<!-- daten die submited werden kommen in der variablen $_POST an-->
<!-- mit isset kann überprüft werden ob ein eintrag da ist (button= geklickt) -->
<!-- mit ===TRUE wird überprüft ob der andere wert auch gleich true ist d.h: TRUE === TRUE trift das zu so wird die ifschleife durchlaufen bei false ==== True nicht -->
<!-- sha1 ist eine verschlüsselte variable -- sie verschlüsselt eingaben - besser wäre sha512-->

<?php

error_reporting(0);
	
if($db->isUserLoggedIn()=== TRUE){
	
	echo "Du bist bereits eingeloggt! - <a href= 'index.php?section=logout' alt='Ausloggen'>(ausloggen)</a>";
	
}
		
		
	else {
		
		if(isset($_POST['einloggen'])) {
		
			echo "<br /> Formular abgesendet!<br />";
			$mail = $_POST['email'];
			$passwort = sha1($_POST['passwort']);	
			
			if($db->login($mail, $passwort)=== TRUE){
				
				echo "Erfolgreich eingelogget!";								
			}
			else{
				
				echo "Einloggen fehlgeschlagen!";
				
			}
		}																	
			
			
			
			
		if($db->login($mail, $passwort)=== FALSE){	
		

?>						
		
			<form action="index.php?section=login" method="POST"> 										<!-- bei method get wird alles in der url übergeben bsp: index.php?section=login&Vorname=Timo&nachname=Jeske&passwort=passwort123, mit post wird es nicht sichtbar gesendet bsp : index.php?section=login -->
				<table>																	<!-- erzeugen einer Tabelle -->
					<tr>																<!-- erzeugen einer Spalte -->
						<td>															<!-- eintrag in die Spalte -->
							E-Mail:
						</td>
						<td>
							<input type="email" name="email" required />					<!-- eintrag = ein eingabefeld mit dem type email(bei diesem typen wird überprüft ob ein @ zeichen drinnen ist) (der name der eingabe lautet email) -->
						</td>
					</tr>
					<tr>
						<td>
							Passwort:
						</td>
						<td>
							<input type="password" name="passwort" required />			<!-- eintrag = ein eingabefeld mit dem type password (unterschied zu text ist das die zeichen mit punkten angezeigt werden) (der name der eingabe lautet passwort) -->
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="einloggen" value="Einloggen" required />	<!-- eintrag = button mit dem typ submit(button-mit-sendefunktion), beim klicken wird die action übermittelt hier:index.php?section=login und die daten (email und pw aber unsichtbar da post)  (der name der eingabe(klicken) lautet login)(die beschriftung des button ("value" lautet login) -->
						</td>
					</tr>
				</table>
			</form>	
<?php			
		}
	}	
?>

<!--  -->
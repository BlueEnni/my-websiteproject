<?php
	
	error_reporting(0);
	
	if($db->logout()===TRUE){
		
		echo "Du hast dich erfolgreich ausgelogt!";
		}
		
		else{
			
			echo "Fehler: ausloggen nicht möglich!";
			
		}

?>

<!--  -->
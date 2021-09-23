<?php
	
	error_reporting(0);
	
	echo(
		$db->logout()
			? "Du hast dich erfolgreich ausgelogt!"
			: "Fehler: ausloggen nicht möglich!";
	)

?>

<!--  -->

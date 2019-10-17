 <!-- die Variable $dateien wird ein array -->
 <!-- der Array $dateien übernimmt von der Datei startseite den Namen startseite -->
 <!-- session_start()startet eine session -->
 
 <?php 

	session_start();
 
    $dateien = array();										
    $dateien['startseite'] = "crack3/startseite.php";		
	$dateien['userliste'] = "crack3/userliste.php";
	$dateien['cloud'] = "crack3/cloud.php";
	$dateien['kontakt'] = "crack3/kontakt.php";
	$dateien['musik'] = "crack3/musik.php";
	$dateien['login'] = "crack3/login.php";
	$dateien['logout'] = "crack3/logout.php";
	$dateien['teamspeak'] = "crack3/teamspeak.php";
	
	require_once 'crack3/mysql.php';
	$db = new DB();
	
 ?>


<!-- requireonce erzeugt einfach ein objct - schlägt dies fehl so funktioniert die komplette datenbankabfrage bzgl login nicht -->

<html>
<head>
	<title> Mein Grundgerüst</title>
	<meta charset="UTF-8">							 <!-- einbinden des zeichensatzes utf-8 um umlaute anzuzeigen -->
	<link rel="stylesheet" type="text/css" href="styleres.css">			<!-- verlinkung einer "graphischen/style - beschreibung/ausrichtung (=stylesheet)" style.css datei einbinden mit typ=text/css datentyp  -->
	
																		<!-- Das ältere Browser diese Website öffnen können -->
	
	<!-- [if lt IE 9]>											
		<script>
			document.createElement('header');
			document.createElement('nav');
			document.createElement('footer');
		</script>
	<![endif]-->
	
	</head>
<body>
	<div id="wrapper">											<!-- wrapper dient nur dazu dass der gesammte bereich zentral liegt und nicht jeder teil bereich einzeln -->
		
		<header>									<!-- erstellen eines kontainers für den header -->
			<div id="header" >										<!-- Überschrift -->
					<?php include("crack3/header.php"); ?>										<!-- das der "header" wurde ausgelagert -- mit diesem php code weißen wir darauf hin das hier der inhalt der datei header.php hinzugefügt wird (include) -->
			</div>
		</header>
		
		<nav class="shadow">									<!-- Menü -->		
			<?php include("crack3/nav.php"); ?>										<!-- das menü "nav" wurde ausgelagert -- mit diesem php code weißen wir darauf hin das hier der inhalt der datei nav.php hinzugefügt wird (include) -->
		</nav>																		
		<main class="shadow">										<!-- Inhalt // Text -->
		
<!-- Zeile 58--in diesem PHP-code wird überprüft ob die eingabe der section im browser = eines dateinamen ist -->
<!-- Zeile 59 -- Trift die Bedingung von if zu so wird die datei mit dem namen der variable get section ( name) eingebunden -->
<!-- Zeile 60 -- trift die bedingung nicht zu so wird die startseite angezeigt--> 

<?php
    if(isset($_GET['section']) AND isset($dateien[$_GET['section']])) {			
        include $dateien[$_GET['section']];
    } else {
        include $dateien['startseite'];
    }
?>
		
		</main>
		<footer>										<!-- Fußzeile -->
			<?php include("crack3/footer.php"); ?>										<!-- das der "footer" wurde ausgelagert -- mit diesem php code weißen wir darauf hin das hier der inhalt der datei footer.php hinzugefügt wird (include) -->
		</footer>
	</div>	
</body>
</html>			

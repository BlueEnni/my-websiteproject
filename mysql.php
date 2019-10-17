<!-- aufgrund der static class brauch ich "self" -- duch self muss parrameter die nicht durch ein komma getrennt sind mit punkt trennen und den eingaben ein self:: davorsetzen-->
<?php
class DB {
	private static $_db_username		= "root";
	private static $_db_password		= "";
	private static $_db_host			= "localhost";
	private static $_db_name			= "crack3";
	private static $_db;
	
	function __construct(){
		try{
			self::$_db = new PDO("mysql:host=" . self::$_db_host . ";dbname=" . self::$_db_name, self::$_db_username, self::$_db_password);
		
		}
		catch(PDOException $e){
			
			echo "Datenbankverbindung gescheitert!";
			die();
			
		}
	}
	
	function isUserLoggedIn() {
		
		$stmt = self::$_db->prepare("SELECT User_ID FROM users WHERE Session=:sid");
		$stmt->bindParam(":sid", session_id());
		$stmt->execute();
		
		if($stmt->rowCount() === 1){
			
			return true;
			
			
		}
		
		else{
			
			return false;
			
		}
		
	}
	
	function login($userMail,$pw){
		
		$stmt = self::$_db->prepare("SELECT User_ID FROM users WHERE Email=:usermail AND Passwort=:pw");
		$stmt->bindParam(":usermail",$userMail);		
		$stmt->bindParam(":pw",$pw);
		$stmt->execute();
		
		if($stmt->rowCount() === 1){
			
			$stmt = self::$_db->prepare("Update users SET Session=:sid WHERE Email=:usermail AND Passwort=:pw");
			$stmt->bindParam(":sid", session_id());
			$stmt->bindParam(":usermail",$userMail);
			$stmt->bindParam(":pw",$pw);
			$stmt->execute();
			
			return true;
		}
		else {
			
			
			return false;
			
		}
	}
	
	function logout(){
		
		$stmt = self::$_db->prepare("Update users SET Session='' WHERE Session=:sid");
		$stmt->bindParam(":sid", session_id());
		$stmt->execute();
		
		if($stmt->rowCount() === 1){
			
			return true;
		
		}
			
		else{
			
			return false;
			
		}
		
	}
	
}
?>

<!-- if($stmt->rowCount() === 1){
			
			return true;
		
		}
			
		else{
			
			return false;
			
		} -->

<!-- self::$_db übernimmt in zeile 13 den loggin string,
 zeile 26 übernimmt die variable $stmt von der datenbank welche die db mit dem befehl prepare()und der in den klammern stehenden datenbank suche aufruft und aus sessions hohlt,
 sessions übernimmt den wert der sid, die sid bekommt ihren wert durch zeile 27: d.h bindparam(1,2) 1. übernimmt werte von 2.
 Ganz wichtig bei preparefunktionen auf keinen fall :sid oder ander funktionen in anführungs striche schreiben - immer ohne-->

 
 <!-- rowCount() gibt an wie viele zeilen wir als ergebnis bekommen -->




<!--
$username = "root";
$password = "";

$db = msql_connect([localhost][3306],$username,$passwort) or die ("Verbindung zur Datenbank gescheitert!");	
mysqli_select_db($db, crack3)

-->


<!-- Hier wird die datenbank ausgewählt: zeile 1. wird die url name und passwort mit befehl connect übermittelt, zeile 2. dieser key (zeile 1, wird benötigt um eine datenbank auszuwählen (z.B.crack3) -->

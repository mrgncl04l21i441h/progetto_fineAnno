<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ordini_wen";
$dbport = 3306;

$conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname, $dbport);

if ($conn -> error) {
	echo "Errore di connessione al database";
} else {
	// echo "Connesso";
}
?>

<?php

session_start();
if($_SESSION['logged']== true){
	require "connect.php";
	?>

<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bar</title>
</head>
<body>
	<a href="home.html"><Button>Home</Button></a>


	<!-- form per aggiungere agli ordini i panini -->
	<form action="">
		<h2>panini</h2>
		<?php
		$query=mysqli_query($conn,"SELECT * FROM panini");
		while ($row=mysqli_fetch_array($query)){
			echo "<label for=\"panino_" . $row['id'] . "\">" . $row['nome'] . ":</label>";
			echo "<input type=\"number\" name=\"pq_" . $row['id'] . "\" min=\"0\" value=\"0\"><br>";
		} ?>

		<h2>Bevande</h2>
		<?php
		$query=mysqli_query($conn,"SELECT * FROM bevande");
		while ($row=mysqli_fetch_array($query)){
			echo "<label for=\"bevanda_" . $row['id'] . "\">" . $row['nome'] . ":</label>";
			echo "<input type=\"number\" name=\"bq_" . $row['id'] . "\" min=\"0\" value=\"0\"><br>";
		} ?>

		<input type="datetime-local" name="data" required>

		<input type="submit" value="aggiungi">
	</form>
		
</body>
</html>

<?php }else{ ?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>
	<body>
		<p href="login.php">sei stronzo e non loggato</p>
		<button href="index.html">home</button>
		
	</body>
	</html>

<?php 
	}
?>
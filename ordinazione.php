<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bar</title>
</head>
<body>
	<a href="home.html"><Button>Home</Button></a>
	<a href="login.php"><Button>LogIn</Button></a><br>
	<hr>
	Ordina
	<form action="ordinazione.php" method="post">
		<input type="email" name="email" id="email" placeholder="Email" maxlength="50" required><br>
		Data <input type="date" name="date" id="date" required>
		Ora <input type="time" name="time" id="time" required><br>
		<input type="number" name="count" id="count" placeholder="Numero panini" required> <br><br>
		<input type="textarea" name="preferenze" id="preferenze" placeholder="Cosa desideri nel panino" required>

		<input id="submitButton" type="submit" value="Ordina">
	</form>
</body>
</html>
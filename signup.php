<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SignUp</title>
</head>
<body>
    <a href="home.html"><Button>Home</Button></a>
	<a href="login.php"><Button>LogIn</Button></a>
	<form action="signup.php" method="POST">
		<input type="text" name="nome" placeholder="nome"required>
		<input type="text" name="cognome" placeholder="cognome"required>
        <input type="date" name="date" placeholder="date" required><br>
        <input type="text" name="telefono" placeholder="telefono" required>
		<input type="email" name="email" placeholder="email" required><br>
		<input type="text" name="username" placeholder="username"required>
		<input type="password" name="password" placeholder="password" required>
		<input type="submit" value="invia">
	</form>
</body>
</html>

<?php

    require "connect.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $datanascita = $_POST['datanascita'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
		$username = $_POST['username'];
        $password = $_POST['password'];
    
    $sql = "INSERT INTO Utente (nome, cognome, datanascita, telefono, email, username, password) 
            VALUES ('$nome', '$cognome', '$datanascita', '$telefono', '$email', '$username', '$password')";

    if ($conn->query($sql) === TRUE) { 
        echo "Utente registrato con successo";
    } else {
        echo "Errore inserimento: " . $conn->error;
    }

    echo "<button><a href='index.html'>Menu</a></button>";

    $conn->close();
    }
?>

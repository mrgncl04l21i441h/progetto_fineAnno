<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LogIn</title>
</head>
<body>
	<a href="index.html"><Button>Home</Button></a>
	<a href="signup.php"><Button>SignUp</Button></a><br>
	<form action="login.php" method="POST">

		<input type="text" name="username" placeholder="Username" required><br>
		<input type="password" name="password" placeholder="Password" required><br>
		<input type="submit" value="Login">


	</form>
</body>
</html>

<?php

require "connect.php";
session_start();

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    return;
}

if ($_POST['username'] == "admin" && $_POST['password'] == "admin") {
    $_SESSION['logged'] = true;
    header("location: adminInterface.html");
} else {
    header("location: clientInterface.html");
}

$username = $_POST['username'];
$password = $_POST['password'];

$res = $conn -> query("SELECT * FROM utenti WHERE username = '$username' AND password = '$password'") ;
if ($res->num_rows > 0) {
    $row = $res->fetch_array(); 
    $idUtente = $row['ID'];
    $_SESSION['idUtente'] = $idUtente;
    $_SESSION['logged'] = true;
	//header("location: clientInterface.html");
} else {
    echo "Invalid username or password";
}

?>

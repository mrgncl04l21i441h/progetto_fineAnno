<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LogIn</title>
</head>
<body>
	<a href="home.html"><Button>Home</Button></a>
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
    //echo "Please fill out all fields";
    return;
}

$username = $_POST['username'];
$password = $_POST['password'];

$res = $conn -> query("SELECT * FROM utente WHERE username = '$username' AND password = '$password'") ;
if ($res->num_rows > 0) {
    $row = $res->fetch_array(); 
    $idUtente = $row['ID'];
    $_SESSION['idUtente'] = $idUtente;
    $_SESSION['logged'] = true;
} else {
    echo "Invalid username or password";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Sign Up
                    </div>
                    <div class="card-body">
                        <form action="signup.php" method="POST">
                            <div class="form-group">
                                <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="cognome" class="form-control" placeholder="Cognome" required>
                            </div>
                            <div class="form-group">
                                <input type="date" name="datanascita" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="telefono" class="form-control" placeholder="Telefono" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Invia</button>
                            <a href="clientInterface.html" class="btn btn-primary mr-2">Home</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    
    $sql = "INSERT INTO utenti (nome, cognome, data_nascita, telefono, email, username, password) 
            VALUES ('$nome', '$cognome', '$datanascita', '$telefono', '$email', '$username', '$password')";

    if ($conn->query($sql) === TRUE) { 
        echo "Utente registrato con successo";
    } else {
        echo "Errore inserimento: " . $conn->error;
    }
    echo "<br>";
    echo "<button><a href='index.html'>Menu</a></button>";

    $conn->close();
    }
?>

<?php

require "connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($username) && isset($password)) {
    

    if ($username == "admin" && $password == "admin") {
        session_start();
        $_SESSION['logged'] = true;
        header("location: adminInterface.html");
        
    } else {

        $res = $conn -> query("SELECT * FROM utenti WHERE username = '$username' AND password = '$password'");
        if ($res->num_rows > 0) {
            $row = $res->fetch_array(); 
            $idUtente = $row['ID'];
            session_start();
            $_SESSION['idUtente'] = $idUtente;
            $_SESSION['logged'] = true;
            header("location: clientInterface.html");
            
        } else {
            echo "Invalid username or password";
        }
    }
}else{
    header("location: login.html");
}
?>
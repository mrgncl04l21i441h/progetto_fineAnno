<?php

require "connect.php";


if (isset($_POST['username']) && isset($_POST['password'])) {
    

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($_POST['username'] == "admin" && $_POST['password'] == "admin") {
        session_start();
        $_SESSION['logged'] = true;
        //header("location: adminInterface.html");
        echo "tutto fatto vai all'admin page";
    } else {

        $res = $conn -> query("SELECT * FROM utenti WHERE username = '$username' AND password = '$password'");
        if ($res->num_rows > 0) {
            $row = $res->fetch_array(); 
            $idUtente = $row['ID'];
            session_start();
            $_SESSION['idUtente'] = $idUtente;
            $_SESSION['logged'] = true;
            //header("location: clientInterface.html");
            echo "tutto fatto vai al login";
        } else {
            echo "Invalid username or password";
        }
    }
}else{
    echo "errore nei dati";
    //header("location: login.html");
}
?>
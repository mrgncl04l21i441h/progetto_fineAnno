<?php
require "connect.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $res = $conn -> query("SELECT * FROM utenti WHERE username = '$username' AND password = '$password'");
    if ($res->num_rows > 0) {
        $row = $res->fetch_array(); 
        $idUtente = $row['ID'];
        session_start();
        $_SESSION['idUtente'] = $idUtente;
        $_SESSION['logged'] = true;
        
        if($row['admin'] == 1){
            header("location: adminInterface.html");
        }else{
            header("location: clientInterface.html");
        }
        
    } else {
        echo "Invalid username or password";
    }
}else{
    //echo "errore nei dati";
    header("location: login.html");
}
?>
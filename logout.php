<?php
session_start();

$_SESSION['idUtente'] = null;
$_SESSION['logged'] = false;

header("location: index.html");

?>
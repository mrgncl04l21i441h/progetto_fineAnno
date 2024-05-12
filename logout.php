<?php
session_start();

$_SESSION['idUtente'] = null;
$_SESSION['logged'] = false;

session_unset();
session_destroy();

header("location: index.html");

?>
<?php
session_start();
$_SESSION['changes'] = $_POST['Module'];
var_dump($_SESSION['changes']);

?>

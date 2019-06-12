<?php
session_start();
include '../functions.php';

if(isset($_POST['submit'])){
	echo $_POST['submit'];
  	createAccount($_POST['Email'], $_POST['Password'], $_POST['Password'], $_POST['Firstname'], $_POST['Lastname'], $_POST['Gender'], $_POST['Birthdate'], $_POST['Adress'], $_POST['PLZ'], $_POST['Payment'], $_POST['Note']);
}

?>

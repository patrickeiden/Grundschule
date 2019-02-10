<?php
session_start();
include '../functions.php';

if(isset($_POST['next_test'])){
  createAccount($_POST['email'], $_POST['psw'], $_POST['psw-repeat']);
}

?>

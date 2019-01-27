<?php
session_start();
include '../functions.php';

if(isset($_POST['login'])){
  Login($_POST['email'], $_POST['psw']);
}

?>

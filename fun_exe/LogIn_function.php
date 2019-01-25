<?php
session_start();
include '../fun_def/functions.php';

if(isset($_POST['login'])){
  Login($_POST['email'], $_POST['psw']);
}

?>

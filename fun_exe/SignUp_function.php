<?php

include '../fun_def/functions.php';

if(isset($_POST['next_test'])){
  createAccount($_POST['email'], $_POST['psw'], $_POST['psw-repeat']);
}

?>

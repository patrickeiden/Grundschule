<?php
include 'functions.php';
if(isset($POST['next_test'])){
  createAccount($POST['email'], $POST['psw'], $POST['psw-repeat']);
}

?>

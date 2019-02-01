<?php

session_start();
include 'functions.php';

if(isset($_POST['changes'])){
  updateCustome($_POST['changes'], $_SESSION['u_id']);
}

?>

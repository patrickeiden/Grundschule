<?php
session_start();
include 'functions.php';
if(isset($_POST['Module'])){
  $_SESSION['changes'] = $_POST['Module'];
}
if(isset($_POST['Delete'])){
  deleteCustomeButton($_POST['Delete'], $_SESSION['CustomeFileName']);
}

?>

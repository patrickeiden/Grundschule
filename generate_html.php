<?php
session_start();
include 'functions.php';
#function for custome Modul
if(isset($_POST['test'])){
  #create a folder for the user
  $folder = createFolder($_SESSION['u_id']);

if(isset($_POST['worker_button'])){
  $number = 1;
  setWorkers($number, $_SESSION['u_id'], $folder);
}else{
  $number = 0;
  setWorkers($number, $_SESSION['u_id'], $folder);
}
}


?>

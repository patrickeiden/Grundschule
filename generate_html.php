<?php
session_start();
include 'functions.php';
#function for custome Modul
if(isset($_POST['test'])){
  #create a folder for the user
  $folder = createFolder($_SESSION['u_id']);

#function for Calendar Modul
if(isset($_POST['calendar'])){
  $number = 1;
  setCalendar($number, $_SESSION['u_id'], $folder);
}else{
  $number = 0;
  setCalendar($number, $_SESSION['u_id'], $folder);
}
}

?>

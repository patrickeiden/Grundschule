<?php
session_start();
include 'functions.php';
#function for custome Modul
if(isset($_POST['test'])){
  #create a folder for the user
  $folder = createFolder($_SESSION['u_id']);

if(isset($_POST['anfahrt_button'])){
  $number = 1;
  setAnfahrt($number, $_SESSION['u_id'], $folder, $_POST['street_school'], $_POST['plz_school'], $_POST['ort_school'], $_POST['desciption_anfahrt'], $_POST['number_school']);
}else{
  $number = 0;
  setAnfahrt($number, $_SESSION['u_id'], $folder, $_POST['street_school'], $_POST['plz_school'], $_POST['ort_school'], $_POST['desciption_anfahrt'], $_POST['number_school']);
}
}

?>

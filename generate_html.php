<?php
session_start();
include 'functions.php';
#function for custome Modul
if(isset($_POST['test'])){
  #create a folder for the user
  $folder = createFolder($_SESSION['u_id']);

if(isset($_POST['signup_button'])){
  $number = 1;
  setSignup($_SESSION['u_id'], $number, $_POST['desciption_signup'], $_POST['pdf'], $folder);
}else{
  $number = 0;
  setSignup($_SESSION['u_id'], $number, "", "", $folder);
}
}

?>

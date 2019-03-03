<?php
session_start();
include 'functions.php';
#function for custome Modul
if(isset($_POST['test'])){
  #create a folder for the user
  $folder = createFolder($_SESSION['u_id']);
  #create a .php file for the site and puts it into the database
  $filename = fileInDatabase("registration", "reg_id", $_SESSION['u_id'], "siteone_name", "frontpageUser", $folder);
  //ThemeOne($filename);

  #creates a start site
  setStart($_SESSION['u_id'], $filename, $_POST['nameSchool'], $_POST['logo'], $_POST['desciption'], $_POST['header'], $folder);

  }


?>

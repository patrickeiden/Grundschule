<?php
session_start();
include 'functions.php';
#function for custome Modul
if(isset($_POST['test'])){
  #create a folder for the user
  $folder = createFolder($_SESSION['u_id']);

  setImpressum($_SESSION['u_id'], $_POST['impressum'], $folder);
  #creates multiple modules
}


?>

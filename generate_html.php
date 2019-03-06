<?php
session_start();
include 'functions.php';
#function for custome Modul
if(isset($_POST['test'])){
  #create a folder for the user
  $folder = createFolder($_SESSION['u_id']);

#function for Gallery Module
if(isset($_POST['gallery_button'])){
  $number = 1;
  setGallery($number, $_SESSION['u_id'], $folder);
}else{
  $number = 0;
  setGallery($number, $_SESSION['u_id'], $folder);
}

header('Location: generate.php?success');

}

?>
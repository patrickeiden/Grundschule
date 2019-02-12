<?php
session_start();
include 'functions.php';
#function for custome Modul
if(isset($_POST['test'])){
  #create a folder for the user
  $folder = createFolder($_SESSION['u_id']);
  #create a .php file for the site and puts it into the database

#function for News Modul
  if(isset($_POST['news_number']) && ($_POST['news_number']==3 || $_POST['news_number']==4 || $_POST['news_number']==5) && $_POST['news_button']){
    setNews(1, $_POST['news_number'], $_SESSION['u_id'], $folder);
  }else{
    setNews(0, 0, $_SESSION['u_id'], $folder);
  }
}


?>

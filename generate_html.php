<?php
session_start();
include 'fun_def/functions.php';
#function for custome Modul
if(isset($_POST['test'])){
  if(isset($_POST['costume_button']) && $_POST['costume_button']==1){
    setCustome($_POST['title'], 1, $_SESSION['u_id']);
  }else{
    setCustome("", 0, $_SESSION['u_id']);
  }
#function for News Modul
  if(isset($_POST['news_number']) && ($_POST['news_number']==3 || $_POST['news_number']==4 || $_POST['news_number']==5) && $_POST['news_button']){
    setNews(1, $_POST['news_number'], $_SESSION['u_id']);
  }else{
    setNews(0, 0, $_SESSION['u_id']);
  }
#function for Calendar Modul
if(isset($_POST['calendar'])){
  $number = 1;
  setCalendar($number, $_SESSION['u_id']);
}else{
  $number = 0;
  setCalendar($number, $_SESSION['u_id']);
}
#function for Job Modul
if(isset($_POST['job_number']) && isset($_POST['job_button'])){
  $number = 1;
  setJob($number, $_POST['job_number'], $_SESSION['u_id']);
}else{
  $number = 0;
  setJob($number, $number, $_SESSION['u_id']);
}
#function for Image Modul
if(isset($_POST['Image_button'])){
  $number = 1;
  setImage($number, $_SESSION['u_id']);
}else{
  $number = 0;
  setImage($number, $_SESSION['u_id']);
}
#create a .php file for the site
$filename = fileInDatabase("registration", "reg_id", $_SESSION['u_id'], "siteone_name", "frontpageUser");
ThemeOne($filename);
header('Location: http://localhost/Grundschule/generate.php?success');
}


?>


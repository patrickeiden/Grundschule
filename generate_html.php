<?php
session_start();
include 'functions.php';
#function for custome Modul
if(isset($_POST['test'])){
  #create a folder for the user
  $folder = createFolder($_SESSION['u_id']);
  $Imagefolder = createImageFolder($_SESSION['u_id']);
  #create a .php file for the site and puts it into the database
  $filename = fileInDatabase("registration", "reg_id", $_SESSION['u_id'], "siteone_name", "frontpageUser", $folder, $Imagefolder);
  //ThemeOne($filename);

  #creates a start site
  setStart($_SESSION['u_id'], $filename, $_POST['nameSchool'], $_POST['logo'], $_POST['desciption'], $_POST['header'], $folder, $_POST['school_slider']);

  #creates multiple modules
  if(isset($_POST['costume_button']) && $_POST['costume_button']==1){
    setCustome($_POST['title'], 1, $_SESSION['u_id'], $folder);
  }else{
    setCustome("", 0, $_SESSION['u_id'], $folder);
  }
#function for News Modul
  if(isset($_POST['news_number']) && ($_POST['news_number']==3 || $_POST['news_number']==4 || $_POST['news_number']==5) && $_POST['news_button']){
    setNews(1, $_POST['news_number'], $_SESSION['u_id'], $folder);
  }else{
    setNews(0, 0, $_SESSION['u_id'], $folder);
  }
#function for Calendar Modul
if(isset($_POST['calendar'])){
  $number = 1;
  setCalendar($number, $_SESSION['u_id'], $folder);
}else{
  $number = 0;
  setCalendar($number, $_SESSION['u_id'], $folder);
}
#function for Job Modul
if(isset($_POST['job_number']) && isset($_POST['job_button'])){
  $number = 1;
  setJob($number, $_POST['job_number'], $_SESSION['u_id'], $folder);
}else{
  $number = 0;
  setJob($number, $number, $_SESSION['u_id'], $folder);
}
#function for Image Modul
if(isset($_POST['Image_button'])){
  $number = 1;
  setImage($number, $_SESSION['u_id'], $folder);
}else{
  $number = 0;
  setImage($number, $_SESSION['u_id'], $folder);
}
#function for Gallery Module
if(isset($_POST['gallery_button'])){
  $number = 1;
  setGallery($number, $_SESSION['u_id'], $folder);
}else{
  $number = 0;
  setGallery($number, $_SESSION['u_id'], $folder);
}
if(isset($_POST['building_button'])){
  $number = 1;
  setBuilding($number, $_SESSION['u_id'], $folder);
}else{
  $number = 0;
  setBuilding($number, $_SESSION['u_id'], $folder);
}
header('Location: ../generate.php?success');
}


?>

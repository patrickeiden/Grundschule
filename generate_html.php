<?php
include 'functions.php';
#function for custome Modul
if(isset($_POST['test'])){
  if(isset($_POST['costume_button']) && $_POST['costume_button']==1){
  createCustome($_POST['title'], $_POST['code'], 1);
  }else{
    createCustome("", "", 0);
  }
#function for News Modul
  if(isset($_POST['news_number']) && ($_POST['news_number']==3 || $_POST['news_number']==4 || $_POST['news_number']==5) && $_POST['news_button']){
    createNews(1, $_POST['news_number']);
  }else{
    createNews(0, 0);
  }
#function for Calendar Modul
if(isset($_POST['calendar'])){
  $number = 1;
  createCalendar($number);
}else{
  $number = 0;
  createCalendar($number);
}
#function for Job Modul
if(isset($_POST['job_number']) && isset($_POST['job_button'])){
  $number = 1;
  createJob($number, $_POST['job_number']);
}else{
  $number = 0;
  createJob($number, $number);
}
#function for Image Modul
if(isset($_POST['Image_button'])){
  $number = 1;
  createImage($number, $_POST['pic']);
}else{
  $number = 0;
  createImage($number, $number);
}
}


?>

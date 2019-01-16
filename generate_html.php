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
  createCalendar(1);
}else{
  createCalendar(0);
}
#function for Job Modul
if($_POST['job_number'] && ($_POST['job_number']==3 || $_POST['job_number']==4 || $_POST['job_number']==5) && $_POST['job_button']){
  createJob(1, $_POST['job_number']);
}else{
  createJob(0, 3);
}
}

?>

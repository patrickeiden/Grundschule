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
  if(isset($_POST['news_number']) && ($_POST['news_number']==3 || $_POST['news_number']==4 || $_POST['news_number']==5)){
    createNews(1, $_POST['news_number']);
  }else{
    createNews(0, 0);
  }
}

?>

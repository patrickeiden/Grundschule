<?php

session_start();
include 'functions.php';

if(isset($_POST['changes'])){
  var_dump($_POST['nav_title']);
  updateCustome($_POST['changes'], $_SESSION['u_id'], false, $_POST['nav_title']);
}
if(isset($_POST['newModule'])){
  createCustome($_SESSION['u_id'], $_POST['custome_title'], $_POST['custome_code'], $_POST['newModule']);
}
if(isset($_POST['delete'])){
  //deleteCustome($_SESSION['u_id'], $_POST['delete']); this is for the checkbox variant
  deleteCustome($_POST['delete'], $_SESSION['CustomeFileName']);
}
if(isset($_POST['newModuleabove'])){
  createCustome($_SESSION['u_id'], $_POST['calendar_title'], $_POST['calendar_code'], $_POST['newModuleabove']);
  updateAboveUnder(0, $_POST['calendar_title'], $_POST['newModuleabove']);
}
if(isset($_POST['newModuleunder'])){
  createCustome($_SESSION['u_id'], $_POST['calendar_title'], $_POST['calendar_code'], $_POST['newModuleunder']);
  updateAboveUnder(1, $_POST['calendar_title'], $_POST['newModuleunder']);
}
if(isset($_POST['newEvent'])){
  newEvent($_POST['event_title'], $_POST['event_date'], $_POST['newEvent']);
}
if(isset($_POST['delete2'])){
  deleteCustome($_SESSION['u_id'], $_POST['delete2']);
}
if(isset($_POST['changes_calendar'])){
  updateCustome($_POST['changes_calendar'], $_SESSION['u_id'], true);
}
if(isset($_POST['newNews'])){
  createNews($_SESSION['u_id'], $_POST['news_title'], $_POST['news_date'], $_POST['news_text'], $_POST['newNews']);
}
if(isset($_POST['changes_news'])){
  updateNews($_POST['changes_news'], $_SESSION['u_id']);
}
if(isset($_POST['deleteNews'])){
  //deleteNews($_SESSION['u_id'], $_POST['deleteNews']);  checkbox function
  deleteNews2($_SESSION['u_id'], $_POST['deleteNews'], $_SESSION['NewsFileName']);
}
if(isset($_POST['newImages'])){
  createImage($_SESSION['u_id'], $_POST['newImages']);
}
if(isset($_POST['gallery']) && isset($_POST['newGallery'])){
  createGallery($_SESSION['u_id'], $_POST['gallery'], $_POST['newGallery']);
}
if(isset($_POST['delete_galleries_button'])){
  deleteGallerie($_SESSION['u_id'], $_SESSION['GalerieFileName'], $_POST['delete_galleries_button']);
}
if(isset($_POST['delete_images_button'])){
  deleteImages($_SESSION['u_id'], $_POST['delete_images_button']);
}
if(isset($_POST['add_workers_button'])){
  createWorkers($_SESSION['u_id'], $_POST['workers_adress'], $_POST['workers_firstname'], $_POST['workers_lastname'], $_POST['workers_job'], $_POST['workers_type'], $_POST['add_workers_button'], $_POST['workers_tel'],$_POST['worker_image']);
}
if(isset($_POST['delete_workers_button'])){
  deleteWorkers($_SESSION['u_id'], $_POST['delete_workers_button']);
}
header('Location: http://localhost/Grundschule/personal_site2.php');
?>

<?php

session_start();
include 'functions.php';

if(isset($_POST['changes'])){
  updateCustome($_POST['changes'], $_SESSION['u_id']);
}
if(isset($_POST['newModule'])){
  createCustome($_SESSION['u_id'], $_POST['custome_title'], $_POST['custome_code'], $_POST['newModule']);
}
if(isset($_POST['delete'])){
  deleteCustome($_SESSION['u_id'], $_POST['delete']);
}
if(isset($_POST['newModuleabove'])){
  createCustome($_SESSION['u_id'], $_POST['calendar_title'], $_POST['calendar_code'], $_POST['newModuleabove']);
  updateAboveUnder(0, $_POST['calendar_title'], $_POST['newModuleabove']);
}
if(isset($_POST['newModuleunder'])){
  createCustome($_SESSION['u_id'], $_POST['calendar_title'], $_POST['calendar_code'], $_POST['newModuleunder']);
  updateAboveUnder(1, $_POST['calendar_title'], $_POST['newModuleunder']);
}
if(isset($_POST['delete2'])){
  deleteCustome($_SESSION['u_id'], $_POST['delete2']);
}
if(isset($_POST['changes_calendar'])){
  updateCustome($_POST['changes_calendar'], $_SESSION['u_id']);
}
if(isset($_POST['newNews'])){
  createNews($_SESSION['u_id'], $_POST['news_title'], $_POST['news_date'], $_POST['news_text'], $_POST['news_image'], $_POST['newNews']);
}
if(isset($_POST['changes_news'])){
  updateNews($_POST['changes_news'], $_SESSION['u_id']);
}
if(isset($_POST['delete_news_button'])){
  deleteNews($_SESSION['u_id'], $_POST['delete_news_button']);
}
header('Location: http://localhost/Grundschule/personalSite.php');
?>

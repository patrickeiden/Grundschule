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
  deleteCustome($_SESSION['u_id']);
}
if(isset($_POST['changes_news'])){
  createNews($_SESSION['u_id'], $_POST['news_title'], $_POST['news_date'], $_POST['news_text'], $_POST['news_image']);
}
if(isset($_POST['delete_news_button'])){
  deleteNews($_SESSION['u_id'], $_POST['delete_news']);
}
header('Location: http://localhost/Grundschule/personalSite.php');
?>

<?php
session_start();
include 'functions.php';
if(isset($_POST['Module'])){
  $_SESSION['changes'] = $_POST['Module'];
}
if(isset($_POST['DeleteCustome'])){
  deleteCustomeButton($_POST['DeleteCustome'], $_SESSION['CustomeFileName']);
}
if(isset($_POST['DeleteNews'])){

  deleteNews2($_SESSION['u_id'], $_POST['DeleteNews'], $_SESSION['NewsFileName']);
}
if(isset($_POST['NewsTitle']) && isset($_POST['NewsDate']) && isset($_POST['NewsText'])){
  updateNews2($_SESSION['NewsFileName'], $_POST['WhichOne'], $_POST['NewsTitle'], $_POST['NewsDate'], $_POST['NewsText']);
}
if(isset($_POST['SignUpText'])){
  updateSignUp($_SESSION['u_id'], $_POST['SignUpText']);
}
if(isset($_POST['SignUpPDF'])){
  updateSignUpPDF($_SESSION['u_id'], $_POST['SignUpPDF']);
}
if(isset($_POST['ClassesNumber'])){
  var_dump($_POST['ClassesNumber']);
  deleteClasses($_SESSION['u_id'], $_POST['ClassesNumber']);
}
if(isset($_POST['Classes']) && isset($_POST['Teacher']) && isset($_POST['Kids'])){
  safeClasses($_SESSION['u_id'], $_POST['Classes'], $_POST['Teacher'], $_POST['Kids']);
}
if(isset($_POST['newClassClasses']) || isset($_POST['newClassTeacher']) || isset($_POST['newClassKids'])){
  newClass($_SESSION['u_id'], $_POST['newClassClasses'], $_POST['newClassTeacher'], $_POST['newClassKids'], $_SESSION['ClassesFileName']);
}
?>

<?php
session_start();
include 'functions.php';
if(isset($_POST['Module'])){
  $_SESSION['changes'] = $_POST['Module'];
}
if(isset($_POST['DeleteCustome'])){
  deleteCustomeButton($_POST['DeleteCustome'], $_SESSION['CustomeFileName']);
}
if(isset($_POST['DeleteCalendar'])){
  deleteCustomeButton($_POST['DeleteCalendar'], $_SESSION['CalendarFileName']);
}
if(isset($_POST['UpdateCustome'])){
  updateCustomeModule($_POST['UpdateCustome'], $_POST['TextCustome'], $_SESSION['CustomeFileName']);
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
if(isset($_POST['IdClasses']) && isset($_POST['Klasse']) && isset($_POST['Teacher'])){
  safeClasses($_POST['IdClasses'], $_POST['Klasse'], $_POST['Teacher'], $_POST['Anzahl']);
}
if(isset($_POST['DeleteClass'])){
  deleteClasses($_POST['DeleteClass']);
}
if(isset($_POST['newClassClasses']) || isset($_POST['newClassTeacher']) || isset($_POST['newClassKids'])){
  newClass($_SESSION['u_id'], $_POST['newClassClasses'], $_POST['newClassTeacher'], $_POST['newClassKids'], $_SESSION['ClassesFileName']);
}
if(isset($_POST['DeleteImage'])){
  deleteImage($_SESSION['u_id'], $_POST['DeleteImage'], $_POST['GalleryName']);
}
if(isset($_POST['Id'])){
  safeWorker($_POST['Id'], $_POST['Job'], $_POST['Name'], $_POST['Tel']);
}
if(isset($_POST['DeleteWorker'])){
  DeleteWorker($_POST['DeleteWorker']);
}
if(isset($_POST['Street'])){
  updateGoogleAdress($_POST['File'], $_POST['Street'], $_POST['Number'], $_POST['PLZ'], $_POST['Town']);
  updatePictures($_POST['File'], $_POST['B1'], $_POST['B2'], $_POST['B3'], $_POST['B4']);
  printAnfahrtInInterface($_SESSION['u_id'], $_POST['File']);
}
if(isset($_POST['ForumTitle'])){
  createQuestion($_SESSION['u_id'], $_POST['ForumTitle'], $_POST['ForumText']);
}
?>

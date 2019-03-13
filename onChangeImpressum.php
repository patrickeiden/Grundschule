<?php
session_start();
include 'functions.php';

if(isset($_POST['Codeimpressum'])){
  if(isset($_POST['Codeimpressum']) && $_POST['Codeimpressum'] != ""){
    $stmt = $conn->prepare("UPDATE Page SET impressum=? WHERE user_id=?");
    $stmt->bind_param("si", $_POST['Codeimpressum'], $_SESSION['u_id']);
    $stmt->execute();
    $stmt->close();
  }

  printImpressumInInterface($_SESSION['u_id']);
}
if(isset($_POST['Codeanfahrt'])){
  if(isset($_POST['Codeanfahrt']) && $_POST['Codeanfahrt'] != ""){
    $stmt = $conn->prepare("UPDATE anfahrt SET text=? WHERE user_id=?");
    $stmt->bind_param("si", $_POST['Codeanfahrt'], $_SESSION['u_id']);
    var_dump($stmt);
    $stmt->execute();
    $stmt->close();
  }
  $file = "userid".$_SESSION["u_id"]."/anfahrt_id".$_SESSION["u_id"].".php";
  printAnfahrtInInterface($_SESSION['u_id'], $file);
}

?>

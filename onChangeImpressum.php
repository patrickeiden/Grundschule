<?php
session_start();
include 'functions.php';

if(isset($_POST['Codeimpressum']) && $_POST['Codeimpressum'] != ""){
  $stmt = $conn->prepare("UPDATE Page SET impressum=? WHERE user_id=?");
  $stmt->bind_param("si", $_POST['Codeimpressum'], $_SESSION['u_id']);
  $stmt->execute();
  $stmt->close();
}

printImpressumInInterface($_SESSION['u_id']);

?>

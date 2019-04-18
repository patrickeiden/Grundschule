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
if(isset($_POST['Codeanfahrt']) || isset($_POST['Codebuilding']) || isset($_POST['Codestreet']) || isset($_POST['CodeHouse']) || isset($_POST['Codeplz']) || isset($_POST['Codeort'])){
  if(isset($_POST['Codeanfahrt']) && $_POST['Codeanfahrt'] != ""){
    $stmt = $conn->prepare("UPDATE anfahrt SET text=? WHERE user_id=?");
    $stmt->bind_param("si", $_POST['Codeanfahrt'], $_SESSION['u_id']);
    $stmt->execute();
    $stmt->close();
  }
  if(isset($_POST['Codebuilding']) && $_POST['Codebuilding'] != ""){
    $stmt = $conn->prepare("UPDATE anfahrt SET text2=? WHERE user_id=?");
    $stmt->bind_param("si", $_POST['Codebuilding'], $_SESSION['u_id']);
    $stmt->execute();
    $stmt->close();
  }
  if(isset($_POST['Codestreet']) && $_POST['Codestreet'] != ""){
    var_dump($_POST['Codestreet']);
    $stmt = $conn->prepare("UPDATE anfahrt SET street=? WHERE user_id=?");
    $stmt->bind_param("si", $_POST['Codestreet'], $_SESSION['u_id']);
    $stmt->execute();
    $stmt->close();
  }
  if(isset($_POST['CodeHouse']) && $_POST['CodeHouse'] != ""){
    $stmt = $conn->prepare("UPDATE anfahrt SET streetNumber=? WHERE user_id=?");
    var_dump($stmt);
    $stmt->bind_param("si", $_POST['CodeHouse'], $_SESSION['u_id']);
    $stmt->execute();
    $stmt->close();
  }
  if(isset($_POST['Codeplz']) && $_POST['Codeplz'] != ""){
    var_dump($_POST['Codeplz']);
    $stmt = $conn->prepare("UPDATE anfahrt SET plz=? WHERE user_id=?");
    $stmt->bind_param("si", $_POST['Codeplz'], $_SESSION['u_id']);
    $stmt->execute();
    $stmt->close();
  }
  if(isset($_POST['Codeort']) && $_POST['Codeort'] != ""){
    $stmt = $conn->prepare("UPDATE anfahrt SET ort=? WHERE user_id=?");
    $stmt->bind_param("si", $_POST['Codeort'], $_SESSION['u_id']);
    $stmt->execute();
    $stmt->close();
  }
  if(isset($_POST['Codestreet']) || isset($_POST['CodeHouse']) || isset($_POST['Codeort'])){
    $maps = 'https://maps.google.de/maps?hl=de&q=%20'.$_POST['Codestreet'].'+'.$_POST['CodeHouse'].'%20'.$_POST['Codeort'].'&t=&z=10&ie=utf8&iwloc=b&output=embed';
    $stmt = $conn->prepare("UPDATE anfahrt SET maps=? WHERE user_id=?");
    $stmt->bind_param("si", $maps, $_SESSION['u_id']);
    $stmt->execute();
    $stmt->close();
  }
  $file = "userid".$_SESSION["u_id"]."/anfahrt_id".$_SESSION["u_id"].".php";
  printAnfahrtInInterface($_SESSION['u_id'], $file);
}

?>

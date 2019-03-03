<?php
session_start();
include 'functions.php';
//just Update One Module
//we need a checkvalue in order to change only one Modul by its time
$checkValue = true;
if(isset($_POST['Codename']) && $_POST['Codename'] != "" && $checkValue){
  updateStartsite($_SESSION['u_id'], $_POST['file'], $_POST['Codename'], $_POST['Codelogo'], $_POST['Codeheader'], $_POST['Codedescription'], $_POST['Codestreet'], $_POST['Codeplz'], $_POST['Codeort'], $_POST['Codetel'],
  $_POST['Codefax'], $_POST['Codemail'], $_POST['Codeslider']);
  $id = 'userid'.$_SESSION['u_id'];
  printStartInFile($_SESSION['u_id'], $_POST['file']);
  $checkValue = false;

}else{
  //$id = 'userid'.$_SESSION['u_id'].'/custome_id'.$_SESSION['u_id'].'php';
  $checkValue = true;
}


?>

<?php
session_start();
include 'functions.php';
//just Update One Module
//we need a checkvalue in order to change only one Modul by its time
$checkValue = true;
if(isset($_POST['ajaxCode']) && $_POST['ajaxCode'] != "" && $checkValue){
  $val = oneValueFromTableData($_SESSION['u_id'], "custome_file_name");
  $arg = 'customeName_'.$_POST['number'];
  updateOneModule($_SESSION['u_id'], $val, $_SESSION[$arg], $_POST['ajaxCode']);
  $_SESSION['CustomeNumber'] = $_POST['number'];
  $checkValue = false;

}else{
  //$id = 'userid'.$_SESSION['u_id'].'/custome_id'.$_SESSION['u_id'].'php';
  $checkValue = true;
  $arg = 'customeName_'.$_SESSION['CustomeNumber'];
  $val = oneColumnFromTable("costume_code", $_SESSION[$arg], "Module", "custome_name");
  echo $val[0];
}
$file = "userid".$_SESSION["u_id"]."/custome_id".$_SESSION["u_id"].".php";
printAllCustomeFromFile($_SESSION['u_id']);
printCustomeInInterface($_SESSION['u_id'], $file);
printCustomeInFileTable($_SESSION['u_id'], $file);

?>

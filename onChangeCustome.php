<?php
session_start();
include 'functions.php';
//just Update One Module
//we need a checkvalue in order to change only one Modul by its time
$checkValue = true;
if(isset($_POST['ajaxCode']) && $_POST['ajaxCode'] != "" && $checkValue){
  $val = oneValueFromTableData($_SESSION['u_id'], "calendar_file");
  $arg = 'calendarName_'.$_POST['number'];
  updateOneModule($_SESSION['u_id'], $val, $_SESSION[$arg], $_POST['ajaxCode']);
  $_SESSION['CalendarNumber'] = $_POST['number'];
  $checkValue = false;

}else{
  //$id = 'userid'.$_SESSION['u_id'].'/custome_id'.$_SESSION['u_id'].'php';
  $checkValue = true;
  $arg = 'calendarName_'.$_SESSION['CalendarNumber'];
  $val = oneColumnFromTable("costume_code", $_SESSION[$arg], "Module", "custome_name");
  echo $val[0];
}
$file = "userid".$_SESSION["u_id"]."/calendar_id".$_SESSION["u_id"].".php";
printCalendarInInterface($_SESSION['u_id']);
//printCalendarInFile($uid, $file);

?>

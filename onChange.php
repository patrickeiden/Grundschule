<?php
session_start();
include 'functions.php';
//just Update One Module
if(isset($_POST['ajaxCode']) && $_POST['ajaxCode'] != ""){
  $val = oneValueFromTableData($_SESSION['u_id'], "custome_file_name");
  $arg = 'customeName_'.$_POST['number'];
    echo $val.'<br>';
    echo $_SESSION[$arg].'<br>';
    echo $_POST['ajaxCode'].'<br>';
  updateOneModule($_SESSION['u_id'], $val, $_SESSION[$arg], $_POST['ajaxCode']);
  $_SESSION['CustomeNumber'] = $_POST['number'];
}else{
  //$id = 'userid'.$_SESSION['u_id'].'/custome_id'.$_SESSION['u_id'].'php';
  $arg = 'customeName_'.$_SESSION['CustomeNumber'];
  $val = oneColumnFromTable("costume_code", $_SESSION[$arg], "Module", "custome_name");
  echo $val[0];
}
printCustomeInInterface($_SESSION['u_id']);

?>

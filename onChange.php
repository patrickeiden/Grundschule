<?php
session_start();
include 'functions.php';
$val = oneValueFromTableData($_SESSION['u_id'], "custome_file_name");
updateCustome($val, $_SESSION['u_id'], false);


?>

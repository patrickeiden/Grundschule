<?php
session_start();
echo $_SESSION['leftright'];
echo '<br>';
echo $_SESSION['limit_number'];
echo '<br>';
echo $_POST['name'];
echo '<br>';

$var = $_SESSION['leftright'];
function leftminus($variable){
  echo 'uhu';
  if($_SESSION['leftright'] == 1){

  }else{
    $_SESSION['leftright'] = $variable - 1;
  }
}

function rightplus($variable){
  echo 'yeehs';
  if($_SESSION['leftright'] == $_SESSION['limit_number']){

  }else{
    echo $_SESSION['leftright'];
    $_SESSION['leftright'] = $variable + 1;
    echo $_SESSION['leftright'];
  }
}

 if($_POST['name'] == 'leftminus'){
   echo 'left';
   echo '<br>';
   leftminus($var);
 }
 if($_POST['name'] == 'rightplus'){
   echo 'right';
   echo '<br>';
   rightplus($var);
 }
 
?>

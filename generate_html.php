<?php
session_start();
include 'functions.php';
#function for custome Modul
if(isset($_POST['test'])){
  #create a folder for the user
  $folder = createFolder($_SESSION['u_id']);

  #creates multiple modules
  if(isset($_POST['costume_button']) && $_POST['costume_button']==1){
    setCustome($_POST['title'], 1, $_SESSION['u_id'], $folder);
  }else{
    setCustome("", 0, $_SESSION['u_id'], $folder);
  }

#function for Calendar Modul
if(isset($_POST['calendar'])){
  $number = 1;
  setCalendar($number, $_SESSION['u_id'], $folder);
}else{
  $number = 0;
  setCalendar($number, $_SESSION['u_id'], $folder);
}
header('Location: generate.php?success');
}


?>

<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "news");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

#News Module / einfach Datenbank Abfrage
function returnTitle(){
  global $conn;
  $output = "<p>";
  $sql = "SELECT title FROM new_news";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["title"];
        $output.= "</p>";
    }
  }
  return $output;
}

function returnDate(){
  global $conn;
  $output = "<p>";
  $sql = "SELECT date FROM new_news";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["date"];
        $output.= "</p>";
    }
  }
  return $output;
}

function returnText(){
  global $conn;
  $output = "<p>";
  $sql = "SELECT text FROM new_news";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["text"];
        $output.= "</p>";
    }
  }
  return $output;
}

function returnImage(){
  global $conn;
  $output = "<img src='";
  $sql = "SELECT image FROM new_news";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["image"];
        $output.= "'>";
    }
  }
  return $output;
}
# Ende News Module

#Anfang Costume Modul

function createCustome($title, $code, $number){
  global $conn;
  if($number == 1){
    $stmt = $conn->prepare("INSERT INTO Module (costume_on, costume_title, costume_code) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $number, $title, $code);
    $stmt->execute();
  }else{
    $stmt = $conn->prepare("INSERT INTO Module (costume_on, costume_title, costume_code) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $number = 0, $title, $code);
    $stmt->execute();
  }
  header('Location: http://localhost/Grundschule/generate.php');
}

function printCustome(){
  global $conn;
  $output = "";
  $sql = "SELECT costume_code FROM Module WHERE module_id=2";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["costume_code"];
    }
  }
  return $output;
}

function createNews($number, $news_number){
  global $conn;
  if($number == 1){
    $stmt = $conn->prepare("INSERT INTO new_news (news_on, news_number) VALUES (?, ?)");
    $stmt->bind_param("ii", $number, $news_number);
    $stmt->execute();
  }else{
    $stmt = $conn->prepare("INSERT INTO new_news (news_on, news_number) VALUES (?, ?)");
    $stmt->bind_param("ii", $number = 0, $news_number);
    $stmt->execute();
  }
}

function createCalendar($number){
  global $conn;
  $bool_Value = 0;
  if($number == 1){
    $stmt = $conn->prepare("UPDATE Calender SET calender_on=? WHERE calender_id=?");
    $bool_Value = 1;
    $stmt->bind_param("ii", $bool_Value, $number);
    $stmt->execute();
    $stmt->close();
  }else{
    $number = 1;
    $stmt = $conn->prepare("UPDATE Calender SET calender_on=? WHERE calender_id=?");
    $stmt->bind_param("ii",$bool_Value, $number);
    $stmt->execute();
    $stmt->close();
  }
}

function printCalendar(){
  global $conn;
  $output = "";
  $sql = "SELECT calender_code FROM calender";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["calender_code"];
    }
  }
  return $output;
}

function createJob($number, $numberjobs){
  global $conn;
  $bool_Value = 0;
  $emptystr = "";
  if($number == 1){
    $stmt = $conn->prepare("INSERT INTO jobs (job_on, job_title, job_content, job_number) VALUES (?, ?, ?, ?)");
    $bool_Value = 1;
    $stmt->bind_param("issi", $bool_Value, $emptystr, $emptystr, $numberjobs);
    $stmt->execute();
  }else{
    $stmt = $conn->prepare("INSERT INTO jobs (job_on, job_title, job_content, job_number) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("issi", $bool_Value, $emptystr, $emptystr, $numberjobs);
    $stmt->execute();
  }
}

function printJob(){

}

function createImage($number, $imageurl){
global $conn;
  if($number == 1){
    $stmt = $conn->prepare("INSERT INTO Image (Image_on, Image_url) VALUES (?, ?)");
    $stmt->bind_param("is", $number, $imageurl);
    $stmt->execute();
  }else{
    $stmt = $conn->prepare("INSERT INTO Image (Image_on, Image_url) VALUES (?, ?)");
    $number = 0;
    $stmt->bind_param("is", $number, $imageurl);
    $stmt->execute();
  }
}

function printImage(){

}

#creates a .php file and returns the file name(name + id)
function createFile($id, $name){
  global $conn;
  $site_name = $name;
  $sql = "SELECT reg_id FROM registration WHERE reg_id = $id";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $site_name .= $row['reg_id'];
    }
  }
  $site_name .= ".php";

  //$shell_string = "sudo chmod 777 " .$site_name;
  //shell_exec($shell_string);
  $myfile = fopen($site_name, "w") or die("Unable to open file!");
  return $site_name;
}

#takes the database name, the id name, the id, the value name und the file name and updates the database entry
function fileInDatabase($dname, $did, $didvalue, $dvalue, $fname){
  global $conn;
  $filename = createFile($didvalue, $fname);
  $dbase = "UPDATE " .$dname ." SET " .$dvalue ."=? " ."WHERE " .$did ."=?";
  $stmt = $conn->prepare($dbase);
  $stmt->bind_param("si", $filename, $didvalue);
  $stmt->execute();
  $stmt->close();
}


function checkDoubleRegistration($mail){
  global $conn;
  $value = 0;
  $stmt = $conn->prepare("SELECT mail FROM registration WHERE mail = ?");
  $stmt->bind_param("s", $mail);
  $stmt->execute();
  $stmt->store_result();
  $stmt->fetch();
  $numberofrows = $stmt->num_rows();
  if($numberofrows > 0){
    $value = 1;
  }
  return $value;

}

function createAccount($email, $pswd, $pswd_repeat){
    global $conn;
    $mail = mysqli_real_escape_string($conn, $email);
    $psw = mysqli_real_escape_string($conn, $pswd);
    $psw_repeat = mysqli_real_escape_string($conn, $pswd_repeat);
    //Error Handler
    //Check for empty fields
    if(empty($mail) || empty($psw) || empty($psw_repeat)){
      header('Location: http://localhost/Grundschule/SignUp.php?signup=empty');
      exit();
    }else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
      header('Location: http://localhost/Grundschule/SignUp.php?signup=email');
      exit();
    }else if(checkDoubleRegistration($mail) == 1){
    header('Location: http://localhost/Grundschule/SignUp.php?signup=DoubleEmail');
      exit();
    }else{
      //Hasing the password
      $hashedpwd = password_hash($psw, PASSWORD_DEFAULT);
      //Insert data into Database
      $stmt = $conn->prepare("INSERT INTO registration (mail, password, repassword) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $mail, $psw, $psw_repeat);
      $stmt->execute();
      header('Location: http://localhost/Grundschule/SignUp.php?signup=success');
      exit();
    }
}

function logIn($email, $pswd){
    global $conn;
    $mail = mysqli_real_escape_string($conn, $email);
    $psw = mysqli_real_escape_string($conn, $pswd);

    //Error Handlers
    //Check for empty fields
    if(empty($mail) || empty($psw)){
      header('Location: http://localhost/Grundschule/SignUp.php?login=empty');
      exit();
    }else{
      $sql = "SELECT reg_id, mail, password FROM registration WHERE mail='$mail'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if($resultCheck < 1){
        header('Location: http://localhost/Grundschule/test.php?login=error1');
        exit();
      }else{
        if($row = mysqli_fetch_assoc($result)){
          //De-hashing the Password
          $hashedPwdCheck = strcmp($psw, $row['password']);
          if($hashedPwdCheck < 0 ||  $hashedPwdCheck > 0){
            header('Location: http://localhost/Grundschule/test.php?login=error2');
            exit();
          }else if($hashedPwdCheck == 0){
            //Log In the user here
            $_SESSION['u_id'] = $row['reg_id'];
            $_SESSION['u_mail'] = $row['mail'];
            $_SESSION['u_pwd'] = $row['password'];
            header('Location: http://localhost/Grundschule/interface.php?login=success');
            exit();
          }
        }
      }
    }
  }

function logout(){
  session_start();
  session_unset();
  session_destroy();
  header("Location: http://localhost/Grundschule/test.php?logout=success");
  exit();
}

//if the cutome module is part of your side this functions checks whether a section should be created or not
function CustomeOn(){
  global $conn;
  $number = 0;
  $sql = "SELECT costume_on FROM Module WHERE module_id = 2";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $number = $row['costume_on'];
    }
  }
  return $number;
}

function CalendarOn(){
  global $conn;
  $number = 0;
  $sql = "SELECT calender_on FROM Calender WHERE calender_id = 1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $number = $row['calender_on'];
    }
  }
  return $number;
}

function NewsOn(){
  global $conn;
  $number = 0;
  $sql = "SELECT news_on FROM new_news WHERE news_id = 1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $number = $row['news_on'];
    }
  }
  return $number;
}

function ImageOn(){
  global $conn;
  $number = 0;
  $sql = "SELECT Image_on FROM Image WHERE Image_id = 1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $number = $row['Image_on'];
    }
  }
  return $number;
}

#all function that create a site for Theme1
function returnphpinclude(){
  global $conn;
  $output = "";
  $sql = "SELECT php FROM Theme1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["php"];
    }
  }
  return $output;
}

function returnheader(){
  global $conn;
  $output = "";
  $sql = "SELECT header FROM Theme1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["header"];
    }
  }
  return $output;
}

function returnBody(){
  global $conn;
  $output = "";
  $sql = "SELECT Body FROM Theme1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["Body"];
    }
  }
  return $output;
}

function returnfooter(){
  global $conn;
  $output = "";
  $sql = "SELECT footer FROM Theme1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["footer"];
    }
  }
  return $output;
}

function ThemeOne($site_name){
  $myfile = fopen($site_name, "w") or die("Unable to open file!");
  $txt = returnphpinclude();
  fwrite($myfile, $txt);
  $txt = returnheader();
  fwrite($myfile, $txt);
  $txt = returnBody();
  fwrite($myfile, $txt);
  $txt = returnfooter();
  fwrite($myfile, $txt);
  fclose($myfile);
}

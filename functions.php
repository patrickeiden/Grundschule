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
function returnNewsTitle(){
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

function returnNewsDate(){
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

function returnNewsText(){
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

function returnNewsImage(){
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

#Anfang start-Modul
function setStart($uid, $file, $name, $logo, $text, $header, $folder, $slider){
  global $conn;
  $val = oneValueFromTableData($uid, 'image_folder');
  $logo = $val.'/'.$logo;
  $slider = $val.'/'.$slider;
  $stmt = $conn->prepare("INSERT INTO Page (page_file_name, name, header, text, image, user_id) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssi", $file, $name, $header, $text, $logo, $uid);
  $stmt->execute();
  $stmt = $conn->prepare("INSERT INTO Image (image_url, user_id, image_name, image_file_name) VALUES (?, ?, ?, ?)");
  $name = 'slider'.$uid;
  $stmt->bind_param("siss", $slider, $uid, $name, $file);
  $stmt->execute();


  printStartInFile($uid, $file);
}

function printRegularFooter($uid){
  global $conn;
  $output = "";
  $street= "";
  $plz= "";
  $ort= "";
  $number= "";
  $fax= "";
  $mail= "";
  $sql = "SELECT street, plz, ort, number, fax, mail FROM Page WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $street.= $row["street"];
        $plz.= $row["plz"];
        $ort.= $row["ort"];
        $number.= $row["number"];
        $fax.= $row["fax"];
        $mail.= $row["mail"];
    }
  }
  $sql = "SELECT regular_code_footer_start, regular_code_street, regular_code_plz, regular_code_tel, regular_code_fax, regular_code_mail, regular_code_end FROM Theme1regular";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["regular_code_footer_start"].$street.$row["regular_code_street"].$plz.$row["regular_code_plz"].$ort.$row["regular_code_tel"].$number.$row["regular_code_fax"].
        $fax.$row["regular_code_mail"].$mail.$row["regular_code_end"];
    }
  }
  return $output;
}

function printStartInFile($uid, $file){
  global $conn;
  returnNavbar($uid);
  returnSlider($uid);
  $footer = printRegularFooter($uid);
  $output = "";
  $name= "";
  $header= "";
  $text= "";
  $image= "";
  $sql = "SELECT name, header, text, image FROM Page WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name.= $row["name"];
        $header.= $row["header"];
        $text.= $row["text"];
        $image.= $row["image"];
    }
  }
  $sql = "SELECT include, header, regular_code_left, regular_code_name, regular_code_image, navfunktion, 	regular_code_right, slider, regular_code_right2, regular_code_header, regular_code_text FROM Theme1regular";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["include"].$row["header"].$row["regular_code_left"].$name.$row["regular_code_name"].$image.$row["regular_code_image"].$row["navfunktion"].$row["regular_code_right"].$row["slider"].$row["regular_code_right2"].$header.
        $row["regular_code_header"].$text.$row["regular_code_text"].$footer;
    }
  }
  $myfile = fopen($file, "w") or die("Unable to open file!");
  fwrite($myfile, $output);
  return $output;
}

function printFormForStart($file){
  global $conn;
  $form = '';
  $a = oneColumnFromTable("image_url", $file, "Image", "image_file_name");
  $b = oneColumnFromTable("image_id", $file, "Image", "image_file_name");
  for ($i=0; $i < sizeof($a); $i++) {
    $form .= '<p>'.($i+1).'. Slider Bild: '.$a[$i].'</p>';
    $form .= '<p>lösche Bild '.($i+1).'</p>';
    $form .= '<input type ="checkbox" name ="delete_slider_'.$b[$i].'" value="'.$b[$i].'"/>';
  }
  return $form;
}

#Anfang Costume Modul
function setCustome($name, $number, $uid, $folder){  //later +1 arguments for the Theme u want to use
  global $conn;
  $stmt = $conn->prepare("UPDATE table_data SET custome_on=? WHERE user_id=?");
  $stmt->bind_param("ii", $number, $uid);
  $stmt->execute();
  $stmt = $conn->prepare("UPDATE table_data SET custome_name=? WHERE user_id=?");
  $stmt->bind_param("si", $name, $uid);
  $stmt->execute();
  if($number == 1){
  $site_name = "custome_id" .$uid .".php";
  if($folder != ""){
    $folder = $folder."/".$site_name;
  }else{
    $folder = $site_name;
  }
  //create a File for this module
  $myfile = fopen($folder, "w") or die("Unable to open file!");
  //write file in Database
  $stmt = $conn->prepare("UPDATE table_data SET custome_file_name=? WHERE user_id=?");
  $stmt->bind_param("si", $folder, $uid);
  $stmt->execute();

  $stmt = $conn->prepare("UPDATE Theme1 SET navbar_item=?");
  $item = '<?php echo printNavItemFunction($_SESSION["u_id"]);?>';
  $stmt->bind_param("s", $item);
  $stmt->execute();

  $stmt = $conn->prepare("UPDATE Theme1 SET allcustome=?");
  $item = '<?php echo printAllCustomeFromFile($_SESSION["u_id"]';
  $item .= ');?>';
  $stmt->bind_param("s", $item);
  $stmt->execute();

  $code = $name;
  $stmt = $conn->prepare("UPDATE table_data SET custome_name=? WHERE user_id=?");
  $stmt->bind_param("si", $code, $uid);
  $stmt->execute();
  }
  if($number == 1){
    printCustomeInFile($uid, $folder);
  }
}

//this funtion will ne printed in the generated page in order to always print the latest version on the site
function printNavItemFunction($uid){
  global $conn;
  $output = '<p>';
  $sql = "SELECT custome_name FROM table_data WHERE user_id=$uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["custome_name"];
    }
  }
  $output .= '</p>';
  echo $output;
}

function createCustome($uid, $title, $code, $file){
  global $conn;
  $uid = $_SESSION['u_id'];
  $stmt = $conn->prepare("INSERT INTO Module (costume_title, costume_code, user_id, custome_file, custome_name) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("ssiss", $title, $code, $uid, $file, $title);
  $stmt->execute();
  //header('Location: ../personalSite.php');
}

function deleteCustome($uid, $button){
  global $conn;
  $a = array();
  $b = array();
  $c = array();
  $file = $button;
  $sql = "SELECT custome_name FROM Module WHERE custome_file='$file'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($a, $row['custome_name']);
        array_push($b, 'delete_module_'.$row['custome_name']);
        array_push($c, $_POST['delete_module_'.$row['custome_name']]);
    }
  }
  for ($i=0; $i < sizeof($a); $i++){
    $v = $b[$i];
      if($_POST[$v] == $a[$i]){
        $stmt = $conn->prepare("DELETE FROM Module WHERE custome_name = ? and custome_file = ?");
        $stmt->bind_param('ss', $a[$i], $file);
        $stmt->execute();
      }
  }
}

function numberCostume($uid, $name){
  global $conn;
  $number = 0;
  $sql = "SELECT custome_name FROM Module WHERE custome_file = '$name'";
  $result = $conn->query($sql);
  $number = $result->num_rows;
  return $number;
}

//takes a number between 0 and 1. 0 = above, 1 = under
function updateAboveUnder($number, $name, $file){
  global $conn;
  $stmt = $conn->prepare("UPDATE Module SET above_under=? WHERE custome_name=? and custome_file=?");
  $stmt->bind_param("iss", $number, $name, $file);
  $stmt->execute();
}

function printCustomeInFile($uid, $site_name){
  global $conn;
  $output = '';
  $output .= printRegularHeader($uid, "");

  $sql = "SELECT allcustome FROM Theme1regular";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["allcustome"];
    }
  }
  $output .= printRegularFooter($uid);
  $myfile = fopen($site_name, "w") or die("Unable to open file!");
  fwrite($myfile, $output);
  return $output;
}

function printCustomeInInterface($uid){
  global $conn;
  $output = "";
  $output .= returnInterfaceHeader($uid);
  $output .= printAllCustomeFromFile($uid);
  $output .= returnInterfaceFooter($uid);

  return $output;
}

function printCustomeTitel($uid){
  global $conn;
  $output = "";
  $sql = "SELECT custome_name FROM table_data WHERE user_id=$uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["custome_name"];
    }
  }
  return $output;
}

//gibt alle Module, die in einer File sind in Reihenfolge aus (innerhalb eines Strings)
function printAllCustomeFromFile($uid){
  global $conn;
  $file = 'userid'.$uid.'/custome_id'.$uid.'.php';
  $output = "";
  $sql = "SELECT costume_code, custome_name FROM Module WHERE custome_file='$file'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= '<div class="custome_'.$row["custome_name"].'">';
        $output.= $row["costume_code"];
        $output.= '</div>';
    }
  }
  return $output;
}

//printet dynamisch alle Module die in einer File benutzt werden und gibt die Möglicheit den Code innerhalb der Module zu verändern
function printFormforCustome($file, $checkValue){
  $a = oneColumnFromTable("custome_name", $file, "Module", "custome_file");
  $i = 1;
  global $conn;
  $form = '';
  $sql = "SELECT costume_code, custome_name FROM Module WHERE custome_file='$file'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($checkValue){
          $id = 'calendarCode'.$i;
        }else{
          $id = 'code'.$i;
        }
        $form .='<p>'.'Code Module '.$i.'</p> '.'<textarea name="'.$row["custome_name"].'" cols="40" rows="5" id="'.$id.'">'.$row["costume_code"].'</textarea>';
        //$form .= '<button type="submit" name="delete_module'.$i.'" formmethod="POST" value"'.$a[$i-1].'">Delete Module</button>';
        $form .= '<p>Check this Box if you want to delete this Module</p>';
        $form .= '<input type ="checkbox" name ="delete_module_'.$a[$i-1].'" value="'.$a[$i-1].'"/>';
        $i++;
    }
  }
  return $form;
}

function setNews($number, $news_number, $uid, $folder){
  global $conn;
  if($number == 1){
    $stmt = $conn->prepare("UPDATE table_data SET news_on=? WHERE user_id=?");
    $stmt->bind_param("ii", $number, $uid);
    $stmt->execute();
    $stmt = $conn->prepare("UPDATE table_data SET news_number=? WHERE user_id=?");
    $stmt->bind_param("ii", $news_number, $uid);
    $stmt->execute();
    $site_name = "news_id" .$uid .".php";
    if($folder != ""){
      $folder = $folder."/".$site_name;
    }else{
      $folder = $site_name;
    }
      //create a File for this module
    $myfile = fopen($folder, "w") or die("Unable to open file!");
    //write file in Database
    $stmt = $conn->prepare("UPDATE table_data SET news_file_name=? WHERE user_id=?");
    $stmt->bind_param("si", $folder, $uid);
    $stmt->execute();
    $stmt->close();

    printNewsInFile($uid, $folder);
  }
}

function printNewsInFile($uid, $site_name){
  global $conn;
  $output = '';
  $sql = "SELECT include, header, navbar_left, navbar_item, navbar_right, news, footer FROM Theme1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["include"].$row["header"].'</header>'.$row["navbar_left"].$row["navbar_item"].$row["navbar_right"].$row["news"].$row["footer"];
    }
  }
  $myfile = fopen($site_name, "w") or die("Unable to open file!");
  fwrite($myfile, $output);
  return $output;
}

function createNews($uid, $title, $date, $text, $image, $file){
  global $conn;
  $stmt = $conn->prepare("INSERT INTO new_news (title, date, text, image, user_id, news_file) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssis", $title, $date, $text, $image, $uid, $file);
  $stmt->execute();
}

function deleteNews($uid, $button){
  global $conn;
  $a = array();
  $b = array();
  $c = array();
  $file = $button;
  $sql = "SELECT title FROM new_news WHERE news_file='$file'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      array_push($a, $row['title']);
      array_push($b, 'delete_news_'.$row['title']);
      array_push($c, $_POST['delete_news_'.$row['title']]);
    }
  }
  for ($i=0; $i < sizeof($a); $i++) {
      $v = $b[$i];
      if($_POST[$v] == $a[$i]){
        $stmt = $conn->prepare("DELETE FROM new_news WHERE title = ? and news_file = ?");
        $stmt->bind_param('ss', $a[$i], $file);
        $stmt->execute();
      }
  }
}

function printAllNewsFromFile($uid){
  global $conn;
  $file = 'userid'.$uid.'/news_id'.$uid.'.php';
  $output = "";
  $sql = "SELECT title, date, text, image FROM new_news WHERE news_file='$file'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= '<div class="news">'.$row["title"].$row["date"].$row["text"].$row["image"].'</div>';
    }
  }
  return $output;
}

function numberofNews($title, $file, $table, $news_file){
  $a = oneColumnFromTable($title, $file, $table, $news_file);
  return sizeof($a);
}

function printFormforNews($uid, $file){
  global $conn;
  //in a sind alle news, die in file stehen enthalten
  $number_news = numberofNews("title", $file, "new_news", "news_file");
  $a = oneColumnFromTable("title", $file, "new_news", "news_file");
  //in $number_on_site ist die Anzahl der News pro Seite enthalten
  $number_on_site = oneValueFromTableData($uid, "news_number");
  $loopvar1 = ceil($number_news/$number_on_site);
  $loopvar2 = $number_on_site;
  if($number_news < $number_on_site){
    $loopvar1 = 1;
    $loopvar2 = $number_news;
  }
  $i = 1;
  $k = 1;
  $n = 0;
  $form = '';
  $js = '';
  $title_array = array();
  $date_array = array();
  $text_array = array();
  $image_array = array();
  $newsString = array();
  $sql = "SELECT title, date, text, image FROM new_news WHERE news_file='$file'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($title_array, $row['title']);
        array_push($date_array, $row['date']);
        array_push($text_array, $row['text']);
        array_push($image_array, $row['image']);
    }
  }
  if($number_news > 0){
    for ($i=0; $i < $loopvar1; $i++) {
      $form .= '<div id="news'.$k.'">';
      for ($j=0; $j < $loopvar2; $j++) {
        $h = $n +1;
        $form .='<p>'.'News Number '.$h.'</p>';
        $form .='<p>Titel </p>'.'<input type="text" class="form-control" class="news_title" placeholder="Title" name="'.'title_'.$title_array[$n].'" value="'.$title_array[$n].'">';
        $form .='<p>Date </p>'.'<input type="text" class="form-control" class="news_date" placeholder="Date" name="'.'date_'.$title_array[$n].'" value="'.$date_array[$n].'">';
        $form .='<p>Text</p> '.'<textarea name="'.'text_'.$title_array[$n].'" cols="40" rows="5" class="news_text">'.$text_array[$n].'</textarea>';
        $form .='<p>Image Link </p>'.'<input type="text" class="form-control" class="news_image" placeholder="Image" name="'.'image_'.$title_array[$n].'" value="'.$image_array[$n].'">';
        //$form .= '<button type="submit" name="delete_module'.$i.'" formmethod="POST" value"'.$a[$i-1].'">Delete Module</button>';
        $form .= '<p>Check this Box if you want to delete this News</p>';
        $form .= '<input type ="checkbox" name ="delete_news_'.$a[$n].'" value="'.$a[$n].'"/>';
        $n++;
      }
      if($k>1){
        $js .= 'document.getElementById("news'.$k.'").style.display="none";';
      }
      $form .= '</div>';
      array_push($newsString, $form);
      $form = "";
      $k++;
      if(($number_news - ($n+1))< $loopvar2){
        $loopvar2 = ($number_news - $h);
      }
    }
  }
  array_push($newsString, $js);
  return $newsString;
}

function printNewsInInterface($uid, $file){
  global $conn;
  $array = array();
  $output = '';
  $js = '';
  $number_news = numberofNews("title", $file, "new_news", "news_file");
  $newsperpage = oneValueFromTableData($_SESSION['u_id'], "news_number");
  $title_array = array();
  $date_array = array();
  $text_array = array();
  $image_array = array();
  $newsString = array();
  $titlecode = '';
  $datecode = '';
  $textcode = '';
  $imagecode = '';
  $endcode = '';

  //get Theme1 interface navbar
  $output .= returnInterfaceHeader($uid);
  //get interface data to print the news in
  $sql = "SELECT news_interface_code_title, news_interface_code_date, news_interface_code_text, news_interface_code_image, news_interface_code_end FROM Theme1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $titlecode = $row['news_interface_code_title'];
        $datecode = $row['news_interface_code_date'];
        $textcode = $row['news_interface_code_text'];
        $imagecode = $row['news_interface_code_image'];
        $endcode = $row['news_interface_code_end'];
    }
  }
  $sql = "SELECT title, date, text, image FROM new_news WHERE news_file='$file'";
  $result = $conn->query($sql);
  $i = $newsperpage;
  $j = 1;
  $k = true;
  $nppbool = false;
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($i == $newsperpage){
        if($k){
          $output .= '<div class="newsInterface';
          $output .= $j.'">';
          $k = false;
        }else{
          $output .= '</div> <div class="newsInterface';
          $output .= $j.'">';
          $nppbool = true;
        }
        $i = 0;
        $j++;
      }
      $output .= '<div class="news">'.$titlecode.$row['title'].$datecode.$row['date'].$textcode.$row['text'].$imagecode.$row['image'].$endcode.'</div>';
      if($j > 1 && $nppbool){
        $js .= 'document.getElementById("page_news").getElementsByClassName("newsInterface'.($j-1).'")[0].style.display="none";';
        $nppbool = false;
      }
      $i++;
    }
    if(($number_news % $newsperpage) != 0){
      $output .= '</div>';
    }
  }
  $output .= returnInterfaceFooter($uid);
  array_push($array, $output);
  array_push($array, $js);
  return $array;
}

function setCalendar($number, $uid, $folder){
  global $conn;
  $stmt = $conn->prepare("UPDATE table_data SET calendar_on=? WHERE user_id=?");
  $stmt->bind_param("ii", $number, $uid);
  $stmt->execute();
  $stmt->close();
  if($number == 1){
  $site_name = "calendar_id" .$uid .".php";
  if($folder != ""){
    $folder = $folder."/".$site_name;
  }else{
    $folder = $site_name;
  }
    //create a File for this module
  $myfile = fopen($folder, "w") or die("Unable to open file!");
  //write file in Database
  $stmt = $conn->prepare("UPDATE table_data SET calendar_file=? WHERE user_id=?");
  $stmt->bind_param("si", $folder, $uid);
  $stmt->execute();
  $stmt->close();

  $stmt = $conn->prepare("UPDATE Theme1 SET calendar_above=?");
  $item = '<?php echo printCalendarAbove($_SESSION["u_id"]';
  $item .= ');?>';
  $stmt->bind_param("s", $item);
  $stmt->execute();

  $stmt = $conn->prepare("UPDATE Theme1 SET calendar_under=?");
  $item = '<?php echo printCalendarUnder($_SESSION["u_id"]';
  $item .= ');?>';
  $stmt->bind_param("s", $item);
  $stmt->execute();
  //no extra nav item in code
  printCalendarInFile($uid, $folder);
  }
}

function printCalendarAbove($uid){
  global $conn;
  $output = '';
  $file = 'userid'.$uid.'/calendar_id'.$uid.'.php';
  $sql = "SELECT costume_code FROM Module WHERE custome_file='$file' and above_under=0";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["costume_code"];
    }
  }
  return $output;
}

function printCalendarUnder($uid){
  global $conn;
  $output = '';
  $file = 'userid'.$uid.'/calendar_id'.$uid.'.php';
  $sql = "SELECT costume_code FROM Module WHERE custome_file='$file' and above_under=1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["costume_code"];
    }
  }
  return $output;
}

function printCalendarInFile($uid, $site_name){
  global $conn;
  $output = '';
  $above = '';
  $under = '';
  $output .= printRegularHeader($uid, "calendar");
  $sql = "SELECT calendar_above, calendar_code, calendar_under FROM Theme1regular";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["calendar_above"].$row["calendar_code"].$row["calendar_under"];
    }
  }
  $output .= printRegularFooter($uid);
  $myfile = fopen($site_name, "w") or die("Unable to open file!");
  fwrite($myfile, $output);
  return $output;
}

function printCalendarInInterface($uid){
  global $conn;
  $output = "";
  $output .= returnInterfaceHeader($uid);
  $file = 'userid'.$uid.'/calendar_id'.$uid.'.php';
  $sql = "SELECT costume_code, custome_name FROM Module WHERE custome_file='$file' and above_under=0";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= '<div class="calendar_'.$row["custome_name"].'">';
        $output.= $row["costume_code"];
        $output.= '</div>';
    }
  }

  $sql = "SELECT calendar_code FROM Theme1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["calendar_code"];
    }
  }

  $sql = "SELECT costume_code, custome_name FROM Module WHERE custome_file='$file' and above_under=1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= '<div class="calendar_'.$row["custome_name"].'">';
        $output.= $row["costume_code"];
        $output.= '</div>';
    }
  }
  $output .= returnInterfaceFooter($uid);
  return $output;
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

function setJob($number, $numberjobs, $uid, $folder){
  global $conn;
  $bool_Value = 0;
  $emptystr = "";
  if($number == 1){
    $bool_Value = 1;
    $stmt = $conn->prepare("UPDATE table_data SET job_on=? WHERE user_id=?");
    $stmt->bind_param("ii", $bool_Value, $uid);
    $stmt->execute();
    $stmt = $conn->prepare("UPDATE table_data SET job_number=? WHERE user_id=?");
    $stmt->bind_param("ii", $numberjobs, $uid);
    $stmt->execute();
    $site_name = "job_id" .$uid .".php";
    if($folder != ""){
      $folder .= $folder."/".$site_name;
    }else{
      $folder = $site_name;
    }
    //create a File for this module
    $myfile = fopen($folder, "w") or die("Unable to open file!");
    //write file in Database
    $stmt = $conn->prepare("UPDATE table_data SET job_file_name=? WHERE user_id=?");
    $stmt->bind_param("si", $site_name, $uid);
    $stmt->execute();
    $stmt->close();
  }else{
    $stmt = $conn->prepare("UPDATE table_data SET job_on=? WHERE user_id=?");
    $stmt->bind_param("ii", $bool_Value, $uid);
    $stmt->execute();
  }
}

function printJob(){

}

function getJobTitle($uid) {
  global $conn;
  $output = "<p>";
  $sql = "SELECT job_title FROM jobs WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["job_title"];
        $output.= "</p>";
    }
  }
  return $output;
}

function setJobTitle() {

}

function getJobDescription($uid) {
  global $conn;
  $output = "<p>";
  $sql = "SELECT job_content FROM jobs WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["job_content"];
        $output.= "</p>";
    }
  }
  return $output;
}

function setJobDescription() {

}


function setImage($number, $uid, $folder){
    global $conn;
  //if($number == 1){
  //  $stmt = $conn->prepare("INSERT INTO Image (Image_url, user_id, image_name) VALUES (?, ?, ?, ?)");
  //  $stmt->bind_param("sis", $imageurl, $uid, $iname);
  //  $stmt->execute();
    $stmt = $conn->prepare("UPDATE table_data SET image_on=? WHERE user_id=?");
    $stmt->bind_param("ii", $number, $uid);
    $stmt->execute();
}

function printImage(){

}

function setGallery($number, $uid, $folder){
  global $conn;
  if($number == 1){
    $stmt = $conn->prepare("UPDATE table_data SET gallery_on=? WHERE user_id=?");
    $stmt->bind_param("ii", $number, $uid);
    $stmt->execute();

    $site_name = "gallery_id" .$uid .".php";
    if($folder != ""){
      $folder = $folder."/".$site_name;
    }else{
      $folder = $site_name;
    }
    //create a File for this module
    $myfile = fopen($folder, "w") or die("Unable to open file!");
    //write file in Database
    $stmt = $conn->prepare("UPDATE table_data SET gallery_file_name=? WHERE user_id=?");
    $stmt->bind_param("si", $folder, $uid);
    $stmt->execute();
    printGalleryInFile($uid, $folder);
  }else{
    $stmt = $conn->prepare("UPDATE table_data SET gallery_on=? WHERE user_id=?");
    $stmt->bind_param("ii", $number, $uid);
    $stmt->execute();
  }
}

function printGalleryInFile($uid, $folder){

}

function printGalleryInInterface($uid, $file){
  global $conn;
  $output = "";
  $output2 = "";
  $output3 = "";
  $output4 = "";
  $output.= returnInterfaceHeader($_SESSION['u_id']);

  $code = "";
  $sql = "SELECT interface_gallery FROM Theme1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $code .= $row['interface_gallery'];
    }
  }
  $output .= $code;
  $gallery = oneValueFromTableData($uid, "gallery_file_name");
  $galleryArray = oneColumnFromTable("gallery_name", $gallery, "Galleries", "gallery_file_name");
  $output .= '	<div id="fh5co-portfolio" data-section="portfolio">
			<div class="container">
				<div class="row">';
  for ($i=0; $i < sizeof($galleryArray); $i++) {
    $number = oneColumnFromTable("gallery_name", $galleryArray[$i], "Image", "gallery_name");
    if(sizeof($number) == 0){
      array_push($number, "Leere Gallerie");
    }
    $sizeNumber = sizeof($number);
    if(($i%3)==0){
      if($i<3){
        $output2 .= '<div class="col-md-2">';
      }
      $output2 .= '<div class="col-md-12 col-sm-12 animate-box">
        <div class="img-grid">
          <p>'.$number[0].'</p>
          <img src="Images/Slider/pic_'.(($i+1)%6).'.jpg"'.'alt="Free HTML5 template by FREEHTML5.co" class="img-responsive">
          <br>
        </div>
      </div>';
    }
    if(($i%3)==1){
      if($i<3){
        $output3 .= '<div class="col-md-2">';
      }
      $output3 .= '<div class="col-md-12 col-sm-12 animate-box">
        <div class="img-grid">
          <p>'.$number[0].'</p>
          <img src="Images/Slider/pic_'.(($i+1)%6).'.jpg"'.'alt="Free HTML5 template by FREEHTML5.co" class="img-responsive">
          <br>
        </div>
      </div>';
    }
    if(($i%3)==2){
      if($i<3){
        $output4 .= '<div class="col-md-2">';
      }
      $output4 .= '<div class="col-md-12 col-sm-12 animate-box">
        <div class="img-grid">
          <p>'.$number[0].'</p>
          <img src="Images/Slider/pic_'.((($i+1)%6)+1).'.jpg"'.'alt="Free HTML5 template by FREEHTML5.co" class="img-responsive">
          <br>
        </div>
      </div>';
    }
  }
  $output2 .= '</div>';
  $output3 .= '</div>';
  $output4 .= '</div>';
  $output .= $output2.$output3.$output4;
  $output .= '				</div>
  			</div>
  	</div>';

  $output.= returnInterfaceFooter($_SESSION['u_id']);
  return $output;
}

function printFormForGallery($uid, $file){
  global $conn;
  $output = array();
  $form = '';
  $js = '';
  //first we need the Galeries Names and the Number of the Galleries
  $number_galleries = oneColumnFromTable('gallery_name', $file, 'Galleries', 'gallery_file_name');
  //now we can loop throw all the Galeries
  if(sizeof($number_galleries)>0){
    $iterate = 1;
    for ($i=0; $i < sizeof($number_galleries); $i++) {
      if($i % 3 == 0){
        $form .= '<div id="galleries'.($iterate).'">';
        $iterate ++;
      }
      $gallery_name = $number_galleries[$i];
      $form .= '<div id="gallery'.($i+1).'">';
      $form .= '<p>Gallery: '.$gallery_name.'</p>';
      //now we need all the images from the i-th gallery
      $imageArray = array();
      $sql = "SELECT image_name FROM Image WHERE gallery_name = '$gallery_name'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            array_push($imageArray, $row['image_name']);
        }
      }
      //store the size of a galerie in an array
      array_push($output, sizeof($imageArray));
      $size = sizeof($imageArray);
      //now we can create a Form for all the images
      //we need k, c and n in order to build a form with a specific hierachie, so we have always 3 images in one class
      $n = 0;
      $c = 1;
      while ($size > 0) {
          $form .= '<div class="images'.($i+1).'_'.$c.'">';
          if($size < 4){
            for ($k=0; $k < $size; $k++) {

              $form .= '<p>Image: '.$imageArray[$k+$n].'</p>';
              $form .= '<input type ="checkbox" name ="delete_Image_'.$imageArray[$k+$n].'" value="'.$imageArray[$k+$n].'"/>';
              if($c > 1){
                $js .= 'document.getElementById("gallery'.($i+1).'").getElementsByClassName("images'.($i+1).'_'.$c.'")[0].style.display="none";';
              }
              if($k == $size-1){
                $size = 0;
              }
            }
          }
          else if($size > 3){
            for ($k=0; $k < 3; $k++) {
              $form .= '<p>Image: '.$imageArray[$k+$n].'</p>';
              $form .= '<input type ="checkbox" name ="delete_Image_'.$imageArray[$k+$n].'" value="'.$imageArray[$k+$n].'"/>';
              $size --;
              if($c > 1){
                $js .= 'document.getElementById("gallery'.($i+1).'").getElementsByClassName("images'.($i+1).'_'.$c.'")[0].style.display="none";';
              }
            }
          }
          $n += 3;
          $c ++;
          $form .= '</div>';
      }
      $form .= '<p>Check this Box if you want to delete this Gallery</p>';
      $form .= '<input type ="checkbox" name ="delete_Gallerie_'.$number_galleries[$i].'" value="'.$number_galleries[$i].'"/>';


      //now we create a Left and a Right button
      $form .= '<p>Choose an image to add to your gallery</p>';
      $form .='<p>Name </p>'.'<input type="text" class="form-control" class="name" placeholder="Title" name="'.'name_'.$number_galleries[$i].'" >';
      $form .= '<input type="file" name="add_image'.($i+1).'" accept="image/*">';
      $form .= '<button type="button" class="left'.($i+1).'" value="left'.($i+1).'"><</button>';
      $form .= '<button type="button" class="right'.($i+1).'" value="right'.($i+1).'">></button>';
      $form .= '</div>';
      if((($i+1) % 3 == 0 && $i > 0) || ($i == sizeof($number_galleries)-1)){
        $form .= '</div>';
      }
      if($iterate-1 > 1 && $iterate-1 < sizeof($number_galleries)-1){
        $js .= 'document.getElementById("galleries'.($iterate-1).'").style.display="none";';

      }
    }
    $form .= '<p>switch to left or to right in order to see the other galeries</p>';
    $form .= '<button type="button" class="left_gallery" value="left_gallery"><</button>';
    $form .= '<button type="button" class="right_gallery" value="right_gallery">></button>';
  }
  array_push($output, $js);
  array_push($output, $form);
  return $output;
}

function createImage($uid, $file){
  global $conn;
  $galleries = array();
  $postvalues = array();
  $postname = array();
  $sql = "SELECT gallery_name FROM Galleries WHERE gallery_file_name = '$file'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($galleries, $row['gallery_name']);
    }
  }
  for ($i=0; $i < sizeof($galleries); $i++) {
    $lu = $i +1;
    $var = 'add_image'.$lu;
    $var2 = 'name_'.$galleries[$i];
    array_push($postvalues, $_POST[$var]);
    array_push($postname, $_POST[$var2]);
  }
  for ($i=0; $i < sizeof($postvalues); $i++) {
    if(isset($postvalues[$i]) && $postvalues[$i]!= ""){
      $stmt = $conn->prepare("INSERT INTO Image (image_url, user_id, image_name, image_file_name, gallery_name) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("sisss", $postvalues[$i], $uid, $postname[$i], $file, $galleries[$i]);
      $stmt->execute();
    }
  }
}

function createGallery($uid, $file, $name){
  global $conn;
  $stmt = $conn->prepare("INSERT INTO Galleries (gallery_name, user_id, gallery_file_name) VALUES (?, ?, ?)");
  $stmt->bind_param("sis", $file, $uid, $name);
  $stmt->execute();
}

function deleteGalleries($uid, $file){
  global $conn;
  $a = array();
  $b = array();

  $sql = "SELECT gallery_name FROM Galleries WHERE gallery_file_name='$file'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($a, $row['gallery_name']);
        array_push($b, 'delete_Gallerie_'.$row['gallery_name']);
    }
  }

  for ($i=0; $i < sizeof($a); $i++){
    $v = $b[$i];
      if($_POST[$v] == $a[$i]){
        $stmt = $conn->prepare("DELETE FROM Galleries WHERE gallery_name = ? and gallery_file_name = ?");
        $stmt->bind_param('ss', $a[$i], $file);
        $stmt->execute();
        $stmt = $conn->prepare("DELETE FROM Image WHERE gallery_name = ? and image_file_name = ?");
        $stmt->bind_param('ss', $a[$i], $file);
        $stmt->execute();
      }
  }
}

function deleteImages($uid, $file){
  global $conn;
  $a = array();
  $b = array();

  $sql = "SELECT image_name FROM Image WHERE image_file_name='$file'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($a, $row['image_name']);
        array_push($b, 'delete_Image_'.$row['image_name']);
    }
  }

  for ($i=0; $i < sizeof($a); $i++){
    $v = $b[$i];
      if($_POST[$v] == $a[$i]){
        $stmt = $conn->prepare("DELETE FROM Image WHERE image_name = ? and image_file_name = ?");
        $stmt->bind_param('ss', $a[$i], $file);
        $stmt->execute();
      }
  }
}

function setBuilding($number, $uid, $folder){
  global $conn;
  $stmt = $conn->prepare("UPDATE table_data SET building_on=? WHERE user_id=?");
  $stmt->bind_param("ii", $number, $uid);
  $stmt->execute();
  if($number == 1){
  $site_name = "building_id" .$uid .".php";
  if($folder != ""){
    $folder = $folder."/".$site_name;
  }else{
    $folder = $site_name;
  }
  //create a File for this module
  $myfile = fopen($folder, "w") or die("Unable to open file!");
  //write file in Database
  $stmt = $conn->prepare("UPDATE table_data SET building_file_name=? WHERE user_id=?");
  $stmt->bind_param("si", $folder, $uid);
  $stmt->execute();
  }
}

#creates a .php file and returns the file name(name + id)
function createFile($id, $name, $folder){
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
  if($folder != ""){
    $folder = $folder."/".$site_name;
  }else{
    $folder = $site_name;
  }
  //$shell_string = "sudo chmod 777 " .$site_name;
  //shell_exec($shell_string);
  $myfile = fopen($folder, "w") or die("Unable to open file!");
  return $folder;
}

#takes the database name, the id name, the id, the value name und the file name and updates the database entry
function fileInDatabase($dname, $did, $didvalue, $dvalue, $fname, $folder, $imagefolder){
  global $conn;
  $filename = createFile($didvalue, $fname, $folder);
  $dbase = "UPDATE " .$dname ." SET " .$dvalue ."=? " ."WHERE " .$did ."=?";
  $stmt = $conn->prepare($dbase);
  $stmt->bind_param("si", $filename, $didvalue);
  $stmt->execute();

  $stmt = $conn->prepare("UPDATE table_data SET image_folder=? WHERE user_id=?");
  $stmt->bind_param("si", $imagefolder, $didvalue);
  $stmt->execute();
  $stmt->close();
  return $filename;
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
      header('Location: ../SignUp.php?signup=empty');
      exit();
    }else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
      header('Location: ../SignUp.php?signup=email');
      exit();
    }else if(checkDoubleRegistration($mail) == 1){
    header('Location: ../SignUp.php?signup=DoubleEmail');
      exit();
    }else{
      //Hasing the password
      $hashedpwd = password_hash($psw, PASSWORD_DEFAULT);
      //Insert data into Database
      $stmt = $conn->prepare("INSERT INTO registration (mail, password, repassword) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $mail, $psw, $psw_repeat);
      $stmt->execute();
      $lastid = mysqli_insert_id($conn);
      $stmt = $conn->prepare("UPDATE registration SET data_id=? WHERE reg_id=?");
      $stmt->bind_param("ii", $lastid, $lastid);
      $stmt->execute();
      $stmt = $conn->prepare("INSERT INTO table_data (user_id) VALUES (?)");
      $stmt->bind_param("i", $lastid);
      $stmt->execute();
      header('Location: ../SignUp.php?signup=success');
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
      header('Location: ../SignUp.php?login=empty');
      exit();
    }else{
      $sql = "SELECT reg_id, mail, password FROM registration WHERE mail='$mail'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if($resultCheck < 1){
        header('Location: ../startsite.php?login=error1');
        exit();
      }else{
        if($row = mysqli_fetch_assoc($result)){
          //De-hashing the Password
          $hashedPwdCheck = strcmp($psw, $row['password']);
          if($hashedPwdCheck < 0 ||  $hashedPwdCheck > 0){
            header('Location: ../startsite.php?login=error2');
            exit();
          }else if($hashedPwdCheck == 0){
            //Log In the user here
            $_SESSION['u_id'] = $row['reg_id'];
            $_SESSION['u_mail'] = $row['mail'];
            $_SESSION['u_pwd'] = $row['password'];
            header('Location: ../interface.php?login=success');
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
  header("Location: ../startsite.php?logout=success");
  exit();
}

//if the cutome module is part of your side this functions checks whether a section should be created or not
function CustomeOn($uid){
  global $conn;
  $number = 0;
  $sql = "SELECT custome_on FROM table_data WHERE user_id = $uid";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $number = $row['custome_on'];

  return $number;
}

function CalendarOn($uid){
  global $conn;
  $number = 0;
  $sql = "SELECT calendar_on FROM table_data WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $number = $row['calendar_on'];
    }
  }
  return $number;
}

function NewsOn($uid){
  global $conn;
  $number = 0;
  $sql = "SELECT news_on FROM table_data WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $number = $row['news_on'];
    }
  }
  return $number;
}

function ImageOn($uid){
  global $conn;
  $number = 0;
  $sql = "SELECT image_on FROM table_data WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $number = $row['image_on'];
    }
  }
  return $number;
}

function GalleryOn($uid){
  global $conn;
  $number = 0;
  $sql = "SELECT gallery_on FROM table_data WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $number = $row['gallery_on'];
    }
  }
  return $number;
}

function BuildingOn($uid){
  global $conn;
  $number = 0;
  $sql = "SELECT building_on FROM table_data WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $number = $row['building_on'];
    }
  }
  return $number;
}

#all function that create a site for Theme1
function returnphpinclude(){
  global $conn;
  $output = "";
  $sql = "SELECT include FROM Theme1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["include"];
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

function returnInterfaceHeader($uid){
  global $conn;
  $output = "";
  $name= "";
  $image= "";
  $sql = "SELECT name, image FROM Page WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name.= $row["name"];
        $image.= $row["image"];
    }
  }
  $sql = "SELECT interface_code_left, interface_code_name, interface_code_image, navfunktion FROM Theme1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["interface_code_left"];
        $output.= $name;
        $output.= $row["interface_code_name"];
        $output.= $image;
        $output.= $row["interface_code_image"];
        $output.= $row["navfunktion"];
    }
  }

  return $output;
}

function returnInterfaceFooter($uid){
  global $conn;
  $output = "";
  $street= "";
  $plz= "";
  $ort= "";
  $number= "";
  $fax= "";
  $mail= "";
  $sql = "SELECT street, plz, ort, number, fax, mail FROM Page WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $street.= $row["street"];
        $plz.= $row["plz"];
        $ort.= $row["ort"];
        $number.= $row["number"];
        $fax.= $row["fax"];
        $mail.= $row["mail"];
    }
  }
  $sql = "SELECT interface_code_footer_start, interface_code_street,
   interface_code_plz, interface_code_ort, interface_code_tel, interface_code_fax, interface_code_mail, interface_code_end FROM Theme1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["interface_code_footer_start"];
        $output.= $street;
        $output.= $row["interface_code_street"];
        $output.= $plz;
        $output.= $row["interface_code_plz"];
        $output.= $ort;
        $output.= $row["interface_code_tel"];
        $output.= $number;
        $output.= $row["interface_code_fax"];
        $output.= $fax;
        $output.= $row["interface_code_mail"];
        $output.= $mail;
        $output.= $row["interface_code_end"];
    }
  }
  return $output;
}

function printRegularHeader($uid, $type){
  global $conn;
  returnNavbar($uid);
  returnSlider($uid);
  $output = "";
  $cheader= false;
  if($type == "calendar"){
    $cheader = true;
  }
  $name = "";
  $image = "";
  $sql = "SELECT name, image FROM Page WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name.= $row["name"];
        $image.= $row["image"];
    }
  }
  $sql = "SELECT include, header, calendar_header, regular_code_left, regular_code_name, regular_code_image, navfunktion, 	regular_code_right, slider, regular_code_right2, regular_code_header, regular_code_text FROM Theme1regular";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($cheader){
        $output.= $row["include"].$row["header"].$row["calendar_header"].$row["regular_code_left"].$name.$row["regular_code_name"].$image.$row["regular_code_image"].$row["navfunktion"];
      }
      else if(!$cheader){
        $output.= $row["include"].$row["header"].$row["regular_code_left"].$name.$row["regular_code_name"].$image.$row["regular_code_image"].$row["navfunktion"];
      }
    }
  }
  return $output;
}

function returninterfacecode($uid){
  global $conn;
  returnNavbar($uid);
  $header = returnInterfaceHeader($uid);
  $footer = returnInterfaceFooter($uid);
  $output = "";
  $desc = "";
  $text= "";
  $sql = "SELECT header, text FROM Page WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $desc.= $row["header"];
        $text.= $row["text"];
    }
  }
  $sql = "SELECT interface_code_right, slider, interface_code_right2, interface_code_header, interface_code_text FROM Theme1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $header;
        $output.= $row["interface_code_right"];
        $output.= $row["slider"];
        $output.= $row["interface_code_right2"];
        $output.= $desc;
        $output.= $row["interface_code_header"];
        $output.= $text;
        $output.= $row["interface_code_text"];
        $output.= $footer;
    }
  }
  return $output;
}

function returnNavbar($uid){
  global $conn;
  $output = '<div class="row text-center">
  		<div class="col">
  			<nav class="navbar2">
          <div class="col-sm-3"></div>
  			      <ul class="nav navbar-nav pull-sm-left">
              <li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>';
  if(CustomeOn($uid) == 1){
    $var = printCustomeTitel($uid);
    $output.= '<li><a href="#"><span class="glyphicon glyphicon-star"></span>'.$var.'</a></li>';
  }
  if(CalendarOn($uid) == 1){
    $output.= '<li><a href="#"><span class="glyphicon glyphicon-calendar"></span>Events</a></li>';
  }
  if(NewsOn($uid) == 1){
    $output.= '<li><a href="#"><span class="glyphicon glyphicon-globe"></span>Neuigkeiten</a></li>';
  }
  if(GalleryOn($uid) == 1){
    $output.= '<li><a href="#"><span class="glyphicon glyphicon-picture"></span>Gallerie</a></li>';
  }
  if(BuildingOn($uid) == 1){
    $output.= '<li><a href="#"><span class="glyphicon glyphicon-th"></span>Lageplan</a></li>';
  }
  $output .= '</ul>
            </nav>
          </div>
        </div>';
  $stmt = $conn->prepare("UPDATE Theme1 SET navfunktion=?");
  $stmt->bind_param("s", $output);
  $stmt->execute();
  $stmt = $conn->prepare("UPDATE Theme1regular SET navfunktion=?");
  $stmt->bind_param("s", $output);
  $stmt->execute();
  return $output;
}

//returns the html code for the Slider of Theme1
function returnSlider($uid){
  global $conn;
  $output = '';
  $name = 'slider'.$uid;
  $slider = oneColumnFromTable("image_url", $name, "Image", "image_name");
  var_dump($slider);
  for ($i=0; $i < sizeof($slider); $i++) {
    if($i == 0){
      $output .= '<div class="item active">
                  <img src="'.$slider[$i].'">
                </div>';
    }else{
      $output .= '<div class="item">
                  <img src="'.$slider[$i].'">
                </div>';
    }
  }
  $stmt = $conn->prepare("UPDATE Theme1 SET slider=?");
  $stmt->bind_param("s", $output);
  $stmt->execute();
  $stmt = $conn->prepare("UPDATE Theme1regular SET slider=?");
  $stmt->bind_param("s", $output);
  $stmt->execute();
  return $output;
}

function oneValueFromTableData($uid, $column){
  global $conn;
  $sql = "SELECT $column FROM table_data WHERE user_id = $uid";
  $number = "";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $number = $row[$column];
    }
  }
  return $number;
}

//returns an array with all values from a specific column
function oneColumnFromTable($column, $file, $table, $columnfile){
  global $conn;
  $sql = "SELECT $column FROM $table WHERE $columnfile='$file'";
  $a = array();
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($a, $row[$column]);
    }
  }
  return $a;
}

//Generierung des ersten Themes
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

//updatet die Werte und den Code innerhalb einer File im custome Module
function updateCustome($file, $uid, $newsuse){
  global $conn;
  $a = array();
  $post = array();
  $sql = "SELECT custome_name FROM Module WHERE custome_file='$file'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $v = $row['custome_name'];
        array_push($a, $row['custome_name']);
        $val = $_POST[$v];
        array_push($post, $val);
    }
    for ($i=0; $i < sizeof($a); $i++) {
      $name = $a[$i];
      $code = $post[$i];
      $stmt = $conn->prepare("UPDATE Module SET costume_code=? WHERE custome_name=? and custome_file=?");
      $stmt->bind_param("sss", $code, $name, $file);
      $stmt->execute();
    }
  }
  if(!$newsuse){
    $stmt = $conn->prepare("UPDATE table_data SET custome_name=? WHERE user_id=?");
    $stmt->bind_param("ss", $_POST['nav_title'], $uid);
    $stmt->execute();
  }
}

function updateStartsite($uid, $file, $name, $image, $header, $text, $street, $plz, $ort, $tel, $fax, $mail, $slider){
  global $conn;
  $stmt = $conn->prepare("UPDATE Page SET name=? WHERE page_file_name=?");
  $stmt->bind_param("ss", $name, $file);
  $stmt->execute();
  $stmt = $conn->prepare("UPDATE Page SET header=? WHERE page_file_name=?");
  $stmt->bind_param("ss", $header, $file);
  $stmt->execute();
  $stmt = $conn->prepare("UPDATE Page SET text=? WHERE page_file_name=?");
  $stmt->bind_param("ss", $text, $file);
  $stmt->execute();
  $stmt = $conn->prepare("UPDATE Page SET street=? WHERE page_file_name=?");
  $stmt->bind_param("ss", $street, $file);
  $stmt->execute();
  $stmt = $conn->prepare("UPDATE Page SET plz=? WHERE page_file_name=?");
  $stmt->bind_param("ss", $plz, $file);
  $stmt->execute();
  $stmt = $conn->prepare("UPDATE Page SET mail=? WHERE page_file_name=?");
  $stmt->bind_param("ss", $mail, $file);
  $stmt->execute();
  $stmt = $conn->prepare("UPDATE Page SET number=? WHERE page_file_name=?");
  $stmt->bind_param("ss", $tel, $file);
  $stmt->execute();
  $stmt = $conn->prepare("UPDATE Page SET ort=? WHERE page_file_name=?");
  $stmt->bind_param("ss", $ort, $file);
  $stmt->execute();
  $stmt = $conn->prepare("UPDATE Page SET fax=? WHERE page_file_name=?");
  $stmt->bind_param("ss", $fax, $file);
  $stmt->execute();
  if(isset($slider) && $slider != ""){
    $val = oneValueFromTableData($uid, 'image_folder');
    $slider = str_replace('C:\\fakepath\\',$val,$slider);
    $stmt = $conn->prepare("INSERT INTO Image (image_url, user_id, image_name, image_file_name) VALUES (?, ?, ?, ?)");
    $name = 'slider'.$uid;
    $stmt->bind_param("siss",$slider, $uid, $name, $file);
    $stmt->execute();
  }
  if(isset($image) && $image != ""){
    $stmt = $conn->prepare("UPDATE Page SET image=? WHERE page_file_name=?");
    $stmt->bind_param("ss", $image, $file);
    $stmt->execute();
  }
}

function updateOneModule($uid, $file, $name, $code){
  if($code == ""){
    $code = "empty";
  }
  global $conn;
  $numberCustome = oneColumnFromTable("custome_name", $file, "Module", "custome_file");
  for ($i=0; $i < sizeof($numberCustome); $i++) {
    if($numberCustome[$i] == $name){
      $stmt = $conn->prepare("UPDATE Module SET costume_code=? WHERE custome_name=? and custome_file=?");
      $stmt->bind_param("sss", $code, $name, $file);
      $stmt->execute();
    }
  }
}

function updateNews($file, $uid){
  global $conn;
  $a = array();

  $post_titel = array();
  $post_date = array();
  $post_text = array();
  $post_image = array();

  $sql = "SELECT title FROM new_news WHERE news_file='$file'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $var1 = 'title_'.$row['title'];
        $var2 = 'date_'.$row['title'];
        $var3 = 'text_'.$row['title'];
        $var4 = 'image_'.$row['title'];
        array_push($a, $row['title']);

        array_push($post_titel, $_POST[$var1]);
        array_push($post_date, $_POST[$var2]);
        array_push($post_text, $_POST[$var3]);
        array_push($post_image, $_POST[$var4]);
    }
    for ($i=0; $i < sizeof($a); $i++) {
      $value = $a[$i];

      $p_titel = $post_titel[$i];
      $p_date = $post_date[$i];
      $p_text = $post_text[$i];
      $p_image = $post_image[$i];
      $stmt = $conn->prepare("UPDATE new_news SET date=? WHERE title=?");
      $stmt->bind_param("ss", $p_date, $value);
      $stmt->execute();
      $stmt = $conn->prepare("UPDATE new_news SET text=? WHERE title=?");
      $stmt->bind_param("ss", $p_text, $value);
      $stmt->execute();
      $stmt = $conn->prepare("UPDATE new_news SET image=? WHERE title=?");
      $stmt->bind_param("ss", $p_image, $value);
      $stmt->execute();
      $stmt = $conn->prepare("UPDATE new_news SET title=? WHERE title=?");
      $stmt->bind_param("ss", $p_titel, $value);
      $stmt->execute();
    }
  }
}
//we dont use them atm
function left($array_for_js, $leftright, $jsnumber, $jstable_data){
  $loop_number = $jsnumber/$jstable_data;
  $lr = $leftright;
  $array_for_js = array();
  if($leftright > 1){
    $lr--;
    for ($i=0; $i < $loop_number; $i++) {
      if($i+1 == $lr){
        $temp = "document.getElementById('news".($i+1)."').style.display='block';";
        array_push($array_for_js, $temp);
      }else{
        $temp = "document.getElementById('news".($i+1)."').style.display='none';";
        array_push($array_for_js, $temp);
      }
    }
  }
}
//we dont use them atm
function right($array_for_js, $leftright, $jsnumber, $jstable_data){
  $loop_number = $jsnumber/$jstable_data;
  $lr = $leftright;
  $array_for_js = array();
  if($leftright < $loop_number){
    $lr++;
    for ($i=0; $i < $loop_number; $i++) {
      if($i+1 == $lr){
        $temp = "document.getElementById('news".($i+1)."').style.display='block';";
        array_push($array_for_js, $temp);
      }else{
        $temp = "document.getElementById('news".($i+1)."').style.display='none';";
        array_push($array_for_js, $temp);
      }
    }
  }
}
//we dont use them atm
function printjs($a){
  for ($i=0; $i < sizeof($a); $i++) {
   echo $a[$i].';';
  }
}

function createFolder($uid){
  $name = 'userid'.$uid;
  if (!file_exists($name)){
    mkdir($name, 0777, true);
  }
  $string = 'sudo chmod 777'.$name;
  shell_exec($string);
  return $name;
}

function createImageFolder($uid){
  $name = 'Images/';
  if (!file_exists($name)){
    mkdir($name, 0777, true);
  }
  $string = 'sudo chmod 777 '.$name;
  shell_exec($string);
  return $name;
}

//fuer jedes modul muss eine file erstellt werden und dann in die database eingetragen werden
//database abfragen aendern fuer on
//image form muss angepasst werden

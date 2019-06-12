<?php
include 'connection.php';

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
function setStart($uid, $file, $name, $logo, $text, $header, $folder, $slider, $slider2){
  global $conn;
  $val = oneValueFromTableData($uid, 'image_folder');
  $logo = $val.$logo;
  $slider = $val.$slider;
  $slider2 = $val.$slider2;
  $stmt = $conn->prepare("UPDATE table_data SET start_on=? WHERE user_id=?");
  $number = 1;
  $stmt->bind_param("ii", $number, $uid);
  $stmt->execute();
  $stmt = $conn->prepare("INSERT INTO Page (page_file_name, name, header, text, image, user_id) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssi", $file, $name, $header, $text, $logo, $uid);
  $stmt->execute();
  $stmt = $conn->prepare("INSERT INTO Image (image_url, user_id, image_name, image_file_name, gallery_name) VALUES (?, ?, ?, ?, ?)");
  $name = 'slider'.$uid;
  $img1 = "sliderImage1";
  $stmt->bind_param("sisss", $slider, $uid, $name, $file, $img1);
  $stmt->execute();
  $stmt = $conn->prepare("INSERT INTO Image (image_url, user_id, image_name, image_file_name, gallery_name) VALUES (?, ?, ?, ?, ?)");
  $name = 'slider'.$uid;
  $img2 = "sliderImage2";
  $stmt->bind_param("sisss", $slider2, $uid, $name, $file, $img2);
  $stmt->execute();

  $var = '<?php $file = "userid".$_SESSION["u_id"]."/gallery_id".$_SESSION["u_id"].".php";';
  $var .=  'echo printStartInFileTable($_SESSION["u_id"], $file); ?>';
  $stmt = $conn->prepare("UPDATE Theme1regular SET start=?");
  $stmt->bind_param("s", $var);
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
  $output = "";
  $include = "";
  $sql = "SELECT start, include FROM Theme1regular";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["include"].$row["start"];
    }
  }
  $myfile = fopen($file, "w") or die("Datei konnte nicht geöffnet werden!");
  fwrite($myfile, $output);
}

function printStartInFileTable($uid, $file){
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
  $NewsFile = 'userid'.$uid.'/news_id'.$uid.'.php';
  $NewsCode = '';
  if(NewsOn($uid)==1){
    $allnews = allNewsForFile($uid, $NewsFile);
    $NewsCode .= $allnews[0];
    $NewsCode .= $allnews[1];
  }
  $allnews = allNewsForFile($uid, $NewsFile);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name.= $row["name"];
        $header.= $row["header"];
        $text.= $row["text"];
        $image.= '../'.$row["image"];
    }
  }
  $sql = "SELECT header, regular_code_left, regular_code_name, regular_code_image, navfunktion, 	regular_code_right, slider, regular_code_right2, regular_code_header, regular_code_text FROM Theme1regular";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["header"].$row["regular_code_left"].$name.$row["regular_code_name"].$image.$row["regular_code_image"].$row["navfunktion"].$row["regular_code_right"].$row["slider"].$row["regular_code_right2"].$header.
        $row["regular_code_header"].$text.$row["regular_code_text"].$NewsCode.$footer;
    }
  }
  //$myfile = fopen($file, "w") or die("Unable to open file!");
  //fwrite($myfile, $output);
  return $output;
}

function printFormForStart($file){
  global $conn;
  $form = '';
  $a = oneColumnFromTable("image_url", $file, "Image", "image_file_name");
  $b = oneColumnFromTable("image_id", $file, "Image", "image_file_name");
  for ($i=0; $i < sizeof($a); $i++) {
    $form .= '<div class="wrapper2">';
    $form .= '<button class="btm">Slider '.($i+1).'</button>';
    $form .= '<input type="file" id="school_slider'.($i+1).'" name="school_slider'.($i+1).'" />';
    $form .= '</div>';
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
  $myfile = fopen($folder, "w") or die("Datei konnte nicht geöffnet werden!");
  //write file in Database
  $stmt = $conn->prepare("UPDATE table_data SET custome_file_name=? WHERE user_id=?");
  $stmt->bind_param("si", $folder, $uid);
  $stmt->execute();

  $stmt = $conn->prepare("UPDATE Theme1 SET navbar_item=?");
  $item = '<?php echo printNavItemFunction($_SESSION["u_id"]);?>';
  $stmt->bind_param("s", $item);
  $stmt->execute();
  //standart value for custome Module
  createCustome($_SESSION['u_id'], "Muster", "<p>Dies ist ein Mustermodul.</p>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>", "Beispiel");
  printAllCustomeFromFile($_SESSION["u_id"]);

  $code = $name;
  $stmt = $conn->prepare("UPDATE table_data SET custome_name=? WHERE user_id=?");
  $stmt->bind_param("si", $code, $uid);
  $stmt->execute();
  }
  if($number == 1){
    printCustomeInFileTable($uid, $folder);
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
  //header('Location: http://localhost/Grundschule/personalSite.php');
}

//checkbox System
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

function deleteCustomeButton($name, $file){
  global $conn;
  $stmt = $conn->prepare("DELETE FROM Module WHERE custome_name = ? and custome_file = ?");
  $stmt->bind_param('ss', $name, $file);
  $stmt->execute();
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

function printCustomeInFileTable($uid, $site_name){
  global $conn;
  $output = "";
  $output .= printRegularHeader($uid, "");
  $sql = "SELECT include, allcustome FROM Theme1regular";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["allcustome"];
    }
  }
  $output .= printRegularFooter($uid);
  $myfile = fopen($site_name, "w") or die("Datei konnte nicht geöffnet werden!");
  fwrite($myfile, $output);
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
  return $output;
}

function printCustomeInInterface($uid, $file){
  global $conn;
  $output = "";
  $output .= returnInterfaceHeader($uid);
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
  $stmt = $conn->prepare("UPDATE Theme1regular SET allcustome=?");
  $stmt->bind_param("s", $output);
  $stmt->execute();
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
        $form .= '<textarea style="resize: none;" name="'.$row["custome_name"].'" class="codeModuleSave" cols="40" rows="5" id="'.$id.'">'.$row["costume_code"].'</textarea>';
        $form .= '<button type="button" class="btn btn-danger deleteButton" name="delete" value="'.$a[$i-1].'" formmethod="POST">Löschen</button>';
        $form .= '<button type="button" class="btn btn-info saveButton changes'.$i.'" name="changes'.$i.'" value="'.$a[$i-1].'" formmethod="POST">Speichern</button>';
        $name = 'changes'.$i;
        $_SESSION[$name] = $a[$i-1];
        //$form .= '<button type="submit" name="delete_module'.$i.'" formmethod="POST" value"'.$a[$i-1].'">Delete Module</button>';
        //$form .= '<input type ="checkbox" name ="delete_module_'.$a[$i-1].'" value="'.$a[$i-1].'"/>';
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
    $myfile = fopen($folder, "w") or die("Datei konnte nicht geöffnet werden!");
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

function createNews($uid, $title, $date, $text, $file){
  var_dump($title);
  global $conn;
  $stmt = $conn->prepare("INSERT INTO new_news (title, date, text, user_id, news_file) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssis", $title, $date, $text, $uid, $file);
  $stmt->execute();
}

function deleteNews($uid, $button){ //function for chechbox system
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

function deleteNews2($uid, $modul, $file){ //function for latest system
  global $conn;
  $stmt = $conn->prepare("DELETE FROM new_news WHERE title = ? and news_file = ?");
  $stmt->bind_param('ss', $modul, $file);
  $stmt->execute();
  $stmt->close();
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
        $form .= '<div class="News">';
        $form .='<div class="news_title"><input type="text" class="form-control" placeholder="Titel" name="'.'title_'.$title_array[$n].'" value="'.$title_array[$n].'"></div>';
        $form .='<div class="news_date"><input type="text" class="form-control" placeholder="Datum" name="'.'date_'.$title_array[$n].'" value="'.$date_array[$n].'"></div>';
        $form .='<textarea name="'.'text_'.$title_array[$n].'" cols="40" rows="5" class="news_text">'.$text_array[$n].'</textarea>';
        $form .= '<button type="button" class="btn btn-danger deleteNews" name="deleteNews" value="'.$title_array[$j].'" formmethod="POST">Löschen</button>';
        $form .= '<button type="button" class="btn btn-info safeNews" name="safeNews" value="'.$title_array[$j].'" formmethod="POST">Speichern</button>';
        $form .= '</div>';
      //  $form .= '<button type="button" class="btn btn-danger deleteButton deleteNews" name="delete" value="'.$title_array[$j].'" formmethod="POST">Löschen</button>';
        //$form .='<div class="news_title"><input type="text" class="form-control" placeholder="Titel" name="'.'title_'.$title_array[$n].'" value="'.$title_array[$n].'"></div>';
        //$form .='<div class="news_date"><input type="text" class="form-control" placeholder="Datum" name="'.'date_'.$title_array[$n].'" value="'.$date_array[$n].'"></div>';
        //$form .='<textarea name="'.'text_'.$title_array[$n].'" cols="40" rows="5" class="news_text">'.$text_array[$n].'</textarea>';
        //$form .= '<button type="button" class="btn btn-info saveButton changes'.$j.'" name="changes'.$j.'" value="'.$title_array[$j].'" formmethod="POST">Speichern</button>';
        //$form .= '<button type="submit" name="delete_module'.$i.'" formmethod="POST" value"'.$a[$i-1].'">Delete Module</button>';
        //$form .= '<p>Diese Box auswählen, um die News zu entfernen</p>';
        //$form .= '<input type ="checkbox" name ="delete_news_'.$a[$n].'" value="'.$a[$n].'"/>';
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
function allNewsForFile($uid, $file){
  global $conn;
  $array = array();
  $output = '';
  $js = '<script>';
  //Anzahl aller News
  $number_news = numberofNews("title", $file, "new_news", "news_file");
  //Anzahl der News die auf der Seite angezeigt werden sollen
  $newsperpage = oneValueFromTableData($_SESSION['u_id'], "news_number");
  $title_array = array();
  $date_array = array();
  $text_array = array();
  //$image_array = array();
  $newsString = array();
  //get interface data to print the news in
  $sql = "SELECT title, date, text FROM new_news WHERE news_file='$file'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($title_array, $row['title']);
        array_push($date_array, $row['date']);
        array_push($text_array, $row['text']);
    }
  }
  //check number of news
  $loopvar = 0;
  if($number_news <= $newsperpage){
    $loopvar = $number_news;
  }else{
    $loopvar = $newsperpage;
  }
  $output .= '<div class="row">';
  $output .= '<div class="col-sm-3"></div>';
  $output .= '<div class="col-sm-6"><h1 class="text-center">Neuigkeiten</h1><hr></div>';
  $output .= '<div class="col-sm-3"></div>';
  $output .= '</div>';

  $k = 0;
  $js_Number = 1;
  while($k < $number_news){
    //var_dump($k);
    //Container for one site with all News for one site
    $output .= '<div class="row News'.$js_Number.'">';
    for ($i=0; $i < $loopvar; $i++) {
      //if all news are throw the loop, exit the loop
      if($number_news == $k){
        break;
      }else{
        $output .= '<div class="newsInterface'.($k+1).'">';
        $output .=  '<div class="col-sm-3"></div>';
        $output .=  '<div class="col-sm-6 innerNews">
                        <div class="row">
                        <div class="col-sm-2"></div>
                          <div class="col-sm-7 text-black text-center"><h4>'.$title_array[$k].'</h4></div>
                          <div class="col-sm-3 text-black text-right"><h5>'.$date_array[$k].'</h5></div>
                        </div>
                        <br><br>
                        <div class="row">
                          <div class="col-sm-12"><p>'.$text_array[$k].'</p></div>
                        </div>
                      </div>';
        $output .=  '<div class="col-sm-3"></div>';
        $output .= '</div>';
        if($number_news > $k){
          $output .= '<div class="row"><div class="col-sm-12"><br></div></div>';
        }
      }
      $k ++;
    }
    // close the News div
    $output .= '</div>';
    if($k > $newsperpage){
      $js .= 'document.getElementsByClassName("News'.$js_Number.'")[0].style.display="none";';
    }
    $js_Number ++;
  }
  //buttons for left and right
  $output .= '<div class="row"><div class="col-sm-3"></div><div class="col-sm-6">';
  $output .= '<button type="button" class="btn btn-info NewsButton LeftNews">Links</button>';
  $output .= '<button type="button" class="btn btn-info NewsButton RightNews">Rechts</button>';
  $output .= '</div><div class="col-sm-3"></div></div><br><br>';
  //end of the container
  $js .= 'var loop_number ='.ceil($number_news/$newsperpage).';
  var currentPageLeftRight = 1;
  $(document).ready(function () {
  $(".LeftNews").click(function (){
    if(currentPageLeftRight > 1){
      currentPageLeftRight --;
      for (var i = 0; i < loop_number; i++) {
        if((i+1) == currentPageLeftRight){
          $(".News"+(i+1)).show()
        }else{
          $(".News"+(i+1)).hide()
        }
      }
    }
  });

  $(".RightNews").click(function (){
    if(currentPageLeftRight < loop_number){
      currentPageLeftRight ++;
      for (var i = 0; i < loop_number; i++) {
        if((i+1) == currentPageLeftRight){
          $(".News"+(i+1)).show()
        }else{
          $(".News"+(i+1)).hide()
        }
      }
    }
  });
});
  </script>';
  array_push($newsString, $output);
  array_push($newsString, $js);
  return $newsString;
}

function allNews($uid, $file){
    global $conn;
    $array = array();
    $output = '';
    $js = '';
    //Anzahl aller News
    $number_news = numberofNews("title", $file, "new_news", "news_file");
    //Anzahl der News die auf der Seite angezeigt werden sollen
    $newsperpage = oneValueFromTableData($_SESSION['u_id'], "news_number");
    $title_array = array();
    $date_array = array();
    $text_array = array();
    //$image_array = array();
    $newsString = array();
    //get interface data to print the news in
    $sql = "SELECT title, date, text FROM new_news WHERE news_file='$file'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          array_push($title_array, $row['title']);
          array_push($date_array, $row['date']);
          array_push($text_array, $row['text']);
      }
    }
    //check number of news
    $loopvar = 0;
    if($number_news <= $newsperpage){
      $loopvar = $number_news;
    }else{
      $loopvar = $newsperpage;
    }
    //build all news
    $output .= '<div class="container">';
    $output .= '<hr><h1 class="text-center">Ereignisse</h1><hr>';
    $k = 0;
    $js_Number = 1;
    while($k < $number_news){
      //var_dump($k);
      //Container for one site with all News for one site
      $output .= '<div class="News'.$js_Number.'">';
      for ($i=0; $i < $loopvar; $i++) {
        //if all news are throw the loop, exit the loop
        if($number_news == $k){
          break;
        }else{
          $output .= '<div class="row newsInterface'.($k+1).'">';
          $output .=  '<div class="col-sm-2"></div>';
          $output .=  '<div class="col-sm-8 innerNews">
                          <div class="row">
                          <div class="col-sm-2"></div>
                            <div class="col-sm-7 text-black text-center"><h5>'.$title_array[$k].'</h5></div>
                            <div class="col-sm-3 text-black text-right"><h6>'.$date_array[$k].'</h6></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12 text-center text-center"><p>'.$text_array[$k].'</p></div>
                          </div>
                        </div>';
          $output .=  '<div class="col-sm-2"></div>';
          $output .= '</div>';
          if($number_news > $k){
            $output .= '<div class="row"><div class="col-sm-12"><br></div></div>';
          }
        }
        $k ++;
      }
      // close the News div
      $output .= '</div>';
      if($k > $newsperpage){
        $js .= 'document.getElementById("page_news").getElementsByClassName("News'.$js_Number.'")[0].style.display="none";';
      }
      $js_Number ++;
    }
    //buttons for left and right
    $output .= '<div class="col-sm-2"></div><div class="col-sm-8">';
    $output .= '<button type="button" class="btn btn-info NewsButton LeftNews">Links</button>';
    $output .= '<button type="button" class="btn btn-info NewsButton RightNews">Rechts</button>';
    $output .= '</div><div class="col-sm-2"></div>';
    //end of the container
    $output .= '</div>';
    array_push($newsString, $output);
    array_push($newsString, $js);
    return $newsString;
}

function printNewsInInterface($uid, $file){
  global $conn;
  $Newsarray = array();
  $output = '';
  $output .= returnInterfaceHeader($uid);
  $allnews = allNews($uid, $file);
  $output .= $allnews[0];
  $output .= returnInterfaceFooter($uid);
  array_push($Newsarray, $output);
  array_push($Newsarray, $allnews[1]);
  return $Newsarray;
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

  returnEvents($uid);
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
  $header =  '<?php echo printRegularHeader($_SESSION["u_id"], "calendar"); ?>';
  $sql = "SELECT include, calendar_above, calendar_code, calendar_under FROM Theme1regular";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["include"].$header.$row["calendar_above"].$row["calendar_code"].$row["calendar_under"];
    }
  }
  $output .=  '<?php echo printRegularFooter($_SESSION["u_id"]); ?>';
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

function getRelevantCalendarID($uid) {
  global $conn;
  $relevantID = 1;
  $sql = "SELECT user_id FROM table_data WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $relevantID = $row["user_id"];
    }
  }
  return $relevantID;
}

function printCalendar(){
  global $conn;
  $output = "";
  $sql = "SELECT calender_code FROM table_data";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["calender_code"];
    }
  }
  return $output;
}

function newEvent($title, $date, $site_name){
  global $conn;
  $uid = $_SESSION['u_id'];
  $code = "{title: '$title', start: '$date'}";
  $stmt = $conn->prepare("INSERT INTO events (user_id, site_name, event_title, event_date, event_code) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("issss", $uid, $site_name, $title, $date, $code);
  $stmt->execute();
  printCalendarInFile($uid, $site_name);
}

function getEventTitle($event_id){
  #return $result;
  global $conn;
  $sql = "SELECT event_title FROM events WHERE event_id = $event_id";
  $result = $conn->query($sql);

  return $result;
}

function setEventTitle($event_id, $new_title){
  global $conn;
  $stmt = $conn->prepare("UPDATE events SET event_title = ? WHERE event_id = ?");
  $stmt->bind_param("si", $new_title, $event_id);
  $stmt->execute();
}

function getEventDate($event_id){
  global $conn;
  $sql = "SELECT event_date FROM events WHERE event_id = $event_id";
  $result = $conn->query($sql);

  return $result;
}

function setEventDate($event_id, $new_date) {
  global $conn;
  $stmt = $conn->prepare("UPDATE events SET event_date = ? WHERE event_id = ?");
  $stmt->bind_param("si", $new_date, $event_id);
  $stmt->execute();
}

function createEventsCode($uid) {
  global $conn;
  $output = "";
  $sql = "SELECT event_code FROM events WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $i = 1;
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($i == $result->num_rows){
        $output.= $row["event_code"];
      }else{
        $output.= $row["event_code"].",";
    }
  }
  return $output;
}
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

    $var = '<?php $file = "userid".$_SESSION["u_id"]."/gallery_id".$_SESSION["u_id"].".php";';
    $var .=  'allGalleries($_SESSION["u_id"], $file); ?>';
    $stmt = $conn->prepare("UPDATE Theme1regular SET gallery_code2=?");
    $stmt->bind_param("s", $var);
    $stmt->execute();

    createGallery($uid, "Mustergalerie", $folder);

    printGalleryInFile($uid, $folder);
  }else{
    $stmt = $conn->prepare("UPDATE table_data SET gallery_on=? WHERE user_id=?");
    $stmt->bind_param("ii", $number, $uid);
    $stmt->execute();
  }
}
//returns the number of all images in all Galleries for one user
function allImages($uid, $galleries){
  global $conn;
  $images = 0;
  for ($i=0; $i < sizeof($galleries); $i++) {
    $gallerie = $galleries[$i];
    $sql = "SELECT image_id FROM Image WHERE gallery_name='$gallerie'";
    $result = $conn->query($sql);
    $images += $result->num_rows;
  }
  return $images;
}

function allGalleries($uid, $gallery){
  global $conn;
  $output = "";
  $gallery = oneValueFromTableData($uid, "gallery_file_name");
  //all galleries in this file
  $galleryArray = oneColumnFromTable("gallery_name", $gallery, "Galleries", "gallery_file_name");
  $output .= '	<div id="fh5co-portfolio" data-section="portfolio">
			<div class="container">
				<div class="row">';
  // generate the code for all the galleries in this file
  for ($i=0; $i < sizeof($galleryArray); $i++) {
    $hrefGallery = oneColumnFromTable("image_site", $galleryArray[$i], "Galleries", "gallery_name");
    //check the number of images in this gallerie
    $number = oneColumnFromTable("gallery_name", $galleryArray[$i], "Image", "gallery_name");
    if(sizeof($number) == 0){
      array_push($number, "Leere Galerie");
    }
    $output.= '<div class="col-md-4 col-sm-4 col-xs-6 col-xxs-12 animate-box">
      <div class="img-grid">
        <img src="../GallerieCSS/images/pic_'.(($i%12)+1).'.jpg" class="img-responsive">
        <a class="transition" href="'.$hrefGallery[0].'" target="_blank">
          <div>
            <span class="fh5co-meta">'.sizeof($number).' Bilder</span>
            <h2 class="fh5co-title noHover">'.$number[0].'</h2>
          </div>
        </a>
      </div>
    </div>';
  }
  $output.= '</div>
    </div>
  </div>';

  echo $output;
}

function printGalleryInFile($uid, $site_name){
  global $conn;
  $output = "";
  $header =  '<?php echo printRegularHeader($_SESSION["u_id"], "gallery"); ?>';
  //important code for the galleries from the database
  $sql = "SELECT include, gallery_header2, gallery_code, gallery_code2 FROM Theme1regular";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row['include'].$header;
        $output.= $row['gallery_code'];
        $output.= $row['gallery_code2'];
        $output.= $row['gallery_header2'];
    }
  }
  //name of gallery file
  $output .=  '<?php echo printRegularFooter($_SESSION["u_id"]); ?>';
  $myfile = fopen($site_name, "w") or die("Unable to open file!");
  fwrite($myfile, $output);
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
      array_push($number, "Leere Galerie");
    }
    $sizeNumber = sizeof($number);
    if(($i%3)==0){
      if($i<3){
        $output2 .= '<div class="col-md-4">';
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
        $output3 .= '<div class="col-md-4">';
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
        $output4 .= '<div class="col-md-4">';
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
  if(sizeof($galleryArray) > 0){
    $output2 .= '</div>';
  }
  if(sizeof($galleryArray) > 1){
    $output3 .= '</div>';
  }
  if(sizeof($galleryArray) > 2){
    $output4 .= '</div>';
  }


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
      $form .= '<div id="gallery'.($i+1).'"><div class="row"><div class="col-sm-6">';
      $form .= '<div class="gallerie_name"><input type="text" class="form-control gallerie_name" class="name" placeholder="Title" name="'.'name_'.$gallery_name.'" value="'.$gallery_name.'" ></div>';
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
              $form .= '<div class="image_name"><input type="text" class="form-control" class="name" placeholder="Title" name="'.$gallery_name.'" value="'.$imageArray[$k+$n].'" ></div>';
              $form .= '<div class="delete_Image"><button type="button" class="btn btn-danger delete_Image" name="'.$gallery_name.'" value="'.$imageArray[$k+$n].'">Bild löschen</button></div>';
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
              $form .= '<div class="image_name"><input type="text" class="form-control" class="name" placeholder="Title" name="'.$gallery_name.'" value="'.$imageArray[$k+$n].'" ></div>';
              $form .= '<div class="delete_Image"><button type="button" class="btn btn-danger delete_Image" name="'.$gallery_name.'" value="'.$imageArray[$k+$n].'">Bild löschen</button></div>';
              $size --;
              if($c > 1){
                $js .= 'document.getElementById("gallery'.($i+1).'").getElementsByClassName("images'.($i+1).'_'.$c.'")[0].style.display="none";';
              }
            }
        }
        $n += 3;
        $c ++;
        //close image div 
        $form .= '</div>';
      }
      //left and right button 
      $form .= '<button type="button" class="lefti left'.($i+1).' btn btn-danger" value="left'.($i+1).'"><</button>';
      $form .= '<button type="button" class="right'.($i+1).' righti btn btn-info" value="right'.($i+1).'">></button>';
      //close gallery div 
      $form .= '</div>';
      // form for new image 
      $form .=  '<div class="col-sm-6">
                    <input type="file" name="add_image'.($i+1).'" accept="image/*">
                    <div class="image_name"><input type="text" class="form-control" class="name" placeholder="Title" name="'.'name_'.$number_galleries[$i].'"></div>
                    <div class="add_Image"><button type="submit" class="btn btn-info" value="'.$file.'" name="newImages" formmethod="POST">Bild zur Galerie hinzufügen</button></div>
                    <div class="delete_gallerie"><button type="submit" class="btn btn-danger" name ="delete_galleries_button" value="'.$number_galleries[$i].'">Gesamte Galleríe löschen</button></div>
                 </div>';
      //close gallerie (i) and row 
      $form .= '</div></div><br><hr><br>';
      //close galleries
      if((($i+1) % 3 == 0 && $i > 0) || ($i == sizeof($number_galleries)-1)){
        $form .= '</div>';
      }
      if($iterate-1 > 1 && $iterate-1 < sizeof($number_galleries)-1){
        $js .= 'document.getElementById("galleries'.($iterate-1).'").style.display="none";';
      }
    }
    $form .= '<button type="button" class="leftiGalerie btn btn-danger" value="left_gallery"><</button>';
    $form .= '<button type="button" class="rightiGalerie btn btn-info" value="right_gallery">></button>'; 
  }
  array_push($output, $js);
  array_push($output, $form);
  return $output;
}

function printFormForGallery2($uid, $file){
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
      $form .= '<p>Diese Box auswählen, um die Galerie zu entfernen</p>';
      $form .= '<input type ="checkbox" name ="delete_Gallerie_'.$number_galleries[$i].'" value="'.$number_galleries[$i].'"/>';


      //now we create a Left and a Right button
      $form .= '<p>Bild zur Galerie hinzufügen</p>';
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
    $form .= '<p>Nach links und rechts bewegen, um Bilder in anderen Galerien zu sehen</p>';
    $form .= '<button type="button" class="left_gallery" value="left_gallery"><</button>';
    $form .= '<button type="button" class="right_gallery" value="right_gallery">></button>';
  }
  array_push($output, $js);
  array_push($output, $form);
  return $output;
}

function createImage2($uid, $file){
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

function createImage($uid, $file){
  global $conn;
  $galleries = array();
  $postvalues = array();
  $postname = array();
  $sql = "SELECT gallery_name FROM Galleries";
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
  var_dump($postvalues);
  var_dump($postname);
  for ($i=0; $i < sizeof($postvalues); $i++) {
    if(isset($postvalues[$i]) && $postvalues[$i]!= ""){
      $stmt = $conn->prepare("INSERT INTO Image (image_url, user_id, image_name, image_file_name, gallery_name) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("sisss", $postvalues[$i], $uid, $postname[$i], $file, $galleries[$i]);
      $stmt->execute();
    }
  }
}

function printImagesonSite($uid, $file, $gallery){
  global $conn;
  $output = '';
  $output = printRegularHeader($uid, "gallery");
  $sql = "SELECT image_url, image_name FROM Image WHERE gallery_name = '$gallery' and image_file_name = '$file'";
  $result = $conn->query($sql);
  $output .= '<hr>
    <h1 class="text-center">'.$gallery.'</h1>
  <hr>
  <div class="row">';
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $output .= '<div class="col-md-3"></div>
        <div class="col-md-6">
        <div class="thumbnail">
          <div class="caption">
              <p>'.$row['image_name'].'</p>
            </div>
          <a href="../Images/'.$row['image_url'].'" target="_blank" data-size="1600x1067">
            <img src="../Images/'.$row['image_url'].'" style="width:100%">
          </a>
        </div>
      </div>
      <div class="col-md-12"></div>';
    }
  }
  $output .= '</div>';
  $output.= printRegularFooter($uid);
  return $output;
}

function createGallery($uid, $name, $file){
  global $conn;
  $code = '';

  $sql = "SELECT include FROM Theme1regular";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $code.= $row['include'];
    }
  }
  $image_site_table = 'imagesite_'.$name.'.php';
  $image_site = 'userid'.$uid.'/imagesite_'.$name.'.php';
  $code .= '<?php echo printImagesonSite('.$uid.', "'.$file.'", "'.$name.'"); ?>';
  $myfile = fopen($image_site, "w") or die("Unable to open file!");
  fwrite($myfile, $code);

  $stmt = $conn->prepare("INSERT INTO Galleries (gallery_name, user_id, gallery_file_name, image_site) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("siss", $name, $uid, $file, $image_site_table);
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
  var_dump($a);
  var_dump($b);
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

function deleteGallerie($uid, $file, $name){
  global $conn;
  $stmt = $conn->prepare("DELETE FROM galleries WHERE gallery_name = ? and gallery_file_name = ?");
  $stmt->bind_param('ss', $name, $file);
  ;
  var_dump($stmt->execute());
  $stmt = $conn->prepare("DELETE FROM image WHERE gallery_name = ? and image_file_name = ?");
  $stmt->bind_param('ss', $name, $file);
  $stmt->execute();
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

function deleteImage($uid, $image, $galerie){
  var_dump($image);
  var_dump($galerie);
  global $conn;
  $stmt = $conn->prepare("DELETE FROM image WHERE image_name = ? and gallery_name = ?");
  $stmt->bind_param('ss', $image, $galerie);
  $stmt->execute();
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
  $myfile = fopen($folder, "w") or die("Datei konnte nicht geöffnet werden!");
  //write file in Database
  $stmt = $conn->prepare("UPDATE table_data SET building_file_name=? WHERE user_id=?");
  $stmt->bind_param("si", $folder, $uid);
  $stmt->execute();
  }
}

function setWorkers($number, $uid, $folder){
  global $conn;
  $stmt = $conn->prepare("UPDATE table_data SET workers_on=? WHERE user_id=?");
  $stmt->bind_param("ii", $number, $uid);
  $stmt->execute();
  if($number == 1){
  $site_name = "workers_id" .$uid .".php";
  if($folder != ""){
    $folder = $folder."/".$site_name;
  }else{
    $folder = $site_name;
  }
  //create a File for this module
  $myfile = fopen($folder, "w") or die("Datei konnte nicht geöffnet werden!");
  //write file in Database
  $stmt = $conn->prepare("UPDATE table_data SET workers_file_name=? WHERE user_id=?");
  $stmt->bind_param("si", $folder, $uid);
  $stmt->execute();

  $var = '<?php $folder = "userid".$_SESSION["u_id"]."/workers_id".$_SESSION["u_id"].".php";';
  $var .= 'echo allWorkers($_SESSION["u_id"], $folder); ?>';
  $stmt = $conn->prepare("UPDATE Theme1regular SET workers=?");
  $stmt->bind_param("s", $var);
  $stmt->execute();
  $stmt->close();
  createWorkers($uid, "Herr", "Max", "Mustermann", "Musterjob", "leader", $folder, "00000", "grundschule.jpg");

  printWorkersInFile($uid, $folder);
  }
}

function createWorkers($uid, $adress, $firstname, $lastname, $job, $choice, $file, $tel, $image){
  global $conn;
  $stmt = $conn->prepare("INSERT INTO workers (type, job, anrede, vorname, nachname, tel, image, workers_file_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssss", $choice, $job, $adress, $firstname, $lastname, $tel, $image, $file);
  $stmt->execute();
}

function deleteWorkers($uid, $file){
  global $conn;
  $a = array();
  $b = array();
  $sql = "SELECT workers_id FROM workers WHERE workers_file_name='$file'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($a, $row['workers_id']);
        array_push($b, 'delete_worker_'.$row['workers_id']);
    }
  }
  for ($i=0; $i < sizeof($a); $i++){
    $v = $b[$i];
      if($_POST[$v] == $a[$i]){
        $stmt = $conn->prepare("DELETE FROM workers WHERE workers_id = ? and workers_file_name = ?");
        $stmt->bind_param('ss', $a[$i], $file);
        $stmt->execute();
      }
  }
}

function changeWorkers(){
//later
}

function printFormforWorkers($uid, $file){
  global $conn;
  $output = '';
  $idArray = array();
  $jobArray = array();
  $AnredeArray = array();
  $NameArray = array();
  $telArray = array();
  $sql = "SELECT workers_id, type, job, anrede, vorname, nachname, tel, image FROM workers WHERE workers_file_name = '$file'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($idArray, $row['workers_id']);
        array_push($jobArray, $row['job']);
        array_push($AnredeArray, $row['anrede']);
        array_push($NameArray, $row['vorname'].' '.$row['nachname']);
        array_push($telArray, $row['tel']);
    }
  }
  for ($i=0; $i < sizeof($idArray); $i++) {
    if(($i > 0) && (($i % 3) == 0)){
      $output .= '</div><br>';
    }
    //when 3 classes are in one row we create a new row
    if(($i % 3) == 0){
      // start the row
      $output .= '<div class="row">';
    }
    $output .= '<div class="col-sm-4">';
    $output .='<div class="class_number"><input type="text" class="form-control job_'.$idArray[$i].'" placeholder="Job" name="'.'job_'.$idArray[$i].'" value="'.$jobArray[$i].'"></div>';
    $output .='<div class="class_teacher"><input type="text" class="form-control name_'.$idArray[$i].'" placeholder="Name" name="'.'name_'.$idArray[$i].'" value="'.$AnredeArray[$i].'"></div>';
    $output .='<div class="class_kids"><input type="text" class="form-control tel_'.$idArray[$i].'" placeholder="Telefon" name="'.'tel_'.$idArray[$i].'" value="'.$telArray[$i].'"></div>';
    $output .= '<button type="button" class="btn btn-danger deleteClass" name="deleteClass" value="'.$idArray[$i].'" formmethod="POST">Löschen</button>';
    $output .= '<button type="button" class="btn btn-info safeClass" name="safeClass" value="'.$idArray[$i].'" formmethod="POST">Speichern</button>';
    $output .= '</div>';

    if(($i == sizeof($idArray)-1)){
       $output .= '</div>';
    }
  }

  $output .= '<br><br>';
  return $output;
}

function printWorkersInInterface($uid, $file){
  global $conn;
  $output = '';
  $output.= returnInterfaceHeader($uid);
  $output .= '<div class="interface_container">
    <hr>
      <h1 class="text-center">Leiter/innen</h1>
    <hr>
    <div class="row">';

  $sql = "SELECT type, job, anrede, vorname, nachname, tel, image FROM workers WHERE workers_file_name = '$file' and type ='leader'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    $i = 1;
    while($row = $result->fetch_assoc()) {
        $output.= '<div class="col-sm-3 text-center">
          <img src="Images//'.$row['image'].'" width="50px;">
          <h4>'.$row['anrede'].' '.$row['vorname'].' '.$row['nachname'].'</h4>
          <p>'.$row['job'].'</p>
          <p>Tel.:  '.$row['tel'].'</p>
        </div>';

    }
  }
  $output .= '
  </div>';

  $output .= '<hr>
      <h1 class="text-center">Sekretariat</h1>
    <hr>
    <div class="row">';

  $sql = "SELECT type, job, anrede, vorname, nachname, tel, image FROM workers WHERE workers_file_name = '$file' and type ='secr'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= '<div class="col-sm-3 text-center">
          <img src="Images//'.$row['image'].'" width="50px;">
          <h4>'.$row['anrede'].' '.$row['vorname'].' '.$row['nachname'].'</h4>
          <p>'.$row['job'].'</p>
          <p>Tel.:  '.$row['tel'].'</p>
        </div>';
    }
  }
  $output .= '
  </div>';

  $output .= '<hr>
      <h1 class="text-center">Lehrer</h1>
    <hr>
    <div class="row">';

  $sql = "SELECT type, job, anrede, vorname, nachname, tel, image FROM workers WHERE workers_file_name = '$file' and type ='teacher'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= '<div class="col-sm-3 text-center">
          <img src="Images//'.$row['image'].'" width="50px;">
          <h4>'.$row['anrede'].' '.$row['vorname'].' '.$row['nachname'].'</h4>
          <p>'.$row['job'].'</p>
          <p>Tel.:  '.$row['tel'].'</p>
        </div>';
    }
  }
  $output .= '
  </div>';

  $output .= '<hr>
      <h1 class="text-center">Sonstige</h1>
    <hr>
    <div class="row">';

  $sql = "SELECT type, job, anrede, vorname, nachname, tel, image FROM workers WHERE workers_file_name = '$file' and type ='other'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= '<div class="col-sm-3 text-center">
          <img src="Images//'.$row['image'].'" width="50px;">
          <h4>'.$row['anrede'].' '.$row['vorname'].' '.$row['nachname'].'</h4>
          <p>'.$row['job'].'</p>
          <p>Tel.:  '.$row['tel'].'</p>
        </div>';
    }
  }
  $output .= '
  </div>';

  $output .= '<hr>
</div>';
  $output.= returnInterfaceFooter($uid);
  return $output;
}

function allWorkers($uid, $folder){
  global $conn;
  $output = "";
  $output .= '<div class="container">
    <hr>
      <h1 class="text-center">Leiter/innen</h1>
    <hr>
    <div class="row">
    <div class="col-sm-12">';
  $sql = "SELECT type, job, anrede, vorname, nachname, tel, image FROM workers WHERE workers_file_name = '$folder' and type ='leader'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $i = 1;
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($i >4){
          //$output .= '<div class="col-sm-3 text-center"></div>';
          $i = 1;
        }
        $output.= '<div class="col-sm-3 text-center">
          <img src="../Images/'.$row['image'].'" width="200px;">
          <h4>'.$row['anrede'].' '.$row['vorname'].' '.$row['nachname'].'</h4>
          <p>'.$row['job'].'</p>
          <p>Tel.:  '.$row['tel'].'</p>
        </div>';
        $i ++;
    }

  }
  $output .= '</div>
  </div>';
  $output.= '<hr>
    <h1 class="text-center">Sekretariat</h1>
  <hr>
  <div class="row">
  <div class="col-sm-12">';
  $sql = "SELECT type, job, anrede, vorname, nachname, tel, image FROM workers WHERE workers_file_name = '$folder' and type ='secr'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= '<div class="col-sm-3 text-center">
          <img src="../Images/'.$row['image'].'" width="200px;">
          <h4>'.$row['anrede'].' '.$row['vorname'].' '.$row['nachname'].'</h4>
          <p>'.$row['job'].'</p>
          <p>Tel.:  '.$row['tel'].'</p>
        </div>';
    }
  }
  $output .= '</div>
  </div>';
  $output.= '<hr>
    <h1 class="text-center">Lehrer/innen</h1>
  <hr>
  <div class="row">
  <div class="col-sm-12">';
  $sql = "SELECT type, job, anrede, vorname, nachname, tel, image FROM workers WHERE workers_file_name = '$folder' and type ='teacher'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= '<div class="col-sm-3 text-center">
          <img src="../Images/'.$row['image'].'" width="200px;">
          <h4>'.$row['anrede'].' '.$row['vorname'].' '.$row['nachname'].'</h4>
          <p>'.$row['job'].'</p>
          <p>Tel.:  '.$row['tel'].'</p>
        </div>';
    }
  }
  $output .= '</div>
  </div>';
  $output .= '<hr>
    <h1 class="text-center">Sonstige</h1>
  <hr>
  <div class="row">
  <div class="col-sm-12">';
  $sql = "SELECT type, job, anrede, vorname, nachname, tel, image FROM workers WHERE workers_file_name = '$folder' and type ='other'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= '<div class="col-sm-3 text-center">
          <img src="../Images/'.$row['image'].'" width="200px;">
          <h4>'.$row['anrede'].' '.$row['vorname'].' '.$row['nachname'].'</h4>
          <p>'.$row['job'].'</p>
          <p>Tel.:  '.$row['tel'].'</p>
        </div>';
    }
  }
  $output .= '</div>
  </div>';
  $output.= '<hr>
  </div>';

  return $output;
}

function printWorkersInFile($uid, $folder){
  global $conn;
  $output = "";
  $header =  '<?php echo printRegularHeader($_SESSION["u_id"], ""); ?>';
  $sql = "SELECT include, workers FROM Theme1regular";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row['include'].$header.$row['workers'];
    }
  }
  $output .=  '<?php echo printRegularFooter($_SESSION["u_id"]); ?>';
  $myfile = fopen($folder, "w") or die("Datei konnte nicht geöffnet werden!");
  fwrite($myfile, $output);
}

  function setAnfahrt($number, $uid, $folder, $street, $plz, $ort, $text, $text2, $housenumber){
    global $conn;
    if($text==""){
      $text = "Mustertext";
    }
    if($text2==""){
      $text2 = "Mustertext";
    }
    $stmt = $conn->prepare("UPDATE table_data SET anfahrt_on=? WHERE user_id=?");
    $stmt->bind_param("ii", $number, $uid);
    $stmt->execute();
    if($number == 1){
    $site_name = "anfahrt_id" .$uid .".php";
    if($folder != ""){
      $folder = $folder."/".$site_name;
    }else{
      $folder = $site_name;
    }
    //create a File for this module
    $myfile = fopen($folder, "w") or die("Unable to open file!");
    //write file in Database
    $stmt = $conn->prepare("UPDATE table_data SET anfahrt_file_name=? WHERE user_id=?");
    $stmt->bind_param("si", $folder, $uid);
    $stmt->execute();
    $maps = 'https://maps.google.de/maps?hl=de&q=%20'.$street.'+'.$housenumber.'%20'.$ort.'&t=&z=10&ie=utf8&iwloc=b&output=embed';
    $stmt = $conn->prepare("INSERT INTO anfahrt (maps, text, text2 street, streetNumber, plz, ort, user_id, anfahrt_file_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssissis", $maps, $text, $text2, $street, $housenumber, $plz, $ort, $uid, $folder);
    $stmt->execute();

    $var = '<?php $file = "userid".$_SESSION["u_id"]."/anfahrt_id".$_SESSION["u_id"].".php";';
    $var .=  'echo allAnfahrtFiles($_SESSION["u_id"], $file); ?>';
    $stmt = $conn->prepare("UPDATE Theme1regular SET allAnfahrt=?");
    $stmt->bind_param("s", $var);
    $stmt->execute();

    printAnfahrtInFile($uid, $folder);
    }
  }

  function printAnfahrtInFile($uid, $folder){
    global $conn;
    $output = "";
    $header =  '<?php echo printRegularHeader($_SESSION["u_id"], "anfahrt"); ?>';
    $sql = "SELECT include, allAnfahrt FROM Theme1regular";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $output .= $row['include'].$header.$row['allAnfahrt'];
      }
    }
    $output .=  '<?php echo printRegularFooter($_SESSION["u_id"]); ?>';
    $myfile = fopen($folder, "w") or die("Datei konnte nicht geöffnet werden!");
    fwrite($myfile, $output);
  }

  function printAnfahrtInInterface($uid, $folder){
    global $conn;
    $output = "";
    $output .= returnInterfaceHeader($uid);
    $link = oneColumnFromTable("maps", $uid, "anfahrt", "user_id");
    $text = oneColumnFromTable("text", $uid, "anfahrt", "user_id");
    $text2 = oneColumnFromTable("text2", $uid, "anfahrt", "user_id");
    $image1 = oneColumnFromTable("Image_building1", $uid, "anfahrt", "anfahrt_id");
    if($image1[0] == '#'){
      $image1 = '';
    }else{
      $image1 = $image1[0];
    }
    $image2 = oneColumnFromTable("Image_building2", $uid, "anfahrt", "anfahrt_id");
    if($image2[0] == '#'){
      $image2 = '';
    }else{
      $image2 = $image2[0];
    }
    $image3 = oneColumnFromTable("Image_building3", $uid, "anfahrt", "anfahrt_id");
    if($image3[0] == '#'){
      $image3 = '';
    }else{
      $image3 = $image3[0];
    }
    $image4 = oneColumnFromTable("Image_building4", $uid, "anfahrt", "anfahrt_id");
    if($image4[0] == '#'){
      $image4 = '';
    }else{
      $image4 = $image4[0];
    }
    $output .= '<div class="container">
    <div class="row">
      <div class="col-sm-12">
        <hr>
          <h1 class="text-center">Anfahrt</h1>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6"><p class="anfahrt_text">'.$text[0].'</p></div>
      <div class="col-sm-1"></div>
      <div class="col-sm-5"><p class="anfahrt_building">'.$text2[0].'</p></div>
    </div>
    <div class="row">

        <div class="col-sm-6">
                <div style="height:300px;width:100%;"><iframe width="" height="300" src="'.$link[0].'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="height:300px;width:100%;"></iframe>
                	<p style="text-align:right; margin:0px; padding-top:-10px; line-height:10px;font-size:10px;margin-top: -25px;"><a href="http://www.checkpoll.de/google-maps-generator/" style="font-size:10px;" target="_blank">Google Maps Generator</a> von <a href="https://www.on-projects.de/" style="font-size:10px;" title="Webdesign in Stuttgart" target="_blank">on-projects</a>
                	</p>
                </div>
         </div>
         <div class="col-sm-1"></div>
         <div class="col-sm-5">
          <img class="bigimage" src="'.$image1.'">
         </div>
    </div>
    <div class="row">
      <div class="col-sm-7"></div>
      <div class="col-sm-5">
        <div class="row">
        <div class="col-sm-3"><img onclick="image1()" class="image1" src="'.$image1.'"></div>
        <div class="col-sm-3"><img onclick="image2()" class="image2" src="'.$image2.'"></div>
        <div class="col-sm-3"><img onclick="image3()" class="image3" src="'.$image3.'"></div>
        <div class="col-sm-3"><img onclick="image4()" class="image4" src="'.$image4.'"></div>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-sm-12">
        <hr>
      </div>
    </div>


    </div>';
    $output .= returnInterfaceFooter($uid);

    return $output;
  }

  function printFormforAnfahrt($uid, $file){
    global $conn;
    $output = '<div class="anfahrtform">';
    $sql = "SELECT text, text2, street, streetNumber, plz, ort, user_id FROM anfahrt WHERE anfahrt_file_name = '$file' and user_id ='$uid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {

          $output.= '<p>Text:</p> <textarea style="resize: none;" name="anfahrt_text" class="AnfahrtSave" cols="40" rows="5" id="anfahrt_text" >'.$row['text'].'</textarea>';
          $output.= '<button type="button" class="btn btn-info saveButton2 button1" name="anfahrt_text_button" formmethod="POST">Speichern</button>';
          $output.= '<textarea style="resize: none;" name="anfahrt_text2" class="AnfahrtSave" cols="40" rows="5" id="anfahrt_text2" >'.$row['text2'].'</textarea>';
          $output.= '<button type="button" class="btn btn-info saveButton2 button2" name="building_text_button" formmethod="POST">Speichern</button>';
          $output.= '<p>Adresse:</p><div class="row"><div class="col-sm-12">';
          $output.= '<div class="streetSchool"><input type="text" class="form-control" placeholder="Straße" name="streetSchool" value="'.$row['street'].'"></div>';
          $output.= '<div class="housenumberSchool"><input type="text" class="form-control" placeholder="Nummer" name="housenumberSchool" value="'.$row['streetNumber'].'"></div></div></div>';
          $output.= '<div class="plzSchool"><input type="text" class="form-control" placeholder="PLZ" name="plzSchool" value="'.$row['plz'].'"></div>';
          $output.= '<div class="ortSchool"><input type="text" class="form-control" placeholder="Ort" name="ortSchool" value="'.$row['ort'].'"></div>';
      }
    }
    $output.= '</div>';
    return $output;
  }

  function allAnfahrtFiles($uid, $folder){
    global $conn;
    $link = oneColumnFromTable("maps", $uid, "anfahrt", "user_id");
    $text = oneColumnFromTable("text", $uid, "anfahrt", "user_id");
    $image1 = oneColumnFromTable("Image_building1", $uid, "anfahrt", "anfahrt_id");
    if($image1[0] == '#'){
      $image1 = '';
    }else{
      $image1 = '../'.$image1[0];
    }
    $image2 = oneColumnFromTable("Image_building2", $uid, "anfahrt", "anfahrt_id");
    if($image2[0] == '#'){
      $image2 = '';
    }else{
      $image2 = '../'.$image2[0];
    }
    $image3 = oneColumnFromTable("Image_building3", $uid, "anfahrt", "anfahrt_id");
    if($image3[0] == '#'){
      $image3 = '';
    }else{
      $image3 = '../'.$image3[0];
    }
    $image4 = oneColumnFromTable("Image_building4", $uid, "anfahrt", "anfahrt_id");
    if($image4[0] == '#'){
      $image4 = '';
    }else{
      $image4 = '../'.$image4[0];
    }
    $output = "";
    $output .= '<div class="container">
      <hr>
        <h1 class="text-center">Anfahrt</h1>
      <hr>

      <div class="row">
        <div class="col-sm-6">
          <p class="anfahrt_text">'.$text[0].'</p>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-5"><p class="anfahrt_building">hier sehen sie einen Lageplan</p></div>
      </div>
      <div class="row">
          <div class="col-sm-6">
                <div style="height:300px;width:100%;"><iframe width="" height="300" src="'.$link[0].'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="height:300px;width:100%;"></iframe>
                	<p style="text-align:right; margin:0px; padding-top:-10px; line-height:10px;font-size:10px;margin-top: -25px;"><a href="http://www.checkpoll.de/google-maps-generator/" style="font-size:10px;" target="_blank">Google Maps Generator</a> von <a href="https://www.on-projects.de/" style="font-size:10px;" title="Webdesign in Stuttgart" target="_blank">on-projects</a>
                	</p>
                </div>
            <hr>
         </div>
         <div class="col-sm-1"></div>
         <div class="col-sm-5">
          <img class="bigimage" src="'.$image1.'">
         </div>
    </div>
    <div class="row">
      <div class="col-sm-7"></div>
      <div class="col-sm-5">
        <div class="row">
        <div class="col-sm-3"><img onclick="image1()" class="image1" src="'.$image1.'"></div>
        <div class="col-sm-3"><img onclick="image2()" class="image2" src="'.$image2.'"></div>
        <div class="col-sm-3"><img onclick="image3()" class="image3" src="'.$image3.'"></div>
        <div class="col-sm-3"><img onclick="image4()" class="image4" src="'.$image4.'"></div>
        </div>
      </div>

      </div>
    </div>
    <div class="row fill">
      <div class="col-sm-12"></div>
    </div>';

    return $output;
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
  $myfile = fopen($folder, "w") or die("Datei konnte nicht geöffnet werden!");
  return $folder;
}

function setClasses($uid, $number, $folder){
  global $conn;
  if($number == 1){
    $stmt = $conn->prepare("UPDATE table_data SET classes_on=? WHERE user_id=?");
    $stmt->bind_param("ii", $number, $uid);
    $stmt->execute();

    $site_name = "classes_id" .$uid .".php";
    if($folder != ""){
      $folder = $folder."/".$site_name;
    }else{
      $folder = $site_name;
    }

    $var = '<?php $file = "userid".$_SESSION["u_id"]."/classes_id".$_SESSION["u_id"].".php";';
    $var .=  'echo printClassesInFileTable($_SESSION["u_id"], $file); ?>';
    $stmt = $conn->prepare("UPDATE Theme1regular2 SET classes_code=?");
    $stmt->bind_param("s", $var);
    $stmt->execute();

    printClassesInFile($uid, $folder);
  }else{
    $stmt = $conn->prepare("UPDATE table_data SET classes_on=? WHERE user_id=?");
    $stmt->bind_param("ii", $number, $uid);
    $stmt->execute();
  }
}

function printClassesInFile($uid, $file){
  global $conn;
  $output = "";
  $include = "";
  $sql = "SELECT include FROM Theme1regular";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $include .= $row["include"];
    }
  }
  $sql = "SELECT classes_code FROM Theme1regular2";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output .= $include.$row["signup_code"];
    }
  }
  $myfile = fopen($file, "w") or die("Datei konnte nicht geöffnet werden!");
  fwrite($myfile, $output);
}

function printClassesInFileTable($uid, $file){
  global $conn;
  $output = '';
  $numberArray = array();
  $teacherArray = array();
  $kidsArray = array();
  returnNavbar($uid);
  returnSlider($uid);
  $header = printRegularHeader($uid, "");
  $footer = printRegularFooter($uid);
  $sql = "SELECT number, teacher, kids FROM classes WHERE user_id = '$uid'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($numberArray, $row['number']);
        array_push($teacherArray, $row['teacher']);
        array_push($kidsArray, $row['kids']);
    }
  }
  $output .= $header;
  //generate code from the input data
  $output .= '';
  $output .= $footer;
  return $output;
}

function printFormForClasses($uid){
  global $conn;
  $output = '';
  $classesArray = array();
  $numberArray = array();
  $teacherArray = array();
  $kidsArray = array();
  $sql = "SELECT classes_id, number, teacher, kids FROM classes WHERE user_id = '$uid'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($numberArray, $row['number']);
        array_push($teacherArray, $row['teacher']);
        array_push($kidsArray, $row['kids']);
        array_push($classesArray, $row['kids']);
    }
  }
  for ($i=0; $i < sizeof($numberArray); $i++) {
    if(($i > 0) && (($i % 3) == 0)){
      $output .= '</div><br>';
    }
    //when 3 classes are in one row we create a new row
    if(($i % 3) == 0){
      // start the row
      $output .= '<div class="row">';
    }
    $output .= '<div class="col-sm-4">';
    $output .='<div class="class_number"><input type="text" class="form-control number_'.$classesArray[$i].'" placeholder="Klasse" name="'.'Klasse_'.$numberArray[$i].'" value="'.$numberArray[$i].'"></div>';
    $output .='<div class="class_teacher"><input type="text" class="form-control teacher_'.$classesArray[$i].'" placeholder="Lehrer/in" name="'.'teacher_'.$numberArray[$i].'" value="'.$teacherArray[$i].'"></div>';
    $output .='<div class="class_kids"><input type="text" class="form-control kids_'.$classesArray[$i].'" placeholder="Anzahl der Kinder" name="'.'kids_'.$numberArray[$i].'" value="'.$kidsArray[$i].'"></div>';
    $output .= '<button type="button" class="btn btn-danger deleteClass" name="deleteClass" value="'.$classesArray[$i].'" formmethod="POST">Löschen</button>';
    $output .= '<button type="button" class="btn btn-info safeClass" name="safeClass" value="'.$classesArray[$i].'" formmethod="POST">Speichern</button>';
    $output .= '</div>';

    if(($i == sizeof($numberArray)-1)){
      $output .= '</div>';
    }
  }

  $output .= '<br><br>';
  return $output;
}

function printClassesInInterface($uid){
  global $conn;
  $numberArray = array();
  $teacherArray = array();
  $kidsArray = array();
  $sql = "SELECT number, teacher, kids FROM classes WHERE user_id = '$uid'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($numberArray, $row['number']);
        array_push($teacherArray, $row['teacher']);
        array_push($kidsArray, $row['kids']);
    }
  }
  $output = returnInterfaceHeader($uid);
  //generate code for the interface from input data
  $output .= '<div class="row">
                <div class="col-sm-12"><hr><h1 class="text-center">Klassen</h1><hr></div>
              </div>
              <div class="row">
                <div class="col-sm-12">';
  $number = 0;
  for ($i=0; $i < sizeof($numberArray); $i++) {
    if(($number > 0) && (($number % 3) == 0)){
      $output .= '</div><br>';
    }
    //when 3 classes are in one row we create a new row
    if(($number % 3) == 0){
      // start the row
      $output .= '<div class="row">';
    }
    $output .= '<div class="col-sm-4 text-center">
                  <p class="classNumber classColor">Klasse: '.$numberArray[$i].'</p>
                  <p class="classTeacher classColor">Lehrer/in: '.$teacherArray[$i].'</p>
                  <p class="classKids classColor">Kinder: '.$kidsArray[$i].'</p>
                </div>';
    //close the row
    if(($i == sizeof($numberArray)-1)){
      $output .= '</div>';
    }
    $number ++;
  }
  $output .=   '<br></div>
              </div>';
  $output .= returnInterfaceFooter($uid);
  return $output;
}

function safeClasses($uid, $number, $teacher, $kids){
  global $conn;
  $stmt = $conn->prepare("UPDATE classes SET number=? WHERE user_id=?");
  $stmt->bind_param('ss', $number, $uid);
  $stmt->execute();
  $stmt = $conn->prepare("UPDATE classes SET teacher=? WHERE user_id=?");
  $stmt->bind_param('ss', $teacher, $uid);
  $stmt->execute();
  $stmt = $conn->prepare("UPDATE classes SET kids=? WHERE user_id=?");
  $stmt->bind_param('ss', $kids, $uid);
  $stmt->execute();
}

function deleteClasses($uid, $number){
  global $conn;
  $stmt = $conn->prepare("DELETE FROM classes WHERE number = ? and user_id = ?");
  $stmt->bind_param('ss', $number, $uid);
  $stmt->execute();
}

function newClass($uid, $number, $teacher, $kids, $file){
  global $conn;
  $stmt = $conn->prepare("INSERT INTO classes (number, teacher, kids, file, user_id) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssi", $number, $teacher, $kids, $file, $uid);
  $stmt->execute();
  $stmt->close();
}

function setSignup($uid, $number, $text, $file, $folder){
  global $conn;
  if($number == 1){
    $stmt = $conn->prepare("UPDATE table_data SET signup_on=? WHERE user_id=?");
    $stmt->bind_param("ii", $number, $uid);
    $stmt->execute();
    $stmt = $conn->prepare("INSERT INTO signup (text, file, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $text, $file, $uid);
    $stmt->execute();

    $site_name = "signup_id" .$uid .".php";
    if($folder != ""){
      $folder = $folder."/".$site_name;
    }else{
      $folder = $site_name;
    }

    $var = '<?php $file = "userid".$_SESSION["u_id"]."/signup_id".$_SESSION["u_id"].".php";';
    $var .=  'echo printSignupInFileTable($_SESSION["u_id"], $file); ?>';
    $stmt = $conn->prepare("UPDATE Theme1regular2 SET signup_code=?");
    $stmt->bind_param("s", $var);
    $stmt->execute();

    printSignupInFile($uid, $folder);
  }else{
    $stmt = $conn->prepare("UPDATE table_data SET signup_on=? WHERE user_id=?");
    $stmt->bind_param("ii", $number, $uid);
    $stmt->execute();
  }
}

function printSignUpInInterface($uid){
  global $conn;
  $output = returnInterfaceHeader($uid);
  $text = '';
  $pdf = '';
  $sql = "SELECT text, file FROM signup";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $text .= $row["text"];
        $pdf .= $row["file"];
    }
  }
  $pdf = '<a style="text-decoration: none; color: black!important;" href="'.$pdf.'" download><p>Einschreibungsdatei</p></a>';
  $output .= '<hr><h1 class="text-center">Einschreibung</h1><hr>
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 text-center"><p class="signuptext">'.$text.'</p></div>
                <div class="col-sm-2"></div>
              </div>
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 text-center"><p>Sie können das unten gelistete Dokument downloaden um sich einzuschreiben</p></div>
                <div class="col-sm-2"></div>
              </div>
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 text-center"><p>'.$pdf.'</p></div>
                <div class="col-sm-2"></div>
              </div>';
  $output .= returnInterfaceFooter($uid);

  return $output;
}

function printSignupInFile($uid, $file){
  global $conn;
  $output = "";
  $include = "";
  $sql = "SELECT include FROM Theme1regular";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $include .= $row["include"];
    }
  }
  $sql = "SELECT signup_code FROM Theme1regular2";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output .= $include.$row["signup_code"];
    }
  }
  $myfile = fopen($file, "w") or die("Datei konnte nicht geöffnet werden!");
  fwrite($myfile, $output);
}

function printSignupInFileTable($uid, $file){
  global $conn;
  $output = '';
  $text = '';
  $pdf = '';
  returnNavbar($uid);
  returnSlider($uid);
  $header = printRegularHeader($uid, "");
  $footer = printRegularFooter($uid);
  $sql = "SELECT text, file FROM signup WHERE user_id = '$uid'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $text .= $row['text'];
        $pdf .= $row['file'];
    }
  }
  $output .= $header;
  $pdf = '<a style="text-decoration: none; color: black!important;" href="'.$pdf.'" download><p>Einschreibungsdatei</p></a>';
  $output .= '<div class="container">
                <hr><h1 class="text-center">Einschreibung</h1><hr>
                <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-8 text-center"><p>'.$text.'</p></div>
                  <div class="col-sm-2"></div>
                </div>
                <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-8 text-center"><p>Sie können das unten gelistete Dokument downloaden um sich einzuschreiben</p></div>
                  <div class="col-sm-2"></div>
                </div>
                <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-8 text-center">'.$pdf.'</div>
                  <div class="col-sm-2"></div>
                </div>
                <br><br><br><br><br><br><br><br><br><br><br><br><br>
              </div>';
  $output .= $footer;
  return $output;
}

function printFormForSignUp($uid){
  global $conn;
  $output = '';
  $text = '';
  $pdf = '';
  $sql = "SELECT text, file FROM signup WHERE user_id = '$uid'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $text .= $row['text'];
        $pdf .= $row['file'];
    }
  }
  $output .= '<p>Bearbeiten sie den Text</p>';
  $output .= '<textarea name="SignUp_text" cols="40" rows="5" id="SignUp_text">'.$text.'</textarea>';
  $output .= '<button type="button" class="btn btn-info safeSignUp" name="safeSignUp" formmethod="POST">Speichern</button>';
  $output .= '<p>Datei, die zum Download bereitsteht</p>';
  $output .= '<input type="text" class="form-control" id="signup_pdf" placeholder="Pfad zum Dokument" name="signup_pdf" value="'.$pdf.'">';
  $output .= '<button type="button" class="btn btn-info safeSignUpPDF" name="safeSignUpPDF" formmethod="POST">Speichern</button>';

  return $output;
}

function updateSignUp($uid, $text){
  global $conn;
  $stmt = $conn->prepare("UPDATE signup SET text=? WHERE user_id=?");
  $stmt->bind_param("si", $text, $uid);
  $stmt->execute();
  $stmt->close();
}

function updateSignUpPDF($uid, $pdf){
  global $conn;
  $stmt = $conn->prepare("UPDATE signup SET file=? WHERE user_id=?");
  $stmt->bind_param("si", $pdf, $uid);
  $stmt->execute();
  $stmt->close();
}

function setImpressum($uid, $text, $folder){
  global $conn;
  $stmt = $conn->prepare("UPDATE Page SET impressum=? WHERE user_id=?");
  $stmt->bind_param("si", $text, $uid);
  $stmt->execute();
  $stmt->close();

  $site_name = "impressum_id" .$uid .".php";
  if($folder != ""){
    $folder = $folder."/".$site_name;
  }else{
    $folder = $site_name;
  }
  //create a File for this module
  $myfile = fopen($folder, "w") or die("Datei konnte nicht geöffnet werden!");
  printImpressumInFileTable($uid, $folder);
}

function printFormforImpressum($uid){
  global $conn;
  $output = '<div class="impressumform">';
  $text = oneColumnFromTable("impressum", $uid, "Page", "user_id");
  if(sizeof($text) > 0){
    $output.= '<p>Ihr Impressum sieht wie folgt aus:</p>
              <textarea style="resize: none; border-radius: 5px 5px 0px 0px; margin-bottom: -7px;" name="school_impressum" cols="40" rows="5" id="school_impressum">'.$text[0].'</textarea>
              </div>';
  }else{
    $output.= '<p>Ihr Impressum sieht wie folgt aus:</p>
              <textarea name="school_impressum" cols="40" rows="5" id="school_impressum">Hier kann Inhalt hinzugefügt werden.</textarea>
              </div>';
  }

  return $output;
}

function printImpressumInFileTable($uid, $file){
  global $conn;
  $output = '';
  $sql = "SELECT include FROM Theme1regular";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output .= $row['include'];
    }
  }
  $output .=  '<?php echo printRegularHeader($_SESSION["u_id"], ""); ?>';
  $output .=  '<?php $file = "userid".$_SESSION["u_id"]."/impressum_id".$_SESSION["u_id"].".php"; echo printImpressumInFile($_SESSION["u_id"], $file); ?>';
  $output .=  '<?php echo printRegularFooter($_SESSION["u_id"]); ?>';

  $myfile = fopen($file, "w") or die("Unable to open file!");
  fwrite($myfile, $output);
}

function printImpressumInFile($uid, $file){
  global $conn;
  $output = '';
  $text = oneColumnFromTable("impressum", $uid, "Page", "user_id");

  $output .='<div class="container">

    <hr>
      <h1 class="text-center">Impressum</h1>
    <hr>
    <div class="row">

      <div class="col-sm-2"></div>
        <div class="col-sm-8">
              <div>
                <p>Bei Anfragen, Beschwerden, Hinweisen und Anregungen wenden Sie sich bitte zunächst an den Verantwortlichen für die Website:<br>';
  $output.= $text[0];
  $output.= '              </p>
            </div>
          <hr>
       </div>

    </div>
  </div>';
  //$myfile = fopen($file, "w") or die("Unable to open file!");
  //fwrite($myfile, $output);
  return $output;
}

function printImpressumInInterface($uid){
  global $conn;
  $text = oneColumnFromTable("impressum", $uid, "Page", "user_id");
  $output = "";
  $output .= returnInterfaceHeader($uid);
  $output .= '<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <hr>
        <h1 class="text-center">Impressum</h1>
      <hr>
    </div>
  </div>
      <div class="row">
        <div class="col-sm-12">
              <div>
                <p>Bei Anfragen, Beschwerden, Hinweisen und Anregungen wenden Sie sich bitte zunächst an den Verantwortlichen für die Website:</p>';
  $output.= '<p class="impressum_text">'.$text[0];
  $output.= '              </p>
            </div>
          <hr>
       </div>

    </div>
  </div>
  <style> #currentPage .page_impressum p{
    text-align: left!important;
  }</style>';
  $output .= returnInterfaceFooter($uid);
  echo $output;
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

function createAccount($email, $pswd, $pswd_repeat, $firstname, $lastname, $gender, $birth, $Adress, $plz, $payment, $note){
    global $conn;
    echo $email;
    $mail = mysqli_real_escape_string($conn, $email);
    $psw = mysqli_real_escape_string($conn, $pswd);
    $psw_repeat = mysqli_real_escape_string($conn, $pswd_repeat);
    //Error Handler
    //Check for empty fields
    if(empty($mail) || empty($psw) || empty($psw_repeat)){
      header('Location: http://localhost/Grundschule/create_account.php?signup=empty');
      exit();
    }else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
      header('Location: http://localhost/Grundschule/create_account.php?signup=email');
      exit();
    }else if(checkDoubleRegistration($mail) == 1){
    header('Location: http://localhost/Grundschule/create_account.php?signup=DoubleEmail');
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
      $stmt = $conn->prepare("INSERT INTO Person(Email, Password, Firstname, Lastname, Gender, Birthdate, Adress, PLZ, Payment, Note) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssssssiss", $mail, $psw, $firstname, $lastname, $gender, $birth, $Adress, $plz, $payment, $note);
      $stmt->execute();
      header('Location: http://localhost/Grundschule/create_account.php?signup=success');
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
        header('Location: http://localhost/Grundschule/startsite.php?login=error1');
        exit();
      }else{
        if($row = mysqli_fetch_assoc($result)){
          //De-hashing the Password
          $hashedPwdCheck = strcmp($psw, $row['password']);
          if($hashedPwdCheck < 0 ||  $hashedPwdCheck > 0){
            header('Location: http://localhost/Grundschule/startsite.php?login=error2');
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
  header("Location: http://localhost/Grundschule/startsite.php?logout=success");
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

function StartOn($uid){
  global $conn;
  $number = 0;
  $sql = "SELECT start_on FROM table_data WHERE user_id = $uid";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $number = $row['start_on'];
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

function WorkersOn($uid){
  global $conn;
  $number = 0;
  $sql = "SELECT workers_on FROM table_data WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $number = $row['workers_on'];
    }
  }
  return $number;
}

function AnfahrtOn($uid){
  global $conn;
  $number = 0;
  $sql = "SELECT anfahrt_on FROM table_data WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $number = $row['anfahrt_on'];
    }
  }
  return $number;
}

function ClassesOn($uid){
  global $conn;
  $number = 0;
  $sql = "SELECT classes_on FROM table_data WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $number = $row['classes_on'];
    }
  }
  return $number;
}

function SignupOn($uid){
  global $conn;
  $number = 0;
  $sql = "SELECT signup_on FROM table_data WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $number = $row['signup_on'];
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

function returnInterfaceStyle($uid){
  global $conn;
  $output = "";
  $sql = "SELECT interface_code_style FROM Theme1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output.= $row["interface_code_style"];
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
  returnEvents($uid);
  $output = "";
  $cheader= false;
  $gheader = false;
  $aheader = false;
  if($type == "calendar"){
    $cheader = true;
  }
  if($type == "gallery"){
    $gheader = true;
  }
  if($type == "anfahrt"){
    $aheader = true;
  }
  $name = "";
  $image = "";

  $anfahrt_header2 = "";
  $sql = "SELECT anfahrt_header2 FROM Theme1regular2";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
      $anfahrt_header2.= $row["anfahrt_header2"];
  }

  $sql = "SELECT name, image FROM Page WHERE user_id = $uid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name.= $row["name"];
        $image.= '../'.$row["image"];
    }
  }
  $sql = "SELECT include, header, calendar_header, events, anfahrt_header, calendar_header2, regular_code_left, regular_code_name, regular_code_image, navfunktion, 	regular_code_right, slider, regular_code_right2, regular_code_header, regular_code_text,
  gallery_header FROM Theme1regular";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($cheader){
        $output.= $row["include"].$row["header"].$row["calendar_header"].$row["events"].$row["calendar_header2"].$row["regular_code_left"].$name.$row["regular_code_name"].$image.$row["regular_code_image"].$row["navfunktion"];
      }
      else if($gheader){
        $output.= $row["include"].$row["gallery_header"].$row["regular_code_left"].$name.$row["regular_code_name"].$image.$row["regular_code_image"].$row["navfunktion"];
      }
      else if($aheader){
        $output.= $row["include"].$row["header"].$row["anfahrt_header"]." ".$anfahrt_header2." ".$row["regular_code_left"].$name.$row["regular_code_name"].$image.$row["regular_code_image"].$row["navfunktion"];
      }
      else if(!$cheader && !$gheader && !$aheader){
        $output.= $row["include"].$row["header"].$row["regular_code_left"].$name.$row["regular_code_name"].$image.$row["regular_code_image"].$row["navfunktion"];
      }
    }
  }
  return $output;
}

function returninterfacecode($uid){
  global $conn;
  returnNavbar($uid);
  returnSlider($uid);
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
//class="nav navbar-nav pull-sm-left | navbar2 nav pull-sm-left
function returnNavbar($uid){
  global $conn;
  $home = '../'.'userid'.$uid.'/frontpageUser'.$uid.'.php';
  $output = '<div class="row text-center red">
  		<div class="col">
  			<nav class="navbar2">
  			      <ul style="list-style-type: none;">
              <li><a href="'.$home.'"><span class="glyphicon glyphicon-home"></span> Home</a></li>';
              if(CustomeOn($uid) == 1){
                $var = printCustomeTitel($uid);
                $link = oneValueFromTableData($uid, "custome_file_name");
                $output.= '<li><a  class="custome" href="'.'../'.$link.'"><span class="glyphicon glyphicon-star"></span>'.$var.'</a></li>';
              }
              if(CalendarOn($uid) == 1){
                $link2 = oneValueFromTableData($uid, "calendar_file");
                $output.= '<li><a href="'.'../'.$link2.'"><span class="glyphicon glyphicon-calendar"></span> Events</a></li>';
              }
              if(NewsOn($uid) == 1){
                $link3 = oneValueFromTableData($uid, "news_file_name");
                $output.= '<li><a href="'.'../'.$link3.'"><span class="glyphicon glyphicon-globe"></span> Neuigkeiten</a></li>';
              }
              if(GalleryOn($uid) == 1){
                $link4 = oneValueFromTableData($uid, "gallery_file_name");
                $output.= '<li><a href="'.'../'.$link4.'"><span class="glyphicon glyphicon-picture"></span> Galerie</a></li>';
              }
              $output.= '<li class="dropdown">
                        <a href="javascript:void(0)"><span class="glyphicon glyphicon-picture"></span> Organisation</a>
                        <div class="dropdown-content">';
              if(WorkersOn($uid) == 1){
              $link7 = oneValueFromTableData($uid, "workers_file_name");
              $output.= '<a href="'.'../'.$link7.'"><span class="glyphicon glyphicon-th"></span> Mitarbeiter</a>';
              }
              if(AnfahrtOn($uid) == 1){
              $link8 = oneValueFromTableData($uid, "anfahrt_file_name");
              $output.= '<a href="'.'../'.$link8.'"><span class="glyphicon glyphicon-map-marker"></span> Anfahrt</a>';
              }
              //if(SignupOn($uid) == 1){
              //$link9 = oneValueFromTableData($uid, "signup_file_name");
              //$output.= '<a href="'.'../'.$link9.'"><span class="glyphicon glyphicon-pencil"></span> Einschreibung</a>';
              //}
              $link10 = 'userid'.$uid.'/impressum_id'.$uid.'.php';
              $output.= '<a href="'.'../'.$link10.'"><span class="glyphicon glyphicon-road"></span> Impressum</a>';
              $output.=  '</div></li>';
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
  $output2 = '';
  $name = 'slider'.$uid;
  $slider = oneColumnFromTable("image_url", $name, "Image", "image_name");
  $size = 0;
  if(sizeof($slider) > 2){
    $size = 2;
  }else{
    $size = sizeof($slider);
  }
  for ($i=0; $i < $size; $i++) {
    if($i == 0){
      $output .= '<div class="item active">
                  <img src="'.$slider[$i].'">
                </div>';
    }else{
      $output .= '<div class="item">
                  <img src="'.$slider[$i].'">
                </div>';
    }

    if($i == 0){
      $output2 .= '<div class="item active">
                  <img src="../'.$slider[$i].'">
                </div>';
    }else{
      $output2 .= '<div class="item">
                  <img src="../'.$slider[$i].'">
                </div>';
    }
  }
  $stmt = $conn->prepare("UPDATE Theme1 SET slider=?");
  $stmt->bind_param("s", $output);
  $stmt->execute();
  $stmt = $conn->prepare("UPDATE Theme1regular SET slider=?");
  $stmt->bind_param("s", $output2);
  $stmt->execute();
  return $output;
}

function returnEvents($uid){
  global $conn;
  $events = createEventsCode($uid);
  $stmt = $conn->prepare("UPDATE Theme1regular SET events=?");
  $item = 'events: ['.$events.']';
  $stmt->bind_param("s", $item);
  $stmt->execute();
  return $item;
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
  $myfile = fopen($site_name, "w") or die("Datei konnte nicht geöffnet werden!");
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

function updateStartsite($uid, $file, $name, $image, $header, $text, $street, $plz, $ort, $tel, $fax, $mail, $slider1, $slider2){
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
  if(isset($slider1) && $slider1 != ""){
    $slider1 = "Images/".$slider1;
    $stmt = $conn->prepare("UPDATE Image SET image_url=? WHERE gallery_name=? and image_file_name=?");
    $sl1 = "sliderImage1";
    $stmt->bind_param("sss", $slider1, $sl1, $file);
    $stmt->execute();
  }
  if(isset($slider2) && $slider2 != ""){
    $slider2 = "Images/".$slider2;
    $stmt = $conn->prepare("UPDATE Image SET image_url=? WHERE gallery_name=? and image_file_name=?");
    $sl2 = "sliderImage2";
    $stmt->bind_param("sss", $slider2, $sl2, $file);
    $stmt->execute();
  }
  if(isset($image) && $image != ""){
    $image = "Images/".$image;
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
        //$var4 = 'image_'.$row['title'];
        array_push($a, $row['title']);

        array_push($post_titel, $_POST[$var1]);
        array_push($post_date, $_POST[$var2]);
        array_push($post_text, $_POST[$var3]);
        //array_push($post_image, $_POST[$var4]);
    }
    for ($i=0; $i < sizeof($a); $i++) {
      $value = $a[$i];

      $p_titel = $post_titel[$i];
      $p_date = $post_date[$i];
      $p_text = $post_text[$i];
      //$p_image = $post_image[$i];
      $stmt = $conn->prepare("UPDATE new_news SET date=? WHERE title=?");
      $stmt->bind_param("ss", $p_date, $value);
      $stmt->execute();
      $stmt = $conn->prepare("UPDATE new_news SET text=? WHERE title=?");
      $stmt->bind_param("ss", $p_text, $value);
      $stmt->execute();
      //$stmt = $conn->prepare("UPDATE new_news SET image=? WHERE title=?");
      //$stmt->bind_param("ss", $p_image, $value);
      //$stmt->execute();
      $stmt = $conn->prepare("UPDATE new_news SET title=? WHERE title=?");
      $stmt->bind_param("ss", $p_titel, $value);
      $stmt->execute();
    }
  }
}

function updateNews2($file, $whichone, $title, $date, $text){
  var_dump($file);
  var_dump($whichone);
  var_dump($title);
  var_dump($date);
  var_dump($text);
  global $conn;
  $stmt = $conn->prepare("UPDATE new_news SET date=? WHERE title=? and news_file=?");
  $stmt->bind_param("sss", $date, $whichone, $file);
  $stmt->execute();
  $stmt = $conn->prepare("UPDATE new_news SET text=? WHERE title=? and news_file=?");
  $stmt->bind_param("sss", $text, $whichone, $file);
  $stmt->execute();
  $stmt = $conn->prepare("UPDATE new_news SET title=? WHERE title=? and news_file=?");
  $stmt->bind_param("sss", $title, $whichone, $file);
  $stmt->execute();
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
  $string = 'sudo chmod 777 '.$name;
  shell_exec($string);
  return $name;
}

function createImageFolder($uid, $folder){
  $name = $folder.'/Images';
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

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

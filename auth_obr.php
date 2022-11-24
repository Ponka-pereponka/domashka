<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$mysqli = mysqli_connect("localhost", "cyozknem_ponka-pereponka", "Rf7328836Rf", "cyozknem_Ponka-pereponka");
if ($mysqli == false) {
  print("error");
} else {

  $email =$_POST["email"];
  $pass = $_POST["pass"];

  $result = $mysqli->query("SELECT * FROM `ponka-pereponka` WHERE `email`='$email'");
  $result = $result->fetch_assoc();

  if (password_verify($pass, $result["pass"])) {
   echo "ok";
  
   $_SESSION["name"] = $result["name"];
   $_SESSION["lastname"] = $result["lastname"];
   $_SESSION["email"] = $result["email"];
   $_SESSION["id"] = $result["id"];

  } else {
    echo "not_found";
  }

  //var_dump($result["pass"]);

}
?>

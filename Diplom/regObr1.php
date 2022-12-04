<?php
header('Content-Type: text/html; charset=utf-8');
$mysqli = mysqli_connect("localhost", "cyozknem_ponka-pereponka", "Rf7328836Rf", "cyozknem_Ponka-pereponka");
if ($mysqli == false) {
  print("error");
} else {
 // print("Соединение установлено успешно");

  $name = $_POST["name"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $pass = $_POST["pass"];
  $email = trim(mb_strtolower($_POST["email"]));
  $pass = trim($_POST["pass"]);
  $pass = password_hash("$pass", PASSWORD_DEFAULT);

  $result = $mysqli->query("SELECT * FROM `ponka-pereponka` WHERE `email`='$email' AND `pass`='$pass'");
  $result = $mysqli->query("SELECT * FROM `ponka-pereponka` WHERE `email`='$email'");

  if ($result->num_rows != 0) {
    print("exist");
  } else {
    $mysqli->query("INSERT INTO `ponka-pereponka`(`name`, `lastname`, `email`, `pass`) VALUES ('$name', '$lastname', '$email', '$pass')");
    print("ok");
  }
}
?>

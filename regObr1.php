<?php
header('Content-Type: text/html; charset=utf-8');

$mysqli = mysqli_connect("localhost", "cyozknem_ponka-pereponka", "Rf7328836Rf", "cyozknem_Ponka-pereponka");
if ($mysqli == false){
    print("error");
}else{
   print("Соединение установлено успешно");

    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $pass = password_hash("$pass", PASSWORD_DEFAULT);//шифрование пароля
   
    $result=$mysqli->query(" SELECT * FROM `ponka-pereponka` WHERE `email`='$email'");

    if($result->num_rows != 0) {
        print("Такой пользователь существует");

    }else{
        $mysqli->query("INSERT INTO `ponka-pereponka`(`name`, `lastname`, `email`, `pass`) VALUES ('$name','$lastname','$email','$pass')"); 

    }

    //var_dump($result->num_rows);
   
   
}


//echo "Имя: $name<br>
//Фамилия: $lastname<br>
//E-mail: $email<br>
//Пароль: $pass<hr>"
?>

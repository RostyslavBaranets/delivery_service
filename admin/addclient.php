<?php
session_start();
require ('connect.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    Имя, Фамилия<br>
    <input name="name"><br>
    Email<br>
    <input name="email" ><br>
    Пароль<br>
    <input name="password"><br><br>
    <input type="submit" value="Сохранить" name="button"><br>
</form>
<a href='amain.php'> назад</a>
<?php
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
        $name=$_POST['name'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $sq="INSERT INTO client ( name, email, password) VALUES ('$name','$email','$password')";
        $result=mysqli_query($connection,$sq);
        if (mysqli_affected_rows($connection)>0){
            echo "Успешно сохраненно<br>";
        }
        else{
            echo "Ошибка<br>";
        }
    }
?>
</body>
</html>

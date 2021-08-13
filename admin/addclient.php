<?php
session_start();
require ('connect.php');
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $sq="INSERT INTO client ( name, email, password) VALUES ('$name','$email','$password')";
    $result=mysqli_query($connection,$sq);
    if (mysqli_affected_rows($connection)>0){
        $err="Успешно сохраненно<br>";
    }
    else{
        $err="Ошибка<br>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление клиента</title>
    <link rel="stylesheet" type="text/css" href="/style/vhod.css">
</head>
<body>
<header>
    <img src="\images\logovhod.jpg">
    <a class="exit" href="amain.php">Назад</a>
</header>
<form class="block" method="post">
    <div class="group">
        <input type="text" name="name" required> <span class="bar"></span>
        <label>Имя</label>
    </div>
    <div class="group">
        <input type="text" name="email" required> <span class="bar"></span>
        <label>Email</label>
    </div>
    <div class="group">
        <input type="text" name="password" required> <span class="bar"></span>
        <label>Пароль</label>
    </div>
    <button name="button" type="submit">Сохранить</button>
    <?php if(isset($err)) { ?><div role="alert" style="color: rgb(201, 35, 35);
    position: relative;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%);
    font-size: 25px;"><?php echo $err;?> </div> <?php } ?>
</form>
</body>
</html>

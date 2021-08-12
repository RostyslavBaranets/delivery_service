<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" type="text/css" href="style\reg.css">
</head>
<body>
<?php
require ('connect.php');
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){

$query = mysqli_query($connection, "SELECT id FROM client WHERE email='".mysqli_real_escape_string($connection, $_POST['email'])."'");
if(mysqli_num_rows($query) > 0)
{
    $err = "Пользователь с такой почтой уже существует";
}
else{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sq="INSERT INTO client ( name, email, password) VALUES ('$name','$email','$password')";
    mysqli_query($connection,$sq);
    $alrt = "Вы успешно зарегестрированны <br> <a href='vhod.php' style='padding: 85px;color: rgb(68, 68, 68);font-size: 20px;'>Войти</a> ";
}
}
?>
    <header>
        <a href="main.php"><img src="images\logovhod.jpg"></a>
    </header>
<form class="block" method="post">
    <div class="regis">Регистрация</div>
    <div class="group">
        <input name="name" type="text" required> <span class="bar"></span>
        <label>Имя, Фамилия</label>
    </div>

    <div class="group">
        <input name="email" type="text" required> <span class="bar"></span>
        <label>Email</label>
    </div>
    <?php if(isset($err)) { ?><div role="alert" style="color: rgb(201, 35, 35);margin-left: 30px;"> <?php echo $err;?> </div> <?php } ?>
    <div class="group">
        <input name="password" type="password" required> <span class="bar"></span>
        <label>Пароль</label>
    </div>

    <input class="button" type="submit"  value="Зарегистрироваться">
    <?php if(isset($alrt)) { ?><div role="alert" style="color: rgb(201, 35, 35);margin: 0 75px;"> <?php echo $alrt;?> </div> <?php } ?>
</form>
<footer>
    <span3>©2021”Delivery service”</span3>
    <span4>Все права защищены.</span4>
    <span5>Контакт-центр
        <br>+38 (XXX) XXX XX XX</span5>
</footer>
</body>
</html>

<?php
require ('connect.php');
if(isset($_POST['email']) and isset($_POST['password'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query = "SELECT * FROM client where email='$email' and password='$password'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $row = mysqli_fetch_assoc($result);
    if(!empty($row)){
        session_start();
        $_SESSION['id'] = $row['id'];
        header("Location:acount.php");
    }else{
        $err = "Ошибка входа";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="stylesheet" type="text/css" href="style\vhod.css">
</head>
<body>
    <header>
        <a href="index.php"><img src="images\logovhod.jpg"></a>
    </header>
<form class="block" method="post">
    <div>Вход</div>
    <div class="group">
        <input type="text" name="email" required> <span class="bar"></span>
        <label>Email</label>
    </div>
    <div class="group">
        <input type="password" name="password" required> <span class="bar"></span>
        <label>Пароль</label>
    </div>
    <button type="submit">Войти</button>
    <a href="reg.php" class="create">Создать аккаунт</a>
    <?php if(isset($err)) { ?><div role="alert" style="color: rgb(201, 35, 35);margin:0 111px;font-size: 25px;"> <?php echo $err;?> </div> <?php } ?>
</form>
<footer>
    <span3>©2021”Delivery service”</span3>
    <span4>Все права защищены.</span4>
    <span5>Контакт-центр
        <br>+38 (XXX) XXX XX XX</span5>
</footer>

</body>
</html>

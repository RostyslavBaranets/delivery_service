<?php
session_start();
require ('connect.php');
$sq="SELECT * FROM client WHERE id=".$_GET['id']." ";
$result=mysqli_query($connection,$sq);
if($result) {
    while ($row = mysqli_fetch_row($result)) {
        $id=$row['0'];
        $name=$row['1'];
        $password=$row['2'];
        $email=$row['3'];
    }
    mysqli_free_result($result);
}
if (isset($_POST['button'])){
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sq="UPDATE client SET name ='$name',password='$password',email='$email' WHERE id='$id'";
        $result=mysqli_query($connection,$sq);
        if (mysqli_affected_rows($connection)>0){
            $err= "Успешно сохраненно";
        }
        else{
            $err="Ошибка";
        }
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
    <title>Редактирование</title>
    <link rel="stylesheet" type="text/css" href="/style/vhod.css">
</head>
<body>
<header>
    <img src="\images\logovhod.jpg">
    <a class="exit" href="amain.php">Назад</a>
</header>
<form class="block" method="post">
    <div class="group">
        <input type="text" name="name" value="<?echo $name;?>"> <span class="bar"></span>
        <label>Имя</label>
    </div>
    <div class="group">
        <input type="text" name="email" value="<?echo $email;?>"> <span class="bar"></span>
        <label>Email</label>
    </div>
    <div class="group">
        <input type="text" name="password" value="<?echo $password;?>"> <span class="bar"></span>
        <label>Пароль</label>
    </div>
    <button name="button" type="submit">Сохранить</button>
    <?php if(isset($err)) { ?><div role="alert" style="color: rgb(201, 35, 35);
    position: relative;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%);font-size: 25px;"><?php echo $err;?> </div> <?php } ?>
</form>
</body>
</html>
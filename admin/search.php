<?php
session_start();
require ('connect.php');
if(isset($_POST['sub'])){
    $email=$_POST['email'];
    $name=$_POST['name'];

    $query = "SELECT * FROM client where email='$email' or name='$name'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $row = mysqli_fetch_row($result);

    if(!empty($row)){
        header("Location:searchclient.php?id=".$row['0']." ");
    }else{
        $err = "Ошибка";
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
    <title>Поиск клиента</title>
    <link rel="stylesheet" type="text/css" href="/style/vhod.css">
</head>
<body>
<header>
    <img src="\images\logovhod.jpg">
    <a class="exit" href="amain.php">Назад</a>
</header>
<form class="block" method="post">
    <div>Поиск</div>
    <div class="group">
        <input type="text" name="name"> <span class="bar"></span>
        <label>Имя</label>
    </div>
    <div class="group">
        <input type="text" name="email""> <span class="bar"></span>
        <label>Email</label>
    </div>
    <button name="sub" type="submit">Найти</button>
    <?php if(isset($err)) { ?><div role="alert" style="color: rgb(201, 35, 35);margin:0 111px;font-size: 25px;"> <?php echo $err;?> </div> <?php } ?>
</form>
</body>
</html>
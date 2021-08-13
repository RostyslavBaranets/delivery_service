<?php
session_start();
require ('connect.php');
$sq="SELECT * FROM department WHERE id=".$_GET['id']." ";
$result=mysqli_query($connection,$sq);
if($result) {
    while ($row = mysqli_fetch_row($result)) {
        $id=$row['0'];
        $city=$row['1'];
        $address=$row['2'];
    }
    mysqli_free_result($result);
}

if (isset($_POST['button'])) {
    if (isset($_POST['city']) && isset($_POST['address'])) {
        $city = $_POST['city'];
        $address = $_POST['address'];
        $sq = "UPDATE department SET city='$city', address='$address' WHERE id='$id'";
        $result = mysqli_query($connection, $sq);
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
        <input type="text" name="city" value="<?echo $city;?>"> <span class="bar"></span>
        <label>Город</label>
    </div>
    <div class="group">
        <input type="text" name="address" value="<?echo $address;?>"> <span class="bar"></span>
        <label>Адрес</label>
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
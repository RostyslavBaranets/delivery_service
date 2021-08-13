<?php
session_start();
require ('connect.php');
if (isset($_POST['view']) && isset($_POST['weight']) && isset($_POST['cost'])){
    $view=$_POST['view'];
    $weight=$_POST['weight'];
    $cost=$_POST['cost'];
    $sq="INSERT INTO price_of_view ( id_view, weight_id, cost) VALUES ('$view','$weight','$cost')";
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
    <title>Добавление цены</title>
    <link rel="stylesheet" type="text/css" href="/style/vhod.css">
</head>
<body>
<header>
    <img src="\images\logovhod.jpg">
    <a class="exit" href="amain.php">Назад</a>
</header>
<form class="block" method="post">
    <label class="leb">Вид доставки</label>
    <select name='view'>
        <?php
        $query = "SELECT id,name FROM view_of_delivery";
        $result = mysqli_query($connection,$query);
        if (mysqli_num_rows($result)> 0) {
            while($row = mysqli_fetch_array($result)) {
                echo "<option value=".$row["id"].">".$row["name"]."</option>";
            }
        }
        ?>
    </select>
    <label class="leb">Вес</label>
    <select name='weight'>
        <?php
        $query = "SELECT id,min,max FROM weight";
        $result = mysqli_query($connection,$query);
        if (mysqli_num_rows($result)> 0) {
            while($row = mysqli_fetch_array($result)) {
                echo "<option value=".$row["id"].">".$row["min"]."-".$row["max"]."</option>";
            }
        }
        ?>
    </select>
    <div class="group">
        <input type="text" name="cost" required> <span class="bar"></span>
        <label>Цена</label>
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

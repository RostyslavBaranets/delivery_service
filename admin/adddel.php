<?php
session_start();
require ('connect.php');
if (isset($_POST['id_client']) && isset($_POST['address1']) && isset($_POST['address2']) && isset($_POST['date']) && isset($_POST['distance']) && isset($_POST['weight']) && isset($_POST['type']) && isset($_POST['view'])){
    $id_client=$_POST['id_client'];
    $address1=$_POST['address1'];
    $address2=$_POST['address2'];
    $date=$_POST['date'];
    $distance=$_POST['distance'];
    $weight=$_POST['weight'];
    $type=$_POST['type'];
    $view=$_POST['view'];

    $sq = "SELECT p.id,p.cost 
FROM price_of_view p 
inner join weight w on p.weight_id=w.id
WHERE w.min<" . $_POST['weight'] . " and w.max>" . $_POST['weight'] . " and id_view=" . $_POST['view'] . " ";
    $result = mysqli_query($connection, $sq);
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $price = $row[0];
            $pricec = $row[1];
        }
        mysqli_free_result($result);
    }

    $sq = "SELECT cost FROM type_of_delivery WHERE id= $type ";
    $result = mysqli_query($connection, $sq);
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            $typec = $row[0];
        }
        mysqli_free_result($result);
    }

    $cost=$pricec * $distance + $typec;
    $sq="INSERT INTO delivery ( id_client, address1, address2, date, distance, weight, id_type, id_view, id_price, cost) VALUES ('$id_client','$address1','$address2','$date','$distance','$weight','$type','$view','$price','$cost')";
    $result=mysqli_query($connection,$sq);
    if (mysqli_affected_rows($connection)>0){
        $err= "Успешно сохраненно<br>";
    }
    else{
        $err= "Ошибка<br>";
    }
}else{
    $err= "Ошибка<br>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить заказ</title>
    <link rel="stylesheet" type="text/css" href="/style/vhod.css">
</head>
<body>
<header>
    <img src="\images\logovhod.jpg">
    <a class="exit" href="amain.php">Назад</a>
</header>
<form class="block" method="post">
    <label class="leb">id клиента</label>
    <select name='id_client'>
        <?php
        $query = "SELECT id,name FROM client";
        $result = mysqli_query($connection,$query);
        if (mysqli_num_rows($result)> 0) {
            while($row = mysqli_fetch_array($result)) {
                echo "<option value=".$row["id"].">".$row["id"]." ".$row["name"]."</option>";
            }
        }
        ?>
    </select><br>

    <div class="group">
        <input type="text" name="address1" required> <span class="bar"></span>
        <label>Откуда</label>
    </div>
    <div class="group">
        <input type="text" name="address2" required> <span class="bar"></span>
        <label>Куда</label>
    </div>
    <div class="group">
        <input type="text" name="date" required> <span class="bar"></span>
        <label>Дата</label>
    </div>
    <div class="group">
        <input type="text" name="distance" required> <span class="bar"></span>
        <label>Дистанция</label>
    </div>
    <div class="group">
        <input type="text" name="weight" required> <span class="bar"></span>
        <label>Вес</label>
    </div>
    <label class="leb">Тип доставки</label>
    <select name='type'>
        <?php
        $query = "SELECT id,name FROM type_of_delivery";
        $result = mysqli_query($connection,$query);
        if (mysqli_num_rows($result)> 0) {
            while($row = mysqli_fetch_array($result)) {
                echo "<option value=".$row["id"].">".$row["name"]."</option>";
            }
        }
        ?>
    </select><br>
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
    </select><br>
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

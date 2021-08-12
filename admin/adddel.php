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
    ID клиента<br>
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
    Откуда<br>
    <input name="address1" ><br>
    Куда<br>
    <input name="address2"><br>
    Дата<br>
    <input name="date"><br>
    Дистанция<br>
    <input name="distance"><br>
    Вес<br>
    <input name="weight"><br>
    Тип доставки<br>
    <select name='type' >
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
    Вид доставки<br>
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

    <br>
    <input type="submit" value="Сохранить" name="button"><br>
</form>
<a href='amain.php'> назад</a>
<?php
    if (isset($_POST['id_client']) && isset($_POST['address1']) && isset($_POST['address2']) && isset($_POST['date']) && isset($_POST['distance']) && isset($_POST['weight']) && isset($_POST['type']) && isset($_POST['view'])){
        $id_client=$_POST['id_client'];
        $address1=$_POST['address1'];
        $address2=$_POST['address2'];
        $date=$_POST['date'];
        $distance=$_POST['distance'];
        $weight=$_POST['weight'];
        $type=$_POST['type'];
        $view=$_POST['view'];

        $sq = "SELECT id,cost FROM price_of_view WHERE weight_min< $weight and weight_max> $weight and id_view= $view ";
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
            echo "Успешно сохраненно<br>";
        }
        else{
            echo "Ошибка<br>";
        }
    }else{
        echo "Ошибка<br>";
    }
?>
</body>
</html>

<?php
session_start();
require ('connect.php');

if (isset($_POST['button'])) {
    if (isset($_POST['address1']) && isset($_POST['address2']) && isset($_POST['view']) && isset($_POST['distance']) && isset($_POST['weight'])) {
        $client = $_SESSION['id'];
        if ($_POST['address1'] == "door1") {
            $adr1 = $_POST['adr1'];
            $type1 = "door";
        } else {
            $adr1 = $_POST['department1'];
            $type1 = "dep";
        }
        if ($_POST['address2'] == "door2") {
            $adr2 = $_POST['adr2'];
            $type2 = "door";
        } else {
            $adr2 = $_POST['department2'];
            $type2 = "dep";
        }

        $date = date("Y-m-d H:i:s");
        $distance = $_POST['distance'];
        $weight = $_POST['weight'];

        if ($type1 == "dep" && $type2 == "dep") {
            $sq = "SELECT id,cost FROM type_of_delivery WHERE name='склад-склад'";
            $result = mysqli_query($connection, $sq);
            if ($result) {
                while ($row = mysqli_fetch_row($result)) {
                    $type = $row[0];
                    $typec = $row[1];
                }
                mysqli_free_result($result);
            }
        } else if ($type1 == "dep" && $type2 == "door") {
            $sq = "SELECT id,cost FROM type_of_delivery WHERE name='склад-двери'";
            $result = mysqli_query($connection, $sq);
            if ($result) {
                while ($row = mysqli_fetch_row($result)) {
                    $type = $row[0];
                    $typec = $row[1];
                }
                mysqli_free_result($result);
            }
        } else if ($type1 == "door" && $type2 == "dep") {
            $sq = "SELECT id,cost FROM type_of_delivery WHERE name='двери-склад'";
            $result = mysqli_query($connection, $sq);
            if ($result) {
                while ($row = mysqli_fetch_row($result)) {
                    $type = $row[0];
                    $typec = $row[1];
                }
                mysqli_free_result($result);
            }
        } else {
            $sq = "SELECT id,cost FROM type_of_delivery WHERE name='двери-двери'";
            $result = mysqli_query($connection, $sq);
            if ($result) {
                while ($row = mysqli_fetch_row($result)) {
                    $type = $row[0];
                    $typec = $row[1];
                }
                mysqli_free_result($result);
            }
        }

        $view = $_POST['view'];

        $sq = "SELECT id,cost FROM price_of_view WHERE weight_min<" . $_POST['weight'] . " and weight_max>" . $_POST['weight'] . " and id_view=" . $_POST['view'] . " ";
        $result = mysqli_query($connection, $sq);
        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $price = $row[0];
                $pricec = $row[1];
            }
            mysqli_free_result($result);
        }

        $cost = $pricec * $_POST['distance'] + $typec;

        $sq = "INSERT INTO delivery ( id_client, address1, address2, date, distance, weight, id_type, id_view, id_price, cost) VALUE ('$client','$adr1','$adr2','$date','$distance','$weight','$type','$view','$price','$cost')";
        mysqli_query($connection, $sq);
        $err = "Посылка успешно создана. Итого к оплате $cost грн";
    } else {
        $err = "Ошибка";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" type="text/css" href="style\createp.css"> </head>
    <script type="text/javascript" src="script\enebl.js"></script>
<body>
    <header>
        <a href="main.php"><img src="images\logovhod.jpg"></a>
        <?php
        if (isset($_SESSION['id'])){
            echo "<a class='a' href=\"acount.php\">Личный кабинет</a>";
        }else{
            echo "<a class='a' href=\"vhod.php\">Войти</a>";
        }
        ?>
    </header>
    <form class="block" method="post">
        <div class="dc">
            <div class="mesto">Место отправки</div>
            <label class="rad">
                <input id="door1" type="radio" name="address1" value="door1" onclick="en1()" required>адрес</label>
            <div class="group">
                <input id="adr1" class="in" type="text" name="adr1" disabled> <span class="bar"></span>
                <label class="gr">Адрес</label>
            </div>
            <label class="rad">
                <input id="sklad1" type="radio" name="address1" value="sklad1" onclick="en1()" required>склад</label>
            <br>
            
            <label class="scl">Найдите подходящий склад:
                <br> </label>
            <select id='skld1' name='department1' disabled>
            <?php
            $query = "SELECT id,city,address FROM department";
            $result = mysqli_query($connection,$query);
            if (mysqli_num_rows($result)> 0) {
                while($row = mysqli_fetch_array($result)) {
                    echo "<option value='№".$row["id"]." ".$row["city"]." ".$row["address"]."'>№".$row["id"]." ".$row["city"]." ".$row["address"]."</option>";
                }
            }
            ?>
            </select>
        </div>

        <div class="dc">
            <div class="mesto">Место получения</div>
            <label class="rad">
                <input id="door2" type="radio" name="address2" value="door2" onclick="en12()" required>адрес</label>
            <div class="group">
                <input id="adr2" class="in" type="text" name="adr2" disabled> <span class="bar"></span>
                <label class="gr">Адрес</label>
            </div>
            <label class="rad">
                <input id="sklad2" type="radio" name="address2" value="sklad2" onclick="en12()" required>склад</label>
            <br>
            <label class="scl">Найдите подходящий склад:
                <br> </label>
            <select id='skld2' name='department2' disabled>
            <?php
            $query = "SELECT id,city,address FROM department";
            $result = mysqli_query($connection,$query);
            if (mysqli_num_rows($result)> 0) {
                while($row = mysqli_fetch_array($result)) {
                    echo "<option value='№".$row["id"]." ".$row["city"]." ".$row["address"]."'>№".$row["id"]." ".$row["city"]." ".$row["address"]."</option>";
                }
            }
            ?>
            </select>
        </div>

        <label class="scl">Выберите вид доставки:
            </label>
        <select class='view' name='view' required>
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

        <input class="inn" name="distance" type="text" placeholder="Дистанция в км" required>
        <input class="inn" name="weight" type="text" placeholder="Вес посылки" required>

        <?php if(isset($err)) { ?><div class="err" role="alert"> <?php echo $err;?> </div> <?php } ?>
        <input class="sub" type="submit" value="Создать посылку" name="button">
    </form>
    <footer>
        <span3>©2021”Delivery service”</span3>
        <span4>Все права защищены.</span4>
        <span5>Контакт-центр
            <br>+38 (XXX) XXX XX XX</span5>
    </footer>
</body>

</html>

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
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
Клиенты:
<table>
<?php $sq="SELECT * FROM client ";
$result=mysqli_query($connection,$sq);
if($result) {
    $rows = mysqli_num_rows($result);
    echo "<tr><th>id</th><th>Имя, фамилия</th><th>Пароль</th><th>email</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
        for ($j = 0 ; $j < 4 ; ++$j) echo "<td>$row[$j]</td>";
        echo "<td><a href='editclient.php?id=".$row['0']."'> редактировать</a></td>
    <td><a href='deleteclient.php?id=".$row['0']."'> удалить</a></td></tr>";
    }
}
?>
</table>
<a href='addclient.php'> Добавить клиента</a><br><br>

Отделения:
<table>
    <?php $sq="SELECT * FROM department ";
    $result=mysqli_query($connection,$sq);
    if($result) {
        $rows = mysqli_num_rows($result);
        echo "<tr><th>id</th><th>Город</th><th>Адрес</th></tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
            for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
            echo "<td><a href='editdep.php?id=".$row['0']."'> редактировать</a></td>
    <td><a href='deletedep.php?id=".$row['0']."'> удалить</a></td></tr>";
        }
    }
    ?>
</table>
<a href='adddep.php'> Добавить отделение</a><br><br>

Тип доставки:
<table>
    <?php $sq="SELECT * FROM type_of_delivery";
    $result=mysqli_query($connection,$sq);
    if($result) {
        $rows = mysqli_num_rows($result);
        echo "<tr><th>id</th><th>Название</th><th>Цена</th></tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
            for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
            echo "<td><a href='edittype.php?id=".$row['0']."'> Изменить цену</a></td></tr>";
        }
    }
    ?>
</table><br><br>

Вид доставки:
<table>
    <?php $sq="SELECT * FROM view_of_delivery ";
    $result=mysqli_query($connection,$sq);
    if($result) {
        $rows = mysqli_num_rows($result);
        echo "<tr><th>id</th><th>Название</th><th>Описание</th></tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
            for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
            echo "<td><a href='editview.php?id=".$row['0']."'> редактировать описание</a></td></tr>";
        }
    }
    ?>
</table><br><br>

Цены на вид доставки:
<table>
    <?php $sq="SELECT p.id, v.name, p.weight_min , p.weight_max, p.cost 
FROM price_of_view p 
inner join view_of_delivery v on p.id_view=v.id";
    $result=mysqli_query($connection,$sq);
    if($result) {
        $rows = mysqli_num_rows($result);
        echo "<tr><th>id</th><th>Название вида</th><th>Минимальный вес</th><th>Максимальный вес</th><th>Цена</th></tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
            for ($j = 0 ; $j < 5 ; ++$j) echo "<td>$row[$j]</td>";
            echo "<td><a href='editprice.php?id=".$row['0']."'>изменить цену</a></td></tr>";
        }
    }
    ?>
</table><br><br>

Заказы:
<table>
    <?php $sq="SELECT d.id, d.id_client, d.address1, d.address2, d.date, d.distance, d.weight, t.name, v.name, p.id, d.cost
FROM delivery d
inner join view_of_delivery v on d.id_view=v.id
inner join type_of_delivery t on d.id_type=t.id
inner join price_of_view p on d.id_type=p.id";
    $result=mysqli_query($connection,$sq);
    if($result) {
        $rows = mysqli_num_rows($result);
        echo "<tr><th>id</th><th>id клиента</th><th>Откуда</th><th>Куда</th><th>Дата</th><th>Дистанция</th><th>Вес</th><th>Тип доставки</th><th>Вид доставки</th><th>id цены вида</th><th>Цена</th></tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
            for ($j = 0 ; $j < 11 ; ++$j) echo "<td>$row[$j]</td>";
            echo "<td><a href='editdel.php?id=".$row['0']."'>редактировать</a></td>
    <td><a href='deletedel.php?id=".$row['0']."'> удалить</a></td></tr>";
        }
    }
    ?>
</table>
<a href='adddel.php'> Добавить клиента</a><br><br><br>
<a class="exit" href='exit.php'>Выйти с админпанели</a>
</body>
</html>
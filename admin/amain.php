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
    <title>Админпанель</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
<header>
    <img src="\images\logo.jpg">
    <a class="exit" href='exit.php'>Выйти с админ панели</a>
</header>
<div class="qwe">
<a href="#client">Все клиенты:</a>
<div id="client">
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
        echo "<td><a href='deliveryclient.php?id=".$row['0']."'> просмотреть заказы</a></td>
    <td><a href='editclient.php?id=".$row['0']."'> редактировать</a></td>
    <td><a href='deleteclient.php?id=".$row['0']."'> удалить</a></td></tr>";
    }
}
?>
</table>
<a href='addclient.php'> Добавить клиента</a>
</div><br>

    <a href="search.php">Поиск по клиенту</a><br>

<a href="#dep">Отделения:</a>
<div id="dep">
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
<a href='adddep.php'> Добавить отделение</a>
</div><br>

<a href="#type">Тип доставки:</a>
<div id="type">
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
</table>
</div><br>

<a href="#view">Вид доставки:</a>
<div id="view">
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
            echo "<td><a href='editview.php?id=".$row['0']."'> редактировать</a></td>
            <td><a href='deleteview.php?id=".$row['0']."'> удалить</a></td></tr>";
        }
    }
    ?>
</table>
    <a href='addview.php'> Добавить вид</a>
</div><br>

<a href="#weight">Вес:</a>
<div id="weight">
    <table>
        <?php $sq="SELECT * FROM weight ";
        $result=mysqli_query($connection,$sq);
        if($result) {
            $rows = mysqli_num_rows($result);
            echo "<tr><th>id</th><th>min</th><th>max</th></tr>";
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                $row = mysqli_fetch_row($result);
                echo "<tr>";
                for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
                echo "<td><a href='editweight.php?id=".$row['0']."'> редактировать </a></td>
                <td><a href='deleteweight.php?id=".$row['0']."'> удалить</a></td></tr>";
            }
        }
        ?>
    </table>
    <a href='addweight.php'> Добавить вес</a>
</div><br>

<a href="#price">Цены на вид доставки:</a>
<div id="price">
<table>
    <?php $sq="SELECT p.id, v.name, w.min, w.max, p.cost 
FROM price_of_view p 
inner join view_of_delivery v on p.id_view=v.id
inner join weight w on p.weight_id=w.id";
    $result=mysqli_query($connection,$sq);
    if($result) {
        $rows = mysqli_num_rows($result);
        echo "<tr><th>id</th><th>Название вида</th><th>min вес</th><th>max вес</th><th>Цена</th></tr>";
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
            for ($j = 0 ; $j < 5 ; ++$j) echo "<td>$row[$j]</td>";
            echo "<td><a href='editprice.php?id=".$row['0']."'>редактировть</a></td>
            <td><a href='deleteprice.php?id=".$row['0']."'> удалить</a></td></tr>";
        }
    }
    ?>
</table>
    <a href='addprice.php'> Добавить цену</a>
</div><br>

<a href="#del">Заказы:</a>
<div id="del">
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
<a href='adddel.php'> Добавить заказ</a>
</div>
</div>
</body>
</html>
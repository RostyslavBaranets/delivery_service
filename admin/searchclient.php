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
    <title>Поиск клиента</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
<header>
    <img src="\images\logo.jpg">
    <a class="exit" href='amain.php'>На главную</a>
</header>
<div class="qwe">
    <div>
        <table>
            <?php $sq="SELECT * FROM client where id=".$_GET['id']." ";
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
</div>
</body>
</html>
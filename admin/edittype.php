<?php
session_start();
require ('connect.php');
$sq="SELECT * FROM type_of_delivery WHERE id=".$_GET['id']." ";
$result=mysqli_query($connection,$sq);
if($result) {
    while ($row = mysqli_fetch_row($result)) {
        $id=$row['0'];
        $name=$row['1'];
        $cost=$row['2'];
    }
    mysqli_free_result($result);
}

if (isset($_POST['button'])) {
    if (isset($_POST['cost'])) {
        $cost = $_POST['cost'];
        $sq = "UPDATE type_of_delivery SET cost='$cost' WHERE id='$id' ";
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
    <title>Смена цены</title>
    <link rel="stylesheet" type="text/css" href="/style/vhod.css">
</head>
<body>
<header>
    <img src="\images\logovhod.jpg">
    <a class="exit" href="amain.php">Назад</a>
</header>
<form class="block" method="post">
    <div class="group">
        <input type="text" name="cost" value="<?echo $cost;?>"> <span class="bar"></span>
        <label>Стоимость</label>
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
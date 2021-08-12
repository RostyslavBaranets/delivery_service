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
    Номер<br>
    <input name="id" value="<?echo $id;?> " disabled><br>
    Город<br>
    <input name="city" value="<?echo $city;?>"><br>
    Адрес<br>
    <input name="address" value="<?echo $address;?>"><br><br>
    <input type="submit" value="Сохранить" name="button"><br>
</form>
<a href='amain.php'> назад</a>
<?php
if (isset($_POST['button'])){
    if (isset($_POST['id']) && isset($_POST['city']) && isset($_POST['address'])){
        $id=$_POST['id'];
        $city=$_POST['city'];
        $address=$_POST['address'];
        $sq="UPDATE department SET city='$city', address='$address' WHERE id='$id'";
        $result=mysqli_query($connection,$sq);
        if (mysqli_affected_rows($connection)>0){
            echo "Успешно сохраненно<br>";
        }
        else{
            echo "Ошибка<br>";
        }
    }
}
?>
</body>
</html>
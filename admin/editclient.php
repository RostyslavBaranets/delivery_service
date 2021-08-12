<?php
session_start();
require ('connect.php');
$sq="SELECT * FROM client WHERE id=".$_GET['id']." ";
$result=mysqli_query($connection,$sq);
if($result) {
    while ($row = mysqli_fetch_row($result)) {
        $id=$row['0'];
        $name=$row['1'];
        $password=$row['2'];
        $email=$row['3'];
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
    <input name="id" value="<?echo $id;?>" disabled><br>
    Имя, Фамилия<br>
    <input name="name" value="<?echo $name;?>"><br>
    Email<br>
    <input name="email" value="<?echo $email;?>"><br>
    Пароль<br>
    <input name="password" value="<?echo $password;?>"><br><br>
    <input type="submit" value="Сохранить" name="button"><br>
</form>
<a href='amain.php'> назад</a>
<?php
if (isset($_POST['button'])){
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
        $name=$_POST['name'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $sq="UPDATE client SET name ='$name',password='$password', email='$email' WHERE id='$id'";
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
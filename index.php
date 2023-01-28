<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LOG IN</title>

</head>
<body>
    <center>
    <h1> HELLO ADMIN </h1>
        <form action="" method="post">
        <label for="" class="name">Name </label>
        <input type="text" class="name" name="USER_NAME" placeholder="enter your name here"> <br> <br>
        <label for="" class="pswr">Password </label>
        <input type="text" class="pswr" name="PASSWORD" placeholder="enter your password here"> <br> <br>
                <!-- boutton submit -->
        <input type="submit" class="submit" name="login" value="LOG-IN">
        </form>
        </center>
<?php
$servername= "localhost";
$username= "root";
$password= "root";
$dbname= "management";
$conn= new mysqli($servername, $username, $password, $dbname);
    if(isset($_POST['login'])){
        $USER_NAME=$_POST['USER_NAME'];
        $PASSWORD=$_POST['PASSWORD'];
        
        $sql= " SELECT *FROM ADMIN Where USER_NAME='$USER_NAME' AND PASSWORD='$PASSWORD'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            echo"ddddd";
            header("location:management.php");
        }
    }

?>
</body>
</html>
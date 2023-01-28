
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .btn{
            color: #000000;
    background-color: rgb(135, 206, 250);
    /* padding: 10px; */
    border-radius: 13px;
    height: 39px;
    }
    .btn a{
        text-decoration: none;
        padding: 18px;

    }
    form .input_btn{
    color: #000000;
    background-color: rgb(135, 206, 250);
    padding: 10px;
    border-radius: 13px;
    width: -webkit-fill-available;
        }
    body{
    margin: 0px;
    background-image:url("bkg.png") ;
}
    form{
    
    padding: 47px;
    width: max-content;
    background-color: black;
    color: #f2f2f2;
    margin-top: 1%;
    border: solid rgb(135, 206, 250);
    border-radius: 26px;
  }
  form label{
    float: left;
  }
  form input{
    color: #000000;
    float: right;
  }

  .formWrapper
  {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh;
  }
  .input_btn a{
    text-decoration:"none";
  }
    </style>
</head>
<body>

<?php
$servername= "localhost";
$username= "root";
$password= "root";
$dbname= "management";
$conn= new mysqli($servername, $username, $password, $dbname);

$IDE = $_GET['updateidproject'];
$sql2="SELECT * FROM PROJET WHERE ID_PROJET='$IDE'";
$result2=$conn->query($sql2);
if($result2->num_rows > 0 ){
  while ($row = $result2->fetch_assoc()) {
    $NOM=$row['NOM'];
    $DURE=$row['DURE'];
    $DATE_DEBUT_PROJ=$row['DATE_DEBUT_PROJ'];
    

      ?>
    <button class="btn"> <a href="employeur.php">Back to emplye page</a></button>
    <div class="formWrapper">
<form  method="POST" >
<label for="">NAME :</label> 
        <input type="text" name="NOM" value="<?php echo $NOM;?>"> <br> <br>
        <label for="">DURE :</label>
        <input type="text" name="DURE" value="<?php echo $DURE;?>"><br> <br>
        <label for="">DATE DE DEBUT :</label>
        <input type="date" name="DATE_DEBUT_PROJ" value="<?php echo $DATE_DEBUT_PROJ;?>"><br><br> 
        <input type="submit" class="input_btn" name="update" value="update">
    </form></div>
<?php   }}?>

    
<?php


if(isset($_POST['update'])){
    $ID_PROJET=$_GET['updateidproject'];
    $NOM=$_POST['NOM'];
    $DURE=$_POST['DURE'];
    $DATE_DEBUT_PROJ=$_POST['DATE_DEBUT_PROJ'];
    
    $sql4="UPDATE PROJET SET NOM='$NOM',DURE='$DURE',DATE_DEBUT_PROJ='$DATE_DEBUT_PROJ' WHERE ID_PROJET='$ID_PROJET'";
    $result5 = $conn->query($sql4);
    if($result5){
        header('location:project.php');
    } else{
        echo"update error";
    }
}
?>
</body>
</html>

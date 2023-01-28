
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
    <button class="btn"> <a href="employeur.php">Back to emplye page</a></button>
    <div class="formWrapper">
<form  method="POST" >
        <label for="">NAME :</label> 
        <input type="text" name="NOM" > <br> <br>
        <label for="">CIN :</label>
        <input type="text" name="CIN" ><br> <br>
        <label for="">CONTRAT :</label>
        <input type="text" name="CONTRAT" ><br><br> 
        <label for="">DATE DEBUT DU DTRAVAIL :</label>
        <input type="date" name="DATE_DEB_TR" ><br> <br>
        <label for="">STATUT :</label>
        <input type="text" name="STATUT" ><br> <br>
        <input type="submit" class="input_btn" name="update" value="update">
    </form></div>
<?php
$servername= "localhost";
$username= "root";
$password= "root";
$dbname= "management";
$conn= new mysqli($servername, $username, $password, $dbname);



if(isset($_POST['update'])){
    $ID_EMPL=$_GET['updateid'];
    $NOM=$_POST['NOM'];
    $CIN=$_POST['CIN'];
    $CONTRAT=$_POST['CONTRAT'];
    $DATE_DEB_TR=$_POST['DATE_DEB_TR'];
    $STATUT=$_POST['STATUT'];
    $sql4="UPDATE EMPLOYE SET NOM='$NOM',CIN='$CIN',CONTRAT='$CONTRAT',DATE_DEB_TR='$DATE_DEB_TR',STATUT='$STATUT' WHERE ID_EMPL='$ID_EMPL'";
    $result5 = $conn->query($sql4);
    if($result5){
        header('location:employeur.php');
    } else{
        echo"update error";
    }
}
?>
</body>
</html>

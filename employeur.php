<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="employeur.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
    <title>Employeurs</title>
</head>
<body>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<div class="topnav" id="myTopnav">
  <a href="management.php" class="active">Home</a>
    <div class="right">
        <a href="employeur.php">Employeurs</a> 
        <a href="project.php">Project</a>
        <a href="mission.php">Mission</a>
        <a href="#about">Account</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</div>
            <center><div class="btn-group">
                    <button onclick="formFunction()" >AJOUTER EMPLOYEUR</button>
                    <button onclick="form2Function()">Rechercher</button>
                    <button>Mes favoris</button>
            </div></center>

   <center> <form class="form1" method="POST" id="form">
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
        <button class="form-btn" onclick="hideform()" >CLOSE</button>
        <input type="submit" class="input_btn" name="AJOUTER" value="AJOUTER">
    </form></center>
    <center> 
      <form  class="form2" method="POST" id="form2">
    <label class="chercher" for="site-search">Search a client:</label>
        <button>Search</button>
<input class="ch" type="search" id="site-search" name="q">

    </form></center>

    <div>
    <table id="customers">
  <tr>
    <th>ID EMPLOYEUR</th>
    <th>NOM</th>
    <th>CIN</th>
    <th>CONTRAT</th>
    <th>DATE DE DEBUT DU TRAVAIL</th>
    <th>STATUT</th>
    <th id="update">operation</th>
    
  </tr>
  <?php
    $servername= "localhost";
    $username= "root";
    $password= "root";
    $dbname= "management";
    $conn= new mysqli($servername, $username, $password, $dbname);
    if(isset($_POST['AJOUTER'])){
        $NOM=$_POST['NOM'];
        $CIN=$_POST['CIN'];
        $CONTRAT=$_POST['CONTRAT'];
        $DATE_DEB_TR=$_POST['DATE_DEB_TR'];
        $STATUT=$_POST['STATUT'];
        $sql= ("INSERT INTO EMPLOYE (NOM,CIN,CONTRAT,DATE_DEB_TR,STATUT) 
        VALUES ('$NOM','$CIN','$CONTRAT','$DATE_DEB_TR','$STATUT')");
        $result=$conn->query($sql);
        if($result){
            header('location:employeur.php');
        } else {
            echo"eror";
        }
        }
        


?>
  <?php

$servername= "localhost";
$username= "root";
$password= "root";
$dbname= "management";
$conn= new mysqli($servername, $username, $password, $dbname);
  $sql2="SELECT * FROM EMPLOYE";
  $result2=$conn->query($sql2);
  if($result2->num_rows > 0 ){
    while ($row = $result2->fetch_assoc()) {

        $ID_EMPL=$row['ID_EMPL'];
        $NOM=$row['NOM'];
        $CIN=$row['CIN'];
        $CONTRAT=$row['CONTRAT'];
        $DATE_DEB_TR=$row['DATE_DEB_TR'];
        $STATUT=$row['STATUT'];
            echo "<tr>
                    <td>$ID_EMPL</td>
                    <td>$NOM</td>
                    <td>$CIN</td>
                    <td>$CONTRAT</td>
                    <td>$DATE_DEB_TR</td>
                    <td>$STATUT</td>
                    <td>
                    <button><a href='delete_emp.php?deleteid=".$ID_EMPL."' style='color:black;text-decoration:none;' >Delete</a></button>
                    <button><a href='update_emp.php?updateid=".$ID_EMPL."' style='color:black;text-decoration:none'>Update</a></button>
                    </td>
                    </tr>";
        }
  }
  ?>
 
  
</table>    </div>


   
<script>
    /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

//  script to hide and show adding employer form
function formFunction() {
  document.getElementById("form").style.display = "block";
  document.getElementById("form2").style.display = "none";
}
function hideform(){
    document.getElementById("form").style.display = "none";

}
function form2Function() {
  document.getElementById("form2").style.display = "block";
  document.getElementById("form").style.display = "none";


}

</script>
</body>
</html>
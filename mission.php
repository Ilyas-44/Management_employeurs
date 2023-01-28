<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJECT</title>
    <link rel="stylesheet" href="mission.css">
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<div class="topnav" id="myTopnav">
  <a href="management.php" class="active">Home</a>
    <div class="right">
        <a href="employeur.php">Employeurs</a>
        <a href="project.php" active>Project</a>
        <a href="mission.php">Mission</a>
        <a href="#about">Account</a>
        <a href="javascript:void(0);" class="icon" onclick="myfunctionpr()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</div>
            <center><div class="btn-group">
                    <button onclick="formfunctionpr()" >Ajouter Une Mission</button>
                    <button>Rechercher Une Mission</button>
                    <button>Mes Missions favoris</button>
            </div></center>

   <center> <form  method="POST" id="form">
        <label for="">ID_ADMIN :</label> 
        <input type="text" name="ID_ADMIN" > <br> <br>
        <label for="">ID_EMPL :</label>
        <input type="text" name="ID_EMPL" ><br> <br>
        <label for="">ID_PROJET :</label>
        <input type="text" name="ID_PROJET" ><br><br> 
        <label for="">AVANT LE :</label>
        <input type="date" name="AVANT_LE" ><br><br> 
        
        <button class="form-btn" onclick="hideform()" >CLOSE</button>
        <input type="submit" class="input_btn" name="AJOUTER" value="AJOUTER">
    </form></center>

    <div>
    <table id="customers">
  <tr>
    <th>ID_MISE</th>
    <th>ID_ADMIN</th>
    <th>ID_EMPL</th>
    <th>ID_PROJET</th>
    <th>AVANT_LE</th>
    <th id="update">operation</th>
    
  </tr>

  <?php
    $servername= "localhost";
    $username= "root";
    $password= "root";
    $dbname= "management";
    $conn12= new mysqli($servername, $username, $password, $dbname);
    if(isset($_POST['AJOUTER'])){
        $ID_ADMIN=$_POST['ID_ADMIN'];
        $ID_EMPL=$_POST['ID_EMPL'];
        $ID_PROJET=$_POST['ID_PROJET'];
        $AVANT_LE=$_POST['AVANT_LE'];
        
        $sql32= ("INSERT INTO MISEENSERVICE (ID_ADMIN,ID_EMPL,ID_PROJET,AVANT_LE) 
        VALUES ('$ID_ADMIN','$ID_EMPL','$ID_PROJET','$AVANT_LE')");
        $resulta12=$conn12->query($sql32);
        if($resulta12){
            header('location:mission.php');
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
  $sql2="SELECT * FROM MISEENSERVICE";
  $result2=$conn->query($sql2);
  if($result2->num_rows > 0 ){
    while ($row = $result2->fetch_assoc()) {
      $ID_PROJET=$row['ID_PROJET'];
      $NOM=$row['NOM'];
      $DURE=$row['DURE'];
      $DATE_DEBUT_PROJ=$row['DATE_DEBUT_PROJ'];
      
            echo "<tr>
                    <td>$ID_PROJET</td>
                    <td>$NOM</td>
                    <td>$DURE</td>
                    <td>$DATE_DEBUT_PROJ</td>
                    <td>
                    <button><a href='delete.php?deleteidproject=".$ID_PROJET."' style='color:black;text-decoration:none;' >Delete</a></button>
                    <button><a href='update_project.php?updateidproject=".$ID_PROJET."' style='color:black;text-decoration:none'>Update</a></button>
                    </td>
                    </tr>";
        }
  }
  ?>
  



  </table>    </div>


   
<script>
    /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myfunctionpr() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

//  script to hide and show adding employer form
function formfunctionpr() {
  document.getElementById("form").style.display = "block";
}
function hideformpr(){
    document.getElementById("form").style.display = "none";

}
</script>
</body>
</html>
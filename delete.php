<?php
$servername= "localhost";
$username= "root";
$password= "root";
$dbname= "management";
$conn= new mysqli($servername, $username, $password, $dbname);
if(isset($_GET['deleteid'])){
    $ID_EMPL=$_GET['deleteid'];

    $sql="DELETE FROM EMPLOYE WHERE ID_EMPL=$ID_EMPL";
    
    $result3=$conn->query($sql);
    if($result3){
        // echo"data deleted";
        header('location:employeur.php');
       } else {
            echo"eror";
        }
    
}
if(isset($_GET['deleteidproject'])){
    $ID_PROJET=$_GET['deleteidproject'];

    $sql="DELETE FROM PROJET WHERE ID_PROJET=$ID_PROJET";
    
    $result3=$conn->query($sql);
    if($result3){
        // echo"data deleted";
        header('location:project.php');
       } else {
            echo"eror";
        }
    
}

?>
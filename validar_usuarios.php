<?php
session_start(); 
include ("conexion.php"); 

$user= $_POST['user'];
$pass=$_POST['pass'];


$consulta="Select * from usuarios where user='$user' and pass='$pass'";
$result=mysqli_query($conn,$consulta);
$row=mysqli_num_rows($result);


if($row){
    $_SESSION['user'] = $user;
    header("location:menu.php");

}
else{
    
    echo "<script>
             alert('Usuario o contraseña incorrectos');
             window.location = 'index.php';
          </script>";
}

 mysqli_free_result($result);
 mysqli_close($conn);
?>
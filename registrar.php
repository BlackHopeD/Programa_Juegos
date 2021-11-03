<?php
include ("conexion.php"); 

$user= $_POST['user'];
$pass=$_POST['pass'];
$nombre=$_POST['nombre'];


$consulta="Select user from usuarios where user='$user'";
$result=mysqli_query($conn,$consulta);
$row_admin=mysqli_num_rows($result);

if($row_admin){

    echo "<script>
    alert('El nombre de usuario ya existe.');
    window.location = 'index.php';
    </script>";
}

else{
    
   $consulta="insert into usuarios(nombre,user,pass) VALUES('$nombre','$user','$pass')";
   $result=mysqli_query($conn,$consulta);

     echo "<script>
     alert('El usuario ha sido creado.');
     window.location = 'index.php';
     </script>"; 

 
}
 mysqli_close($conn);
?>
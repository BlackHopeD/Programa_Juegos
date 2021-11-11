<?php
Eliminar($_GET['data']);

function Eliminar($idmemoria_score){  //Funcion para borrar score
   
    include ("conexion.php");
    $sentencia="DELETE FROM memoria_score where idmemoria_score='$idmemoria_score'";
    $result=mysqli_query($conn,$sentencia);

    echo "<script>
    window.location = './memory_game.php';
    </script>";  

  
}
?>
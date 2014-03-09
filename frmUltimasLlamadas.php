<?php
session_start();
?>

<?php

  $idUsuario = $_SESSION["idUsuario"];
  if ($_SESSION["idUsuario"] == null){
     die("Usuario No validado");
  }
 else {
      

   
   require_once 'classes/Connection.php';
   require_once 'classes/LlamadasByUserDao.php';
   
   
   
   // Creamos conexion a base de datos
   $conn = new Connection();
   $llamadaDao = new LlamadasByUserDao($conn->getConexion());   
   $llamadas=$llamadaDao->findLlamadasByUser($idUsuario);
   
   
?>   
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Ultimas llamadas</title>
      <style>
         thead {color:green;}
         tbody {color:blue;}
         tfoot {color:red;}
         table,th,td
         {
          border:1px solid black;
         }
      </style>
   </head>
   <body>
      <a href="menu.html"><img src="images/home.png" title="Ir al menu"></a>
      <h3>Llamadas por Dependencia</h3>
      <table border="1">
         <thead>
            <tr>
               <th>Extension</th>
               <th>Fecha</th>		
               <th>Dependencia</th>
             </tr>  
         </thead>
         <?php
      if ($llamadas)      
      {
         while ($row = mysqli_fetch_array($llamadas, MYSQLI_ASSOC)) {            
            echo "<tr>";
            echo "<td><center>" . $row['numero'] . "</center></td>";
            echo "<td>" . $row['fecha'] . "</td>";
            echo "<td><center>" . $row['dependencia'] . "</center></td>";
            echo "<tr>";
         }
      }
         ?> 
         
      </table>
   </body>
</html>
<?php
}
?>
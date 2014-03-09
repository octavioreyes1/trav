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
      <h3>Ultimas llamadas atendidas</h3>
      <table border="1">
         <thead>
            <tr>
               <th>Extension</th>
               <th>Fecha</th>		
               <th>Dependencia</th>
             </tr>  
         </thead>
         <?php
         
          foreach($llamadas as $fila){
            echo "<tr>";
            echo "<td><center>" . $fila['numero'] . "</center></td>";
            echo "<td>" . $fila['fecha'] . "</td>";
            echo "<td><center>" . $fila['dependencia'] . "</center></td>";
            echo "<tr>";
          }
            
 
         ?> 
         
      </table>
   </body>
</html>
<?php
}
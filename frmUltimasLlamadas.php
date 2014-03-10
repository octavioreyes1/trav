<?php
require_once 'classes/Connection.php';
require_once 'classes/LlamadasByUserDao.php';
require_once("classes/Sesion.php");
   
// Validamos que haya una sesion activa
$sesion = new sesion();
$idUsuario = $sesion->get("idUsuario");
if( $idUsuario == false )  
{
   header("Location: index.php");
} 
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
   </head>
   <body>
     <table>
         <tr>
            <td colspan="2"><b>Usuario:</b> <?php echo $sesion->get("username");?></td>         
         </tr>
         <tr>            
            <td><a href="menu.php"><img src="images/home.png" title="Ir al menu"></a></td>
            <td><a href="logout.php"><img src="images/exit.png" title="Cerrar Sesion"></a></td>
         </tr>
      </table>
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
          if (count($llamadas)>0){                     
             foreach($llamadas as $fila){
               echo "<tr>";
               echo "<td><center>" . $fila['numero'] . "</center></td>";
               echo "<td>" . $fila['fecha'] . "</td>";
               echo "<td><center>" . $fila['dependencia'] . "</center></td>";
               echo "</tr>";
           } 
          }
          else{
              echo "No se han registrado llamadas";
          }
         ?> 
         
      </table>
   </body>
</html>

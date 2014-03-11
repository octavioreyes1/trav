<?php
   
   require_once 'classes/Connection.php';
   require_once 'classes/LlamadasByUserDao.php';
   require_once("classes/Sesion.php");
   
   // Validamos que haya una sesion activa
   $sesion = new sesion();
   $usuario = $sesion->get("idUsuario");
   if( $usuario == false )  
   {
      header("Location: index.php");
   } 

   
   
   // Creamos conexion a base de datos
   $conn = new Connection();
   $llamadaDao = new LlamadasByUserDao($conn->getConexion());   
   $usuarios=$llamadaDao->findUserByLlamadas();  
   
  
 ?>   
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Llamadas atendidas por usuario</title>
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
      <table border="0">
         <tr>
            <td colspan="2"><b>Usuario:</b> <?php echo $sesion->get("username");?></td>         
         </tr>
         <tr>            
            <td><a href="menu.php"><img src="images/home.png" title="Ir al menu"></a></td>
            <td><a href="logout.php"><img src="images/exit.png" title="Cerrar Sesion"></a></td>
         </tr>
      </table>

      <h3>Llamadas atendidas por usuario</h3>
      <table border="1">
         <thead>
            <tr>
               <th>Nombre de usuario</th>
               <th>Nombre completo</th>		
               <th>Llamadas atendidas</th>
             </tr>  
         </thead>
         <?php
         
          if (count($usuarios)>0){                     
             foreach($usuarios as $usuario){
               echo "<tr>";
               echo "<td><center>" . $usuario['username'] . "</center></td>";
               echo "<td>" . $usuario['nombrecompleto'] . "</td>";
               echo "<td><center>" .$llamadaDao->findTotalLlamadasByUser($usuario['iduser']) . "</center></td>";
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


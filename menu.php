<?php
   // Validamos que haya una sesion activa
   require_once("classes/Sesion.php");
   $sesion = new sesion();
   $usuario = $sesion->get("idUsuario");
   if( $usuario == false )  
   {     
      header("Location: index.php");
   } 
?>   
<!DOCTYPE html>
<html>
   <head>
      <title>TODO supply a title</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width">
   </head>
   <body>      
      <table>
         <tr>
            <td colspan="2"><b>Usuario:</b> <?php echo $sesion->get("username");?></td>    
            <td><a href="logout.php"><img src="images/exit.png" title="Cerrar Sesion"></a></td>     
         </tr>       
      </table>
      <h3>Menu</h3>
      <ul>
         <li><a href="frmAddLlamada.php">Registrar Llamada</a></li>
         <li><a href="frmAddUsuario.php">Agregar Usuario</a></li>
         <li><a href="frmVerLlamadas.php">Llamadas Por Dependencia</a></li>
         <li><a href="frmVerUsuarios.php">Lista Usuarios</a></li>
         <li><a href="frmVerLlamadasPorDependenciaMes.php">Lamadas por Dependencia Mes</a></li>
         <li><a href="frmUltimasLlamadas.php">Ver ultimas llamadas</a></li>
      </ul>     
   </body>
</html>

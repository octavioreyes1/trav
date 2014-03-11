<?php
   // session_start();
   require_once 'classes/Connection.php';
   require_once 'classes/UsuarioDao.php';
   require_once("classes/Sesion.php");
   
   extract($_GET);
   extract($_POST);
   
   // Validamos que haya una sesion activa
   $sesion = new sesion();
   
   $usuario = $sesion->get("idUsuario");
   if( $usuario == false )  
   {
      header("Location: index.php");
   } 
   
   // Creamos conexion a base de datos
   $conn = new Connection();
   $usuariosDao = new UsuarioDao($conn->getConexion());
   //$objUsuario=$usuariosDao->findById($_SESSION['idUsuario']);
   $objUsuario=$usuariosDao->findById($_SESSION['idUsuario']);
   
 ?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Cambio de Contraseña</title>
   </head>
   <body>
     
     <form name="setupUser" id="setupUser" action="changePassword.php" method="post">
       <table border="0">
         <tr>
            <td colspan="2"><b>Usuario:</b> <?php echo $sesion->get("username");?></td>         
         </tr>
         <tr>            
            <td><a href="menu.php"><img src="images/home.png" title="Ir al menu"></a></td>
            <td><a href="logout.php"><img src="images/exit.png" title="Cerrar Sesion"></a></td>
         </tr>
      </table>
       <br>
       <table>
         <tr>
           <td>
             <?php
            if(isset($_GET['response'])) {
               if($_GET['response']==1){
                  echo "<font color=green>Password Cambiado Satisfactoriamente</font>";
               }else{
                 echo "<font color=red>Password actual incorrecto o no coincide el nuevo".
                 " favor de verificar</font>";
               }
            }
           ?>
           </td>
         </tr>
       </table>
       <table>
         <thead>
           <tr>
             <td colspan="2"><?php echo "Cambio de contraseña de usuario(a) : ".$objUsuario->getNombre()?></td>
           </tr>
         </thead>
         <tr>
           <td>Contrase&ntilde;a actual ?</td>
           <td><input type="text" name="actual" id="actual"/></td>
         </tr>
         <tr>
           <td>Nueva contrase&ntilde;a ?</td>
           <td><input type="text" name="nueva" id="nueva"/></td>
         </tr>
         <tr>
           <td>Repita nueva contrase&ntilde;a </td>
           <td><input type="text" name="repetir" id="repetir"/></td>
         </tr>
       </table>
       <br>
       <table border='0' align='center'>
         <tr>
           <td>
             <input type="submit" name="cambiar" id="cambiar" value="Cambiar">
           </td>
         </tr>
       </table>
       
       <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $objUsuario->getId()?>"/>
              
     </form>
     
   </body>
</html>
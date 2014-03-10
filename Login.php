<?php
session_start();
?>
<?php
   require_once 'classes/Connection.php';
   require_once 'classes/LoginDao.php';
   require_once("classes/Sesion.php");    
   require_once("classes/UsuarioDao.php");    
   
   EXTRACT($_POST);
    // Creamos conexion a base de datos
   $conn = new Connection();
   $loginDao = new LoginDao($conn->getConexion());   
   
    $id=$loginDao->findLogin($txtUsername, $txtPassword);
    
    if ($id != null) {
       
        $usuarioDao = new UsuarioDao($conn->getConexion());
        $oUsuario = $usuarioDao->findById($id);
       
        $sesion = new sesion();
        $sesion->set("idUsuario",$id);
        $sesion->set("username",$oUsuario->getUsername());
        $sesion->set("idTipoUsuario", $oUsuario->getTipoUsuario()->getId());
        //$_SESSION["idUsuario"] = $id;        
        ?>             
        <script>
            setTimeout("document.location.href='menu.php';",0);	
        </script>
        <?php
    } else {
        ?>
        <img src="images/error.png" title="Ir al menu"><br/>
        Usuario y/o clave incorrecta<a href="index.php"> Reintentar</a> 
        <?php
    }
  ?>
    
    
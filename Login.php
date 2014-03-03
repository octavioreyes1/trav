<?php
   require_once 'classes/Connection.php';
   require_once 'classes/LoginDao.php';
   

   EXTRACT($_POST);
    // Creamos conexion a base de datos
   $conn = new Connection();
   $loginDao = new LoginDao($conn->getConexion());   
   
    $id=$loginDao->findLogin($txtUsername, $txtPassword);
    if ($id != null) {
        $_SESSION["idUsuario"] = $id;
        
        ?>             
        <script>
            setTimeout("document.location.href='frmVerLlamadas.php';",0);	
        </script>
        <?php
    } else {
        ?>
        Usuario y/o clave incorrecta<a href="frmLogin.php"> Reintentar</a> 
        <?php
    }
    
    
    
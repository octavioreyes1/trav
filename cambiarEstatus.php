<?php
   require_once 'classes/Connection.php';
   require_once 'classes/UsuarioDao.php';  
   EXTRACT($_GET);   
   // Creamos conexion a base de datos
   $conn = new Connection();
   $usuarioDao = new UsuarioDao($conn->getConexion());   
   $usuarioDao->changeStatus($estatus, $id);
   header('Location: frmVerUsuarios.php')
?>
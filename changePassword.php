<?php

require_once 'classes/Connection.php';
require_once 'classes/UsuarioDao.php';

extract($_GET);
extract($_POST);

// Creamos conexion a base de datos
$conn = new Connection();
$usuarioDao = new UsuarioDao($conn->getConexion());
//$objUsuario=$usuariosDao->findById($_SESSION['idUsuario']);

$objUsuario=$usuarioDao->findById($idUsuario);

$response=$usuarioDao->changePassword($objUsuario, $actual,$nueva, $repetir);

header('Location: frmPassword.php?response='.$response)

?>

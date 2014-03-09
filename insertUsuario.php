<?php
/**
 * insertUsuario.php
 * 
 * PHP version 5
 * 
 * @category BaseDatos
 * @package  CallCenter.Bd
 * @author   Ivan Tinajero <ivanetinajero@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://callcenter.sazacatecas.gob.mx
 */
   require_once 'classes/Connection.php';
   require_once 'classes/UsuarioDao.php';
   require_once 'classes/Usuario.php';
   require_once 'classes/TipoUsuario.php';      
   
   EXTRACT($_POST);
   $usuario = new Usuario(0);
   $usuario->setNombre($txtnombre);
   $usuario->setPaterno($txtpaterno);
   $usuario->setMaterno($txtmaterno);
   $usuario->setUsername($txtUsername);
   $usuario->setPassword($txtpassword);
   $usuario->setFechaAlta(date("Y-m-d"));
   $usuario->setEstatus('activo'); // Activo por default
   
   // Inyectamos dependencia de TipoUsuario
   $tipoUsuario=new TipoUsuario($txtTipoUsuario);
   $usuario->setTipoUsuario($tipoUsuario);
   
   // Creamos conexion a base de datos
   $conn = new Connection();
   $usuarioDao = new UsuarioDao($conn->getConexion());   
   $usuarioDao->insert($usuario);
   header('Location: frmVerUsuarios.php');
?>
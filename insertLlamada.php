<?php

/**
* insertLlamada
*  
* PHP version 5
*
* @category Bd
* @package  Call_Center.insertLlamada
* @author   Guillermo Rojo <guillermorojocruz@gmail.com>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://callcenter.sazacatecas.gob.mx
*/

require_once 'classes/Connection.php';
require_once 'classes/Llamada.php';
require_once 'classes/LlamadaDao.php';
require_once 'classes/ExtensionDao.php';
require_once 'classes/Sesion.php';
   
// Validamos que haya una sesion activa
$sesion = new sesion();
$IdUsuario = $sesion->get("idUsuario");
if( $usuario == false )  
{
   header("Location: index.php");
} 


EXTRACT($_POST);
EXTRACT($_GET);

$mensaje="";

// Creamos conexion a base de datos

$conn = new Connection();
$objLlamada=new Llamada();
$objLlamada->setUsuario($IdUsuario);
$objLlamada->setFecha(date('Y-m-d'));

$objLlamadaDao=new LlamadaDao($conn->getConexion());

$response=$objLlamadaDao->insertLlamada($objLlamada, $txtExtension);
   

$respuesta="response=".$response."&extension=".$txtExtension;
header("Location: frmAddLlamada.php?".$respuesta);

?>

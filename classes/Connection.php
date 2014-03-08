<?php
/*  Clase mySQLDB para acceder a bases de datos mySQL. */
class Connection {

   const servidor = 'localhost'; /* Sustituir por valor adecuado */
   const usuario = 'root'; /* Sustituir por valor adecuado */
   const clave = ''; /* Sustituir por valor adecuado */
   const bd = 'callcenter'; /* Nombre de la base de datos */

   private $IdConexion;
  
   function __construct() {
      $this->IdConexion = mysqli_connect(self::servidor, self::usuario, self::clave) or die('Imposible conectar con base de datos.');
      mysqli_select_db($this->IdConexion, self::bd);
   }

   function __destruct() {
      mysqli_close($this->IdConexion);
   }   

   function getConexion() {
      return $this->IdConexion;
   }

}

?>
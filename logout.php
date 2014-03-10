<?php
   require_once("classes/Sesion.php");
   $sesion = new sesion();
   $usuario = $sesion->get("idUsuario");
   if( $usuario == false )  {
      header("Location: index.php");
   }  else  {
      $usuario = $sesion->get("idUsuario");
      $sesion->termina_sesion();
      header("location: index.php");
   }
?>
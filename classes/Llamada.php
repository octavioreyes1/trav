<?php
/**
 * Description of Llamada
 *
 * @author itinajero
 */
class Llamada {
   private $id;
   private $fecha;
   private $usuario;
   private $extension;
   
   function __construct() {
      
   }

   public function getId() {
      return $this->id;
   }

   public function getFecha() {
      return $this->fecha;
   }

   public function getUsuario() {
      return $this->usuario;
   }

   public function getExtension() {
      return $this->extension;
   }

   public function setId($id) {
      $this->id = $id;
   }

   public function setFecha($fecha) {
      $this->fecha = $fecha;
   }

   public function setUsuario($usuario) {
      $this->usuario = $usuario;
   }

   public function setExtension($extension) {
      $this->extension = $extension;
   }


}

<?php
/**
 * Description of TipoUsuario
 *
 * @author itinajero
 */
class TipoUsuario {
   private  $id;
   private  $descripcion;
   
   function __construct($id) {
      $this->id = $id;      
   }
   
   public function getId() {
      return $this->id;
   }

   public function getDescripcion() {
      return $this->descripcion;
   }

   public function setId($id) {
      $this->id = $id;
   }

   public function setDescripcion($descripcion) {
      $this->descripcion = $descripcion;
   }


}

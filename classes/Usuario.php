<?php
/**
 * Description of Usuario
 *
 * @author itinajero
 */
class Usuario {
   private  $id;
   private  $nombre;
   private  $paterno;
   private  $materno;
   private  $username;
   private  $password;
   private  $fechaAlta;
   private  $estatus;
   // Dependencia de TipoUsuario
   private  $TipoUsuario;
   
   function __construct($id) {
      $this->id = $id;
   }
   
   public function getId() {
      return $this->id;
   }

   public function getNombre() {
      return $this->nombre;
   }

   public function getPaterno() {
      return $this->paterno;
   }

   public function getMaterno() {
      return $this->materno;
   }

   public function getUsername() {
      return $this->username;
   }

   public function getPassword() {
      return $this->password;
   }

   public function getFechaAlta() {
      return $this->fechaAlta;
   }

   public function getEstatus() {
      return $this->estatus;
   }

   public function getTipoUsuario() {
      return $this->TipoUsuario;
   }

   public function setId($id) {
      $this->id = $id;
   }

   public function setNombre($nombre) {
      $this->nombre = $nombre;
   }

   public function setPaterno($paterno) {
      $this->paterno = $paterno;
   }

   public function setMaterno($materno) {
      $this->materno = $materno;
   }

   public function setUsername($username) {
      $this->username = $username;
   }

   public function setPassword($password) {
      $this->password = $password;
   }

   public function setFechaAlta($fechaAlta) {
      $this->fechaAlta = $fechaAlta;
   }

   public function setEstatus($estatus) {
      $this->estatus = $estatus;
   }

   public function setTipoUsuario($TipoUsuario) {
      $this->TipoUsuario = $TipoUsuario;
   }
         
}

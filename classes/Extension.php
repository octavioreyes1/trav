<?php

class Extension {
  
  private $id;
  private $numero;
  private $apellido;
  private $idDependencia;
  
  
  function __construct() {
      
  }
  
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getNumero() {
    return $this->numero;
  }

  public function setNumero($numero) {
    $this->numero = $numero;
  }

  public function getApellido() {
    return $this->apellido;
  }

  public function setApellido($apellido) {
    $this->apellido = $apellido;
  }

  public function getIdDependencia() {
    return $this->idDependencia;
  }

  public function setIdDependencia($idDependencia) {
    $this->idDependencia = $idDependencia;
  }


}

?>

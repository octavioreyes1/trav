<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LlamadasDependenciaMes
 *
 * @author rojo
 */
class LlamadasDependenciaMes {
  
  //put your code here
  private $idDependencia;
  private $dependencia;
  private $ene;
  private $feb;
  private $mar;
  private $abr;
  private $may;
  private $jun;
  private $jul;
  private $ago;
  private $sep;
  private $oct;
  private $nov;
  private $dic;
  private $totalDependencia;
  
  
  function __construct() {
      
  }
   
  public function getIdDependencia() {
    return $this->idDependencia;
  }

  public function setIdDependencia($idDependencia) {
    $this->idDependencia = $idDependencia;
  }

  public function getDependencia() {
    return $this->dependencia;
  }

  public function setDependencia($dependencia) {
    $this->dependencia = $dependencia;
  }

  public function getEne() {
    return $this->ene;
  }

  public function setEne($ene) {
    $this->ene = $ene;
  }

  public function getFeb() {
    return $this->feb;
  }

  public function setFeb($feb) {
    $this->feb = $feb;
  }

  public function getMar() {
    return $this->mar;
  }

  public function setMar($mar) {
    $this->mar = $mar;
  }

  public function getAbr() {
    return $this->abr;
  }

  public function setAbr($abr) {
    $this->abr = $abr;
  }

  public function getMay() {
    return $this->may;
  }

  public function setMay($may) {
    $this->may = $may;
  }

  public function getJun() {
    return $this->jun;
  }

  public function setJun($jun) {
    $this->jun = $jun;
  }

  public function getJul() {
    return $this->jul;
  }

  public function setJul($jul) {
    $this->jul = $jul;
  }

  public function getAgo() {
    return $this->ago;
  }

  public function setAgo($ago) {
    $this->ago = $ago;
  }

  public function getSep() {
    return $this->sep;
  }

  public function setSep($sep) {
    $this->sep = $sep;
  }

  public function getOct() {
    return $this->oct;
  }

  public function setOct($oct) {
    $this->oct = $oct;
  }

  public function getNov() {
    return $this->nov;
  }

  public function setNov($nov) {
    $this->nov = $nov;
  }

  public function getDic() {
    return $this->dic;
  }

  public function setDic($dic) {
    $this->dic = $dic;
  }

  public function getTotalDependencia() {
    return $this->totalDependencia;
  }

  public function setTotalDependencia($totalDependencia) {
    $this->totalDependencia = $totalDependencia;
  }

 
}

?>

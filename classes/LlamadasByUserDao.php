<?php
/**
 * Description of LlamadaDao
 *
 * @author octreyes
 */
require_once 'classes/Usuario.php';

class LlamadasByUserDao {

   private $connDb;

   function __construct($connDb) {
      $this->connDb = $connDb;
   }

function findLlamadasByUser($idUsuario) {                 
      $sql="select Extensiones.numero as numero, Llamadas.fecha fecha, Dependencias.nombre dependencia from Llamadas inner join Extensiones on Llamadas.idExtension=Extensiones.id                 inner join Dependencias on Dependencias.id=Extensiones.idDependencia where Llamadas.idUsuario=$idUsuario limit 0, 10";                 
      $result = mysqli_query($this->connDb, $sql);      
      if ($result){
      $resultado = array();
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          $resultado[] = array ( 'numero' => $row['numero'], 'fecha' => $row['fecha'], 'dependencia' => $row['dependencia']);
       }      
      }
      if (false===$result) { $resultado="Fallo"; }          
      return $resultado;
   }
   
// Buscar los usuarios que atienden llamadas
function findUserByLlamadas() {                 
      $sql="select usuarios.id as iduser, usuarios.username, concat(usuarios.nombre,' ',usuarios.paterno,' ', usuarios.materno) as nombrecompleto from usuarios where usuarios.idTipoUsuario=2";                 
      $result = mysqli_query($this->connDb, $sql);      
      if ($result){
      $resultado = array();
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          $resultado[] = array ( 'iduser' => $row['iduser'],'username' => $row['username'] ,'nombrecompleto' => $row['nombrecompleto']);
       }      
      }
      if (false===$result) { $resultado="Fallo la consulta"; }          
      return $resultado;
   }
   
   
   
// Buscar el total de llamadas atendidas por usuario   
function findTotalLlamadasByUser($idUsuario) {                 
      $sql="select count(llamadas.idUsuario) as total from llamadas where llamadas.idUsuario=$idUsuario";                 
      $result = mysqli_query($this->connDb, $sql);      
      if ($result){
      $resultado = array();
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          $resultado=$row['total'];
       }      
      }
      if (false===$result) { $resultado="Fallo la consulta"; }          
      return $resultado;
   }
   
   
   
   
}


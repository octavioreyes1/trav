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
      $sql="select Extensiones.numero as numero, Llamadas.fecha fecha, Dependencias.nombre dependencia from Llamadas inner join Extensiones on Llamadas.idExtension=Extensiones.id
                 inner join Dependencias on Dependencias.id=extensiones.idDependencia where Llamadas.idUsuario=$idUsuario limit 0, 10";                 
      $result = mysqli_query($this->connDb, $sql);                    
      $resultado = array();
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
       {
              $resultado[] = array ( 'numero' => $row['numero'],
                    'fecha' => $row['fecha'],
                    'dependencia' => $row['dependencia']);
}      
      return $resultado;
   }
   
  
   
   
}


<?php
/**
 * Description of LlamadaDao
 *
 * @author itinajero
 */
class LlamadaDao {
   private $connDb;
   
   function __construct($connDb) {
      $this->connDb = $connDb;
   }

   function getLlamadasPorDependencia(){
      $sql="select Dependencias.id,Dependencias.nombre,count(Dependencias.id) as NoLlamadas from Llamadas  ".
           " inner join Extensiones on Extensiones.id=Llamadas.idExtension ".
           " inner join Dependencias on Dependencias.id=Extensiones.idDependencia".
           " group by Dependencias.id".
           " order by count(Dependencias.id) desc";
      
      $llamadas = mysql_query($sql,$this->connDb);  
      return $llamadas;
   }
}

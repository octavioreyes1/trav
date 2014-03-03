<?php
/**
 * Description of UsuarioDao
 *
 * @author itinajero
 */
require_once 'Usuario.php';
require_once 'TipoUsuario.php';
class UsuarioDao {

   private $connDb;

   function __construct($connDb) {
      $this->connDb = $connDb;
   }

   function findById($idPropiedad) {
      
   }

   function update($propiedad) {
      
   }

   function insert($usuario) {    
      $sql="INSERT INTO Usuarios values (0,"
      ."'".$usuario->getNombre()."'," 
      ."'".$usuario->getPaterno()."'," 
      ."'".$usuario->getMaterno()."',"  
      ."'".$usuario->getUsername()."'," 
      ."md5('".$usuario->getPassword()."'),"
      ."'".$usuario->getFechaAlta()."',"
      ."'".$usuario->getEstatus()."',"
      ."'".$usuario->getTipoUsuario()->getId()."')";      
   
      $response = mysql_query($sql,$this->connDb);                         
      return $response;      
   }
   
   function findAll() {
      $usuarios = array();
      $n=0;
      $sql="select u.id,u.nombre,u.paterno,u.materno,u.username,u.fechaAlta,u.estatus,u.idTipoUsuario,tu.descripcion from Usuarios u".
           " inner join TipoUsuarios tu on tu.id=u.idTipoUsuario".
           " order by u.id";
      
      $usuariosRs = mysql_query($sql,$this->connDb);  
      while ($row = mysql_fetch_array($usuariosRs)) {
         $oUsuario = new Usuario(0);
         $oUsuario->setId($row['id']);
         $oUsuario->setNombre($row['nombre']);
         $oUsuario->setPaterno($row['paterno']);
         $oUsuario->setMaterno($row['materno']);
         $oUsuario->setUsername($row['username']);
         $oUsuario->setFechaAlta($row['fechaAlta']);
         $oUsuario->setEstatus($row['estatus']);
         
         // Creamos el objeto de tipo TipoUsuario
         $oTipoUsuario = new TipoUsuario($row['idTipoUsuario']);
         $oTipoUsuario->setDescripcion($row['descripcion']);
         
         // Inyectamos la dependencia de TipoUsuario
         $oUsuario->setTipoUsuario($oTipoUsuario);
         $usuarios[$n]=$oUsuario;
         $n++;  
      }
      return $usuarios;
   }

   function delete($propiedad) {
      
   }
   
   function changeStatus($estatus,$id) {
      $sql="update Usuarios set estatus='".$estatus."' where id=".$id;      
      $response = mysql_query($sql,$this->connDb);  
   }

   function findByQuery($where) {
      
   }

}

?>

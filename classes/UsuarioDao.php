<?php
/**
 * UsuarioDao.php
 * 
 * PHP version 5
 * 
 * @category CallCenter.DAO
 * @package  CallCenter.Bd
 * @author   Ivan Tinajero <ivanetinajero@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://callcenter.sazacatecas.gob.mx
 */
require_once 'Usuario.php';
require_once 'TipoUsuario.php';
/**
 * PHP version 5
 * 
 * @category Bd
 * @package  CallCenter.DAO
 * @author   Ivan Tinajero <ivanetinajero@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://callcenter.sazacatecas.gob.mx
 */
class UsuarioDao
{

    private $_connDb;
    /**
     * Constructor de la clase
     * 
     * @param connDb $connDb conexion a la base de datos abierta
     */
    function __construct($connDb) 
    {
        $this->_connDb = $connDb;
    }       
    /**
     * Metodo para insertar un usuario en la base de datos
     * 
     * @param usuario $usuario Objeto usuario
     * 
     * @return type
     */
    function insert($usuario) 
    {    
        $sql="INSERT INTO Usuarios values (".$usuario->getId().","
        ."'".$usuario->getNombre()."'," 
        ."'".$usuario->getPaterno()."'," 
        ."'".$usuario->getMaterno()."',"  
        ."'".$usuario->getUsername()."'," 
        ."md5('".$usuario->getPassword()."'),"
        ."'".$usuario->getFechaAlta()."',"
        ."'".$usuario->getEstatus()."',"
        ."'".$usuario->getTipoUsuario()->getId()."')";      
   
        $response = mysqli_query($this->_connDb, $sql);                         
        return $response;      
    }
    /**
     * Metodo que regresa un arreglo de los usuarios
     * 
     * @return \Usuario
     */
    function findAll() 
    {
        $usuarios = array();
        $n=0;
        $sql="select u.id,u.nombre,u.paterno,u.materno,u.username,u.fechaAlta,".
           " u.estatus,u.idTipoUsuario,tu.descripcion from Usuarios u".
           " inner join TipoUsuarios tu on tu.id=u.idTipoUsuario".
           " order by u.id";
      
        $usuariosRs = mysqli_query($this->_connDb, $sql);  
        while ($row = mysqli_fetch_array($usuariosRs)) {
            $oUsuario = new Usuario(0);
            $oUsuario->setId($row['id']);
            $oUsuario->setNombre($row['nombre']);
            $oUsuario->setPaterno($row['paterno']);
            $oUsuario->setMaterno($row['materno']);
            $oUsuario->setUsername($row['username']);
            $oUsuario->setFechaAlta($row['fechaAlta']);
            $oUsuario->setEstatus($row['estatus']);
            $oUsuario->setPassword($row['password']);

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
    /**
     * Metodo para cambiar el estatus de un usuario 
     * 
     * @param estatus $estatus nuevo Estatus
     * @param id      $id      Identificador del usuario
     * 
     * @return type Description
     */
    function changeStatus($estatus,$id) 
    {
        $sql="update Usuarios set estatus='".$estatus."' where id=".$id;      
        $response = mysqli_query($this->_connDb, $sql);  
        return $response;
    }
    /**
     * Metodo para buscar un usuario por su id
     * 
     * @param id $id id a buscar
     * 
     * @return \Usuario
     */
    function findById($id)
    {
        $sql="select u.id,u.nombre,u.paterno,u.materno,u.username,u.fechaAlta,".
           " u.estatus,u.idTipoUsuario,tu.descripcion from Usuarios u".
           " inner join TipoUsuarios tu on tu.id=u.idTipoUsuario".
           " where u.id=".$id;
      
        $usuariosRs = mysqli_query($this->_connDb, $sql);  
        $oUsuario = new Usuario(0);
        while ($row = mysqli_fetch_array($usuariosRs)) {            
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
        }
        return $oUsuario;
    }
    
    /**
     * Metodo para cambiar password de user
     * 
     * @param objUsuario       $objUsuario       objeto Usuario
     * @param actual           $actual           pass actual
     * @param nuevoPassword    $nuevoPassword    nuevo password
     * @param passwordRepetido $passwordRepetido confirmacion de password
     * 
     * @return \Usuario
     * @author The Rojo<guillermorojocruz@gmail.com>
     * 
     */
    function changePassword($objUsuario,$actual,$nuevoPassword,$passwordRepetido)
    {
      
        $sucess=0; // Fracaso...

        if(md5($actual)==$objUsuario->getPassword()) {
         
         
            if($nuevoPassword==$passwordRepetido) {

                $sql="update Usuarios set password=md5('".$nuevoPassword;
                $sql.="') where id=".$objUsuario->getId();  

                $response = mysqli_query($this->_connDb, $sql);  

                $sucess=$response; // Operacion Exitosa

            }
        }
      
        return $sucess;
    }

}

?>

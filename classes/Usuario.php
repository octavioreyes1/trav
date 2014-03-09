<?php
/**
 * Usuario.php
 * 
 * PHP version 5
 * 
 * @category CallCenter.DTO
 * @package  CallCenter.Bd
 * @author   Ivan Tinajero <ivanetinajero@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://callcenter.sazacatecas.gob.mx
 */

/**
 * PHP version 5
 * 
 * @category Bd
 * @package  CallCenter.DTO
 * @author   Ivan Tinajero <ivanetinajero@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://callcenter.sazacatecas.gob.mx
 */
class Usuario
{
    private  $_id;
    private  $_nombre;
    private  $_paterno;
    private  $_materno;
    private  $_username;
    private  $_password;
    private  $_fechaAlta;
    private  $_estatus;
    // Dependencia de TipoUsuario
    private  $_TipoUsuario;
    /**
     * Constructor de la clase
     * 
     * @param type $id: id
     */
    function __construct($id) 
    {
         $this->_id = $id;
    }
    /**
     * Metodo set para el atributo id
     * 
     * @return type
     */
    public function getId() 
    {
        return $this->_id;
    }
    /**
     * Metodo get para ek atributo nombre
     * 
     * @return type
     */
    public function getNombre() 
    {
        return $this->_nombre;
    } 
    /**
     * Metodo get para el atributo apellido paterno
     * 
     * @return type
     */
    public function getPaterno() 
    {
        return $this->_paterno;
    }
    /**
     * Metodo get para el atributo apellido materno
     * 
     * @return type
     */
    public function getMaterno()
    {
        return $this->_materno;
    }
    /**
     * Metodo get para el atributo username
     * 
     * @return type
     */
    public function getUsername() 
    {
        return $this->_username;
    }
    /**
     * Metodo get para el atributo password
     * 
     * @return type
     */
    public function getPassword() 
    {
        return $this->_password;
    }
    /**
     * Metodo get
     * 
     * @return type
     */
    public function getFechaAlta() 
    {
        return $this->_fechaAlta;
    }
    /**
     * Metodo get
     * 
     * @return type
     */
    public function getEstatus() 
    {
        return $this->_estatus;
    }
    /**
     * Metodo get
     * 
     * @return type
     */
    public function getTipoUsuario() 
    {
        return $this->_TipoUsuario;
    }
    /**
     * Metodo set
     * 
     * @param type $id: id
     * 
     * @return type Description
     */
    public function setId($id)         
    {
        $this->_id = $id;
    }
    /**
     * Metodo set
     * 
     * @param type $nombre: nombre
     * 
     * @return type Description
     */
    public function setNombre($nombre) 
    {
        $this->_nombre = $nombre;
    }
    /**
     * Metodo set
     * 
     * @param type $paterno: paterno
     * 
     * @return type Description
     */
    public function setPaterno($paterno) 
    {
        $this->_paterno = $paterno;
    }
    /**
     * Metodo set
     * 
     * @param type $materno: materno
     * 
     * @return type Description
     */
    public function setMaterno($materno) 
    {
        $this->_materno = $materno;
    }
    /**
     * Metodo set
     * 
     * @param type $username: username
     * 
     * @return type Description
     */
    public function setUsername($username) 
    {
        $this->_username = $username;
    }
    /**
     * Metodo set
     * 
     * @param type $password: password
     * 
     * @return type Description
     */
    public function setPassword($password) 
    {
        $this->_password = $password;
    }
    /**
     * Metodo set
     * 
     * @param type $fechaAlta: fechaAlta
     * 
     * @return type Description
     */
    public function setFechaAlta($fechaAlta) 
    {
        $this->_fechaAlta = $fechaAlta;
    }
    /**
     * Metodo set
     * 
     * @param type $estatus: estatus
     * 
     * @return type Description
     */
    public function setEstatus($estatus) 
    {
        $this->_estatus = $estatus;
    }
    /**
     * Metodo set
     * 
     * @param type $TipoUsuario: tipoUsuario
     * 
     * @return type Description
     */
    public function setTipoUsuario($TipoUsuario) 
    {
        $this->_TipoUsuario = $TipoUsuario;
    }
         
}

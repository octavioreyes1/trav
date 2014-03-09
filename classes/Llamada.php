<?php
/**
 * Llamada.php
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
class Llamada
{
    
    private $_id;
    private $_fecha;
    private $_usuario;
    private $_extension;
    
    /**
     * Constructor de la clase
     */
    function __construct() 
    {      
    }   
    
    /**
     * Metodo get para atributo id
     * 
     * @return type
    */    
    
    public function getId()
    {
        return $this->_id;
    } 
    /**
     * Metodo get para fecha
     * 
     * @return type
     */
    public function getFecha() 
    {
        return $this->_fecha;
    }
    /**
     * Metodo ger para usaurio
     * 
     * @return type
     */
    public function getUsuario() 
    {
        return $this->usuario;
    }
    /**
     * Metodo get para atributo extension
     * 
     * @return numero
     */
    public function getExtension() 
    {
        return $this->_extension;
    }
    /**
    * Metodo set para atributo id
    * 
    * @param type $id dd
     * 
     * @return type Description
    */
    public function setId($id) 
    {
        $this->_id = $id;
    }
    /**
     * Metodo ser para el atributo fecha
     * 
     * @param type $fecha: Fecha de registro de la llamada
     * 
     * @return type Description
     */
    public function setFecha($fecha) 
    {
        $this->_fecha = $fecha;
    }
    /**
     * Metodo set para atributo Usuario
     * 
     * @param type $usuario: Objeto de tipo usuario
     * 
     * @return type Description
     */
    public function setUsuario($usuario) 
    {
        $this->usuario = $usuario;
    }
    /**
     * Metodo set para atributo extension
     * 
     * @param type $extension:No de extension a guardar
     * 
     * @return type Description
     */
    public function setExtension($extension) 
    {
        $this->_extension = $extension;
    }


}

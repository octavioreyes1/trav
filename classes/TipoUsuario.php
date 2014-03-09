<?php
/**
 * TipoUsuario.php
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
class TipoUsuario
{
    private  $_id;
    private  $_descripcion;
    /**
     * Constructor de la clase
     * 
     * @param type $id: id de tipo del usuario
     * 
     * @return type Description
     */
    function __construct($id) 
    {
        $this->_id = $id;      
    }
    /**
     * Metodo get para rl atributo id
     * 
     * @return type
     */
    public function getId() 
    {
        return $this->_id;
    }
    /**
     * Metodo get para la descripcion
     * 
     * @return type Description
     */
    public function getDescripcion() 
    {
        return $this->_descripcion;
    }
    /**
     * Metodo set para el ID
     * 
     * @param type $id: id tipo usuario
     * 
     * @return type Description
     */
    public function setId($id) 
    {
        $this->_id = $id;
    }
    /**
     * Metodo set para el atributo descripcion
     * 
     * @param type $descripcion: Descripcion del tipo de usuario
     * 
     * @return type Description
     */
    public function setDescripcion($descripcion) 
    {
        $this->_descripcion = $descripcion;
    }

}

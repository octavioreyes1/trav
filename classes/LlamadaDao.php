<?php
/**
 * LlamadaDao.php
 * 
 * PHP version 5
 * 
 * @category CallCenter.DAO
 * @package  CallCenter.Bd
 * @author   Ivan Tinajero <ivanetinajero@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://callcenter.sazacatecas.gob.mx
 */

/**
 * PHP version 5
 * 
 * @category Bd
 * @package  CallCenter.DAO
 * @author   Ivan Tinajero <ivanetinajero@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://callcenter.sazacatecas.gob.mx
 */
class LlamadaDao
{
    private $_connDb;
    /**
    * Constructor de la clase
    * 
    * @param type $connDb: Conexion abierta a la base de datos
    */
    function __construct($connDb) 
    {
        $this->_connDb = $connDb;
    }
    /**
     * Metodo qu regresa un arreglo de llamadas por dependencia
     * 
     * @return type
     */
    function getLlamadasPorDependencia()
    {
        $sql="select Dependencias.id,Dependencias.nombre,count(Dependencias.id) ". 
           " as NoLlamadas from Llamadas  ".
           " inner join Extensiones on Extensiones.id=Llamadas.idExtension ".
           " inner join Dependencias on Dependencias.id=Extensiones.idDependencia".
           " group by Dependencias.id".
           " order by count(Dependencias.id) desc";      
        $llamadas = mysqli_query($this->_connDb, $sql);
        return $llamadas;
    }
}

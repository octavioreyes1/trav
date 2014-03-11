<?php
/**
* ExtensionDao
*  
* PHP version 5
*
* @category ExtensionDao
* @package  Call_Center.Connection
* @author   Guillermo Rojo <guillermorojocruz@gmail.com>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://callcenter.sazacatecas.gob.mx
*/

require_once 'Llamada.php';
require_once 'LlamadaDao.php';

/**
* ExtensionDao
*  
* PHP version 5
*
* @category ExtensionDao
* @package  Call_Center.Connection
* @author   Guillermo Rojo <guillermorojocruz@gmail.com>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://callcenter.sazacatecas.gob.mx
*/



class ExtensionDao
{
   
    private $_connDb;
   
    /**
    * Constructor
    * 
    * @param conndb $connDb connDb
    * 
    * @return array
    */
    
    function __construct($connDb)
    {
        $this->_connDb = $connDb;
    }
   
    /**
    * existeExtension
    * 
    * @param extension $extension extension
    * 
    * @return type registro
    * 
    */
    
    function existeExtension($extension)
    {
     
        $sql="select id from Extensiones where numero=".$extension;
        //$sql.=mysql_real_escape_string($extension);
        
        $objLlamada=new Llamada();
     
        /*$result=mysqli_query($this->connDb,$sql);
          
        $row= mysqli_fetch_array($result);
        */
        
        $query = @mysqli_query($this->_connDb, $sql);
        $registro = mysqli_fetch_array($query); 
        $key = array_keys($registro);

        for($x = 0; $x < count($key); $x++){
            // Sanitizes keys so only alphavalues are allowed
            if(!is_int($key[$x])) {
                if(mysqli_num_rows($query) >= 1) {
                    $objLlamada->setExtension($registro[$key[$x]]);
                }
            }
        }

        return $objLlamada->getExtension();
     
    }
}

?>

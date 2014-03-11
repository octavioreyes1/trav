<?php

/**
 * Description of InsertLlamadaDaoTest
 *
 * @author rojo
 */
require_once 'classes/Connection.php';
require_once 'classes/LlamadaDao.php';
require_once 'classes/Llamada.php';

class InsertLlamadaDaoTest extends PHPUnit_Framework_TestCase {
  //put your code here
  
  private $pdo;

    public function setUp()
    {
        $this->pdo = new PDO($GLOBALS['db_dsn'], $GLOBALS['db_username'], $GLOBALS['db_password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function tearDown()
    {
    }
    
    public function testAddLlamadaDao()
    {
        $conn = new Connection();
        $objLlamadaDao = new LlamadaDao($conn->getConexion());
        
        $txtExtension=3056;
        $objLlamada=new Llamada();
        $objLlamada->setFecha("2014-03-08");
        $objLlamada->setUsuario(1);
        
        // Response debe regresar un 1, de que si inserto llamada
        
        $this->assertEquals(1, $objLlamadaDao->insertLlamada($objLlamada,$txtExtension));
        
    }
}

?>

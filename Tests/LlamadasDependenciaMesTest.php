<?php

/**
 * Description of LlamadasDependenciaMesTest
 *
 * @author rojo
 */

require_once 'classes/Connection.php';
require_once 'classes/LlamadaDao.php';
require_once 'classes/Llamada.php';

class LlamadasDependenciaMesTest extends PHPUnit_Framework_TestCase
{
  /**
    * @var PDO
    */
   private $pdo;

    public function setUp() {
        $this->pdo = new PDO($GLOBALS['db_dsn'], $GLOBALS['db_username'], $GLOBALS['db_password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
   
   
    public function tearDown() {
    }
   
    public function testGetLlamadasDependenciaMes() {  
      
      // Creamos una instancia de conexion a la BD
      $conn = new Connection();
      $llamadaDao = new LlamadaDao($conn->getConexion());   
      
      $objLlamada=new Llamada(0);
      $extension=3057;
      $objLlamada->setFecha("2014-03-08");
      $objLlamada->setUsuario(1);
      $llamadaDao->addLlamada($objLlamada,$extension);
      
      // Ahora el test me debe regresar un registro, ya que es de una dependencia
      
      $arrDependencias=$llamadaDao->getLlamadasPorDependenciaMes();
      
      // El assert es que me regrese un array   
      $this->assertGreaterThan(0, count($arrDependencias));
      
    }
}

?>

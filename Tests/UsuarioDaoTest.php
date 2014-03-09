<?php

require_once 'classes/Connection.php';
require_once 'classes/UsuarioDao.php';
require_once 'classes/Usuario.php';
require_once 'classes/TipoUsuario.php';

class UsuarioDaoTest extends PHPUnit_Framework_TestCase {

   /**
    * @var PDO
    */
   private $pdo;

   public function setUp() {
      $this->pdo = new PDO($GLOBALS['db_dsn'], $GLOBALS['db_username'], $GLOBALS['db_password']);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo->query("DROP TABLE IF EXISTS TipoUsuarios");
      $this->pdo->query("CREATE TABLE TipoUsuarios (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  descripcion varchar(80) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
");
      $this->pdo->query("INSERT INTO TipoUsuarios VALUES (1,'Administrador'),(2,'Telefonista')");
      $this->pdo->query("DROP TABLE IF EXISTS Usuarios");
      $this->pdo->query("CREATE TABLE Usuarios (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  nombre varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  paterno varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  materno varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  username varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  password varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  fechaAlta date DEFAULT NULL,
  estatus enum('activo','inactivo') COLLATE latin1_general_ci DEFAULT NULL,
  idTipoUsuario int(10) unsigned NOT NULL,
  PRIMARY KEY (id),
  KEY fk_Usuarios_TipoUsuarios1 (idTipoUsuario),
  CONSTRAINT fk_Usuarios_TipoUsuarios1 FOREIGN KEY (idTipoUsuario) REFERENCES TipoUsuarios (id) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
");     
   }

   public function tearDown() {
      $this->pdo->query("DROP TABLE Usuarios");
      $this->pdo->query("DROP TABLE TipoUsuarios");
   }

   public function testInsert() {      
      // Creamos el tipo de Usuario
      $oTypeUser = new TipoUsuario(2);
      // Creamos el usuario que vamos almacenar
      $oUser=new Usuario(0);      
      $oUser->setNombre('Ivan');
      $oUser->setPaterno('Tinajero');
      $oUser->setMaterno('Diaz');
      $oUser->setUsername('itinajero');
      $oUser->setPassword('mypass');
      $oUser->setFechaAlta('2014-03-04');
      $oUser->setEstatus('activo');
      $oUser->setTipoUsuario($oTypeUser);
            
      // Creamos una instancia de conexion a la BD
      $conn = new Connection();
      $usuarioDao = new usuarioDao($conn->getConexion());
      
      // Test insertar el usuario    
      $this->assertEquals(true, $usuarioDao->insert($oUser));
   }
   
   public function testChangeStatus() {      
      // Creamos el tipo de Usuario
      $oTypeUser = new TipoUsuario(2);
      
      // Creamos el usuario que vamos almacenar
      $oUser=new Usuario(2);      
      $oUser->setNombre('Maria');
      $oUser->setPaterno('Martinez');
      $oUser->setMaterno('Acosta');
      $oUser->setUsername('mmartinez');
      $oUser->setPassword('mypass');
      $oUser->setFechaAlta('2014-03-07');
      $oUser->setEstatus('activo');
      $oUser->setTipoUsuario($oTypeUser);
      
      // Creamos una instancia de conexion a la BD
      $conn = new Connection();
      $usuarioDao = new usuarioDao($conn->getConexion());      
      
      // Insertamos el usuario    
      $usuarioDao->insert($oUser);
      
      // Hacemos la prueba al metodo changeStatus
      $this->assertEquals(true,$usuarioDao->changeStatus('inactivo',$oUser->getId()));
      
      // Recuperamos el usuario despues de modificarlo
      $usuario=new Usuario(0); 
      $usuario=$usuarioDao->findById($oUser->getId());
      
      // El assert es que el estatus debera ser inactivo    
      $this->assertEquals('inactivo', $usuario->getEstatus());     
      
   }
   
}

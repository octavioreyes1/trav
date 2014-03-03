<?php

class LoginDaoTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var PDO
     */
    private $pdo;

    public function setUp()
    {
        $this->pdo = new PDO($GLOBALS['db_dsn'], $GLOBALS['db_username'], $GLOBALS['db_password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->query("CREATE TABLE hello (what VARCHAR(50) NOT NULL)");
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

    public function tearDown()
    {
        $this->pdo->query("DROP TABLE Usuarios");
    }


    public function testLoginDao()
    {
	$conn = new Connection();
	$loginDao = new LoginDao($conn->getConexion());   

        $this->assertEquals(10, $loginDao->findLogin('Octavio', md5('reyes'));
    }


}


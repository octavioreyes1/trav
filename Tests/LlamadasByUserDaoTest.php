<?php

   require_once 'classes/Connection.php';
   require_once 'classes/LlamadasByUserDao.php';
class LlamadasByUserDaoTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var PDO
     */
    private $pdo;

    public function setUp()
    {
        $this->pdo = new PDO($GLOBALS['db_dsn'], $GLOBALS['db_username'], $GLOBALS['db_password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// CREATE THE TABLE Dependencias
        $this->pdo->query("DROP TABLE IF EXISTS Dependencias");
        $this->pdo->query("CREATE TABLE Dependencias (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  nombre varchar(90) COLLATE latin1_general_ci DEFAULT NULL,
  estatus enum('activa','inactiva') COLLATE latin1_general_ci DEFAULT NULL,
  prefijo varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
");
        $this->pdo->query("INSERT INTO Dependencias (id, nombre, estatus, prefijo) VALUES 
  (11, 'COORDINACION GENERAL JURIDICA', 'activa', 'CGJ'),
  (12, 'COORDINACION DE SISTEMAS DE INFORMACION', 'activa', 'CSI'),
  (13, 'INSTITUTO DE LA DEFENSORIA PUBLICA', 'activa', 'IDP'),
  (18, 'INSTITUTO DE SELECCION Y CAPACITACION DEL ESTADO', 'activa', 'ISC'),
  (20, 'SECRETARIA DE FINANZAS', 'activa', 'SEFIN'),
  (21, 'CATASTRO Y REGISTRO PUBLICO', 'activa', 'CAT'),
  (22, 'SERVICIOS DE SALUD DE ZACATECAS', 'activa', 'SSZ'),
  (27, 'SECRETARIA DE DESARROLLO AGROPECUARIO', 'activa', 'SEDAGRO'),
  (31, 'INSTITUTO ESTATAL DE MIGRACION', 'activa', 'IEM'),
  (34, 'SECRETARIA GENERAL DE GOBIERNO', 'activa', 'SG'),
  (35, 'SUBSECRETARIA DE CONCERTACION Y ATENCION CIUDADANA', 'activa', 'SCYAC'),
  (36, 'SUBSECRETARIA DE DESARROLLO POLITICO', 'activa', 'SDP'),
  (37, 'DIRECCION DE TRABAJO Y PREVENCION SOCIAL', 'activa', 'DTPS'),
  (38, 'DIRECCION DE ASUNTOS RELIGIOSOS', 'activa', 'DAR'),
  (39, 'TRIBUNAL DE CONCILIACION Y ARBITRAJE', 'activa', 'TCA'),
  (40, 'JUNTA LOCAL DE CONCILIACION Y ARBITRAJE', 'activa', 'JLCYA'),
  (42, 'DIRECCION DE FONDOS FINANCIAMIENTO', 'activa', 'FF'),
  (43, 'CRECE', 'activa', 'CRECE'),
  (47, 'SECRETARIA DE EDUCACION Y CULTURA', 'activa', 'SEC'),
  (48, 'PROCURADURIA GENERAL DE JUSTICIA DEL ESTADO', 'activa', 'PGJE'),
  (51, 'SECRETARIA DE LAS MUJERES', 'activa', 'SM'),
  (52, 'SECRETARIA DE LA FUNCION PUBLICA', 'activa', 'SFP'),
  (53, 'SECRETARIA DEL AGUA Y MEDIO AMBIENTE', 'activa', 'SAMA'),
  (54, 'SECRETARIA DE ECONOMIA', 'activa', 'SE'),
  (55, 'SECRETARIA DE DESARROLLO SOCIAL', 'activa', 'SDS'),
  (56, 'SECRETARIA DE INFRAESTRUCTURA', 'activa', 'SI'),
  (57, 'UPLA', 'activa', 'UPLA'),
  (58, 'SECRETARIA DE ADMINISTRACION', 'activa', 'SAD'),
  (59, 'JEFATURA DE LA OFICINA DEL GOBERNADOR', 'activa', 'JOG'),
  (60, 'SUBSECRETARIA DE INFRAESTRUCTURA VIAL', 'activa', 'SIV'),
  (61, 'SNE', 'activa', 'SNE'),
  (62, 'ORT', 'activa', 'ORT');
");
        
// CREATE TABLE TipoUsuarios
        $this->pdo->query("DROP TABLE IF EXISTS TipoUsuarios");
        $this->pdo->query("CREATE TABLE TipoUsuarios (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  descripcion varchar(80) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
");
        $this->pdo->query("INSERT INTO TipoUsuarios VALUES (1,'Administrador'),(2,'Telefonista')");

// CREATE THE TABLE Usuarios
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
        $this->pdo->query("INSERT INTO Usuarios (id, nombre, paterno, materno, username, password, fechaAlta, estatus, idTipoUsuario) VALUES 
  (1, 'Chabela', 'Reyes', 'Escobedo', 'chabela', '765ba753b609d84b3813991fe23f81b3', '2014-03-02', 'activo', 2),
  (2, 'Octavio', 'Reyes', 'Pinedo', 'octavio', '765ba753b609d84b3813991fe23f81b3', '2014-03-03', 'activo', 1),
  (3, 'Juan', 'Perez', 'Perez', 'juan', '765ba753b609d84b3813991fe23f81b3', '2014-03-03', 'activo', 2),
  (4, 'Luis', 'Perez', 'Perez', 'luis', '765ba753b609d84b3813991fe23f81b3', '2014-03-06', 'activo', 2);
");      
        
        
// CREATE THE TABLE Extensiones        
        $this->pdo->query("DROP TABLE IF EXISTS Extensiones");
        $this->pdo->query("CREATE TABLE Extensiones (
  id int(11) NOT NULL AUTO_INCREMENT,
  numero int(11) DEFAULT NULL,
  nombre varchar(60) DEFAULT NULL,
  apellido varchar(45) DEFAULT NULL,
  idDependencia int(10) unsigned NOT NULL,
  PRIMARY KEY (id),
  KEY fk_Extensiones_Dependencias1 (idDependencia),
  CONSTRAINT fk_Extensiones_Dependencias1 FOREIGN KEY (idDependencia) REFERENCES Dependencias (id) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4096 DEFAULT CHARSET=latin1;
");
        $this->pdo->query("INSERT INTO Extensiones (id, numero, nombre, apellido, idDependencia) VALUES 
                          (1, 3057, 'JOSE LUIS', 'ESPANA TELLES', 27),
                          (2, 3056, 'LUIS CARLOS ', 'GOMEZ MIJANGOS', 27),
                          (27, 22512, 'CHEREZADA', 'FRIAS SANCHEZ', 20),
                          (87, 10211, 'Omar', 'de Lara', 34),
                          (92, 52125, 'Ana', 'Salinas', 22),
                          (95, 26113, 'FAX IDP', 'Recepcion', 13),
                          (98, 25245, 'Bernardo', 'Toribio del Muro', 11),
                          (322, 22800, 'OPERADORA', '', 21),
                          (351, 48112, 'Rocio del Carmen', 'Rosas Garcia', 18),
                          (354, 77182, 'Marlene', 'Narro Martinez', 12),
                          (602, 37110, 'Luis Ribogerto', 'Castaneda Espinoza', 31);
");

// CREATE THE TABLE Llamadas
        $this->pdo->query("DROP TABLE IF EXISTS Llamadas");
        $this->pdo->query("CREATE TABLE Llamadas (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  fecha datetime DEFAULT NULL,
  idUsuario int(10) unsigned NOT NULL,
  idExtension int(11) NOT NULL,
  PRIMARY KEY (id),
  KEY fk_Llamadas_Usuarios1 (idUsuario),
  KEY fk_Llamadas_Extensiones1 (idExtension),
  CONSTRAINT fk_Llamadas_Usuarios1 FOREIGN KEY (idUsuario) REFERENCES Usuarios (id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT fk_Llamadas_Extensiones1 FOREIGN KEY (idExtension) REFERENCES Extensiones (id) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26482 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
");
        $this->pdo->query("INSERT INTO Llamadas (id, fecha, idUsuario, idExtension) VALUES 
  (1, '2014-03-04', 1, 1),
  (2, '2014-03-04', 1, 2),
  (3, '2014-03-04', 1, 27),
  (4, '2014-03-04', 1, 87),
  (5, '2014-03-04', 1, 92),
  (6, '2014-03-04', 1, 95),
  (7, '2014-03-04', 1, 98),
  (8, '2014-03-04', 1, 322),
  (9, '2014-03-04', 1, 351),
  (10, '2014-03-04', 1, 354),
  (11, '2014-03-04', 1, 602),
  (12, '2014-03-04', 3, 1),
  (13, '2014-03-04', 3, 2),
  (14, '2014-03-04', 3, 27),
  (15, '2014-03-04', 3, 87),
  (16, '2014-03-04', 3, 92),
  (17, '2014-03-04', 3, 95),
  (18, '2014-03-04', 3, 98),
  (19, '2014-03-04', 3, 322),
  (20, '2014-03-04', 3, 351),
  (21, '2014-03-04', 3, 354),
  (22, '2014-03-04', 3, 602),
  (23, '2014-04-05', 1, 1),
  (24, '2014-04-05', 1, 2),
  (25, '2014-04-05', 1, 27),
  (26, '2014-04-05', 1, 87),
  (27, '2014-04-05', 1, 92),
  (28, '2014-04-05', 1, 95),
  (29, '2014-04-05', 1, 98),
  (30, '2014-04-05', 1, 322),
  (31, '2014-04-05', 1, 351),
  (32, '2014-04-05', 1, 354),
  (33, '2014-04-05', 1, 602),
  (34, '2014-04-05', 3, 1),
  (35, '2014-04-05', 3, 2),
  (36, '2014-04-05', 3, 27),
  (37, '2014-04-05', 3, 87),
  (38, '2014-04-05', 3, 92),
  (39, '2014-04-05', 3, 95),
  (40, '2014-04-05', 3, 98),
  (41, '2014-04-05', 3, 322),
  (42, '2014-04-05', 3, 351),
  (43, '2014-04-05', 3, 354),
  (44, '2014-04-05', 3, 602);
");

        
             
}

    public function tearDown()
    {
        //$this->pdo->query("DROP TABLE Extensiones");
        //$this->pdo->query("DROP TABLE Dependencias");
        //$this->pdo->query("DROP TABLE Llamadas");
        //$this->pdo->query("DROP TABLE Usuarios");
        //$this->pdo->query("DROP TABLE TipoUsuarios");
    }


    public function testLlamadasByUserDao()
    {
	$conn = new Connection();       
        
	$llamadasByUserDao = new LlamadasByUserDao($conn->getConexion());   
        $llamadas = $llamadasByUserDao->findLlamadasByUser(1);        
        $this->assertEquals(11, count($llamadas));
        
    }

 /* public function testLlamadasByUserDaoFakeId()
    {
	$conn = new Connection();
 	$llamadasByUserDao = new LlamadasByUserDao($conn->getConexion());   
        $llamadas=$llamadasByUserDao->findLlamadasByUser(234);
        $this->assertEquals(null, $llamadas);
    }
*/
    
    
}


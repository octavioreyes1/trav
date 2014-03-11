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
require_once 'LlamadasDependenciaMes.php';
require_once 'ExtensionDao.php';
require_once 'ExtensionDao.php';

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
    * @param connDb $connDb Conexion a bd
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
    
    /**
    * addLlamada
    * 
    * @param objLlamada   $objLlamada   objeto de tipo Llamada
    * @param txtExtension $txtExtension extension a registrar
    * 
    * @return int
    */
    
    function insertLlamada($objLlamada,$txtExtension)
    {
      
        $sql="insert into Llamadas values (0,now(),".$objLlamada->getUsuario().",".
          "(select id from Extensiones where numero=$txtExtension"."))";
        
        $response = mysqli_query($this->_connDb, $sql);
        
            
        return $response;
      
    }
    
    /**
    * getLlamadasPorDependenciaMes
    * 
    * @return array
    */

    function getLlamadasPorDependenciaMes()
    {

        $sql="select t1.id,t1.nombre as dependencia,
        max(t1.Enero) as ene,
        max(t1.Febrero) as feb,
        max(t1.Marzo) as mar,
        max(t1.Abril) as abr,
        max(t1.Mayo) as may,
        max(t1.Junio) as jun,
        max(t1.Julio) as jul,
        max(t1.Agosto) as ago,
        max(t1.Septiembre) as sep,
        max(t1.Octubre) as oct,
        max(t1.Noviembre) as nov,
        max(t1.Diciembre) as dic,

        (max(t1.Enero)+max(t1.Febrero)+max(t1.Marzo)
        + max(t1.Abril) +max(t1.Mayo)+ max(t1.Junio)
        +max(t1.Julio)+max(t1.Agosto)+max(t1.Septiembre)
        +max(t1.Octubre)+
        max(t1.Noviembre)+max(t1.Diciembre) )
        as total

        from

        (select Dependencias.id,Dependencias.nombre,
        if(month(Llamadas.fecha)=1,count(Dependencias.id),0) as Enero,
        if(month(Llamadas.fecha)=2,count(Dependencias.id),0) as Febrero,
        if(month(Llamadas.fecha)=3,count(Dependencias.id),0) as Marzo,
        if(month(Llamadas.fecha)=4,count(Dependencias.id),0) as Abril,
        if(month(Llamadas.fecha)=5,count(Dependencias.id),0) as Mayo,
        if(month(Llamadas.fecha)=6,count(Dependencias.id),0) as Junio,
        if(month(Llamadas.fecha)=7,count(Dependencias.id),0) as Julio,
        if(month(Llamadas.fecha)=8,count(Dependencias.id),0) as Agosto,
        if(month(Llamadas.fecha)=9,count(Dependencias.id),0) as Septiembre,
        if(month(Llamadas.fecha)=10,count(Dependencias.id),0) as Octubre,
        if(month(Llamadas.fecha)=11,count(Dependencias.id),0) as Noviembre,
        if(month(Llamadas.fecha)=12,count(Dependencias.id),0) as Diciembre

        from Llamadas  
        inner join Extensiones on Extensiones.id=Llamadas.idExtension
        inner join Dependencias on Dependencias.id=Extensiones.idDependencia
        group by month(Llamadas.fecha),Dependencias.id)t1
        group by t1.id
        order by t1.nombre";
        
        $arrDependencias=array();
        $n=0;
        
        $result = @mysqli_query($this->_connDb, $sql);
        
        //$registros = mysqli_fetch_array($query);
        // while ($row = $result->num); { 
        while ($row = mysqli_fetch_array($result)) { 
            
            $objLlamadasDependenciaMes=new LlamadasDependenciaMes(0);
            
             // $total+=$row['totalDependencia'];
            
            $objLlamadasDependenciaMes->setIdDependencia($row['id']);
            $objLlamadasDependenciaMes->setDependencia($row['dependencia']);
            $objLlamadasDependenciaMes->setEne($row['ene']);
            $objLlamadasDependenciaMes->setFeb($row['feb']);
            $objLlamadasDependenciaMes->setMar($row['mar']);
            $objLlamadasDependenciaMes->setAbr($row['abr']);
            $objLlamadasDependenciaMes->setMay($row['may']);
            $objLlamadasDependenciaMes->setJun($row['jun']);
            $objLlamadasDependenciaMes->setJul($row['jul']);
            $objLlamadasDependenciaMes->setAgo($row['ago']);
            $objLlamadasDependenciaMes->setSep($row['sep']);
            $objLlamadasDependenciaMes->setOct($row['oct']);
            $objLlamadasDependenciaMes->setNov($row['nov']);
            $objLlamadasDependenciaMes->setDic($row['dic']);
            $objLlamadasDependenciaMes->setTotalDependencia($row['total']);
            
            $arrDependencias[$n]=$objLlamadasDependenciaMes;
            
            $n++;
           
        }
        
        return $arrDependencias;


    }
}

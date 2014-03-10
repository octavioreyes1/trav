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

   require_once 'classes/Connection.php';
   require_once 'classes/LlamadaDao.php';
   require_once("classes/Sesion.php");
   
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
   
   // Validamos que haya una sesion activa
   
   $sesion = new sesion();
   $usuario = $sesion->get("idUsuario");
   if( $usuario == false )  
   {     
      header("Location: index.php");
   } 
   
   // Creamos conexion a base de datos
   $conn = new Connection();
   $llamadaDao = new LlamadaDao($conn->getConexion());   
   $arrDependencias=$llamadaDao->getLlamadasPorDependenciaMes();
?>   
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Llamadas por Dependencia y Mes</title>     
   </head>
   <body>
      <table>
         <tr>
            <td colspan="2"><b>Usuario:</b> <?php echo $sesion->get("username");?></td>         
         </tr>
         <tr>            
            <td><a href="menu.php"><img src="images/home.png" title="Ir al menu"></a></td>
            <td><a href="logout.php"><img src="images/exit.png" title="Cerrar Sesion"></a></td>
         </tr>
      </table>
      <h3>Llamadas por Dependencia y Mes</h3>
      <table border="1">
         <thead>
            <tr>
               <th>Id</th>
               <th>Dependencia</th>		
               <th>Total</th>		
               <th>Ene</th>		
               <th>Feb</th>		
               <th>Mar</th>		
               <th>Abr</th>		
               <th>May</th>		
               <th>Jun</th>		
               <th>Jul</th>		
               <th>Ago</th>		
               <th>Sep</th>		
               <th>Oct</th>		
               <th>Nov</th>		
               <th>Dic</th>		
             </tr>  
         </thead>
         <?php
$total=0;
$ene=0;
$feb=0;
$mar=0;
$abr=0;
$may=0;
$jun=0;
$jul=0;
$ago=0;
$sep=0;
$oct=0;
$nov=0;
$dic=0;

         
foreach($arrDependencias as $objDependencia){
    
    $total+=$objDependencia->getTotalDependencia();
    $ene+=$objDependencia->getEne();
    $feb+=$objDependencia->getFeb();
    $mar+=$objDependencia->getMar();
    $abr+=$objDependencia->getAbr();
    $may+=$objDependencia->getMay();
    $jun+=$objDependencia->getJun();
    $jul+=$objDependencia->getJul();
    $ago+=$objDependencia->getAgo();
    $sep+=$objDependencia->getSep();
    $oct+=$objDependencia->getOct();
    $nov+=$objDependencia->getNov();
    $dic+=$objDependencia->getDic();

             echo "<tr>";
                echo "<td><center>" . $objDependencia->getIdDependencia() . "</center></td>";
                echo "<td>" . $objDependencia->getDependencia() . "</td>";
                echo "<td><center>" . $objDependencia->getTotalDependencia() . "</center></td>";
                echo "<td><center>" . $objDependencia->getEne(). "</center></td>";
                echo "<td><center>" . $objDependencia->getFeb(). "</center></td>";
                echo "<td><center>" . $objDependencia->getMar(). "</center></td>";
                echo "<td><center>" . $objDependencia->getAbr(). "</center></td>";
                echo "<td><center>" . $objDependencia->getMay(). "</center></td>";
                echo "<td><center>" . $objDependencia->getJun(). "</center></td>";
                echo "<td><center>" . $objDependencia->getJul(). "</center></td>";
                echo "<td><center>" . $objDependencia->getAgo() . "</center></td>";
                echo "<td><center>" . $objDependencia->getSep(). "</center></td>";
                echo "<td><center>" . $objDependencia->getOct(). "</center></td>";
                echo "<td><center>" . $objDependencia->getNov(). "</center></td>";
                echo "<td><center>" . $objDependencia->getDic(). "</center></td>";
}
              echo "<tr>";
              echo "<td><center>" . $objDependencia->getIdDependencia() . "</center></td>";
              echo "<td>Subtotales</td>";
              echo "<td><center></center></td>";
              echo "<td><center>" . $ene . "</center></td>";
              echo "<td><center>" . $feb. "</center></td>";
              echo "<td><center>" . $mar. "</center></td>";
              echo "<td><center>" . $abr. "</center></td>";
              echo "<td><center>" . $may. "</center></td>";
              echo "<td><center>" . $jun. "</center></td>";
              echo "<td><center>" . $jul. "</center></td>";
              echo "<td><center>" . $ago. "</center></td>";
              echo "<td><center>" . $sep. "</center></td>";
              echo "<td><center>" . $oct . "</center></td>";
              echo "<td><center>" . $nov . "</center></td>";
              echo "<td><center>" . $dic. "</center></td>";
            echo "<tr>";
        

         ?> 
         <tfoot>
            <tr>
               <td colspan="2"><center>Total</center></td>
               <td colspan="13"><center><?php echo $total ?></center></td>
            </tr>   
         </tfoot>
         
      </table>
   </body>
</html>

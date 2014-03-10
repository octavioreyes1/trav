<?php
/**
 * frmVerLlamadas.php
 * 
 * PHP version 5
 * 
 * @category BaseDatos
 * @package  CallCenter.Bd
 * @author   Ivan Tinajero <ivanetinajero@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://callcenter.sazacatecas.gob.mx
 */
   require_once 'classes/Connection.php';
   require_once 'classes/LlamadaDao.php';
   require_once("classes/Sesion.php");
   
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
   $llamadas=$llamadaDao->getLlamadasPorDependencia();
?>   
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Llamadas por Dependencia</title>    
   </head>
   <body>
      <table border="0">
         <tr>
            <td colspan="2"><b>Usuario:</b> <?php echo $sesion->get("username");?></td>         
         </tr>
         <tr>            
            <td><a href="menu.php"><img src="images/home.png" title="Ir al menu"></a></td>
            <td><a href="logout.php"><img src="images/exit.png" title="Cerrar Sesion"></a></td>
         </tr>
      </table>
      <h3>Llamadas por Dependencia</h3>
      <table border="1">
         <thead>
            <tr>
               <th>Id</th>
               <th>Dependencia</th>		
               <th>No Llamadas</th>
             </tr>  
         </thead>
        <?php
        $total=0;
        while ($row = mysqli_fetch_array($llamadas)) 
        {
            $total += $row['NoLlamadas'];
            echo "<tr>";
            echo "<td><center>" . $row['id'] . "</center></td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td><center>" . $row['NoLlamadas'] . "</center></td>";
            echo "<tr>";
        }
         ?> 
         <tfoot>
            <tr>
               <td colspan="2"><center>Total</center></td>
               <td><center><?php echo $total ?></center></td>
            </tr>   
         </tfoot>
      </table>
   </body>
</html>

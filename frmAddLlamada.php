<?php
/**
* frmAddLlamada
*  
* PHP version 5
*
* @category FrmAddLlamada
* @package  Call_Center.frmAddLlamada
* @author   Guillermo Rojo <guillermorojocruz@gmail.com>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://callcenter.sazacatecas.gob.mx
*/

extract($_GET);
extract($_POST);

 
?>
<!DOCTYPE html>
<html>
   
    <head>
      <meta charset="UTF-8">
      <title>Registro de Llamadas</title>
    </head>
   
   <body>
      <a href="menu.html"><img src="images/home.png" title="Ir al menu"></a>
      <h3>Registro de Llamadas transferidas en el Call Center</h3>
      <h4>
<?php 
if(isset($_GET['response'])) {
    if($_GET['response']==1) {
        echo "<font color='green'>Se registro la llamada ".
        $_GET['extension']."</font>";
    }else{
        echo "<font color='red'>La extension ".
        $_GET['extension']." no se encontro en el directorio,".
        " favor de verificar.</font>";
    }
}
?>
      </h4>
      
      <form action="insertLlamada.php" method="post" name="frmAlta">
          <table>             
              <tr>            
                <td>Capture la extensi&oacute;n que transfirio <br/>
                  <input type="text" name="txtExtension" id="txtExtension" 
                         style="width:400px; height:80px; 
                         font-size: xx-large;color: blue"
                  />
                </td>
             </tr>   
             <tr>
                <td>
                  <input type="submit" value="Registrar"/>&nbsp;
                </td>
                <td>
                  <input type="reset" value="Limpiar"/> 
                </td>
             </tr>
          </table>
      </form>
      
   </body>
</html>
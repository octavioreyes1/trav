<?php
/**
 * frmVerUsuarios.php
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
   require_once 'classes/UsuarioDao.php';
   
   // Creamos conexion a base de datos
   $conn = new Connection();
   $usuariosDao = new UsuarioDao($conn->getConexion());   
   $usuarios=$usuariosDao->findAll();
?>   
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Listado de Usuarios</title>
      <style>
         thead {color:green;}
         tbody {color:blue;}
         tfoot {color:red;}
         table,th,td
         {
          border:1px solid black;
         }
      </style>
      <script>
         function cambiarEstatus(estatus,id){
            document.location.href="cambiarEstatus.php?estatus="+estatus+"&id="+id;
         }
      </script>
   </head>
   <body>
      <a href="menu.html"><img src="images/home.png" title="Ir al menu"></a>
      <h3>Listado de Usuarios</h3>
      <table border="1">
         <thead>
            <tr>
               <th>id</th>
               <th>Nombre</th>		
               <th>Paterno</th>
               <th>Materno</th>
               <th>Usuario</th>
               <th>Fecha Alta</th>
               <th>Estatus</th>
               <th>Tipo</th>
               <th>Acceso</th>
             </tr>  
         </thead>
         <?php
         $total=0;
         foreach($usuarios as $usuario) {
            $total++;
            echo "<tr>";
            echo "<td><center>" . $usuario->getId() . "</center></td>";
            echo "<td>" . $usuario->getNombre() . "</td>";                       
            echo "<td>" . $usuario->getPaterno() . "</td>";           
            echo "<td>" . $usuario->getMaterno() . "</td>";           
            echo "<td>" . $usuario->getUsername() . "</td>";           
            echo "<td>" . $usuario->getFechaAlta() . "</td>";           
            echo "<td>" . $usuario->getEstatus() . "</td>";           
            echo "<td>" . $usuario->getTipoUsuario()->getDescripcion() . "</td>";   
            
            // Mostramo icono de activar o desactivar
            if ($usuario->getEstatus()=="activo")
               echo "<td><center><a href='javascript:cambiarEstatus(2,".$usuario->getId().")' ><img src='images/lock.png' title='Bloquear el acceso al sistema'></a></center></td>";
            else
               echo "<td><center><a href='javascript:cambiarEstatus(1,".$usuario->getId().")' ><img src='images/unlock.png' title='Permitir el acceso al sistema'></a></center></td>";
            echo "<tr>";
         }
         ?> 
         <tfoot>
            <tr>
               <td colspan="8"><center>Total Usuarios</center></td>
               <td><center><?php echo $total ?></center></td>
            </tr>   
         </tfoot>
      </table>
   </body>
</html>

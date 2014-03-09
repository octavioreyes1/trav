<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Alta de usuarios</title>
      <script>
         function validar(){
            if (document.frmAlta.txtUsername.value==""){
               alert("El nombre de usuario es obligatorio.");return;
            }
            if (document.frmAlta.txtpassword.value==""){
               alert("El password es obligatorio");return;
            }                           
            if (confirm("¿Estan correctos los datos?"))
               document.frmAlta.submit();
         }
      </script>
   </head>
   <body>
      <a href="menu.html"><img src="images/home.png" title="Ir al menu"></a>
      <h3>Alta de Usuarios</h3>
      <form action="insertUsuario.php" method="post" name="frmAlta">
          <table>             
              <tr>            
                <td>Usuario.<br/><input type="text" name="txtUsername" /></td>
                <td>Clave.<br/><input type="password" name="txtpassword" /></td>    
                <td>Perfil.<br/>
                   <select name="txtTipoUsuario" style="width: 142px">
                      <option value="1">Administrador</option>
                      <option value="2">Telefonista</option>
                   </select>
                </td>     
             </tr>   
             <tr>            
                <td>Nombre.<br/><input type="text" name="txtnombre" /></td>
                <td>A Paterno.<br/><input type="text" name="txtpaterno" /></td>
                <td>A Materno.<br/><input type="text" name="txtmaterno"/></td>
             </tr>            
             <tr>
                <td><input type="button" onclick="validar()" value="Guardar"/>&nbsp;<input type="reset" value="Limpiar"/> </td>
             </tr>
          </table>
      </form>
   </body>
</html>

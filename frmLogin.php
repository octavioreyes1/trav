<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Login</title>
      <script>
         function validar(){
            if (document.frmLogin.txtUsername.value==""){
               alert("El nombre de usuario es obligatorio.");return;
            }
            if (document.frmLogin.txtpassword.value==""){
               alert("El password es obligatorio");return;
            }                                       
         }
      </script>
   </head>
   <body>
      <a href="menu.html"><img src="images/home.png" title="Ir al menu"></a>
      <h3>Entrar al Sistema de Llamadas</h3>
      <form action="Login.php" method="post" name="frmLogin">
          <table>             
              <tr>            
                <td>Usuario:</td><td><input type="text" name="txtUsername" /></td>
              </tr>
              <tr>
                <td>Clave:</td><td><input type="password" name="txtPassword" /></td>                    
              </tr>
             <tr>
                 <td><input type="submit" onclick="validar()" value="Entrar"/></td>
             </tr>
          </table>
      </form>
   </body>
</html>

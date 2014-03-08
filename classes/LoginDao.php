<?php

require_once 'classes/Usuario.php';

class LoginDao {

   private $connDb;

   function __construct($connDb) {
      $this->connDb = $connDb;
   }

function findLogin($usuario, $password) {           
      $id=null;
      $sql="select u.id"
         . " from Usuarios u where u.username='$usuario' and u.password = '".md5($password)."'";                 
      $result = mysqli_query($this->connDb, $sql);              
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
         $id = $row['id'];
      }  
      return $id;
   }
}
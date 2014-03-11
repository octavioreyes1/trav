<?php
class SeleniumInsertUserTest extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*firefox");
    $this->setBrowserUrl("http://www.tourzac.com/");
  }

  public function testInsertUser()
  {
    $this->open("/callCenter/index.php");
    $this->type("name=txtUsername", "octavio");
    $this->type("name=txtPassword", "perez");
    $this->click("css=input[type=\"submit\"]");
    $this->waitForPageToLoad("60000");
    $this->click("link=Agregar Usuario");
    $this->waitForPageToLoad("60000");
    $this->click("name=txtUsername");
    $this->type("name=txtUsername", "itinajero");
    $this->type("name=txtpassword", "masterkey");
    $this->select("name=txtTipoUsuario", "label=Telefonista");
    $this->type("name=txtnombre", "Ivan");
    $this->type("name=txtpaterno", "Tinajero");
    $this->type("name=txtmaterno", "Diaz");
    $this->click("css=input[type=\"button\"]");
    $this->assertTrue((bool)preg_match('/^¿Estan correctos los datos[\s\S]$/',$this->getConfirmation())); 
    $this->waitForPageToLoad("60000");
    $this->assertEquals("El usuario itinajero fue dado de alta", $this->getText("//h3[2]"));
  }
}
?>
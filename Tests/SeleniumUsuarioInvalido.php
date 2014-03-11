<?php
class SeleniumUsuarioInvalido extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*firefox");
    $this->setBrowserUrl("http://www.tourzac.com/");
  }

  public function testMyTestCase()
  {
    $this->open("/callCenter/");
    $this->type("name=txtUsername", "octavio");
    $this->type("name=txtPassword", "reyes");
    $this->click("css=input[type=\"submit\"]");
    $this->waitForPageToLoad("60000");
    $this->assertEquals("Usuario y/o clave incorrecta Reintentar", $this->getText("css=body"));
  }
}
?>
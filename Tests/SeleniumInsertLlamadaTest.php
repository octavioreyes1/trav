<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*firefox");
    //$this->setBrowserUrl("http://www.tourzac.com/callCenter/index.php");
    $this->setBrowserUrl("http://www.tourzac.com/");
  }

  public function testMyTestCase()
  {
    $this->open("/callCenter/index.php");
    $this->type("name=txtUsername", "chabela");
    $this->type("name=txtPassword", "perez");
    $this->click("css=input[type=\"submit\"]");
    $this->waitForPageToLoad("30000");
    $this->click("link=Registrar Llamada");
    $this->waitForPageToLoad("30000");
    $this->type("id=txtExtension", "3056");
    $this->click("css=input[type=\"submit\"]");
    $this->waitForPageToLoad("30000");
    $this->verifyText("css=font", "Se registro la llamada 3056");
    $this->click("css=img[title=\"Cerrar Sesion\"]");
    $this->waitForPageToLoad("30000");
  }
}
?>
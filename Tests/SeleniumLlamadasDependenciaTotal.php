<?php
class SeleniumLlamadasDependenciaTotal extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*firefox");
    $this->setBrowserUrl("http://www.tourzac.com/");
  }

  public function testMyTestCase()
  {
    $this->open("/callCenter/index.php");
    $this->type("name=txtUsername", "octavio");
    $this->type("name=txtPassword", "perez");
    $this->click("css=input[type=\"submit\"]");
    $this->waitForPageToLoad("30000");
    $this->click("link=Llamadas Por Dependencia");
    $this->waitForPageToLoad("30000");
    $this->assertEquals("Llamadas por Dependencia", $this->getText("css=h3"));
    $this->click("css=img[title=\"Cerrar Sesion\"]");
    $this->waitForPageToLoad("30000");
  }
}
?>
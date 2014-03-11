<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*firefox");
    $this->setBrowserUrl("http://www.tourzac.com/");
  }

  public function testMyTestCase()
  {
    $this->open("/callCenter/");
    $this->type("name=txtUsername", "chabela");
    $this->type("name=txtPassword", "perez");
    $this->click("css=input[type=\"submit\"]");
    $this->waitForPageToLoad("30000");
    $this->click("link=Lamadas por Dependencia Mes");
    $this->waitForPageToLoad("30000");
    $this->assertTrue($this->isElementPresent("//td[2]/center"));
    $this->click("css=img[title=\"Cerrar Sesion\"]");
    $this->waitForPageToLoad("30000");
  }
}
?>
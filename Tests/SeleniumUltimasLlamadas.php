<?php
class SeleniumUltimasLlamadas extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*firefox");
    $this->setBrowserUrl("http://www.tourzac.com/");
  }

  public function testMyTestCase()
  {
    $this->open("/callCenter/index.php");
    $this->type("name=txtUsername", "chabela");
    $this->type("name=txtPassword", "perez");
    $this->click("css=input[type=\"submit\"]");
    $this->waitForPageToLoad("30000");
    $this->click("link=Ver ultimas llamadas");
    $this->waitForPageToLoad("30000");
    $this->assertEquals("SECRETARIA DE DESARROLLO AGROPECUARIO", $this->getText("//tr[3]/td[3]/center"));
  }
}
?>
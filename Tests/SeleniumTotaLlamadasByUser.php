<?php
class SeleniumTotalLlamadasByUser extends PHPUnit_Extensions_SeleniumTestCase
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
    $this->type("name=txtPassword", "perez");
    $this->click("css=input[type=\"submit\"]");
    $this->waitForPageToLoad("30000");
    $this->click("link=Ver total de llamadas por usuario");
    $this->waitForPageToLoad("30000");
    $this->assertEquals("0", $this->getText("//tr[2]/td[3]/center"));
  }
}
?>
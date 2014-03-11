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
    $this->assertEquals("Menu", $this->getText("css=h3"));
  }
}
?>
<?php

require_once 'Testing/Selenium.php';

class Example extends PHPUnit_Framework_TestCase
{
  protected function setUp()
  {
    $this = new Testing_Selenium("*chrome", "http://www.tourzac.com/callCenter/index.php");
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
    try {
        $this->assertEquals("Se registro la llamada 3056", $this->getText("css=font"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    $this->click("css=img[title=\"Cerrar Sesion\"]");
    $this->waitForPageToLoad("30000");
  }
}
?>
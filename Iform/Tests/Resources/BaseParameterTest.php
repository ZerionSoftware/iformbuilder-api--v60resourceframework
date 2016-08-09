<?php  namespace Iform\Tests\Resources;

use Iform\Resources\Base\BaseParameter;

class BaseParameterTest extends \PHPUnit_Framework_TestCase {

    function testElementDoesNotIncludeLocalizationByDefault()
    {
        $params = BaseParameter::element();

        $this->assertNotContains('localizations', $params);
    }

    function testElementDoesIncludeLocalizationByRequest()
    {
        $params = BaseParameter::element(true);

        $this->assertContains('localizations', $params);
    }

    function testPageDoesNotIncludeLocalizationByDefault()
    {
        $params = BaseParameter::page();

        $this->assertNotContains('localizations', $params);
    }

    function testPageDoesIncludeLocalizationByRequest()
    {
        $params = BaseParameter::page(true);

        $this->assertContains('localizations', $params);
    }

    function testOptionDoesNotIncludeLocalizationByDefault()
    {
        $params = BaseParameter::option();

        $this->assertNotContains('localizations', $params);
    }

    function testOptionDoesIncludeLocalizationByRequest()
    {
        $params = BaseParameter::option(true);

        $this->assertContains('localizations', $params);
    }

}

<?php
use App\Request;
use \Mockery as m;

class AppRequestTest extends \PHPUnit_Framework_TestCase {

    private $app;

    public function setUp()
    {
        $mock = m::mock('\Slim\Slim');
        $this->app = new Request($mock);
    }

    public function testCleanseAngularVarsFromRequest()
    {
        $angular = array(
            'toJSON' => "",
            '$get' => "",
            '$save' => "",
            '$query' => "",
            '$remove' => "",
            '$delete' => "",
            '$update' => "",
            '$resolved' => "",
            '$promise' => "",
            'id' => 14,
            'name' => 'test'
        );

        $this->app->removeAngularVars($angular);
        $this->assertEquals($angular, ['id'=>14, 'name'=> 'test']);
    }

}

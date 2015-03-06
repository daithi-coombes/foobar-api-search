<?php
namespace FoobarSearch\Test;

class APITest extends \PHPUnit_Framework_TestCase
{

    function setUp(){

        $this->config = \FoobarSearch\Config::factory();
        $this->obj = \FoobarSearch\API::factory($this->config);
    }

    /**
     * @todo test exceptions
     */
    public function testFactory()
    {

        $actual = \FoobarSearch\API::factory($this->config);

        $this->assertInstanceOf('\FoobarSearch\API', $actual);
    }

    /**
     * Covered by SearchTest::testKeyword()
     */
    public function get(){}
}
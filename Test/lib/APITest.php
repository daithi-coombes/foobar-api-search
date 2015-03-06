<?php
namespace FoobarSearch\Test;

class APITest extends \PHPUnit_Framework_TestCase
{

    function setUp(){

        $config = \FoobarSearch\Config::factory();
        $this->obj = new \FoobarSearch\API($config);
    }

    public function testGet()
    {

        $keyword = "Foo Bar";

        $res = $this->obj->get(
            '/search/keywords/',
            $keyword
        );
    }
}
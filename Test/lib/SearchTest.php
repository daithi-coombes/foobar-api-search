<?php
namespace FoobarSearch\Test;

class SearchTest extends \PHPUnit_Framework_TestCase
{

    function setUp(){

        $this->obj = new \FoobarSearch\Search();
    }

    public function testKeyword()
    {

        $keyword = "Foo Bar";
 
        $res = $this->obj->keywords($keyword);
    }
}
<?php
namespace FoobarSearch\Test;

class SearchTest extends \PHPUnit_Framework_TestCase
{

    function setUp(){

        $this->config = \FoobarSearch\Config::factory();
        $this->obj = new \FoobarSearch\Search();
    }

    /**
     * @covers \FoobarSearch\API::get()
     */
    public function testKeyword()
    {

        $params = array(
        	"keyword"   => "Foo Bar",
            "page"      => 1
        );
 
        $res = $this->obj->keyword($params);

        $this->assertEquals($res->page, 1);
    }

    public function testThread()
    {

        $params = array(
            "id"    => '2057297211',
            "page"  => 1
        );

        $res = $this->obj->thread($params);

        $this->assertObjectHasAttribute('total', $res);
    }
}
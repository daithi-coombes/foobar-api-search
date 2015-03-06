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

        $this->assertObjectHasAttribute('numFound', $res->body->response);
    }
}
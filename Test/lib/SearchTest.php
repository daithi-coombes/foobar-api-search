<?php
namespace FoobarSearch\Test;

class SearchTest extends \PHPUnit_Framework_TestCase
{

    function setUp(){

        $this->obj = new \FoobarSearch\Search();
    }

    public function testKeyword()
    {

        $keywords = array(
        	"keyword" => "Foo Bar"
        );
 
        //POST: $endpoint/search/
        //GET: $endpoint/search/keywords/$query/$page
        $res = $this->obj->keywords($keywords);
    }
}
<?php
namespace FoobarSearch\Test;

class SearchTest extends \PHPUnit_Framework_TestCase
{

    function setUp(){

        $this->config = new \FoobarSearch\Config();
        $this->obj = new \FoobarSearch\Search();
    }

    public function testKeyword()
    {

        $keywords = array(
        	"keyword" => "Foo Bar"
        );
 
        //POST: $endpoint/search/
        //GET: $endpoint/search/keywords/$query/$page

        $res = \FoobarSearch\API::factory($this->config) 
            ->get(
                'search',
                array(
                    $keywords['keyword'],
                    1
                )
            );

        //$res = $this->obj->keywords($keywords);
    }
}
<?php
namespace FoobarSearch\Test;

class ViewTest extends \PHPUnit_Framework_TestCase
{

    function setUp(){

        $this->obj = new \FoobarSearch\View();
    }

    /**
     * Tests form is displayed
     * @covers \FoobarSearch\View::render()
     */
    public function testIndex()
    {

        $html = $this->obj->render();
    }

    public function testResults()
    {

        $mock_results = "";

        $html = $this->obj->render($mock_results);
    }
}
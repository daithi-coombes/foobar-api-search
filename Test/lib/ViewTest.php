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

        $expected = "
            <form>
                <input type=\"hidden\" name=\"module\" value=\"Search\">
                <input type=\"hidden\" name=\"action\" value=\"keyword\">
                <input type=\"text\" name=\"data[keyword]\" value=\"\">
                <input type=\"submit\" value=\"Search\">
            </form>
        ";
        $actual = $this->obj->render();

        $this->assertEquals($expected, $actual);
    }

    public function testSearch()
    {

        $mock_results = "";

        $html = $this->obj->render("search", $mock_results);
    }

    public function testThread()
    {
        
    }
}
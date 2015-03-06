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
                <input type=\"text\" name=\"data[keyword]\" value=\"\">
                <input type=\"submit\" value=\"Search\">
            </form>
        ";
        $actual = $this->obj->render();

        $this->assertEquals($expected, $actual);
    }

    public function testResults()
    {

        $mock_results = "";

        $html = $this->obj->render("search", $mock_results);
    }
}
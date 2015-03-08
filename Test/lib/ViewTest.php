<?php
namespace FoobarSearch\Test;

class ViewTest extends \PHPUnit_Framework_TestCase
{

    function setUp(){

        $this->obj = new \FoobarSearch\View();
    }

    /**
     * @todo finish this test.
     */
    public function testGetFooter()
    {

        //$actual = $this->obj->getFooter();
        //$expected = "";

        //$this->assertEquals($expected, $actual);
    }

    /**
     * @todo finish this test.
     */
    public function testGetHead()
    {

        $actual = $this->obj->getHead('Dummy test title');
        $expected = "";

        //$this->assertEquals($expected, $actual);
    }

    /**
     * @todo finish this test.
     */
    public function testGetHeader()
    {

        $actual = $this->obj->getHeader('Dummy test title', array(
            'link1' => 'http://example.com'
        ));
        $expected = "";

        //$this->assertEquals($expected, $actual);
    }

    /**
     * Tests form is displayed
     * @covers \FoobarSearch\View::render()
     */
    public function test_IndexIndex()
    {

        $route = (object) array(
            'module' => 'index',
            'action' => 'index'
        );

        $expected = "
            <form>
                <input type=\"hidden\" name=\"module\" value=\"Search\">
                <input type=\"hidden\" name=\"action\" value=\"keyword\">
                <input type=\"text\" name=\"data[keyword]\" value=\"\">
                <input type=\"submit\" value=\"Search\">
            </form>
        ";
        $actual = $this->obj->render($route);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @todo complete this test
     * @covers \FoobarSearch\View::setData()
     */
    public function test_SearchKeyword()
    {

        $route = (object) array(
            'module' => 'Search',
            'action' => 'Keyword'
        );
        $mock_data = array(
            'total'      => "2",
            'page_count' => '2',
            'results'    => array(
                array(
                    'id'       => "1",
                    'title'    => "Foo Bar title",
                    'forum'    => "Fo Bar forum",
                    'username' => "daithi"
                ),
                array(
                    'id'       => "2",
                    'title'    => "Biz Baz title",
                    'forum'    => "That other forum",
                    'username' => "coombesy"
                )
            ),
            'page' => "1"
        );

        $html = $this->obj
            ->setData($mock_data)
            ->render($route);
    }

    /**
     * @todo complete this test
     */
    public function testThread()
    {

        $route = (object) array(
            'module' => 'Search',
            'action' => 'Thread'
        );
        $mock_data = array(
            'title' => 'Foo Bar',
            'total' => '2',
            'results' => array()
        );

        $html = $this->obj
            ->setData($mock_data)
            ->render($route);
    }
}

<?php
/**
 * View class file
 *
 * @author David Coombes <webeire@gmail.com>
 */
namespace FoobarSearch;


/**
 * View class.
 *
 * Views for each of the modules are added as a method. Keep the method name
 * same as the class. ie Search class will require 'search' method.
 */
class View
{

    /** @var array An array of data from the controller::action() call */
    protected $data=array();

    /**
     * constructor
     */
    public function __construct()
    {
        ;
    }

    /**
     * Factory method
     *
     * @return \FoobarSearch\View
     */
    public static function factory()
    {

        return new View();
    }

    /**
     * Render the html for displaying
     *
     * @param string $route The route.
     * @param mixed $data Optional. Data to pass to the module's method.
     * @return string Returns the required html
     */
    public function render($route)
    {

        //get method name
        $action = ucfirst($route->action);
        $module = ucfirst($route->module);
        $method = "_{$route->module}{$route->action}";

        //call method
        if (method_exists($this, $method)) {
            return $this->{$method}();
        }
        else {
            throw new \Exception('No view method: {$method} for module: '.$module);
        }
    }

    /**
     * Set data returned from controller::action() call
     *
     * @param array $data An array of data to pass to ::$method()
     * @return \FoobarSearch\View Returns self for chaining
     */
    public function setData(array $data)
    {

        $this->data = $data;
        return $this;
    }

    /**
     * Default view
     *
     * @return string Returns the default search form
     */
    protected function _IndexIndex()
    {

        return "
            <form>
                <input type=\"hidden\" name=\"module\" value=\"Search\">
                <input type=\"hidden\" name=\"action\" value=\"keyword\">
                <input type=\"text\" name=\"data[keyword]\" value=\"\">
                <input type=\"submit\" value=\"Search\">
            </form>
        ";
    }

    /**
     * Search view.
     *
     * Displays the results of a search
     *
     * @return string Returns the search results html
     */
    protected function _SearchKeyword()
    {

        $html = "|<a href=\"".FOOBAR_BASE_URL."\">home</a>|
            <hr/>
            <h1>FoobarSearch Results</h1>
            <h3>Total {$this->data['total']}</h3>
            <ul>
        ";

        foreach ($this->data['results'] as $result) {

            $html .= "<li>
                <a href=\"".FOOBAR_BASE_URL."?module=Search&amp;action=thread&amp;data[id]={$result['id']}\">{$result['title']}</a>
            </li>";
        }

        return "{$html}
            </ul>";
    }

    /**
     * Thread view.
     *
     * Displays a thread for the search results
     *
     * @return string Returns the threads html
     */
    protected function _SearchThread()
    {

        //header
        $html = "|<a href=\"".FOOBAR_BASE_URL."\">home</a>|
            |<a href=\"javascript:history.back()\">back to results</a>|
            <hr/>
            <h1>FoobarSearch Thread</h1>
            <h2>{$this->data['title']}</h2>
            <h3>Total {$this->data['total']}</h3>
            <ul>
        ";

        //list
        foreach ($this->data['results'] as $result) {

            //decode BBCode
            $decoda = new \Decoda\Decoda($result['pagetext'], array(
                'xhtmlOutput' => true,
                'strictMode' => false,
                'escapeHtml' => true
            ));
            $decoda->defaults();    //enable all fitlers

            /**
             * @deprecated Use only some filters?
             */
            //$decoda->addFilter(new \Decoda\Filter\UrlFilter())
                //->addFilter(new \Decoda\Filter\EmailFilter());
                //->addFilter(new \Decoda\Filter\QuoteFilter());

            //build html
            $html .= "<li>
                <u><b>{$result['username']}</b></u>
                <p>".$decoda->parse()."</p>
            </li>";
        }

        return "{$html}
            </ul>";
    }
}

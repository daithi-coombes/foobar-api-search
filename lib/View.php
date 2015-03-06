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
    public static function factory(){

        return new View();
    }

    /**
     * Render the html for displaying
     * 
     * @param string $route Default index. The module to load from.
     * @param mixed $data Optional. Data to pass to the module's method.
     * @return string Returns the required html
     */
    public function render($module='index', $data=null)
    {

        if (method_exists($this, $module)) {
            return $this->$module($data);
        }
        else {
            throw new \Exception('No view method for module: '.$module);
        }
    }

    /**
     * Default view
     * 
     * @return string Returns the default search form
     */
    protected function index(){

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
     * @param array $data An array of search data.
     * @return string Returns the search results html
     */
    protected function search($data)
    {

        var_dump($data);
    }
}
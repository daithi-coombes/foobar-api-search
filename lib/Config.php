<?php
/**
 * Configuration Class for FoobarSearch.
 * 
 * @author David Coombes <webeire@gmail.com>
 */
namespace FoobarSearch;

use Symfony\Component\Yaml\Parser;


/**
 * Configuration class.
 * 
 * @package FoobarSearch
 */
class Config
{

    /** @var array An array of config paramaters */
    protected $params = array();

    /**
     * Constructor.
     * 
     * @param array $params An array of class properties
     */
    function __construct($params=array())
    {

        $this->params = $params;
    }

    /**
     * Factory method.
     * 
     * Loads config.yml from default location and returns new Config.
     * 
     * @return \FoobarSearch\Config
     */
    public static function factory()
    {

        $config_file = FOOBAR_DIR . '/config/config.yml';

        $yaml = new Parser();
        $value = $yaml->parse(file_get_contents($config_file));

        return new Config($value);
    }

    /**
     * Get a property.
     * 
     * Pass null to get all paramaters or param name.
     * 
     * @param string $property Default null.
     * @return mixed Returns property value or all properties in $params
     */
    public function get($property=null)
    {

        if (!$property) {
            return $this->params;
        }
        elseif (isset($this->params[$property])) {
            return $this->params[$property];
        }
        else{
            throw new Exception('Unkown config key: ' . $property);
        }
    }
}
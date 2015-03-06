<?php
namespace FoobarSearch;

use Symfony\Component\Yaml\Parser;

class Config
{

    /** @var array An array of config paramaters */
    protected $params = array();

    function __construct($params=array())
    {

        $this->params = $params;
    }

    public static function factory()
    {

        $config_file = FOOBAR_DIR . '/config/config.yml';

        $yaml = new Parser();
        $value = $yaml->parse(file_get_contents($config_file));

        return new Config($value);
    }

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
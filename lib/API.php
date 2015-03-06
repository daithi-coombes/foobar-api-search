<?php
/**
 * Makes api calls to an endpoint
 * 
 * @todo build class
 * @author David Coombes <webeire@gmail.com>
 */
namespace FoobarSearch;

class API
{

	/** @var \FoobarSearch\Config An instance of Config */
	protected $config;

    function __construct()
    {
        ;
    }

    public static function factory(Config $config)
    {

    	$obj = new API();
    	$obj->set('config', $config);

    	return $obj;
    }

    public function get()
    {
        ;
    }

    /**
     * Set a class property.
     * 
     * @param string $param The property name.
     * @param mixed $value The property value.
     */
    public function set($param, $value)
    {

    	$this->$param  = $value;
    }
}
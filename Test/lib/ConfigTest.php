<?php
namespace FoobarSearch\Test;

class ConfigTest extends \PHPUnit_Framework_TestCase{


	public function testFactory(){
		
		$obj = \FoobarSearch\Config::factory();

		$this->assertInstanceOf( 'FoobarSearch\Config', $obj );
	}


	public function testGet(){

		$params = \FoobarSearch\Config::factory()
			->get();

		$this->assertInternalType( 'array', $params );
	}
}
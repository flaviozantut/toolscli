<?php

class TestToolscliless extends PHPUnit_Framework_TestCase {

	/**
	 * Setup the test environment.
	 */
	public function setUp()
	{
		Bundle::start('toolscli');
		$this->TollscliLess = new TollscliLess();
	}

	/**
	 * Test exec method
	 *
	 * @return void
	 */
	public function testExec()
	{
     	
    	$this->assertTrue($this->TollscliLess->exec());
	}

	/**
	 * Test compile
	 * 
	 * @return void
	 */
	public function testCompile()
	{
		$this->assertTrue($this->TollscliLess->compile());
	}

}
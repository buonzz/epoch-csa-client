<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Client;
use Buonzz\Epoch\CustomerSearch\Actions\Retain;
use Buonzz\Epoch\CustomerSearch\Parameters\Password;

class RetainTest extends TestCase
{

/**
 *
 *  test if there is no parameter passed.
 *
 * @expectedException InvalidArgumentException
 */
  public function testblankparameter()
  {

    $o = new Retain();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($o, []);

  }

/**
 *
 *  test if passed with wrong Parameter (password).
 *
 * @expectedException InvalidArgumentException
 */
  public function testwrongparameter()
  {

  	// parameter
    $password = new Password("123");


    // action
    $action = new Retain();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($action, [$password]);

  }

}
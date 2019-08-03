<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Client;
use Buonzz\Epoch\CustomerSearch\Actions\Cancel;
use Buonzz\Epoch\CustomerSearch\Parameters\Password;

class CancelTest extends TestCase
{

/**
 *
 *  test if there is no parameter passed.
 *
 * @expectedException InvalidArgumentException
 */
  public function testblankparameter()
  {

    $o = new Cancel();

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
    $action = new Cancel();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($action, [$password]);

  }

}
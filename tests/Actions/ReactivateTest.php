<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Client;
use Buonzz\Epoch\CustomerSearch\Actions\Reactivate;
use Buonzz\Epoch\CustomerSearch\Parameters\Memberid;
use Buonzz\Epoch\CustomerSearch\Parameters\Password;

class ReactivateTest extends TestCase
{

/**
 *
 *  test if there is no parameter passed.
 *
 * @expectedException InvalidArgumentException
 */
  public function testblankparameter()
  {

    $o = new Reactivate();

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
    $action = new Reactivate();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($action, [$password]);

  }

  public function testcorrectparameter()
  {

    // parameters
    $memberid = new Memberid(13442);

    // action
    $action = new Reactivate();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($action, [$memberid]);

  }

}
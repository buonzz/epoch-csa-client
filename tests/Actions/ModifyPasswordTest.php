<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Client;
use Buonzz\Epoch\CustomerSearch\Actions\ModifyPassword;
use Buonzz\Epoch\CustomerSearch\Parameters\Password;
use Buonzz\Epoch\CustomerSearch\Parameters\Memberid;
use Buonzz\Epoch\CustomerSearch\Parameters\Username;

class ModifyPasswordTest extends TestCase
{

/**
 *
 *  test if there is no parameter passed.
 *
 * @expectedException InvalidArgumentException
 */
  public function testblankparameter()
  {

    $o = new ModifyPassword();

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
    $u = new Username("helllo123");


    // action
    $action = new ModifyPassword();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($action, [$u]);

  }

  public function testcorrectparameter()
  {

    // parameters
    $memberid = new Memberid(13442);
    $password = new Password("ynewpass"); 

    // action
    $action = new ModifyPassword();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($action, [$memberid, $password]);

  }

}
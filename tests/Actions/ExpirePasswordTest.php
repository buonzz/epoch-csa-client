<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Client;
use Buonzz\Epoch\CustomerSearch\Actions\ExpirePassword;
use Buonzz\Epoch\CustomerSearch\Parameters\Password;
use Buonzz\Epoch\CustomerSearch\Parameters\PasswordExpireDate;
use Buonzz\Epoch\CustomerSearch\Parameters\Memberid;

class ExpirePasswordTest extends TestCase
{

/**
 *
 *  test if there is no parameter passed.
 *
 * @expectedException InvalidArgumentException
 */
  public function testblankparameter()
  {

    $o = new ExpirePassword();

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
    $action = new ExpirePassword();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($action, [$password]);

  }

  public function testcorrectparameter()
  {

    // parameters
    $memberid = new Memberid(13442);
    $password_expire_date = new PasswordExpireDate(date("Y-m-d")); 

    // action
    $action = new ExpirePassword();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($action, [$memberid, $password_expire_date]);

  }

}
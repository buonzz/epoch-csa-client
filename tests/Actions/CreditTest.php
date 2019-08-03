<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Client;
use Buonzz\Epoch\CustomerSearch\Actions\Credit;
use Buonzz\Epoch\CustomerSearch\Parameters\Password;
use Buonzz\Epoch\CustomerSearch\Parameters\Transactionid;
use Buonzz\Epoch\CustomerSearch\Parameters\CreditCancelReason;

class CreditTest extends TestCase
{

/**
 *
 *  test if there is no parameter passed.
 *
 * @expectedException InvalidArgumentException
 */
  public function testblankparameter()
  {

    $o = new Credit();

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
    $action = new Credit();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($action, [$password]);

  }

  public function testcorrectparameter()
  {

    // parameters
    $transid = new Transactionid(13442);
    $reason = new CreditCancelReason(CreditCancelReason::BANK_CALL); // pass the reason

    // action
    $action = new Credit();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($action, [$transid, $reason]);

  }

}
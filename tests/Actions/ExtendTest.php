<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Client;
use Buonzz\Epoch\CustomerSearch\Actions\Extend;
use Buonzz\Epoch\CustomerSearch\Parameters\Memberid;
use Buonzz\Epoch\CustomerSearch\Parameters\NextBillDate;
use Buonzz\Epoch\CustomerSearch\Parameters\Password;

class ExtendTest extends TestCase
{

/**
 *
 *  test if there is no parameter passed.
 *
 * @expectedException InvalidArgumentException
 */
  public function testblankparameter()
  {

    $o = new Extend();

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
    $action = new Extend();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($action, [$password]);

  }

  public function testcorrectparameter()
  {

    // parameters
    $memberid = new Memberid(13442);
    $next_bill_date = new NextBillDate(date("Y-m-d")); 

    // action
    $action = new Extend();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($action, [$memberid, $next_bill_date]);

  }

}
<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Client;
use Buonzz\Epoch\CustomerSearch\Actions\Search;
use Buonzz\Epoch\CustomerSearch\Parameters\Password;
use Buonzz\Epoch\CustomerSearch\Parameters\Memberid;
use Buonzz\Epoch\CustomerSearch\Parameters\Email;
use Buonzz\Epoch\CustomerSearch\Parameters\Username;
use Buonzz\Epoch\CustomerSearch\Parameters\Cardnumber;

class SearchTest extends TestCase
{

/**
 *
 *  test if there is no parameter passed.
 *
 * @expectedException InvalidArgumentException
 */
  public function testblankparameter()
  {

    $search = new Search();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($search, []);

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
    $search = new Search();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($search, [$password]);

  }

/**
 *
 *  test if memberid is passed
 *
*/
  public function testmemberid()
  {

  	// parameter
    $memberid = new Memberid(123);


    // action
    $search = new Search();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($search, [$memberid]);

    $expected_value = 'https://epoch.com/services/customer_search/?api_action=search&auth_user=mahuser&auth_pass=mahpass&member_id=123';
    $this->assertTrue($output == $expected_value );

  }

/**
 *
 *  test if email is passed
 *
*/
  public function testemail()
  {

  	// parameter
    $email = new Email("hey@gmail.com");


    // action
    $search = new Search();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($search, [$email]);


    $expected_value = 'https://epoch.com/services/customer_search/?api_action=search&auth_user=mahuser&auth_pass=mahpass&email=hey%40gmail.com';

    $this->assertTrue($output == $expected_value );

  }

/**
 *
 *  test if username is passed
 *
*/
  public function testusername()
  {

  	// parameter
    $username = new Username("heytest");


    // action
    $search = new Search();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($search, [$username]);

    $expected_value = 'https://epoch.com/services/customer_search/?api_action=search&auth_user=mahuser&auth_pass=mahpass&username=heytest';
    $this->assertTrue($output == $expected_value );


  }

/**
 *
 *  test if cardnumber is passed
 *
*/
  public function testcardnumber()
  {

  	// parameter
    $cardnumber = new Cardnumber(9890);


    // action
    $search = new Search();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($search, [$cardnumber]);

    $expected_value = 'https://epoch.com/services/customer_search/?api_action=search&auth_user=mahuser&auth_pass=mahpass&cardnum=9890';
    $this->assertTrue($output == $expected_value );

  }


}
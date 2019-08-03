<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Client;
use Buonzz\Epoch\CustomerSearch\Actions\Search;
use Buonzz\Epoch\CustomerSearch\Parameters\Memberid;

class ClientTest extends TestCase
{

  public function testSearch()
  {

    $memberid = new Memberid(1234587);
    $search = new Search();

    $client = new Client('mahuser', 'mahpass');
    
    $output = $client->build_uri($search, [$memberid]);

    $expected_value = 'https://epoch.com/services/customer_search/?member_id=1234587';
    //$this->assertTrue($output == $expected_value );

  }

}
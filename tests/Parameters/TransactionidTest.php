<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Parameters\Transactionid;

class TransactionidTest extends TestCase
{

/**
 * @expectedException InvalidArgumentException
 */
  public function testblankconstructor()
  {
    $o = new Transactionid("");
  }

/**
 * @expectedException InvalidArgumentException
 */
  public function testnullconstructor()
  {
    $o = new Transactionid(null);
  }

}
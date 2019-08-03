<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Parameters\RetentionAmount;

class RetentionAmountTest extends TestCase
{

/**
 * @expectedException InvalidArgumentException
 */
  public function testblankconstructor()
  {
    $o = new RetentionAmount("");
  }

/**
 * @expectedException InvalidArgumentException
 */
  public function testnullconstructor()
  {
    $o= new RetentionAmount(null);
  }

/**
 * @expectedException InvalidArgumentException
 */
  public function teststring()
  {
    $o = new RetentionAmount("thisistring");
  }

/**
 * @expectedException InvalidArgumentException
 */
  public function testtoolarge()
  {
    $o = new RetentionAmount(99999);
  }



  public function testvalidvalue()
  {
    $o = new RetentionAmount(2341);
  }


}
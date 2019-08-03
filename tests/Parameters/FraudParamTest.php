<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Parameters\Fraud;

class FraudParamTest extends TestCase
{

  public function testblankconstructor()
  {
    $o = new Fraud("");
    $this->assertTrue('Y' == $o->getValue());
  }

  public function testnullconstructor()
  {
    $o = new Fraud(null);
    $this->assertTrue('Y' == $o->getValue());
  }

  public function testgetValue()
  {
    $o = new Fraud(null);

    $this->assertTrue('Y' == $o->getValue());
  }


  public function testsetvalue()
  {
    $o = new Fraud(null);
    $o->setValue('');

    $this->assertTrue('' == $o->getValue());
  }


}
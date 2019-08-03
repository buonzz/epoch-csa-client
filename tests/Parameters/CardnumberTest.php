<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Parameters\Cardnumber;

class CardnumberTest extends TestCase
{

/**
 * @expectedException InvalidArgumentException
 */
  public function testblankconstructor()
  {
    $o = new Cardnumber("");
  }

/**
 * @expectedException InvalidArgumentException
 */
  public function testnullconstructor()
  {
    $o= new Cardnumber(null);
  }

/**
 * @expectedException InvalidArgumentException
 */
  public function teststring()
  {
    $o = new Cardnumber("thisistring");
  }

/**
 * @expectedException InvalidArgumentException
 */
  public function testtoolarge()
  {
    $o = new Cardnumber(99999);
  }



  public function testvalidvalue()
  {
    $o = new Cardnumber(2341);
  }


}
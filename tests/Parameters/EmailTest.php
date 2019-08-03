<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Parameters\Email;

class EmailTest extends TestCase
{

/**
 * @expectedException InvalidArgumentException
 */
  public function testblankconstructor()
  {
    $o = new Email("");
  }

/**
 * @expectedException InvalidArgumentException
 */
  public function testnullconstructor()
  {
    $o = new Email(null);
  }

/**
 * @expectedException InvalidArgumentException
 */
  public function teststring()
  {
    $memberid = new Email("thisistring");
  }


  public function testvalidvalue()
  {
    $o = new Email("hello@example.com");
  }


}
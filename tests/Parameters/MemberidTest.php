<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Parameters\Memberid;

class MemberidTest extends TestCase
{

/**
 * @expectedException InvalidArgumentException
 */
  public function testblankconstructor()
  {
    $memberid = new Memberid("");
  }

/**
 * @expectedException InvalidArgumentException
 */
  public function testnullconstructor()
  {
    $memberid = new Memberid(null);
  }

}
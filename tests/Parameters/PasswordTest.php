<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Parameters\Password;

class PasswordTest extends TestCase
{

/**
 * @expectedException InvalidArgumentException
 */
  public function testblankconstructor()
  {
    $o = new Password("");
  }

/**
 * @expectedException InvalidArgumentException
 */
  public function testnullconstructor()
  {
    $o = new Password(null);
  }


  public function testvalidvalue()
  {
    $o = new Password("maypass#9%-091m");
  }

}
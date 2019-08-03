<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Parameters\PostbackUrl;

class PostbackUrlTest extends TestCase
{

/**
 * @expectedException InvalidArgumentException
 */
  public function testblankconstructor()
  {
    $o = new PostbackUrl("");
  }

/**
 * @expectedException InvalidArgumentException
 */
  public function testnullconstructor()
  {
    $o = new PostbackUrl(null);
  }


/**
 * @expectedException InvalidArgumentException
 */
  public function testinvalidvalue()
  {
    $o = new PostbackUrl(1234556);
  }


  public function testvalidvalue()
  {
    $o = new PostbackUrl("http://www.example.com");
  }

}
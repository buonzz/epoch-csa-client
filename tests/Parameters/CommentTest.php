<?php 

use PHPUnit\Framework\TestCase;
use Buonzz\Epoch\CustomerSearch\Parameters\Comment;

class CommentTest extends TestCase
{

  public function testvalidvalue()
  {
    $o = new Comment("this is a acomment");
  }


}
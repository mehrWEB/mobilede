<?php 

namespace MWMobileTest\Model;

use MWMobile\Model\Refdata;
class RefdataTest extends \PHPUnit_Framework_TestCase 
{
    protected $ref;
    
    protected function setUp ()
    {
        $this->ref = new Refdata();
    }
    
    public function testSetRefKey ()
    {
        $this->ref->setKey('VW');
        
        $this->assertSame('VW', $this->ref->getKey());
    }
    
    public function testSetRefValue ()
    {
        $this->ref->setValue('Volkswagen');
        $this->assertSame('Volkswagen', $this->ref->getValue());
    }
} 
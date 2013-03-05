<?php 

namespace MWMobileTest\Model;

use MWMobile\Model\Vehicle;
class VehicleTest extends \PHPUnit_Framework_TestCase 
{
    protected $vehicle;
    
    protected function setUp ()
    {
        $this->vehicle = new Vehicle();
    }
    
    public function testSetPrice ()
    {
        $price = '123.45';
        $this->vehicle->setConsumerPrice($price);
        
        $this->assertSame((float) $price, $this->vehicle->getConsumerPrice());
    }
    
    public function testSetId ()
    {
        $id = 12345;
        $this->vehicle->setId($id);
        $this->assertSame($id, $this->vehicle->getId());
    }
} 
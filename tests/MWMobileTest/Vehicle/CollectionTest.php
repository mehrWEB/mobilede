<?php

namespace MWMobileTest\Vehicle;

use MWMobile\Vehicle\Collection;
use MWMobile\Vehicle;
class CollectionTest extends \PHPUnit_Framework_TestCase
{
    protected $collection;

    protected function setUp ()
    {
        $this->collection = new Collection();
    }

    public function testAddVehicle ()
    {
        $this->collection->add(new Vehicle());

        $this->assertCount(1, $this->collection);
    }

    public function removeVehicle ()
    {
        $v = new Vehicle();
        $v->setId(12345);

        $this->collection->add($v);

        $this->assertTrue($this->collection->remove($v));
    }
}
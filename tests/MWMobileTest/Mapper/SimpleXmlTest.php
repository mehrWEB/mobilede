<?php

namespace MWMobileTest\Mapper;

use MWMobile\Mapper\SimpleXml as SimpleXmlMapper;
use MWMobile\Vehicle;
class SimpleXmlTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SimpleXmlMapper
     */
    protected $model;
    
    protected function setUp ()
    {
        $this->model = new SimpleXmlMapper();
    }
    
    public function testTransformDetailXml ()
    {
        $file = dirname(__FILE__) . '/_fixtures/vehicle-details.xml';
        
        $v = new Vehicle();
        $phpSimpleXml = simplexml_load_file($file);
        $this->model->transform($phpSimpleXml, $v);
        
        // checking some properties:
        $this->assertSame($v->getId(), 1234567);
        $this->assertSame($v->getDescription(), 'some name!');
        $this->assertSame($v->getConsumerPrice(), 7676.0);
    }
}
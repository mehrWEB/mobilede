<?php

namespace MWMobileTest\Mapper;

use MWMobile\Mapper\Refdata as RefdataMapper;
use MWMobile\Refdata as RefdataTarget;
class RefdataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RefdataMapper
     */
    protected $model;
    
    protected function setUp ()
    {
        $this->model = new RefdataMapper();
    }
    
    public function testTransformClassesXml ()
    {
        $file = dirname(__FILE__) . '/_fixtures/refdata-classes.xml';
        $phpSimpleXml = simplexml_load_file($file);
        $xpath = '/reference:reference/reference:item';
        
        foreach($phpSimpleXml->xpath($xpath) as $item) {
            $ref = new RefdataTarget();
            $this->model->transform($item, $ref);
            $this->assertGreaterThan(1, strlen($ref->getValue()));
        }
    }
}
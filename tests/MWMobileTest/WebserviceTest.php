<?php

namespace MWMobileTest;

use MWMobile\Webservice;
use Zend\Http\Client;
use MWMobile\Search;

class WebserviceTest extends \PHPUnit_Framework_TestCase
{
    protected $user = 'some-user';
    protected $pass = 'some-pass';
    protected $customer = 12345;
    
    protected $service;
    
    protected function setUp ()
    {
        $options  = new Webservice\Options(array(
            'user' => $this->user,
            'password' => $this->pass,
            'customer' => $this->customer,
            'acceptLanguage' => 'de',
        ));
        $this->service = new Webservice(new Client(), $options);
    }
    
    public function testLoadVehicle ()
    {
        $vehicle = $this->service->loadVehicle(1234);
        $this->assertInstanceOf('\MWMobile\Vehicle', $vehicle);
    }
    
    public function testLoadRefdata ()
    {
        $collection = $this->service->loadRefdata('classes');
        $this->assertInstanceOf('\MWMobile\Refdata\Collection', $collection);
    }
    
    public function testSearchVehicles ()
    {
        $query = new Search();
        $vehicles = $this->service->loadVehicles($query);
        
        $this->assertInstanceOf('\MWMobile\Vehicle\Collection', $vehicles);
        $this->assertLessThanOrEqual($query->getPageSize(), count($vehicles));
    }
}
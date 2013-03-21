<?php

namespace MWMobileTest;

use MWMobile\Webservice;
use Zend\Http\Client;
use MWMobile\Search;
use Zend\Http\Client\Adapter\Exception\RuntimeException;

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
        try {
            $vehicle = $this->service->loadVehicle(1234);
        } catch(RuntimeException $e) {
            return $this->markTestIncomplete('Host/network not available, skipping.');
        }
        $this->assertInstanceOf('\MWMobile\Vehicle', $vehicle);
    }

    public function testLoadRefdata ()
    {
        try {
            $collection = $this->service->loadRefdata('classes');
        } catch(RuntimeException $e) {
            return $this->markTestIncomplete('Host/network not available, skipping.');
        }
        $this->assertInstanceOf('\MWMobile\Refdata\Collection', $collection);
    }

    public function testSearchVehicles ()
    {
        $query = new Search();
        try {
            $vehicles = $this->service->loadVehicles($query);
        } catch(RuntimeException $e) {
            return $this->markTestIncomplete('Host/network not available, skipping.');
        }

        $this->assertInstanceOf('\MWMobile\Vehicle\Collection', $vehicles);
        $this->assertLessThanOrEqual($query->getPageSize(), count($vehicles));
    }
}
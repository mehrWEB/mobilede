<?php

namespace MWMobileTest;

use MWMobile\Webservice;
use Zend\Http\Client;

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
    
    public function testConstructor ()
    {
        $options = $this->service->getOptions();
        $this->assertEquals($this->customer, $options->getCustomer());
        $this->assertEquals($this->user, $options->getUser());
        $this->assertEquals($this->pass, $options->getPassword());
        $this->assertEquals('1.0.0', $options->getVersion());
    }
    
    public function testAcceptLanguage ()
    {
        $language= 'DE';
        $options = $this->service->getOptions();
        $options->setAcceptLanguage($language);
        $this->assertEquals('de', $options->getAcceptLanguage());
    }
    
    public function testLoadVehicle ()
    {
        $vehicle = $this->service->loadVehicle(169827436);
        $this->assertInstanceOf('\MWMobile\Vehicle', $vehicle);
    }
    
    public function testLoadRefdata ()
    {
        $collection = $this->service->loadRefdata('classes');
        $this->assertInstanceOf('\MWMobile\Refdata\Collection', $collection);
    }
}
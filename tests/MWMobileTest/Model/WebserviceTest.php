<?php

namespace MWMobileTest\Model;

use MWMobile\Model\Webservice;
use Zend\Http\Client;

class MWMobile_Model_WebserviceTest extends \PHPUnit_Framework_TestCase
{
    protected $user = 'some-user';
    protected $pass = 'some-pass';
    protected $customer = 12345;
    
    protected $service;
    
    protected function setUp ()
    {
        $this->service = new Webservice(new Client(), $this->user, $this->pass, 
                $this->customer);
    }
    
    public function testConstructor ()
    {
        $this->assertEquals($this->customer, $this->service->getCustomer());
        $this->assertEquals($this->user, $this->service->getUser());
        $this->assertEquals($this->pass, $this->service->getPassword());
        $this->assertEquals('1.0.0', $this->service->getVersion());
    }
    
    public function testAcceptLanguage ()
    {
        $language= 'DE';
        $this->service->setAcceptLanguage($language);
        $this->assertEquals('de', $this->service->getAcceptLanguage());
    }
}
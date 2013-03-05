<?php

namespace MWMobileTest\Model;

use MWMobile\Model\Webservice;
use Zend\Http\Client;

class MWMobile_Model_WebserviceTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp ()
    {
        $client = new Client();
        $user = 'some-user';
        $password = 'some-pass';
        $customer = 1234;
        
        $this->service = new Webservice($client, $user, $password, $customer);
    }
    
    public function testConstructor ()
    {
        $this->assertEquals(1234, $this->service->getCustomer());
    }
}
<?php

namespace MWMobileTest\Webservice;

use MWMobile\Webservice\Options;

class OptionsTest extends \PHPUnit_Framework_TestCase
{
    protected $user = 'some-user';
    protected $pass = 'some-pass';
    protected $customer = 12345;
    
    /**
     * @var Options
     */
    protected $options;
    
    protected function setUp ()
    {
        $this->options = new Options(array(
            'user' => $this->user,
            'password' => $this->pass,
            'customer' => $this->customer,
            'acceptLanguage' => 'en',
        ));
    }
    
    public function testGetOptions ()
    {
        $this->assertEquals($this->customer, $this->options->getCustomer());
        $this->assertEquals($this->user, $this->options->getUser());
        $this->assertEquals($this->pass, $this->options->getPassword());
        $this->assertEquals('1.0.0', $this->options->getVersion());
    }
    
    public function testAcceptLanguage ()
    {
        $language= 'DE';
        $this->options->setAcceptLanguage($language);
        $this->assertEquals('de', $this->options->getAcceptLanguage());
    }
}
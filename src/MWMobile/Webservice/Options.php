<?php

namespace MWMobile\Webservice;

use Zend\Stdlib\AbstractOptions;

class Options extends AbstractOptions
{
    /**
     * @var string
     */
    protected $user;
    
    /**
     * @var string
     */
    protected $password;
    
    /**
     * @var integer
     */
    protected $customer;
    
    /**
     * @var string
     */
    protected $acceptLanguage;
    
    /**
     * @var string
     */
    protected $version = '1.0.0';
    
    /**
     * @param string $version
     * @return \MWMobile\Webservice\Options
     */
    public function setVersion ($version)
    {
        $this->version = (string) $version;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getVersion ()
    {
        return $this->version;
    }
    
    /**
     * @param string $language
     * @return \MWMobile\Webservice\Options
     */
    public function setAcceptLanguage ($language)
    {
        $this->acceptLanguage = strtolower($language);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getAcceptLanguage ()
    {
        return $this->acceptLanguage;
    }
    
    /**
     * @return string
     */
    public function getUser ()
    {
        return $this->user;
    }
    
    /**
     * @param string $user
     * @return \MWMobile\Webservice\Options
     */
    public function setUser ($user)
    {
        $this->user = (string) $user;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPassword ()
    {
        return $this->password;
    }
    
    /**
     * @param string $password
     * @return \MWMobile\Webservice\Options
     */
    public function setPassword ($password)
    {
        $this->password = (string) $password;
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getCustomer ()
    {
        return $this->customer;
    }
    
    /**
     * @param integer $customer
     * @return \MWMobile\Webservice\Options
     */
    public function setCustomer ($customer)
    {
        $this->customer = (int) $customer;
        return $this;
    }
}
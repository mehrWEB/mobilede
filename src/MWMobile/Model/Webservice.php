<?php

namespace MWMobile\Model;

use MWMobile\Model\Query\QueryInterface;

use Zend\Uri\Http;
use Zend\Http\Client;

class Webservice 
{
    /**
     * @var string
     */
    const API_BASE = 'http://services.mobile.de/1.0.0';
    
    /**
     * @var Client
     */
    protected $httpClient;
    
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
     * @param Client $client
     * @param string $user
     * @param string $password
     * @param integer $customer
     */
    public function __construct (Client $client, $user, $password, $customer)
    {
        $this->setUser($user)
             ->setPassword($password)
             ->setCustomer($customer)
             ->setHttpClient($client);
    }
    
    /**
     * @param string $language
     * @return \MWMobile\Model\Webservice
     */
    public function setAcceptLanguage ($language)
    {
        $this->acceptLanguage = (string) $language;
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
     * @return \MWMobile\Model\Webservice
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
     * @return \MWMobile\Model\Webservice
     */
    public function setPassword ($password)
    {
        $this->password = (string) $password;
        return $this;
    }
    
    public function getCustomer ()
    {
        return $this->customer;
    }
    
    /**
     * @param integer $customer
     * @return \MWMobile\Model\Webservice
     */
    public function setCustomer ($customer)
    {
        $this->customer = (int) $customer;
        return $this;
    }
    
    /**
     * @param Client $client
     * @return \MWMobile\Model\Webservice
     */
    public function setHttpClient (Client $client)
    {
        $this->httpClient = $client;
        return $this;
    }
    
    /**
     * @return Client
     */
    public function getHttpClient ()
    {
        return $this->httpClient;
    }
    
    /**
     * @param QueryInterface $query
     * @return \Zend\Http\Response
     */
    public function query (QueryInterface $query)
    {
        $client = $this->getHttpClient();
        
        // language setting from config
        if($this->getAcceptLanguage()) {
            $client->setHeaders(array(
                'Accept-Language' => $this->getAcceptLanguage()
            ));
        }
        
        // setup api url
        $uri = new Http(self::API_BASE . $query->getUrl());
        $uri->setQuery($query->getHttpQuery())
            ->setUserInfo($this->getUser() . ':' . $this->getPassword());
        
        // do it
        return $client->setUri($uri)->send();
    }
}
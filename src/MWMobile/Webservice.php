<?php

namespace MWMobile;

use Zend\Uri\Http;
use Zend\Http\Client;
use Zend\Http\Request;

/* xml to model mapper */
use MWMobile\Mapper\SimpleXml as VehicleMapper;
use MWMobile\Mapper\Refdata as RefdataMapper;

/* api responses */
use MWMobile\Response\Vehicle\Detail as DetailResponse;
use MWMobile\Response\Refdata as RefdataResponse;
use MWMobile\Webservice\Options as WebserviceOptions;
use MWMobile\Response\Vehicle\Listing;

class Webservice 
{
    /**
     * @var string
     */
    const API_BASE = 'http://services.mobile.de';
    
    /**
     * @var Client
     */
    protected $httpClient;
    
    /**
     * @var WebserviceOptions
     */
    protected $options;
    
    /**
     * @param Client $client
     * @param WebserviceOptions $options
     */
    public function __construct (Client $client, WebserviceOptions $options)
    {
        $this->setOptions($options)
             ->setHttpClient($client);
    }
    
    /**
     * @param WebserviceOptions $options
     * @return \MWMobile\Webservice
     */
    public function setOptions (WebserviceOptions $options)
    {
        $this->options = $options;
        return $this;
    }
    
    /**
     * @return \MWMobile\Webservice\Options
     */
    public function getOptions ()
    {
        return $this->options;
    }
    
    /**
     * @param Client $client
     * @return \MWMobile\Webservice
     */
    public function setHttpClient (Client $client)
    {
        $options = $this->getOptions();
        $client->setAuth($options->getUser(), $options->getPassword());
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
     * @param string $path
     * @return string
     */
    protected function buildApiUrl ($path)
    {
        $uri = self::API_BASE . '/' . $this->getOptions()->getVersion();
        return $uri . $path;
    }
    
    /**
     * @param integer $id
     * @return Vehicle
     */
    public function loadVehicle ($id)
    {
        $response = $this->request('/ad/' . $id);
        $adResponse = new DetailResponse($response, new VehicleMapper());
        return $adResponse->getCollection()->current();
    }
    
    /**
     * @param string $refdataPath
     * @return \MWMobile\Refdata\Collection
     */
    public function loadRefdata ($refdataPath)
    {
        $response = $this->request('/refdata/' . $refdataPath);
        $apiResponse = new RefdataResponse($response, new RefdataMapper());
        
        return $apiResponse->getCollection();
    }
    
    /**
     * @param Search $search
     * @return \Zend\Http\Response
     */
    public function loadVehicles (Search $search)
    {
        $request = new Request();
        $uri = new Http($this->buildApiUrl($search->getUrl()));
        $uri->setQuery($search->getHttpQuery());
        
        $response = $this->getHttpClient()->send($request->setUri($uri));
        $apiResponse = new Listing($response, new VehicleMapper());
        
        return $apiResponse->getCollection();
    }
    
    /**
     * @param string $path
     * @return \Zend\Http\Response
     */
    protected function request ($path)
    {
        $request = new Request();
        $request->setUri($this->buildApiUrl($path));
        
        $options = $this->getOptions();
        if($options->getAcceptLanguage()) {
            $this->getHttpClient()->setHeaders(array(
                'Accept-Language' => $options->getAcceptLanguage()
            ));
        }
        
        return $this->getHttpClient()->send($request);
    }
}
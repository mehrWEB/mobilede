<?php

namespace MWMobile\Model\Webservice;

use Zend\Http\Response as HttpResponse;

use MWMobile\Model\Vehicle;
use MWMobile\Model\Mapper\MapperInterface;
use MWMobile\Model\Vehicle\Collection;

class Response
{
    /**
     * @var HttpResponse
     */
    protected $httpResponse;
    
    /**
     * @var MapperInterface
     */
    protected $mapper;
    
    /**
     * @param HttpResponse $response
     * @param MapperInterface $mapper
     */
    public function __construct(HttpResponse $response, MapperInterface $mapper)
    {
        $this->setHttpResponse($response);
        $this->setMapper($mapper);
    }
    
    /**
     * @return HttpResponse
     */
    public function getHttpResponse ()
    {
        return $this->httpResponse;
    }
    
    /**
     * @param HttpResponse $response
     * @return \MWMobile\Model\Webservice\Response
     */
    public function setHttpResponse (HttpResponse $response)
    {
        $this->httpResponse = $response;
        return $this;
    }
    
    /**
     * @param MapperInterface $mapper
     * @return \MWMobile\Model\Webservice\Response
     */
    public function setMapper (MapperInterface $mapper)
    {
        $this->mapper = $mapper;
        return $this;
    }
    
    /**
     * @return \MWMobile\Model\Mapper\MapperInterface
     */
    public function getMapper ()
    {
        return $this->mapper;
    }
    
    /**
     * @return \MWMobile\Model\Vehicle\Collection
     */
    public function getCollection ()
    {
        if(!$this->httpResponse->isSuccess()) {
            throw new Exception('Please check API credentials.');
        }
        $xml = simplexml_load_string($this->httpResponse->getBody());
        $ads = $xml->xpath('ad:ad');
        
        $collection = new Collection();
        foreach($ads as $ad) {
            $target = new Vehicle();
            $collection->add($this->getMapper()->transform($ad, $target));
        }
        
        return $collection;
    }
}
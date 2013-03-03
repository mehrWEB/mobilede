<?php

namespace MWMobile\Model\Response;

use MWMobile\Model\Mapper\MapperInterface;
use Zend\Http\Response as HttpResponse;

abstract class AbstractResponse
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
     * @return \MWMobile\Model\Response\AbstractResponse
     */
    public function setHttpResponse (HttpResponse $response)
    {
        $this->httpResponse = $response;
        return $this;
    }
    
    /**
     * @param MapperInterface $mapper
     * @return \MWMobile\Model\Response\AbstractResponse
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
}
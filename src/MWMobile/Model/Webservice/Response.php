<?php

namespace MWMobile\Model\Webservice;

use MWMobile\Model\Vehicle\Collection;

use MWMobile\Model\Vehicle\SimpleXmlFactory;

use Zend\Http\Response as HttpResponse;
use MWMobile\Model\Vehicle;
use MWMobile\Model\Mapper\SimpleXml;

class Response
{
    protected $httpResponse;
    
    /**
     * @param HttpResponse $response
     */
    public function __construct(HttpResponse $response)
    {
        $this->httpResponse = $response;
    }
    
    /**
     * @return \MWMobile\Model\Mapper\SimpleXml
     */
    public function getMapper ()
    {
        // @TODO
        return new SimpleXml();
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
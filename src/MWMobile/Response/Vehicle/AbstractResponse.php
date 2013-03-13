<?php

namespace MWMobile\Response\Vehicle;

use MWMobile\Response\XmlInterface;
use MWMobile\Response\AbstractResponse as BaseResponse;
use MWMobile\Webservice\Exception;
use MWMobile\Vehicle\Collection;
use MWMobile\Vehicle;

abstract class AbstractResponse extends BaseResponse implements XmlInterface
{
    /**
     * @throws Exception
     * @return \MWMobile\Vehicle\Collection
     */
    public function getCollection ()
    {
        $xml = $this->getBody();
        if(!$xml) {
            throw new Exception('Check API settings (user, version, password, ...)');
        }
        $ads = $xml->xpath($this->getXmlXpath());
    
        $collection = new Collection();
        foreach($ads as $ad) {
            $target = new Vehicle();
            $collection->add($this->getMapper()->transform($ad, $target));
        }
    
        return $collection;
    }
    
    /**
     * @return boolean|SimpleXMLElement
     */
    protected function getBody ()
    {
        $httpResponse = $this->getHttpResponse();
        if(!$httpResponse->isSuccess()) {
            return false;
        }
        return simplexml_load_string($httpResponse->getBody());
    }
}
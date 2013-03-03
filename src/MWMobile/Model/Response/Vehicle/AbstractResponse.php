<?php

namespace MWMobile\Model\Response\Vehicle;

use MWMobile\Model\Response\XmlInterface;
use MWMobile\Model\Response\AbstractResponse as BaseResponse;
use MWMobile\Model\Webservice\Exception;
use MWMobile\Model\Vehicle\Collection;
use MWMobile\Model\Vehicle;

abstract class AbstractResponse extends BaseResponse implements XmlInterface
{
    /**
     * @throws Exception
     * @return \MWMobile\Model\Vehicle\Collection
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
<?php

namespace MWMobile\Response;

use MWMobile\Refdata\Collection;
use MWMobile\Refdata as Ref;
use MWMobile\Webservice\Exception;

class Refdata extends AbstractResponse implements XmlInterface
{
    /**
     * (non-PHPdoc)
     * @see \MWMobile\Response\XmlInterface::getXmlXpath()
     */
    public function getXmlXpath ()
    {
        return 'reference:item';
    }
    
    /**
     * @throws Exception
     * @return \MWMobile\Refdata\Collection
     */
    public function getCollection ()
    {
        $xml = $this->getBody();
        if(!$xml instanceof \SimpleXMLElement) {
            throw new Exception('Check API settings (user, version, password, ...)');
        }
        $refs = $xml->xpath($this->getXmlXpath());
        
        $collection = new Collection();
        foreach($refs as $ref) {
            $target = new Ref();
            $collection->addRef($this->getMapper()->transform($ref, $target));
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
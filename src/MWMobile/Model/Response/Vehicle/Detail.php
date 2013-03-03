<?php

namespace MWMobile\Model\Response\Vehicle;

use MWMobile\Model\Response\XmlInterface;

class Detail extends AbstractResponse implements XmlInterface
{
    /**
     * (non-PHPdoc)
     * @see \MWMobile\Model\Response\XmlInterface::getXmlXpath()
     */
    public function getXmlXpath ()
    {
        return '/ad:ad';
    }
}
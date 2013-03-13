<?php

namespace MWMobile\Response\Vehicle;

use MWMobile\Response\XmlInterface;

class Detail extends AbstractResponse implements XmlInterface
{
    /**
     * (non-PHPdoc)
     * @see \MWMobile\Response\XmlInterface::getXmlXpath()
     */
    public function getXmlXpath ()
    {
        return '/ad:ad';
    }
}
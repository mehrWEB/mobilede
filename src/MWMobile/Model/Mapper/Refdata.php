<?php

namespace MWMobile\Model\Mapper;

class Refdata implements MapperInterface
{
    /**
     * (non-PHPdoc)
     * @see \MWMobile\Model\Mapper\MapperInterface::transform()
     */
    public function transform(\SimpleXMLElement $source, $target)
    {
        $target->setKey($source->attributes()->key);
        $target->setValue($source->xpath('resource:local-description')[0]);
        return $target;
    }
}
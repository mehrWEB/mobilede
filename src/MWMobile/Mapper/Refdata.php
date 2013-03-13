<?php

namespace MWMobile\Mapper;

class Refdata implements MapperInterface
{
    /**
     * (non-PHPdoc)
     * @see \MWMobile\Mapper\MapperInterface::transform()
     */
    public function transform(\SimpleXMLElement $source, $target)
    {
        $xpath = 'resource:local-description';
        $target->setKey($source->attributes()->key);
        $target->setValue($source->xpath($xpath)[0]);
        return $target;
    }
}
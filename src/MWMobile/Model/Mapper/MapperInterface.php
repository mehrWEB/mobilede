<?php 

namespace MWMobile\Model\Mapper;

use MWMobile\Model\Vehicle;

interface MapperInterface
{
    public function transform(\SimpleXMLElement $source, Vehicle $target);
} 
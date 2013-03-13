<?php 

namespace MWMobile\Mapper;

use MWMobile\Vehicle;

interface MapperInterface
{
    public function transform(\SimpleXMLElement $source, $target);
} 
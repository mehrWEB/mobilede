<?php

namespace MWMobile\Model\Mapper;

use MWMobile\Model\Vehicle;
use MWMobile\Model\Image;

class SimpleXml implements MapperInterface
{
    /**
     * @var string
     */
    const XML_NS = 'ad';
    
    /**
     * @param \SimpleXMLElement $source
     * @param Vehicle $target
     * @return Vehicle
     */
    protected function setId (\SimpleXMLElement $source, Vehicle $target)
    {
        $id = $source->xpath('@key');
        return $target->setId($id[0]);
    }
    
    /**
     * @param \SimpleXMLElement $source
     * @param Vehicle $target
     * @return Vehicle
     */
    protected function setConsumerPrice (\SimpleXMLElement $source, Vehicle $target)
    {
        $path = self::XML_NS. ':price/' . self::XML_NS . ':consumer-price-amount/@value';
        $node = $source->xpath($path);
        return $target->setConsumerPrice((float) $node[0]);
    }
    
    /**
     * @param \SimpleXMLElement $source
     * @param Vehicle $target
     * @return Vehicle
     */
    protected function setMake (\SimpleXMLElement $source, Vehicle $target)
    {
        $path = self::XML_NS . ':vehicle/' . self::XML_NS . ':make/resource:local-description';
        $node = $source->xpath($path);
        return $target->setMake($node[0]);
    }
    
    /**
     * @param \SimpleXMLElement $source
     * @param Vehicle $target
     * @return Vehicle
     */
    protected function setCondition (\SimpleXMLElement $source, Vehicle $target)
    {
        $ns = self::XML_NS;
        $path = $ns . ':vehicle/'. $ns . ':specifics/' . $ns . ':condition/resource:local-description';
        $node = $source->xpath($path);
        
        return $target->setCondition(array_shift($node));
    }
    
    /**
     * @param \SimpleXMLElement $source
     * @param Vehicle $target
     * @return Vehicle
     */
    protected function setMileage (\SimpleXMLElement $source, Vehicle $target)
    {
        $ns = self::XML_NS;
        $path = $ns . ':vehicle/' . $ns . ':specifics/' . $ns . ':mileage/@value';
        $mileage = $source->xpath($path);
        
        if(empty($mileage)) {
            return $target;
        }
        return $target->setMileage($mileage[0]);
    }
    
    /**
     * @param \SimpleXMLElement $source
     * @param Vehicle $target
     * @return Vehicle
     */
    protected function setModel (\SimpleXMLElement $source, Vehicle $target)
    {
        $node = $source->xpath(self::XML_NS . ':vehicle/' . self::XML_NS . ':model/@key');
        if(empty($node)) {
            return $target;
        }
        return $target->setModel((string) $node[0]);
    }
    
    /**
     * @param \SimpleXMLElement $source
     * @param Vehicle $target
     * @return Vehicle
     */
    protected function setPower (\SimpleXMLElement $source, Vehicle $target)
    {
        $ns = self::XML_NS;
        $node = $source->xpath($ns . ':vehicle/' . $ns . ':specifics/' . $ns . ':power/@value');
        if(empty($node)) {
            return $target;
        }
        return $target->setPower($node[0]);
    }
    
    protected function setFuel (\SimpleXMLElement $source, Vehicle $target)
    {
        $ns = self::XML_NS;
        $path = $ns . ':vehicle/' . $ns . ':specifics/' . $ns . ':fuel/resource:local-description';
        $fuelNode = $source->xpath($path);
        
        if(empty($fuelNode)) {
            return $target;
        }
        return $target->setFuel($fuelNode[0]);
    }
    
    protected function setColor (\SimpleXMLElement $source, Vehicle $target)
    {
        $ns = self::XML_NS;
        $path = $ns . ':vehicle/' . $ns . ':specifics/' . $ns .':exterior-color/resource:local-description';
        $colorNode = $source->xpath($path);
        
        if(empty($colorNode)) {
            return $target;
        }
        return $target->setColor(array_shift($colorNode));
    }
    
    /**
     * @param \SimpleXMLElement $source
     * @param Vehicle $target
     * @return Vehicle
     */
    protected function setGearboxType (\SimpleXMLElement $source, Vehicle $target)
    {
        $ns = self::XML_NS;
        $path = $ns . ':vehicle/' . $ns . ':specifics/' . $ns . ':gearbox/resource:local-description';
        $node = $source->xpath($path);
        
        if(empty($node)) {
            return $target;
        }
        return $target->setGearboxType(array_shift($node));
    }
    
    /**
     * @param \SimpleXMLElement $source
     * @param Vehicle $target
     */
    protected function setDescription (\SimpleXMLElement $source, Vehicle $target)
    {
        $node = $source->xpath(self::XML_NS. ':description');
        return $target->setDescription($node[0]);
    }
    
    /**
     * @param \SimpleXMLElement $source
     * @param Vehicle $target
     * @return Vehicle
     */
    protected function setVatable (\SimpleXMLElement $source, Vehicle $target)
    {
        $ns = self::XML_NS;
        $vatableNode = $source->xpath($ns . 'price/' . $ns . ':vatable/@value');
        
        if(empty($vatableNode)) {
            return $target;
        }
        $vatable = ((string) $vatableNode[0] == 'true') ? true : false;
        return $target->setVatable($vatable);
    }
    
    /**
     * @param \SimpleXMLElement $source
     * @param Vehicle $target
     * @return Vehicle
     */
    protected function setDetailUrl (\SimpleXMLElement $source, Vehicle $target)
    {
        $detailUrl = $source->xpath(self::XML_NS . ':detail-page/@url');
        return $target->setDetailUrl($detailUrl[0]);
    }
    
    /**
     * @param \SimpleXMLElement $source
     * @param Vehicle $target
     */
    protected function setIcon (\SimpleXMLElement $source, Vehicle $target)
    {
        $ns = self::XML_NS;
        $size = 'ICON';
        $node = $source->xpath($ns . ':images/'.  $ns . ':image/' . $ns . ':representation[@size="' . $size . '"]/@url');
        return $target->setIcon($node[0]);
    }
    
    /**
     * @param \SimpleXMLElement $source
     * @param Vehicle $target
     * @return Vehicle
     */
    protected function setFirstRegistration (\SimpleXMLElement $source, Vehicle $target)
    {
        $ns = self::XML_NS;
        $path = $ns . ':vehicle/' . $ns . ':specifics/' . $ns . ':first-registration/@value';
        $node = $source->xpath($path);
        
        if(empty($node)) {
            return $target;
        }
        $iso = (string) $node[0] . '-01';
        return $target->setFirstRegistration(new \DateTime($iso));
    }
    
    /**
     * @param \SimpleXMLElement $source
     * @param Vehicle $target
     * @return Vehicle
     */
    protected function setGeneralInspection (\SimpleXMLElement $source, Vehicle $target)
    {
        $ns = self::XML_NS;
        $path = $ns . ':vehicle/' . $ns . ':specifics/' . $ns . ':general-inspection/@value';
        $node = $source->xpath($path);
    
        if(empty($node)) {
            return $target;
        }
        $iso = (string) $node[0] . '-01';
        return $target->setGeneralInspection(new \DateTime($iso));
    }
    
    /**
     * @param \SimpleXMLElement $source
     * @param Vehicle $target
     */
    protected function setCurrency (\SimpleXMLElement $source, Vehicle $target)
    {
        $currency = $source->xpath(self::XML_NS . ':price/@currency');
        return $target->setCurrency($currency[0]);
    }
    
    /**
     * @param \SimpleXMLElement $source
     * @param mixed $target
     * @return Vehicle
     */
    public function transform(\SimpleXMLElement $source, $target)
    {
        // mobile.de info
        $this->setId($source, $target);
        $this->setDetailUrl($source, $target);
        $this->setIcon($source, $target);
        
        $this->setDescription($source, $target);
        
        // what car is it?
        $this->setMake($source, $target);
        $this->setModel($source, $target);
        
        // specifications
        $this->setPower($source, $target);
        $this->setFuel($source, $target);
        $this->setColor($source, $target);
        $this->setGearboxType($source, $target);
        
        // pricing
        $this->setConsumerPrice($source, $target);
        $this->setVatable($source, $target);
        $this->setCurrency($source, $target);
        
        // usage 
        $this->setCondition($source, $target);
        $this->setMileage($source, $target);
        $this->setFirstRegistration($source, $target);
        $this->setGeneralInspection($source, $target);
        
        // images
        $ns = self::XML_NS . ':';
        $imageNodes = $source->xpath($ns . 'images/' . $ns . 'image');
        foreach($imageNodes as $imgNode) {
            $representations = $imgNode->xpath($ns . 'representation');
            $representationArray = array();
            foreach ( $representations as $representation ) {
                $urlNode = $representation->xpath('@url');
                $sizeNode = $representation->xpath('@size');
                $representationArray[(string) $sizeNode[0]] = (string) $urlNode[0];
            }
            $target->addImage(new Image($representationArray));
        }
        return $target;
    }
}
<?php

namespace MWMobile\Model;

use MWMobile\Model\Image\Collection as ImageCollection;

class Vehicle
{
    /**
     * @var integer
     */
    protected $id;
    
    /**
     * @var string
     */
    protected $make;
    
    /**
     * @var string
     */
    protected $color;
    
    /**
     * @var string
     */
    protected $description;
    
    /**
     * @var boolean
     */
    protected $vatable = true;
    
    /**
     * @var string
     */
    protected $currency = 'EUR';
    
    /**
     * @var string
     */
    protected $condition;
    
    /**
     * @var string
     */
    protected $gearboxType;
    
    /**
     * @var float
     */
    protected $consumerPrice;
    
    /**
     * @var \DateTime
     */
    protected $firstRegistration;
    
    /**
     * @var \DateTime
     */
    protected $generalInspection;
    
    /**
     * @var integer
     */
    protected $mileage;
    
    /**
     * @var string
     */
    protected $model;
    
    /**
     * @var integer
     */
    protected $power;
    
    /**
     * @var string
     */
    protected $detailUrl;
    
    /**
     * @var string
     */
    protected $icon;
    
    /**
     * @var ImagCollection
     */
    protected $imageCollection;
    
    /**
     * @var string
     */
    protected $fuel;
    
    /**
     * @param integer $id
     * @return \MWMobile\Model\Vehicle
     */
    public function setId ($id)
    {
        $this->id = (int) $id;
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getId ()
    {
        return $this->id;
    }
    
    /**
     * @param string $url
     * @return \MWMobile\Model\Vehicle
     */
    public function setDetailUrl ($url)
    {
        $this->detailUrl = (string) $url;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDetailUrl ()
    {
        return $this->detailUrl;
    }
    
    /**
     * @param string $description
     * @return \MWMobile\Model\Vehicle
     */
    public function setDescription ($description)
    {
        $this->description = (string) $description;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDescription ()
    {
        return $this->description;
    }
    
    /**
     * @param string $url
     * @return \MWMobile\Model\Vehicle
     */
    public function setIcon ($url)
    {
        $this->icon = (string) $url;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getIcon ()
    {
        return $this->icon;
    }
    
    /**
     * @param float $price
     * @return \MWMobile\Model\Vehicle
     */
    public function setConsumerPrice ($price)
    {
        if(!is_numeric($price)) {
            throw new \InvalidArgumentException('Not a price.');
        }
        $this->consumerPrice = (float) $price;
        return $this;
    }
    
    /**
     * @return float
     */
    public function getConsumerPrice ()
    {
        return $this->consumerPrice;
    }
    
    /**
     * @param boolean $vatable
     * @return \MWMobile\Model\Vehicle
     */
    public function setVatable ($vatable)
    {
        $this->vatable = (boolean) $vatable;
        return $this;
    }
    
    /**
     * @return boolean
     */
    public function getVatable ()
    {
        return $this->vatable;
    }
    
    /**
     * @param string $make
     * @return \MWMobile\Model\Vehicle
     */
    public function setMake ($make) 
    {
        $this->make = (string) $make;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMake ()
    {
        return $this->make;
    }
    
    /**
     * @param string $condition
     * @return \MWMobile\Model\Vehicle
     */
    public function setCondition ($condition)
    {
        $this->condition = (string) $condition;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCondition ()
    {
        return $this->condition;
    }
    
    /**
     * @param string $currency
     * @throws \InvalidArgumentException if not iso conform
     * @return \MWMobile\Model\Vehicle
     */
    public function setCurrency ($currency)
    {
        if(strlen($currency) !== 3) {
            throw new \InvalidArgumentException('Invalid currency: '. $currency);
        }
        $this->currency = (string) $currency;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCurrency ()
    {
        return $this->currency;
    }
    
    /**
     * @param integer $mileage
     * @return \MWMobile\Model\Vehicle
     */
    public function setMileage ($mileage)
    {
        $this->mileage = (int) $mileage;
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getMileage ()
    {
        return $this->mileage;
    }
    
    /**
     * @param \DateTime $firstRegistration
     * @return \MWMobile\Model\Vehicle
     */
    public function setFirstRegistration (\DateTime $firstRegistration)
    {
        $this->firstRegistration = $firstRegistration;
        return $this;
    }
    
    /**
     * @return \DateTime
     */
    public function getFirstRegistration ()
    {
        return $this->firstRegistration;
    }
    
    /**
     * @param string $type
     * @return \MWMobile\Model\Vehicle
     */
    public function setGearboxType ($type)
    {
        $this->gearboxType = (string) $type;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getGearboxType ()
    {
        return $this->gearboxType;
    }
    
    /**
     * @param string $color
     * @return \MWMobile\Model\Vehicle
     */
    public function setColor ($color)
    {
        $this->color = (string) $color;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getColor ()
    {
        return $this->color;
    }
    
    /**
     * @param string $fuel
     * @return \MWMobile\Model\Vehicle
     */
    public function setFuel ($fuel)
    {
        $this->fuel = (string) $fuel;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFuel ()
    {
        return $this->fuel;
    }
    
    /**
     * @param integer $power
     * @return \MWMobile\Model\Vehicle
     */
    public function setPower ($power)
    {
        $this->power = (int) $power;
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getPower ()
    {
        return $this->power;
    }
    
    /**
     * @param string $model
     * @return \MWMobile\Model\Vehicle
     */
    public function setModel ($model)
    {
        $this->model = (string) $model;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getModel ()
    {
        return $this->model;
    }
    
    /**
     * @param \DateTime $inspection
     * @return \MWMobile\Model\Vehicle
     */
    public function setGeneralInspection (\DateTime $inspection)
    {
        $this->generalInspection = $inspection;
        return $this;
    }
    
    /**
     * @return \DateTime
     */
    public function getGeneralInspection ()
    {
        return $this->generalInspection;
    }
    
    /**
     * @param Image $image
     * @return \MWMobile\Model\Vehicle
     */
    public function addImage (Image $image)
    {
        $this->getImageCollection()->addImage($image);
        return $this;
    }
    
    /**
     * @param ImageCollection $images
     * @return \MWMobile\Model\Vehicle
     */
    public function setImageCollection (ImageCollection $images)
    {
        $this->imageCollection = $images;
        return $this;
    }
    
    /**
     * @return \MWMobile\Model\ImageCollection
     */
    public function getImageCollection ()
    {
        if($this->imageCollection == null) {
            $this->setImageCollection(new ImageCollection());
        }
        return $this->imageCollection;
    }
}
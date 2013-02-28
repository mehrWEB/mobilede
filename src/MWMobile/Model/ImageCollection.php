<?php

namespace MWMobile\Model;

class ImageCollection implements \Iterator
{
    /**
     * @var integer
     */
    private $position = 0;
    
    /**
     * @var array
     */
    protected $images = array();
    
    /**
     * @param array $images OPTIONAL
     */
    public function __construct (array $images = array())
    {
        $this->setImages($images);
    }
    
    public function rewind ()
    {
        $this->position = 0;
    }
    
    public function current()
    {
        return $this->images[$this->position];
    }
    
    public function key()
    {
        return $this->position;
    }
    
    public function next()
    {
        ++$this->position;
    }
    
    public function valid()
    {
        return isset($this->images[$this->position]);
    }
    
    /**
     * @return array
     */
    public function getImages ()
    {
        return $this->images;
    }
    
    /**
     * @param integer $index
     * @return Image|boolean
     */
    public function getImage ($index)
    {
        return isset($this->images[$index]) ? $this->images[$index] : false;
    }
    
    /**
     * @param array $images
     * @return \MWMobile\Model\ImageCollection
     */
    public function setImages (array $images)
    {
        $this->images = array();
        
        foreach($images as $image) {
            $this->addImage($image);
        }
        return $this;
    }
    
    /**
     * @param Image $i
     * @return \MWMobile\Model\ImageCollection
     */
    public function addImage (Image $i)
    {
        $this->images[] = $i;
        return $this;
    }
}
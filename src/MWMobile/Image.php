<?php

namespace MWMobile;

class Image 
{
    /**
     * @var string
     */
    const SIZE_ICON = 'ICON';
    
    /**
     * @var string
     */
    const SIZE_S = 'S';
    
    /**
     * @var string
     */
    const SIZE_M = 'M';
    
    /**
     * @var string
     */
    const SIZE_L = 'L';
    
    /**
     * @var string
     */
    const SIZE_XL = 'XL';
    
    /**
     *
     * @var array
     */
    protected $_urls = array();
    
    /**
     * @param array $sizesUrls OPTIONAL key/value pairs
    */
    public function __construct(array $sizesUrls = array())
    {
        foreach($sizesUrls as $size => $url) {
            $this->setUrl($size, $url);
        }
    }
    
    /**
     * @return string
     */
    public function __toString ()
    {
        return $this->getUrl(self::SIZE_S);
    }
    
    /**
     * @param string $size
     * @param string $url
     * @return \MWMobile\Image
     */
    public function setUrl($size, $url)
    {
        $this->_urls[$size] = $url;
    
        return $this;
    }
    
    /**
     * @param string $size
     * @return boolean|string
     */
    public function getUrl($size)
    {
        if(!array_key_exists($size, $this->_urls)) {
            return false;
        }
    
        return $this->_urls[$size];
    }
    
    /**
     * @return array
     */
    public function getUrls ()
    {
        return $this->_urls;
    }
}
<?php

namespace MWMobile\Model;

class Refdata 
{
    /**
     * @var string
     */
    protected $key;
    
    /**
     * @var string
     */
    protected $value;
    
    /**
     * @param string $key
     * @param string $value
     */
    public function __construct ($key = null, $value = null)
    {
        if(!empty($key)) {
            $this->setKey($key);
        }
        if(!empty($value)) {
            $this->setValue($value);
        }
    }
    
    /**
     * @return string
     */
    public function getKey ()
    {
        return $this->key;
    }
    
    /**
     * @return string
     */
    public function getValue ()
    {
        return $this->value;
    }
    
    /**
     * @param string $key
     * @return \MWMobile\Model\Refdata
     */
    public function setKey ($key)
    {
        $this->key = trim((string) $key);
        return $this;
    }
    
    /**
     * @param string $value
     * @return \MWMobile\Model\Refdata
     */
    public function setValue ($value)
    {
        $this->value = trim((string) $value);
        return $this;
    }
}
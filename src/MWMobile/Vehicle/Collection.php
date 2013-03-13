<?php

namespace MWMobile\Vehicle;

use MWMobile\Vehicle;

class Collection implements \Iterator
{
    /**
     * @var integer 
     */
    private $position = 0;
    
    /**
     * @var array
     */
    protected $vehicles = array();
    
    /**
     * @param Vehicle $v
     * @return \MWMobile\Vehicle\Collection
     */
    public function add (Vehicle $v)
    {
        $this->vehicles[] = $v;
        return $this;
    }
    
    public function rewind ()
    {
        $this->position = 0;
    }
    
    public function current()
    {
        return $this->vehicles[$this->position];
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
        return isset($this->vehicles[$this->position]);
    }
}
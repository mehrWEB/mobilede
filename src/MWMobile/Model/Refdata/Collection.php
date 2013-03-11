<?php

namespace MWMobile\Model\Refdata;

use MWMobile\Model\Refdata;

class Collection implements \Iterator
{
    /**
     * @var integer
     */
    private $position = 0;
    
    /**
     * @var array
     */
    protected $refs = array();
    
    /**
     * @param array $refs OPTIONAL
     */
    public function __construct (array $refs = array())
    {
        $this->setRefs($refs);
    }
    
    public function rewind ()
    {
        $this->position = 0;
    }
    
    public function current()
    {
        return $this->refs[$this->position];
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
        return isset($this->refs[$this->position]);
    }
    
    /**
     * @return array
     */
    public function getRefs ()
    {
        return $this->refs;
    }
    
    /**
     * @param integer $index
     * @return Refdata|boolean
     */
    public function getRef ($index)
    {
        return isset($this->refs[$index]) ? $this->refs[$index] : false;
    }
    
    /**
     * @param array $refs
     * @return \MWMobile\Model\Refdata\Collection
     */
    public function setRefs (array $refs)
    {
        $this->refs = array();
        
        foreach($refs as $ref) {
            $this->addRef($ref);
        }
        return $this;
    }
    
    /**
     * @param Refdata $r
     * @return \MWMobile\Model\Refdata\Collection
     */
    public function addRef (Refdata $r)
    {
        $this->refs[] = $r;
        return $this;
    }
}
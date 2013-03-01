<?php

namespace MWMobile\Model\Query;

class Details implements QueryInterface
{
    /**
     * @var integer
     */
    protected $id;
    
    /**
     * @param integer $id
     */
    public function __construct ($id)
    {
        $this->setId($id);
    }
    
    /**
     * @param integer $id
     * @return \MWMobile\Model\Query\Details
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
     * @return string
     */
    public function getUrl ()
    {
        return sprintf('/ad/%d', $this->getId());
    }
    
    /**
     * @return array
    */
    public function getHttpQuery ()
    {
        return array();
    }
}
<?php

namespace MWMobile\Model\Query;

class Refdata implements QueryInterface
{
    /**
     * @var string
     */
    protected $path;
    
    /**
     * @param string $path OPTIONAL
     */
    public function __construct ($path = null)
    {
        if(!empty($path)) {
            $this->setPath($path);
        }
    }
    
    /**
     * @param string $path
     * @return \MWMobile\Model\Query\Refdata
     */
    public function setPath ($path)
    {
        $this->path = (string) $path;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPath ()
    {
        return $this->path;
    }
    
    /**
     * (non-PHPdoc)
     * @see \MWMobile\Model\Query\QueryInterface::getUrl()
     */
    public function getUrl ()
    {
        return '/refdata/' . $this->getPath();
    }
    
    /**
     * (non-PHPdoc)
     * @see \MWMobile\Model\Query\QueryInterface::getHttpQuery()
     */
    public function getHttpQuery ()
    {
        return array();
    }
}
<?php

namespace MWMobile\Model\Query;

class Search implements QueryInterface
{
    /**
     * @var integer
     */
    protected $pageNumber = 1;
    
    /**
     * @var integer
     */
    protected $pageSize = 20;
    
    /**
     * @var string
     */
    const ORDER_ASC = 'ASCENDING';
    const ORDER_DESC = 'DESCENDING';
    
    /**
     * @var string
     */
    protected $order = self::ORDER_ASC;
    
    /**
     * @var string
     */
    protected $sortField = '';
    
    /**
     * @return string
     */
    public function getSortField ()
    {
        return $this->sortField;
    }
    
    /**
     * @param string $field
     * @return \MWMobile\Model\Webservice\Search
     */
    public function setSortField ($field)
    {
        $this->sortField = trim($field);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getOrder ()
    {
        return $this->order;
    }
    
    /**
     * @param string $order
     * @throws \InvalidArgumentException
     * @return \MWMobile\Model\Webservice\Search
     */
    public function setOrder ($order)
    {
        if($order !== self::ORDER_ASC && $order !== self::ORDER_DESC) {
            throw new \InvalidArgumentException('Invalid order: ' . $order);
        }
        $this->order = (string) $order;
        return $this;
    }
    
    /**
     * @param integer $pageNumber
     * @return \MWMobile\Model\Webservice\Search
     */
    public function setPageNumber ($pageNumber)
    {
        $this->pageNumber = (int) $pageNumber;
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getPageNumber ()
    {
        return $this->pageNumber;
    }
    
    /**
     * @return integer
     */
    public function getPageSize ()
    {
        return $this->pageSize;
    }
    
    /**
     * @param integer $size
     * @throws \InvalidArgumentException
     * @return \MWMobile\Model\Webservice\Search
     */
    public function setPageSize ($size)
    {
        if((int) $size < 1 || (int) $size > 100) {
            throw new \InvalidArgumentException('Invalid page size ' . $size);
        }
        $this->pageSize = (int) $size;
        return $this;
    }
    
    /**
     * (non-PHPdoc)
     * @see \MWMobile\Model\Webservice\QueryInterface::getUrl()
     */
    public function getUrl ()
    {
        return '/ad/search';
    }
    
    /**
     * (non-PHPdoc)
     * @see \MWMobile\Model\Webservice\QueryInterface::getHttpQuery()
     */
    public function getHttpQuery ()
    {
        return array(
            'sort.order' => $this->getOrder(),
            'sort.field' => '',
            'page.number' => $this->getPageNumber(),
            'page.size' => $this->getPageSize()
        );
    }
}
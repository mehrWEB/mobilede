<?php

namespace MWMobile\Model\Query;

interface QueryInterface 
{
    /**
     * @return string
     */
    public function getUrl ();
    
    /**
     * @return array
     */
    public function getHttpQuery ();
}
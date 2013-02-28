<?php

namespace MWMobile\Model\Webservice;

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
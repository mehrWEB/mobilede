<?php

namespace MWMobile\Controller;

use Zend\Mvc\Controller\AbstractActionController;

use MWMobile\Model\Mapper\SimpleXml;
use MWMobile\Model\Webservice\Response;
use MWMobile\Model\Webservice\Search;

class IndexController extends AbstractActionController
{
    public function indexAction ()
    {
        $webservice = $this->getServiceLocator()->get('mwmobile_webservice');
        $response = $webservice->query(new Search());
        
        return array('response' => new Response($response, new SimpleXml()));
    }
}
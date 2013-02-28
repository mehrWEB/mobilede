<?php

namespace MWMobile\Controller;

use MWMobile\Model\Webservice;
use MWMobile\Model\Webservice\Response;
use MWMobile\Model\Webservice\Search;

use Zend\Http\Client;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function indexAction ()
    {
        $webservice = $this->getServiceLocator()->get('mwmobile_webservice');
        $response = $webservice->query(new Search());
        
        return array('response' => new Response($response));
    }
}
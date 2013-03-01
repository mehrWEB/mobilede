<?php

namespace MWMobile\Controller;

use Zend\Mvc\Controller\AbstractActionController;

use MWMobile\Model\Mapper\SimpleXml;
use MWMobile\Model\Webservice\Response;
use MWMobile\Model\Query\Search as SearchQuery;
use MWMobile\Model\Query\Details as DetailQuery;

class IndexController extends AbstractActionController
{
    public function indexAction ()
    {
        $webservice = $this->getServiceLocator()->get('mwmobile_webservice');
        $response = $webservice->query(new SearchQuery());
        
        return array('response' => new Response($response, new SimpleXml()));
    }
    
    public function detailsAction ()
    {
        $webservice = $this->getServiceLocator()->get('mwmobile_webservice');
        $query = new DetailQuery($this->params('id'));
        $response = $webservice->query($query);
        
        return array(
            'response' => new Response($response, new SimpleXml())
        );
    }
}
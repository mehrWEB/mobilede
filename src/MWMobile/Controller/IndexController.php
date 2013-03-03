<?php

namespace MWMobile\Controller;

use Zend\Mvc\Controller\AbstractActionController;

use MWMobile\Model\Mapper\SimpleXml;
use MWMobile\Model\Response\Vehicle\Detail as DetailResponse;
use MWMobile\Model\Response\Vehicle\Listing as ListResponse;
use MWMobile\Model\Query\Search as SearchQuery;
use MWMobile\Model\Query\Details as DetailQuery;

class IndexController extends AbstractActionController
{
    public function indexAction ()
    {
        $webservice = $this->getServiceLocator()->get('mwmobile_webservice');
        $response = $webservice->query(new SearchQuery());
        
        return array('response' => new ListResponse($response, new SimpleXml()));
    }
    
    public function detailsAction ()
    {
        $webservice = $this->getServiceLocator()->get('mwmobile_webservice');
        $query = new DetailQuery($this->params('id', 140101104));
        $response = $webservice->query($query);
        
        return array(
            'response' => new DetailResponse($response, new SimpleXml())
        );
    }
}
<?php

namespace MWMobile\Controller;

use Zend\Mvc\Controller\AbstractActionController;

use MWMobile\Model\Mapper\SimpleXml;
use MWMobile\Model\Response\Vehicle\Detail as DetailResponse;
use MWMobile\Model\Response\Vehicle\Listing as ListResponse;
use MWMobile\Model\Response\Refdata as RefdataResponse;
use MWMobile\Model\Query\Search as SearchQuery;
use MWMobile\Model\Query\Details as DetailQuery;
use MWMobile\Model\Query\Refdata as RefdataQuery;
use MWMobile\Model\Mapper\Refdata as RefdataMapper;

class IndexController extends AbstractActionController
{
    public function indexAction ()
    {
        $webservice = $this->getServiceLocator()->get('mwmobile_webservice');
        $response = $webservice->query(new SearchQuery());
        
        return array('response' => new ListResponse($response, new SimpleXml()));
    }
    
    public function refdataAction ()
    {
        $webservice = $this->getServiceLocator()->get('mwmobile_webservice');
        $response = $webservice->query(new RefdataQuery('classes'));
        
        $refResponse = new RefdataResponse($response, new RefdataMapper());
        return array(
            'refs' => $refResponse->getCollection()
        );
    }
    
    public function detailsAction ()
    {
        $id = $this->params('id', 140101104);
        
        $webservice = $this->getServiceLocator()->get('mwmobile_webservice');
        $query = new DetailQuery($id);
        $httpResponse = $webservice->query($query);
        $response = new DetailResponse($httpResponse, new SimpleXml());
        
        return array(
            'vehicle' => $response->getCollection()->current()
        );
    }
}
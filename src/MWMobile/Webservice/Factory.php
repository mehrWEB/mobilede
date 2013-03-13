<?php

namespace MWMobile\Webservice;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use MWMobile\Webservice;

class Factory implements FactoryInterface
{
    /**
     * (non-PHPdoc)
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        if (!isset($config['mwmobile'])) {
            throw new \Exception('Missing mwmobile config');
        }
        $config = $config['mwmobile'];
        $client = new \Zend\Http\Client(null, $config['http_client']);
        
        unset($config['http_client']);
        return new Webservice($client, new Options($config));
    }
}
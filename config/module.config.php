<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'MWMobile\Controller\Index' => 'MWMobile\Controller\IndexController'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'mwmobile_webservice' => function($sm) {
                // @TODO allow config
                $client = new \Zend\Http\Client();
                
                $config = $sm->get('config');
                $apiConfig = $config['mwmobile']['api'];
                $user = $apiConfig['user'];
                $password = $apiConfig['password'];
                $customer = $apiConfig['customer'];
                return new \MWMobile\Model\Webservice($client, $user, $password, $customer);
            }
        )
    ),
    'router' => array(
        'routes' => array(
            'mwindex' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/mwmobile[/:action]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        'controller' => 'MWMobile\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'mwmobile' => __DIR__ . '/../view',
        )
    )
);
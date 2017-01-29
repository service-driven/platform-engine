<?php

namespace OpenArchitecture\Restful;

use Zend\Mvc\Router\Http\Literal;

return array(
    'router' => array(
        'routes' => array(
            'rest-api' => array(
                'type'          => Literal::class,
                'options'       => array(
                    'route'    => '/rest/api',
                    'defaults' => array(
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            Controller\IndexController::class => Controller\IndexController::class,
        ),
        'factories'  => array(
            Controller\DatabaseController::class => Controller\DatabaseControllerFactory::class,
        ),
    ),

    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);